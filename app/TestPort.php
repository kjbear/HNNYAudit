<?php

namespace App;

use App\Base;

class TestPort extends Base
{

  function testPort($host,$port){

    $starttime = microtime(true);
    $file = @fsockopen($host, $port, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!is_resource($file)) { 
        $status = -1;  // Site is down

    } else {

        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
  }
}
