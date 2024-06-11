<?php

namespace App\Http\Controllers;

use App\QueueManagement;
use StdClass;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        return view('settings.show');
    }





    public function getStatus()
    {

       $qm          = new QueueManagement();
       $resp        = new StdClass();
       $resp->total = 0;
       $resp->fail  = 0;
       $resp->html  = "";
       if (!empty($qm->queueLengths)) {
           foreach (array_keys($qm->queueLengths) as $queue) {
            //   Log::info($queue);
               $workerCount = 0;
               $resp->total += $qm->queueLengths[$queue];
               foreach ($qm->workers as $worker) {
                   if ($queue == $worker->queue) {
                       $workerCount ++;
                   }
               }
               $resp->html .= view(
                    'settings.status',
                    [
                       'workerCount'  => $workerCount,
                       'queueName'    => $queue,
                       'queueLength'  => $qm->queueLengths[$queue],
                       'failedLength' => $qm->failedJobs[$queue]
                    ]
               );
           }
       }
       return response(json_encode($resp))->header('Content-Type', 'application/json'); 

    }



}
