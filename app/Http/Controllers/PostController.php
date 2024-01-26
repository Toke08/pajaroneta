<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('blog.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('blog.create',['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $nombreImagen = $request->file('img')->getClientOriginalName();
        $request->file('img')->move('img/posts', $nombreImagen);

        //$this->middleware('admin')->only('show');

        $title = $datos['title'];
        $content = $datos['content'];
        $date = $datos['date'];
        $status = $datos['status'];
        $tag_id = $datos['tag_id'];
        //
        $post = new Post();
        $post->img = $nombreImagen;
        $post->title = $title;
        $post->content = $content;
        $post->date = $date;
        $post->status = $status;
        $post->tag_id=$tag_id;

        $post->save();

        // Additional logic or redirection after successful data storage

        return redirect()->back()->with('success', 'Comment stored successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Post = Post::findOrFail($id);
        $Post->delete();
        return redirect()->back();
    }
}
