<?php

namespace App\Jobs;

use App\ConfigItem;
use App\PingTest;
use App\AuditJob;
use App\Audit;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;

class PingTestJob extends AuditJobClass
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $thisJob = new AuditJob();
       $thisJob->audit_job_type_id = 2;
       $thisJob->audit_id = $this->audit->id;
       $thisJob->config_item_id = $this->configItem->id;
       $thisJob->save();

       $thisJob->started_at = new \DateTime();
       
//       $error = "Testing for errors";
//       throw new Exception($error);

       //  First Step:  Ping Aviability

       $testName = "Ping Availability";
       
       $ping = new PingTest();
 
       $test = $ping->pingDevice($this->configItem->HNNY_FQDN);
       $result     = (is_numeric($test)) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$test);
        

       // End the job and save results

       $thisJob->ended_at = new \DateTime();
       $thisJob->save(); 
    }
}
