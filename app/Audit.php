<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
   

    public function configItem() 
    {
        return $this->hasOne('App\ConfigItem', 'id', 'config_item_id');
    }

    public function jobs() 
    {
        return $this->hasMany('App\AuditJob')->whereNotIn('audit_job_type_id',[3, 4]);
    }

    public function statusJob() 
    {
        return $this->hasOne('App\AuditJob')->where('audit_job_type_id',3);
    }

    public function siteScopeJob() 
    {
        return $this->hasOne('App\AuditJob')->where('audit_job_type_id',4);
    }
}
