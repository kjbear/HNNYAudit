<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PRTG
{

   protected $username;
   protected $passhash;
   protected $auth;

   private $connUrl;

   function __construct() 
   {

      $this->host = config('prtg.host');
      $this->port = config('prtg.port');
      $this->username = config('prtg.username');
      $this->passhash = config('prtg.passhash');
      $this->connUrl = 'http://'.$this->host.':'.$this->port;
      $this->auth = '&username='.$this->username.'&passhash='.$this->passhash ;
   }

   function getPrtgStatus()
   {
      $verb = '/api/getstatus.htm?id=0';
      $url  = $this->buildURL($verb);
      
      $client   = new Client(); 
      $response = $client->get($url);
      $body     = $response->getBody();

      return json_decode($body);
   }   

   function buildUrl($action)
   {
      return $this->connUrl.$action.$this->auth;
   }



}
