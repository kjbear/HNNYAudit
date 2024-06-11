<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//	Routes for testing below here

Route::get('/test', function() {
   $b = new App\TestPort();
   echo($b->testPort("sscpr01bvwa.healthnow.org",8080));
});

Route::get('/job/all', function() {
   $cis = App\ConfigItem::all();
   foreach ($cis as $ci) {
       $audit = new App\Audit();
       $audit->config_item_id = $ci->id;
       $audit->ci_cache = $ci;
       $audit->save();

       dispatch(new App\Jobs\MonitoringStatusJob($ci,$audit));
       dispatch(new App\Jobs\DNSCheckForward($ci,$audit));
       dispatch(new App\Jobs\PingTestJob($ci,$audit));
   }
});


Route::get('/job/{id}', function($id) {
   $ci  = App\ConfigItem::find($id);
   $audit = new App\Audit();
   $audit->config_item_id = $ci->id;
   $audit->ci_cache = $ci;
   $audit->save();

   echo ($audit);   
   $job  = (new App\Jobs\MonitoringStatusJob($ci,$audit)); 
   $job1 = (new App\Jobs\DNSCheckForward($ci,$audit)); 
   $job2 = (new App\Jobs\PingTestJob($ci,$audit)); 
   echo (dispatch($job).",".dispatch($job1).",".dispatch($job2));
});

Route::get('/pings', function() {

   $id = [58, 70, 72, 73, 112, 116, 117, 118, 119, 171, 177, 190, 191, 205, 206, 207, 276, 277, 339, 340, 351, 359, 360, 361, 362, 363, 369, 370, 372, 373, 374, 382, 425, 435, 445, 446, 447, 451, 452, 456, 457, 458, 459, 460, 461, 466, 467, 511, 542, 547, 580, 586, 636, 639, 698, 705, 706, 707, 708, 737, 738, 740, 741, 775, 808, 809, 810, 811, 812, 813, 814, 860, 864, 865, 866, 867, 868, 869, 870, 871, 872, 873, 874, 875, 876, 877, 878, 879, 881, 894, 901, 906, 918, 930, 932, 935, 1014, 1025, 1034, 1059, 1081, 1082, 1128, 1156, 1158, 1159, 1161, 1182, 1183, 1184, 1200, 1201, 1204, 1212, 1213, 1233, 1265, 1266, 1273, 1275, 1276, 1311, 1344, 1348, 1349, 1351, 1378, 1379, 1380, 1411, 1423, 1424];
   $dns = new App\DnsLookup;   
   $cis = App\ConfigItem::findMany($id);
   foreach ($cis as $ci) {
       $ip  = $dns->getIPFromFQDN($ci->display_label);
       $fqdn = $dns->getFQDNFromIP($ip);
       echo($ci->display_label.",".$ip.",".$fqdn."\n");
   }

});

Route::get('/sisconfig',function() {

  $s = new App\SiteScope;
  echo(json_encode((array)$s->getHostMap()));
  //echo(json_encode((array)$s->getConfigSnapshot(true,false)));

});

Route::get('/search/{host}',function($host) {

  $s     = new App\SiteScope;
  $paths = $s->search($host);
  $keys  = array_keys($paths);
  dd($s->getMonitorSnapshot($keys));
  //echo(json_encode((array)$s->getConfigSnapshot(true,false)));

});

