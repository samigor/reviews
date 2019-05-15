<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
   protected $fillable=['title','slug','created_at','modified_at'];

    public function setSlugAttribute($value){
        $this->attributes['slug']= Str::slug(mb_substr($this->title,0,40));

    }

    public function articles(){
        return $this->belongsToMany(
            Article::class,
            'post_tags',
            'tag_id',
            'post_id'

        );
    }
}
