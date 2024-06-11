<?php

namespace App\Jobs;

use App\ConfigItem;
use App\OpsBridge;
use App\AuditJob;
use App\Audit;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SiteScopeMonitorsJob extends AuditJobClass
{

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {

       $thisJob = new AuditJob();
       $thisJob->audit_job_type_id = 4;
       $thisJob->audit_id = $this->audit->id;
       $thisJob->config_item_id = $this->configItem->id;
       
       if (empty($this->configItem->monitoring_tier)) { return null; }

       $ob   = new OpsBridge();
       $ss   = $ob->auditMonitors($this->configItem); 

       $thisJob->started_at = new \DateTime();

       $thisJob->save();

       //  Recursive Step:  Check to see if all items in $test->expect are in $test->standard 
   
       foreach ($ss->expect as $line) {
          
           $testName = $line;
           $result = (empty($ss->standard[$line])) ? 'Bad' : 'Good';
           if ($result == 'Good') {
               $this->logStep($thisJob,$result,$testName,json_encode($ss->standard[$line]));
           } else {
               $this->logStep($thisJob,$result,$testName,null);
           }
       } 
        

       // End the job and save results

       $thisJob->ended_at = new \DateTime();
       $thisJob->save(); 
    }
}
