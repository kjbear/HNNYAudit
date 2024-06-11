<?php

namespace App\Console;

use App\Omi;
use App\Audit;
use App\ConfigItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function() {
           $ob = new Omi();
           $ob->getEventCount(true);
           Log::info('Command App\Omi\getEventCount(true) completed.');
        })->everyFiveMinutes();
  
        $schedule->call(function() {
            $cis = ConfigItem::all();
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
            }
        })->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
