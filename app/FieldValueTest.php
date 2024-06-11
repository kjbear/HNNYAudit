<?php

namespace App;

use App\Base;
use Illuminate\Support\Facades\Log;
use Exception;

class FieldValueTest extends Base
{

   function check($ci)
   {
       try {
           return $ping->ping();
       } catch(Exception $e) {
           Log::warning("Field Value Test for '".$ci."':  ".$e->getMessage());
           return null;
       }
   }

}
