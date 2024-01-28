<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("categories.index", ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return view('categories.create',['categories' => $categories]);
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
        // $nombreImagen = Str::random(10)."_".$datos['img']; esto se puede hacer gracias al request->all(), si no, se susa la otra manera con lo que trae el request(linea arriba)

        //mover imagen subido desde el form de letters.create al servidor
        $request->file('img')->move('img/categories', $nombreImagen);



        //obtener texto y papa
        $nombre=$datos['name'];
        $img=$datos['img'];

        //validar los datos
        $rules= ['name' => 'required|string',];

        //se puede omitir los mensajes personalizados($messages) si los quitas, que no se te olvide quitarlos del ($validator) tambien
        $messages = array(
            'name' => 'El nombre es incorrecto',
            'name.string' => 'El nombre de la categoria debe ser un texto',
            'name.required' => 'El nombre de la categoria es obligatorio',
            );

        $validator = validator::make($datos,$rules,$messages);

        if ($validator->fails()) {
            \Session::flash('message','error en las instrucciones de datos');
            return redirect()->back()->withErrors($validator);
        }else{
            $category = new Category();
            $category->name=$nombre;
            $category->img=$nombreImagen;
            $category->save();

            // $user=auth()->user();
            // $user=category->save($category);

            \Session::flash('message','Categoria creada');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if ($category != null)
            return view('categories.show', ['category' => $category]);
        else
            return "No existe esa categoria";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Encuentra la categoría por su ID
        $category = Category::findOrFail($id);

        // Retorna la vista del formulario de edición con la categoría encontrada
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        //si la imagen esta vacio, manda el select sin la img
        $data = $request->only('name');
        if(trim($request->img)==''){
            $data = $request->except('img');

        }else{
            $data=$request->all();
        }
        $category->update($data);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}

