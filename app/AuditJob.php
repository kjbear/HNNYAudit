<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditJob extends Model
{


    public function type()
    {
        return $this->hasOne('App\AuditJobType', 'id', 'audit_job_type_id');
    }

    public function results()
    {
        return $this->hasMany('App\AuditStep')->orderBy('audit_job_type_id','ASC');
    }

    public function statusSummary()
    { 
        $status = 'Good';

        foreach($this->results as $result)
        {
            if ($result->result != 'Good') {
                $status = 'Bad';
            }     
        }
        return $status;
    }
    
    public function goodCount()
    {
        $num = 0;

        foreach($this->results as $result)
        {
            if ($result->result == 'Good') {
                $num++;
            }
        }
        return $num;
    }

    public function badCount()
    {
        $num = 0;

        foreach($this->results as $result)
        {
            if ($result->result != 'Good') {
                $num++;
            }
        }
        return $num;
    }

}
