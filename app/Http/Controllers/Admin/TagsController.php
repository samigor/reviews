<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $tags=Tag::all();
         return view('admin.tags.index', ['tags'=>$tags]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
   {
       return view('admin.tags.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $this->validate($request,[
        'title'=>'required'
     ]);
         Tag::create($request->all());
         return redirect()->route('admin.tags.index');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
        $tag=Tag::find($id);
        return view('admin.tags.edit',['tag'=>$tag]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
       {
           $this->validate($request,[
               'title'=>'required'
           ]);
           $tag=Tag::find($id);
           $tag->update($request->all());

           return redirect()->route('admin.tags.index');
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
       {
           Tag::find($id)->delete();
           return redirect()->route('admin.tags.index');
       }
}