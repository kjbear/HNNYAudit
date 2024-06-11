<?php

namespace App;

class QueueWorker
{

   public $pid;
   public $ppid;
   public $command;
   public $queue;
   public $status;
   public $owner;

   function __construct($line)
   {
       $this->pid     = explode(' ',$line,3)[0];
       $this->ppid    = explode(' ',$line,3)[1];
       $this->owner   = $this->getOwner($this->ppid); 
       $this->command = explode(' ',$line,3)[2];
       $tmpQueue      = explode(' ',
                           (empty(explode('--queue=',$line)[1])
                              ? "default"
                              : explode('--queue=',$line)[1]
                            )
                        );
       $this->queue   = $tmpQueue[0];
   }


   function getOwner($ppid)
   {
       $ps = `ps ahxwwo pid,command | grep $ppid | grep supervisord | grep -v grep`;
       if (empty($ps)) {
           $ps = `ps ahxwwo user,pid,ppid,command  | grep $ppid | grep bash | grep -v grep`;
           if (empty($ps)) {
               return null;
           } else {
               return explode(' ', explode(PHP_EOL,trim($ps))[0])[0];
           }
       } else {
           return "supervisord";
       }
   }


}


