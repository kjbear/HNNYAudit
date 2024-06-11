<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;
use App\Cognition\EventTypeIndicator;

class XmlImport extends CognitionBase
{

    protected $xmlPath = '/var/www/Audit/eti112717.xml';


    function processXml()
    {
        
        $xml        = simplexml_load_file($this->xmlPath);
   
        $indicators = $xml->xpath('/indicators/Indicator[@isHidden="false"]');
        
        
             
        foreach ($indicators as $indicator) {
            $ciType = $indicator['ciTypeId'];
            $health = (boolean)$indicator['isHealthIndicator'];

            foreach ($indicator->EventTypeIndicator as $eti) {
                $rec                    = new EventTypeIndicator();
                $rec->name              = $eti['name'];
                $rec->label             = $eti['label'];
                $rec->description       = $eti['description'];
                $rec->ciTypeId          = $ciType;
                $rec->isHealthIndicator = $health;
                $rec->save();
            }
        }
    
     }


}
