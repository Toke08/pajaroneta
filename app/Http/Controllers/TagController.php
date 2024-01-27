<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags=Tag::all();
        return view('tags.index', ['tags'=>$tags]);
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
        return view('tags.create',['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar el nuevo tag (categoría)
        $datos = $request->all();
        //$this->middleware('admin')->only('show');
        $name = $datos['name'];
        //
        $Tag = new Tag();
        $Tag->name = $name;
        $Tag->save();
        \Session::flash('message', 'Categoría de publicación creada!');
        return redirect()->route('tags.index')->with('success', 'Categoría de publicación creada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            abort(404);
        }
        $post = Post::where('tag_id', $tag->id)->get();
        if ($post->isEmpty()) {
            $message = 'No hay posts con este tag.';
            return view('tags.show', compact('tag', 'message'));
        }
        return view('tags.show', compact('tag', 'post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $postsCount = Post::where('tag_id', $tag->id)->count();

    if ($postsCount > 0) {
        // Hay publicaciones asociadas
        $message = 'Hay publicaciones relacionadas con este tag. Al eliminar el tag, se eliminarán las publicaciones también.';
        \Session::flash('error', $message);

        // Elimina las publicaciones relacionadas
        DB::transaction(function () use ($tag) {
            Post::where('tag_id', $tag->id)->delete();
            $tag->delete();
        });
        } else {
            // No hay publicaciones asociadas
            $tag->delete();
            \Session::flash('message', 'Categoría de publicación eliminida!');
        }

        return redirect()->back();
    }
}
