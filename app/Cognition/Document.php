<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;
use App\Cognition\Tag;
use OwenIt\Auditing\Contracts\Auditable;

class Document extends CognitionBase implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'title',
        'author_id',
        'type',
        'key',
        'status',
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

    public function comments()
    {
        return $this->hasMany('App\Cognition\Comment');
    }     

    public function tags()
    {
        //return $this->hasMany('App\Cognition\Tag', 'id', 'tag_id');
        return $this->morphMany('App\Cognition\Tag', 'taggable');
    }     

    public function all_sections()
    {
        return $this->hasMany('App\Cognition\DocumentSection');
    }     
 
    public function getSection($name)
    {
        return DocumentSection::where('name',$name)
                ->where('document_id',$this->id)
                ->firstOrFail();
    }

}
