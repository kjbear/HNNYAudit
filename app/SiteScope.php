<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use \DateTime;
use App\SiteScopeMonitor;

class SiteScope
{

   /**
    *  HPE / MicroFocus SiteScope REST API Class.
    *
    *  Base class for integrating with SiteScope (SiS) instance.  
    *  Configuration is stored in the config/sitescope.php 
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

      $this->host              = config('opsbridge.sitescope.host');
      $this->port              = config('opsbridge.sitescope.port');
      $this->username          = config('opsbridge.sitescope.username');
      $this->password          = config('opsbridge.sitescope.password');
      $this->connUrl           = 'http://'.$this->host.':'.$this->port.'/SiteScope';
      $this->auth              = [$this->username,$this->password,'basic'];
      $this->delim             = '_sis_path_delimiter_';

      $this->deployedGroupPath = 'Deployed from HP Monitoring Automation'.$this->delim.
                                 'emspr01bvwa.healthnow.org'.$this->delim;

   }

   /**
    *  Searches for SiteScope objects via REST API.
    *
    *  @param    String  $type       Type of objects to return (monitor,group,all)  default is monitor
    *  @param    Boolean $array      True = return as array, False (Default) = return as stdClass
    *  @return   array or stdClass   Returns an array or stdClass object with JSON data.
    */

   function search($host,$type = 'monitor',$array = true)
   {
      $verb  = '/api/monitors?'.
               'name='.$host.
               '&entity_type='.$type.
               '&maxNumOfResults=100';
      $body = $this->getBody($this->buildURL($verb));

      return json_decode($body,$array);
   }   

   /**
    *  Retrieves the list of hosts from SiS.
    *
    *  Retrieves the list of hosts defined in the SiS Hosts list.
    * 
    *  @param    Boolean $array      True = return as array, False (Default) = return as stdClass
    *  @return   array or stdClass   Returns an array or stdClass object with JSON data.
    */

   function getHostMap($array = false)
   {
      $verb = '/api/admin/hostsMap';
      $body = $this->getBody($this->buildURL($verb));

      return json_decode($body,$array);
   }   

   /**
    *  Retrieves the list of hosts from SiS.
    *
    *  Retrieves the list of hosts defined in the SiS Hosts list.
    * 
    *  @param    Boolean $fullConfig  True = All Data (Default), False = Basic Data
    *  @param    Boolean $array       True = return as array, False (Default) = return as stdClass
    *  @return   array or stdClass    Returns an array or stdClass object with JSON data
    */

   function getConfigSnapshot($fullConfig = true, $array = false)
   {
      $verb = '/api/admin/config/snapshot?fetchFullConfig='.$fullConfig;
      $body = $this->getBody($this->buildURL($verb));

      return json_decode($body,$array);
   }   

   /**
    *  Retrieves monitor details for period of time.
    *
    *  As it is now, this function returns the past 2 hours of data
    *  from the SiteScope data files.  Future development will 
    *  allow for a sliding window of time for data to be retrieved.
    *
    *  @param    String $host       Hostname of the monitored device. 
    *  @param    String $monitors   List of Monitor Types (comma seperated) 
    *  @return   string             XML data. 
    */

   function getData($host = null, $monitors = null)
   {
      if (is_null($host)) { return null; }

      $end     = new DateTime(); 
      $start   = new DateTime();
      $start->modify('-2 hours');
      $endMS   = $end->getTimeStamp()*1000;
      $startMS = $start->getTimeStamp()*1000; 
      $verb    = '/api/data?'.
                 'startTime='.$startMS.
                 '&endTime='.$endMS.
                 '&targetServer='.$host;
      if (!is_null($monitors)) {
          $verb .= '&monitorType='.$monitors; 
      }
      dump($verb);
      $body    = $this->getBody($this->buildURL($verb));

      return gzdecode(base64_decode($body));
   }

   /**
    *  Retrieves list of monitors from SiS.
    *
    *  Retrieves the list of hosts defined in the SiS Hosts list.
    * 
    *  @param    Boolean $enabledOnly   Include only enabled monitors (Default). 
    *  @return   string                 XML data. 
    */

   function getMonitorTypes($enabledOnly = true)
   {
      $verb = '/api/data/monitorTypes?enabledMonitorsOnly='.$enabledOnly;
      $body = $this->getBody($this->buildURL($verb));

      return gzdecode(base64_decode($body));
   }

   /**
    *  Retrieves the list of hosts from SiS.
    *
    *  Retrieves the list of hosts defined in the SiS Hosts list.
    * 
    *  @param    Boolean $fullConfig  True = All Data (Default), False = Basic Data
    *  @param    Boolean $array       True = return as array, False (Default) = return as stdClass
    *  @return   array or stdClass    Returns an array or stdClass object with JSON data
    */

   function getMonitorGroup($array = false)
   {
      $verb  = '/api/admin/groups/config/snapshot?'.
               'isFullConfig=true'.
               '&fullPathsToGroups='.$this->getGroupPath();

      $body = $this->getBody($this->buildURL($verb));

      return json_decode($body,$array);
   }

   /**
    *  Retrieves Monitor Snaphot from SiS.
    *
    *  Retrieves the current status of a monitor from SiS.
    * 
    *  @param    string  $type        Monitor type (Default is 'CPU')
    *  @param    string  $monitor     Monitor name (Default is 'CPU Utilization')
    *  @param    string  $configItem  FQDN Host Name (Default is 'cmaix.blues.healtnow.local')
    *  @param    Boolean $array       True = return as array, False (Default) = return as stdClass
    *  @return   array or stdClass    Returns an array or stdClass object with JSON data
    */

   function getMonitorSnapshot($paths)
   {
      $verb  = '/api/monitors/snapshots?'.
               '&fullPathsToMonitors='.implode(";",$paths);
      dd($verb);
      $body = $this->getBody($this->buildURL($verb));
      return json_decode($body,true);
   }

   /**
    *  Wrapper for getMonitorSnapthot.
    *
    *  @param    string  $configItem  FQDN Host Name (Default is 'cmaix.blues.healtnow.local')
    *  @return   json                 Returns JSON data
    */

   function getMonitors(ConfigItem $host)
   {
       $tmpHost = $host;
       $tmpHost->monitors = array();
       if (empty($host)) { return null; }


       $search   = $this->search($host->name); 
       $keys     = array_keys($search); 
       $monitors = $this->getMonitorSnapshot($keys);

       foreach ($monitors as $monitor) {
           array_push($tmpHost->monitors,new SiteScopeMonitor($monitor));
       }
       return $tmpHost->monitors;

   }


   function getGroupPath($monitor = 'CPU',$configItem = 'cmaix.blues.healthnow.local')
   {
 
      return $this->deployedGroupPath.
                    $monitor.' WIN (HNNY Monitoring Automation Templates)'.
                    $this->delim.
                    $monitor.' on '.$configItem;
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
