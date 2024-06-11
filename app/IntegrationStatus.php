<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntegrationStatus extends Model
{
      public function Integration()
      {
	  return $this->belongsTo('App\Integration');
      }

      public function status()
      {
          return $this->hasOne('App\StatusType', 'id', 'status_type_id')->limit(1);
      }


}
