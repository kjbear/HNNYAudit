<?php

use Illuminate\Http\Request;

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

//  Base URL:  http://cmdd101bvla.blues.healthnow.local:8082/

//  Get Authentication Routes
Auth::routes();

Route::get('/override/disk/{host}', 'Override\DiskController@check');

Route::get('auth/logout', function() {
    Auth::logout();
    return redirect('/cognition/doc/eti');
});

Route::get('/', 'Dashboard@index');

Route::get('/ciexplorer', 'CiExplorer@index');

Route::get('/configItem/cmdb-uuid/{id}', 'ConfigItemController@showCmdbUuid'); 
Route::get('/configItem/{id}', 'ConfigItemController@show'); 

Route::get('/settings', 'SettingsController@show'); 


//  Charts

Route::prefix('charts')->group(function() {

    Route::get('omiEventCount', 'ChartsController@omiEventCount');

});

//  API Endpoints

Route::prefix('api')->group(function() {
    
    \Debugbar::disable();

    Route::prefix('omi')->group(function() {
       
        Route::get('updateHPSA/{id}/{user}', function($id,$user) {
            dd($id." ".$user);        
        });

    }); 


    Route::prefix('data')->group(function() {
 
        Route::get('ciexplorer', function() {
            return json_decode(App\ConfigItem::all());
        });

    });
    
    Route::prefix('sitescope')->group(function() {
        //Route::post('xml', 'SiteScopeController@storeXML');
        Route::get('search/{host}',function($host) {
	  $s     = new App\SiteScope;
          $paths = $s->search($host);
          $keys  = array_keys($paths);
          return response(json_encode($s->getMonitorSnapshot($keys)))->header('Content-Type', 'application/json');
        });

    });
   
    Route::prefix('queues')->group(function() {
        Route::get('status',function() {
            return response(json_encode(new App\QueueManagement()))->header('Content-Type', 'application/json');
        });
        Route::get('status/html','SettingsController@getStatus');

    });

});

//  Documentation Endpoints

Route::prefix('doc')->group(function() {

    \Debugbar::disable();
    Route::get('eti/{id}', 'DocumentationController@eti');
    Route::get('ci/{id}', 'DocumentationController@ci');
    Route::get('app/{id}', 'DocumentationController@app');
  
    Route::any('{any?}', function() {
        return view('404');
    })->where('any','.*');

});

//  Cognition Documentation endpoints

Route::prefix('cognition')->group( function() {

    \Debugbar::disable();
  
    Route::prefix('doc')->group( function() {
        \Debugbar::disable();
 
        Route::get('ci', 'Cognition\CiBrowserController@blank');      // Blank Page
        Route::get('ci/{id}', 'Cognition\CiBrowserController@show');
        Route::get('eti/direct/{id}', 'Cognition\EtiBrowserController@direct');

        Route::group(['middleware' => ['auth','web']], function() {
            Route::get('eti', 'Cognition\EtiDocBrowserController@index');
            Route::get('eti/new', 'Cognition\EtiDocBrowserController@create');
            Route::post('eti/new', 'Cognition\EtiDocBrowserController@store');
            Route::get('eti/browse', 'Cognition\EtiDocBrowserController@browse');
            Route::get('eti/search', 'Cognition\EtiDocBrowserController@search');

            Route::get('eti/list', 'Cognition\EtiBrowserController@index');
            Route::get('eti/{id}', 'Cognition\EtiBrowserController@show');

            Route::get('eti/{id}/edit', 'Cognition\EtiBrowserController@edit');
            Route::delete('eti/{id}/destroy', 'Cognition\EtiBrowserController@destroy');
            Route::patch('eti/{id}/update', 'Cognition\EtiDocBrowserController@update');
        });

      /*  Route::prefix('wizard')->group(function() {
           Route::get('doc/step/1',       'Cognition\DocumentWizardController@step1');      //  Start page
           Route::get('doc/step/eti/1',   'Cognition\DocumentWizardController@EtiStep1');   //  ETI Doc Start
           Route::get('doc/step/ci/1',    'Cognition\DocumentWizardController@CiStep1');    //  CI Doc Start
           Route::get('doc/step/confirm', 'Cognition\DocumentWizardController@CiStep1');    //  Confirm
           Route::post('doc/step/confirm', 'Cognition\DocumentWizardController@CiStep1');   //  Confirm

        });
*/
    });

    Route::prefix('api')->group(function() {
        Route::post('updateSection', function(Request $request) {
           $section = App\Cognition\DocumentSection::where('document_id', $request->input('document_id'))
                        ->where('name', $request->input('name'))
                        ->firstOrFail();
           $section->body = $request->input('body');
           $section->save();
          
           return response('success', 200);

       }); 
    });
   

});



//	Routes for testing below here

Route::get('/test', function() {
   $b = new App\TestPort();
   echo($b->testPort("sscpr01bvwa.healthnow.org",8080));
});

//Route::get('/job/all', function() {
//   $cis = App\ConfigItem::all();
//   foreach ($cis as $ci) {
//       $audit = new App\Audit();
//       $audit->config_item_id = $ci->id;
//       $audit->ci_cache = $ci;
//       $audit->save();
//
//       dispatch(new App\Jobs\MonitoringStatusJob($ci,$audit));
//       dispatch(new App\Jobs\DNSCheckForward($ci,$audit));
//       dispatch(new App\Jobs\PingTestJob($ci,$audit));
//   }
//});


//Route::get('/job/{id}', function($id) {
//   $ci  = App\ConfigItem::find($id);
//   $audit = new App\Audit();
//   $audit->config_item_id = $ci->id;
//   $audit->ci_cache = $ci;
//   $audit->save();
//
//   echo ($audit);   
//   $job  = (new App\Jobs\MonitoringStatusJob($ci,$audit)); 
//   $job1 = (new App\Jobs\DNSCheckForward($ci,$audit)); 
//   $job2 = (new App\Jobs\PingTestJob($ci,$audit)); 
//   echo (dispatch($job).",".dispatch($job1).",".dispatch($job2));
//});

Route::get('/job/all', 'AuditController@runTotalAudit');
Route::get('/job/{id}', 'AuditController@runSingleAudit');

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


// CATCH ALL

Route::any('{any?}', function() {
   return view('404');
})->where('any','.*');
