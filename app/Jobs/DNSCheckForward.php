<?php

namespace App\Jobs;

use App\ConfigItem;
use App\DnsLookup;
use App\AuditJob;
use App\Audit;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DNSCheckForward extends AuditJobClass
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $thisJob = new AuditJob();
       $thisJob->audit_job_type_id = 1;
       $thisJob->audit_id = $this->audit->id;
       $thisJob->config_item_id = $this->configItem->id;
       $thisJob->save();

       $thisJob->started_at = new \DateTime();

       $ip = new DnsLookup;

       //  First Step:  Forward Resolution

       $testName = "Forward";

       $forward = $ip->getIPFromFQDN($this->configItem->HNNY_FQDN);
       $result = (!is_null($forward)) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$forward);
        
       //  Second Step:  Reverse Resolution

       $testName = "Blues Reverse";

       $resultVal = $ip->getFQDNFromIP($forward);
       $result = (!empty($resultVal)) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$resultVal);

       //  Second Step:  Reverse Resolution

       $testName = "HNNY Reverse";

       $resultVal = $ip->getFQDNFromIP($forward, '10.130.146.11');
       $result = (!empty($resultVal)) ? 'Good' : 'Bad';
       $this->logStep($thisJob,$result,$testName,$resultVal);

       $thisJob->ended_at = new \DateTime();
       $thisJob->save(); 
    }
}
