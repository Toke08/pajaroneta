<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * Display a listing of the resource.
     * todos los roles
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        //Meter un mensajeito en la sesión
        // Session::flash('message', __('Welcome to role zone'));
        return view('foods.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     * muestra el formulario para crear un nuevo rol
     * @return \Illuminate\Http\Response
     */
    public function create() //crear es la vista del form
    {
        $foods = Food::new();
    }

    /**
     * Store a newly created resource in storage.
     * aqui llegan cuando rellenas un formulario
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //aqui se guarda el create
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        if ($food != null)
            return view('foods.show', ['food' => $food]); //carpeta.archivo , array de objetos que queremos mandar [nombreElemento=>variable, nombreElemento2=>variable2]
        else
            return "No existe esa comida";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
