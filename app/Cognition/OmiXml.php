<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;
use App\Cognition\EventTypeIndicator;

class OmiXml extends CognitionBase
{

    protected $xmlPath = '/var/www/Audit/OmiXml2.xml';


    function processXml()
    {
        
        $xml        = simplexml_load_file($this->xmlPath);
	$xml->registerXPathNamespace('x','http://www.hp.com/2009/software/opr/data_model');
        
        //$json = json_encode($xml);
	//$array = json_decode($json,TRUE); 
        //return $array; 

	$aspects = $xml->xpath('//x:aspect_version_assignment[last()]');
        foreach ($aspects as $aspect) {
              foreach($aspect->children() as $kid) {
		var_dump($kid);
              }

	return $aspects;
;
 //           $ciType = $indicator['ciTypeId'];
  //          $health = (boolean)$indicator['isHealthIndicator'];
//
 //           foreach ($indicator->EventTypeIndicator as $eti) {
  //              $rec                    = new EventTypeIndicator();
   //             $rec->name              = $eti['name'];
    //            $rec->label             = $eti['label'];
     //           $rec->description       = $eti['description'];
      //          $rec->ciTypeId          = $ciType;
       //         $rec->isHealthIndicator = $health;
        //        $rec->save();
  //          }
       }
  //  
     }


}
