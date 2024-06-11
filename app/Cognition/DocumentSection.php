<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;
use OwenIt\Auditing\Contracts\Auditable;

class DocumentSection extends CognitionBase implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'body',
        'author_id',
        'editor_id'
    ];

    public function author()
    {
        return $this->belongsTo('App\Cognition\Author');
    }
   
    public function editor()
    {
        return $this->belongsTo('App\Cognition\Author', 'editor_id');
    }
}
