<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigItem extends Model
{
    use SoftDeletes;

    public $monitors;

    protected $dates = ['deleted_at'];

    public function audits()
    {
       return $this->hasMany('App\Audit');
    }  

    public function latestAudit()
    {
       return $this->hasOne('App\Audit')->latest();
    }   


}
