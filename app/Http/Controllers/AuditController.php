<?php

namespace App\Http\Controllers;

use \App\ConfigItem;
use \App\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    
    function runSingleAudit($id)
    {
        $ci  = ConfigItem::find($id);
        $audit = new Audit();
        $audit->config_item_id = $ci->id;
        $audit->ci_cache = $ci;
        $audit->save();

        $jobs = [
             (new \App\Jobs\MonitoringStatusJob($ci,$audit))->onQueue('audit-default'),
             (new \App\Jobs\DNSCheckForward($ci,$audit))->onQueue('audit-DNS'),
             (new \App\Jobs\PingTestJob($ci,$audit))->onQueue('audit-ping'),
             (new \App\Jobs\SiteScopeMonitorsJob($ci,$audit))->onQueue('audit-SiS'),
        ];

        foreach ($jobs as $job) {
             dispatch($job);
        }

        echo("Audit for ID=".$id." submitted");

    }

    function runTotalAudit()
    {

        $cis = ConfigItem::all();
        echo("Beginning audit for ".count($cis)." devices:  ");
        foreach ($cis as $ci) {
            $audit = new Audit();
            $audit->config_item_id = $ci->id;
            $audit->ci_cache = $ci;
            $audit->save();

            $jobs = [
                 (new \App\Jobs\MonitoringStatusJob($ci,$audit))->onQueue('audit-default'),
                 (new \App\Jobs\DNSCheckForward($ci,$audit))->onQueue('audit-DNS'),
                 (new \App\Jobs\PingTestJob($ci,$audit))->onQueue('audit-ping'),
                 (new \App\Jobs\SiteScopeMonitorsJob($ci,$audit))->onQueue('audit-SiS'),
            ];

            foreach ($jobs as $job) {
                 dispatch($job);
            }
            echo(".");
        }
        echo(" Complete");


    }


    
}
