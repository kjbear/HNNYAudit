<?php

namespace App;

use StdClass;
use App\QueueWorker;
use App\Job;
use App\FailedJob;

class QueueManagement
{

   public $queueLengths;
   public $failedJobs;
   public $workers;

   function __construct() 
   {
       $this->workers = $this->getAllQueueProcesses();    
       $this->getQueueLengths();
   }

   function getAllQueueProcesses()
   {
      
      $procs = array(); 

      $ps = `ps ahxwwo pid,ppid,command | grep queue:work | grep -v grep`;

      if (!empty($ps)) {
          $psa = explode(PHP_EOL,trim($ps));
          foreach($psa as $line) {
              array_push($procs,new QueueWorker(trim($line)));
          }
      }     
     
      return $procs;

   }
   
   function getQueueLengths()
   {

      $queues = array();     

      foreach ($this->workers as $worker) {
          if (!in_array($worker->queue,$queues)) {
              array_push($queues,$worker->queue);
              $this->queueLengths[$worker->queue] = count(Job::all()->where('queue',$worker->queue));
              $this->failedJobs[$worker->queue] = count(FailedJob::all()->where('queue',$worker->queue));
          }
      }
      
      $pj = Job::distinct('queue')->get();
      foreach ($pj as $worker) {
          if (!in_array($worker->queue,$queues)) {
              array_push($queues,$worker->queue);
              $this->queueLengths[$worker->queue] = count(Job::all()->where('queue',$worker->queue));
              $this->failedJobs[$worker->queue] = count(FailedJob::all()->where('queue',$worker->queue));
          }
      }

      $pj = FailedJob::distinct('queue')->get();
      foreach ($pj as $worker) {
          if (!in_array($worker->queue,$queues)) {
              array_push($queues,$worker->queue);
              $this->queueLengths[$worker->queue] = count(Job::all()->where('queue',$worker->queue));
              $this->failedJobs[$worker->queue] = count(FailedJob::all()->where('queue',$worker->queue));
          }
      }      
   }

   
}
