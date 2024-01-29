<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $status = $datos['status'];
        $tag_id = $datos['tag_id'];
        //
        $post = new Post();
        $post->img = $nombreImagen;
        $post->title = $title;
        $post->content = $content;
        $post->status = $status;
        $post->tag_id=$tag_id;

        $post->save();
        \Session::flash('message', 'Categoría de publicación eliminida!');
        return redirect()->back()->with('success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('tag')->findOrFail($id);
        $comments = Comment::where('post_id', $post->id)->get();

        return view('blog.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('blog.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $data = $request->only('title', 'content', 'tag_id');

        if ($request->hasFile('img') && $request->file('img') ->isValid()) {

            if ($post->img) {
            $oldImagePath = public_path('img/posts/' . $post->img);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        $imageName = $request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('img/posts'), $imageName);
        $data['img'] = $imageName;
        } else {
            $data['img'] = $post->img;
        }
        $post->update($data);

        return redirect()->route('blog.index')->with('success', 'El post se ha actualizado exitosamente.');
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
