<?php

namespace App;

use App\ConfigItem;
use App\SiteScope;

class OpsBridge
{

   protected $monitoring_tiers;

   function __construct() 
   {
       $this->monitoring_tiers = config('opsbridge.tiers');
   }


   function auditMonitors(ConfigItem $ci)
   {

      if (empty($ci)) { return null; }

      $os   = $ci->type_label;
      $tier = $ci->monitoring_tier;

      if (empty($os) or empty($tier)) { return null; }

      $resultObj         = new \StdClass();
      $resultObj->tier   = $tier;
      $resultObj->expect = $this->monitoring_tiers[$tier][$os];
      $results           = array();
      $otherResults      = array();

      //  Get SiteScope Monitors       

      $ss       = new SiteScope();
      $monitors = $ss->getMonitors($ci);

      if (empty($monitors)) { return null; }

      foreach ($this->monitoring_tiers[$tier][$os] as $line) {
         foreach ($monitors as $monitor) {
             $tmpVal = $line." on ".$ci->HNNY_FQDN;
             if ($tmpVal == $monitor->name) {
                 $results[$line] = $monitor;
             } 
         }
      } 
      
      foreach ($monitors as $monitor) {
          $line = explode(' on ', trim($monitor->name));

          if (!empty($line[0]) && empty($results[$line[0]])) {
              $otherResults[$line[0]] = $monitor;
          }
      }

      $resultObj->standard = $results;      
      $resultObj->other    = $otherResults;      

      return $resultObj;
   }
   
}
