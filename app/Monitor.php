<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{

    protected $fillable =[
        'name',
        'type',
        'target',
        'targetIP',
        'time',
        'quality',
        'sourceTemplateName'
    ];

    //protected $dateFormat = 'U';

     public function counters()
     {
 	    return $this->hasMany('App\Counter');
     }


}
