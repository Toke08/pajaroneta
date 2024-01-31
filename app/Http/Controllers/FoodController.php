<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view("admin.foods.index", ['foods'=> $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return view('foods.create',['categories' => $categories]);
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
        $request->file('img')->move('img/foods', $nombreImagen);



        //obtener texto y papa
        $name=$datos['name'];
        $price=$datos['price'];
        $categories=$datos['categories'];
        $description=$datos['description'];

//         //validar los datos
//         $rules= ['mensaje' => 'required|string',
//                 'papas' => 'required|numeric'];

// //se puede omitir los mensajes personalizados($messages) si los quitas, que no se te olvide quitarlos del ($validator) tambien
//         $messages = array('papas' => 'las papas son requeridas, subnormal',
//                         'mensaje.string' => 'los mensajes deben ser textos, subnormal',
//                         'mensaje.required' => 'los mensajes deben ser requeridas, subnormal', );
//         $validator = validator::make($datos,$rules,$messages);

//         if ($validator->fails()) {
//             \Session::flash('message','error en las instrucciones de datos');
//             return redirect()->back()->withErrors($validator);
//         }else{
            $food = new Food();
            $food->name=$name;
            $food->price=$price;
            $food->category_id=$categories;
            $food->img=$nombreImagen;
            $food->description=$description;
            $food->save();

// $user=auth()->user();
// $user=letter->save($letter);

            // \Session::flash('message','gracias por tu carta');
            return redirect()->back();
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        if ($food != null)
            return view('client.galeria_comidas_show', ['food' => $food]); //carpeta.archivo , array de objetos que queremos mandar [nombreElemento=>variable, nombreElemento2=>variable2]
        else
            return "No existe esa comida";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Encuentra la categoría por su ID
        $food = Food::findOrFail($id);
        $categories =Category::all();

        // Retorna la vista del formulario de edición con la categoría encontrada
        return view('foods.edit', compact('food'),['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        //si la imagen esta vacio, manda el select sin la img
        $data = $request->only('name', 'description', 'price', 'category_id' );
        if(trim($request->img)==''){

            $data = $request->except('img');

        }else{
            $data=$request->all();
        }
        $food->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back();
    }
}
