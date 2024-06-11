<?php

namespace App;

use App\DataPoint;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use \DateTime;

class Omi extends OpsBridge
{

   /**
    *  HPE / MicroFocus Ops Bridge REST API Class.
    *
    *  Base class for integrating with Ops Bridge instance.  
    *  Configuration is stored in the config/opsbridge.php 
    *  file.  
    */


   protected $username;
   protected $password;
   protected $auth;
   protected $deployedGroupPath;
   protected $delim;
   public $connUrl;

   function __construct() 
   {

      $this->host              = config('opsbridge.omi.host');
      $this->port              = config('opsbridge.omi.port');
      $this->username          = config('opsbridge.omi.username');
      $this->password          = config('opsbridge.omi.password');
      $this->connUrl           = 'http://'.$this->host.':'.$this->port.'/opr-web/rest/9.10';
      $this->auth              = [$this->username,$this->password,'basic'];

   }

   /**
    *  Get Event List via REST API.
    *
    *  @param    String  $format     Json, XML, or Atom (default is JSON)
    *  @return   array or stdClass   Returns an array or stdClass object with JSON data.
    */

   function eventList($format = 'json',$array = true)
   {
      $verb  = '/event_list?'.
               'format='.$format;
      $body = $this->getBody($this->buildURL($verb));

      return json_decode($body,$array);
   }   

   /**
    *  Get Event List via REST API.
    *
    *  @param    String  $format     Json, XML, or Atom (default is JSON)
    *  @return   array or stdClass   Returns an array or stdClass object with JSON data.
    */

   function getEventCount($store = false)
   {
       $retVal = $this->eventList()['event_list']['@total_size'];
       if ($store) {
           $dp = new DataPoint();
           $dp->config_item_id = 0;
           $dp->source         = 'omi';
           $dp->metric         = 'raw_event_count';
           $dp->value          = $retVal;
           $dp->save();
       }
       return $retVal;
   }





   function buildUrl($action)
   { 
      return $this->connUrl.$action;
   }

   function getBody($url)
   {
      $client   = new Client();
      $response = $client->request('GET',$url,['auth' => $this->auth]);
     
      return $response->getBody();

   }

}
