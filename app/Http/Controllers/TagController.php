<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Restaurant;
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
        return view('admin.tags.index', ['tags'=>$tags]);
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
        return view('admin.tags.create',['tags'=>$tags]);
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
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts ?? collect();
        $restaurants = $tag->restaurants ?? collect();

        return view('admin.tags.show', compact('tag', 'posts', 'restaurants'));
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
        $restaurantsCount = Restaurant::where('tag_id', $tag->id)->count();

        try {
            // Inicia la transacción
            DB::beginTransaction();

            if ($postsCount > 0 || $restaurantsCount > 0) {
                // Hay publicaciones o restaurantes asociados
                $message = 'Hay publicaciones o restaurantes relacionados con este tag. Al eliminar el tag, se cambiará el tag_id a 1 en lugar de eliminarlos.';
                \Session::now('message', $message);

                // Actualiza el tag_id a 1 en las publicaciones y restaurantes asociados
                Post::where('tag_id', $tag->id)->update(['tag_id' => 1]);
                Restaurant::where('tag_id', $tag->id)->update(['tag_id' => 1]);
            } else {
                // No hay publicaciones ni restaurantes asociados
                $tag->delete();
                \Session::now('message', 'Categoría de publicación eliminida!');
            }

            // Confirma la transacción
            DB::commit();
        } catch (\Exception $e) {
            // Si hay algún error, deshace la transacción y muestra el mensaje
            DB::rollBack();
            \Session::now('error', 'Error al eliminar el tag: ' . $e->getMessage());
        }

        return redirect()->route('tags.index')->with('message', 'Categoría de comida eliminada!');

    }

}
