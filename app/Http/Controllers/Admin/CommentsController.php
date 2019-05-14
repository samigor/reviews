<?php

namespace App\Http\Controllers\Admin;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
  public function index()
  {
      return view('admin.comments.index',[
          'comments'=>Comment::paginate(10)
      ]);
  }
  public function destroy($id){


      Comment::find($id)->delete();
      return redirect()->back();
  }
  
}
