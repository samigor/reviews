<?php

namespace App\Http\Controllers\Admin;
use App\Tag;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.articles.index',[
        'articles'=> Article::orderBy('created_at','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::pluck('title','id')->all();
        return view ('admin.articles.create',compact('tags'), [
          'article'   => [],
          'categories' => Category::with('children')->where('parent_id',0)->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        // Categories
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
          $article->setTags($request->get('tags'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    { $tags=Tag::pluck('title','id')->all();
        return view('admin.articles.edit', compact('tags','selectedTags'),
        [
          'article'    => $article,
          'categories' => Category::with('children')->where('parent_id', '0')->get(),
          'delimiter'  => ''
        ]
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article -> update($request->except('slug'));
        $tags=Tag::pluck('title','id')->all();
//categories
        $article->categories()->detach();
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;
  return redirect()->route('admin.article.index', compact('tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
