<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Article extends Model
{
  // Mass assigned
  protected $fillable = ['title', 'slug', 'description_short', 'description','published', 'image', 'image_show','meta_title','meta_description','meta_keyword','created_by', 'modified_by'];
  // Mutators
  public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }
    //Polymorphic relations with categories
    public function categories() {
      return $this->morphToMany('App\Category','categoryable');
    }
    public function children(){
          return $this->hasMany(self::class,'post_id');
      }

    public function scopeLastArticles ($query, $count)
    {
      return $query ->orderBy('created_at', 'desc') -> take($count) ->get();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //public function getComments()
    //{
    //    return $this->comments()->get();
    //}
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags(){
       return $this->belongsToMany(
          Tag::class,
         'post_tags',
       'post_id',
     'tag_id'
    );
    }
    public function setTags($ids){
      if($ids==null){return;}
      $this->tags()->sync($ids);
}
}
