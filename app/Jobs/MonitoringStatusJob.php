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

class MonitoringStatusJob extends AuditJobClass
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $thisJob = new AuditJob();
       $thisJob->audit_job_type_id = 3;
       $thisJob->audit_id = $this->audit->id;
       $thisJob->config_item_id = $this->configItem->id;

       $thisJob->started_at = new \DateTime();

       $thisJob->save();

       //  First Step:  Check Name is not null

       $testName = "Name";
       
       $test = empty($this->configItem->name);
       $result     = ($test == false) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$test);
        
       //  Second Step:  Check FQDN is not null

       $testName = "FQDN";
       
       $test = empty($this->configItem->HNNY_FQDN);
       $result     = ($test == false) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$test);

       //  Third Step:  Check Monitoring Tier is not null

       $testName = "Monitoring Tier";
       
       $test = $this->configItem->monitoring_tier;
       $result     = (empty($test)) ? 'Bad' : 'Good';
       $result     = ($test == 'None') ? 'Warn' : $result;
       $this->logStep($thisJob,$result,$testName,$test);

       //  Fourth Step:  Check Device Type is not null

       $testName = "Device Type";
       
       $test = $this->configItem->type_label;
       $result     = (empty($test)) ? 'Bad' : 'Good';
       $this->logStep($thisJob,$result,$testName,$test);




       // End the job and save results

       $thisJob->ended_at = new \DateTime();
       $thisJob->save(); 
    }
}
