<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Comment;
use App\User;
class DashboardController extends Controller
{
    //DashboardController
    public function dashboard() {
      return view ('admin.dashboard' ,[
        'categories' => Category::lastCategories(5),
        'articles' => Article::lastArticles(5),
        'count_categories' => Category::count(),
        'count_comments' => Comment::count(),
        'count_users' => User::count(),
        'count_articles' => Article::count()
      ]);
    }
}
