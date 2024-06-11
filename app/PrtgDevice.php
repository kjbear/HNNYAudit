<?php

namespace App;

use App\PRTG;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PrtgDevice extends PRTG
{


   function test()
   {
      $client = new Client();
     // $result =  
     echo $this->auth;

   }

}
