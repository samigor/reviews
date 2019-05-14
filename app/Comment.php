<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function post(){
      return $this->belongsTo(Article::class);
  }
  public function author(){
      return $this->belongsTo(User::class, 'user_id');
  }
  public function allow()
  {
      $this->status = 1;
      $this->save();
  }

  public function disAllow()
  {
      $this->status = 0;
      $this->save();
  }

  public function toggleStatus()
  {
      if($this->status == 0)
      {
          return $this->allow();
      }

      return $this->disAllow();
  }

  public function remove()
  {
      $this->delete();
  }
  public function countcomments()
  {
    $countcomm = DB::table("comments")->get();
    echo count($countcomm);
  }
}
