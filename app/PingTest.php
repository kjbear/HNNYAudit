<?php

namespace App;

use App\Base;
use JJG\Ping;
use Illuminate\Support\Facades\Log;
use Exception;

class PingTest extends Base
{

   function pingDevice($ip)
   {
       try {
           $ping = new Ping($ip);
           return $ping->ping();
       } catch(Exception $e) {
           Log::warning("Ping test failed for '".$ip."':  ".$e->getMessage());
           return null;
       }
   }

}
