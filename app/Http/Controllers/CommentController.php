<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // Verifica si el usuario está autenticado
    if (!Auth::check()) {
        // Si el usuario no está autenticado, redirecciona a la página de inicio de sesión
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para comentar.');
    }

    // Si el usuario está autenticado, procede con la validación del comentario
    $request->validate([
        'comment' => 'required|string',
    ], [
        'comment.required' => 'El campo comentario es obligatorio.',
        'comment.string' => 'El comentario debe ser una cadena de texto.',
    ]);

    // Obtén el usuario autenticado
    $user = auth()->user();

    // Encuentra el post con el ID proporcionado
    $post = Post::findOrFail($post_id);

    // Crea el comentario asociado al post
    $comment = $post->comments()->create([
        'comment' => $request->input('comment'),
        'user_id' => $user->id,
    ]);

    // Redirecciona de vuelta al post con un mensaje de éxito
    return redirect()->route('blog_show', $post_id)->with('success', 'Comentario agregado exitosamente.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($post_id, Comment $id)
    {
        //
        $post = Post::findOrFail($post_id);
        $comment = Comment::findOrFail($id);
        return view('blog_show', compact('post', 'comment'));
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
