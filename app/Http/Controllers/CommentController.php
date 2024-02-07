<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        //
        $post = Post::findOrFail($post_id);
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();
        return view('blog_show', compact('post', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        //
        $post = Post::findOrFail($post_id);
        return view('blog_show', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate(['comment' => 'required|string',]
        ,['comment.required' => 'El campo comentario es obligatorio.',
        'comment.string' => 'El comentario debe ser una cadena de texto',]);

        $user = auth()->user();

        $post = Post::findOrFail($post_id);
        $comment = $post->comments()->create([
            'comment' => $request->input('comment'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('blog_show', $post_id)->with('success', 'Comentario agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, $post_id, Comment $id)
    {
        //
        $user = User::findOrFail($user_id);
        $post = Post::findOrFail($post_id);
        $comment = Comment::findOrFail($id);
        return view('blog_show', compact('user', 'post', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
