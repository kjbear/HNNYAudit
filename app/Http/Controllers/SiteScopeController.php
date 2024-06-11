<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Log;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Exception;
use App\Jobs\ProcessMonitor;
use App\Jobs\AddDriveLabel;
use \App\Monitor;
use \App\Counter;

class SiteScopeController extends Controller
{

    public function storeXML(Request $request, $environment)
    {

        /*-----------------------------------------------------------------
        |  This funcion takes the Request POST body (which is XML) and 
        |   creates a SimpleXMLElement object from it.  Then it takes the 
        |   child elements of the monitor and parses the counter values.
        |
        |   Once the counter values have been parsed into InfluxDB format, 
        |   a Job is dispatched to send that data to the InfluxDB
        |   system.
        |
        |------------------------------------------------------------------
        |
        |   K Obear - HealthNow New York 2018
        |
        */-----------------------------------------------------------------


        //  Turn on/off debugging
        $debug = false;     
 
        //  Create a tag array for Horizon tags
        $tags = []; 
       
        //  Start the timer
        $start_time = microtime(true);
        Log::info("SiS Collector Starting processing");

        //  Extend the PHP response time - SiteScope sends large XML files 
        set_time_limit(60);

        //  Create XML Object
        $xml = new SimpleXMLElement($request->getContent());

        //  Start a counter so we can send stats to InfluxDB about volume
        $count = 0;

        //  Loop through the 'monitor' XML elements
        foreach ($xml->xpath('//monitor') as $monitor) {

            //  Create a App/Monitor object and assign values based upon XML
            $mon = new Monitor;

            $mon->name               = (string)$monitor['name'];
            $mon->type               = (string)$monitor['type'];
            $mon->target             = (string)$monitor['target'];
            $mon->targetIP           = (string)$monitor['targetIP'];
            $mon->time               = date("Y-m-d H:i:s", substr((string)$monitor['time'], 0, 10));
            $mon->quality            = (string)$monitor['quality'];
            $mon->sourceTemplateName = (string)$monitor['sourceTemplateName'];
            $mon->environment        = $environment;
            $mon->raw                = $xml->asXML();

 
            if ($debug) { Log::info((string)$monitor['time']); }
 
            /*  Create InfluxDB string
            |   Format is:
            | 
            |      Measurement,key=value(,key=value) metric=value 
            |
            */ 
            $host = "host=".(string)$monitor['target'].",test=".strtr($mon->name,[' ' => '_']);

            //  Clear out the metrics string
            $metrics = "";
            
            //  Loop through the 'counter' XML child elements 
            foreach ($monitor->children() as $child){

                //  Create a App/Counter onbject and assign values based upon XML
                $rec = new Counter;

                $rec->name       = (string)$child['name'];
                $rec->status     = (string)$child['status'];
                $rec->quality    = (string)$child['quality'];
                $rec->value      = (string)$child['value'];
                $rec->monitor_id = $mon->id;
               
                //  Create and clear a variable for adding new tag/value pairs
                $hostAdd = "";

                //  Sanitize for InfluxDB insertion
                if (is_null($rec->value)) { $rec->value = 0; }		//  If the value is null, then make it 0
                if ($rec->value == "") { $rec->value = 0; }		//  If the value is empty, make it 0
                if ($rec->value == "n/a") { $rec->value = 0; }		//  If the value is "n/a", make it 0
               
                //  If it is a Network Bandwidth monitor, tag with interface name
                if ($mon->type == "Network Bandwidth Monitor" && strpos($rec->name,':') > 0) {
                   
                   //  Do stuffs to extract the interface name
                   $tmpAry = explode(':',$rec->name);
                   if ($debug) { Log::info("        Found : ".(string)strpos($rec->name,':')); }
                   if ($debug) { Log::info(" ".$tmpAry[0]." ====> ".$rec->name." = ".$rec->value); }
                   $vol_label = str_replace('.','-',$tmpAry[0]);
                   #  Change the test name to take out the interface name
                   $rec->name = end($tmpAry);
                   $hostAdd = ",interface=".$vol_label;
                   if ($debug) { Log::info("".$host.$hostAdd); }
                } 
 
                # If it is a PhysicalDisk or Dyanmic Disk, tag with the volume name
                if ($mon->type == "Dynamic Disk Space") {
                    $vol_label = "";
		    if (preg_match("/\[(.+)\]/",$rec->name,$match))
                    {
                       if (preg_match("/\((.+)\)/",$match[1],$match2))
                       {
                          $vol_label = $match2[1];
                       }
                       else
                       {
                          $vol_label = $match[1];
                       }
                       if ($vol_label) {
                          $tmpAry    = explode('/',$rec->name);
                          $tmp       = end($tmpAry);
                          $assembly  = "".$vol_label."-".$tmp; 
                          if ($debug) { Log::info($assembly); }
                          $rec->name = $assembly;
                       }

                    }
		}

                //  Futher InfluxDB sanitization 
                $rec->name = str_replace('\\','-',$rec->name);		# Replace backslashes with dashes (to make it InfluxDB friendly)
                #$rec->name = str_replace('/','-',$rec->name);		# Replace backslashes with dashes (to make it InfluxDB friendly)
                if (!is_numeric($rec->value)) {                         # If the value is not numeric, surround with quotes
		   $rec->value = "\"".$rec->value."\"";
                } 
                
		//  Get rid of "content match" messages, we do not want them
		if ($rec->name == "content match") { continue; }


                //  Assemble InfluxDB metric string
                $metrics = strtr($rec->name,[' ' => '_'])."=".$rec->value." ".(string)$monitor['time']; 

                //  Clean the metric type for InfluxDB
                $clean_type = strtr($mon->type,[' ' => '_']);
                
                //  And now finally, assemble the complete string sent to InfluxDB
                $data = $clean_type.",".$host.$hostAdd." ".$metrics;
 
                //  Tag the data, dispatch a job to add data to InfluxDB.  If it rejects it, log it and move to the next metric
                try {
            
                    //  Add tags for tracking in Horizon
                    $tags = [ $mon->type, (string)$monitor['target'] ];

                    //  Dispatch the InfluxDB job
                    ProcessMonitor::dispatch($data,"emspr09bvla.healthnow.org","SiteScope", $tags);

                    //  Add a job to send per host label info to a MySQL database for use in Grafana
                    if (($mon->type == "Dynamic Disk Space" || $mon->type == "Network Bandwidth Monitor") && $vol_label != "") {
                       AddDriveLabel::dispatch($clean_type,(string)$monitor['target'],$vol_label)->onQueue('DriveLabels');
                       $vol_label = "";
                    }

                    //  Increment our counter
                    $count++;
                } catch (Exception $e) {
                    Log::error("Error logging to InfluxDB:  ". $e->getMessage());
                }
            }
   
        }
        
        //  Grab the end time
        $end_time = microtime(true);

        //  Log the execution time in the log file
        Log::info("--> Controller execution ".$count." metrics took ".round(($end_time-$start_time),3)." seconds");

        //  If we have 1 or more counters, send a job to add the metrics of the run to InfluxDB
        if ($count > 0) { 
            ProcessMonitor::dispatch("MetricsAPI,host=emspr09bvla.healthnow.org ExecutionTime=".round(($end_time-$start_time),3),"emspr09bvla.healthnow.org","SiteScope",[ "MetricsAPI" ]);
            ProcessMonitor::dispatch("MetricsAPI,host=emspr09bvla.healthnow.org Count=".$count,"emspr09bvla.healthnow.org","SiteScope",[ "MetricsAPI" ]);
        }
    }


}
