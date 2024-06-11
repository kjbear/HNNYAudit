<?php

namespace App\Jobs;

use App\ConfigItem;
use App\AuditStep;
use App\Audit;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AuditJobClass implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    protected $configItem;
    protected $audit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ConfigItem $configItem, Audit $audit)
    {
        $this->configItem = $configItem;
        $this->audit      = $audit;
    }

    public function logStep($auditJob, $reslt, $name, $value)
    {
        $step = new AuditStep();

        $step->audit_job_id = $auditJob->id;
        $step->result       = $reslt;
        $step->name         = $name;
        $step->value        = $value;
        
        $step->save(); 

    }


}
