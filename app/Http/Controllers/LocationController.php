<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view("locations.index", ['locations'=> $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view("locations.create", ['locations'=> $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mensaje feedback


        $datos=$request->all();
        //recoger los datos
        $address=$datos["address"];
        $province=$datos["province"];
        $city=$datos["city"];
        $cp=$datos["cp"];

        $location= new Location();
        $location->address=$address;
        $location->province=$province;
        $location->city=$city;
        $location->cp=$cp;

        $location->save();

        //vuelta a la vista
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $location= Location::find($id);
        // if ($location != null)
        //     return view('locations.show', ['location' => $location]); //carpeta.archivo , array de objetos que queremos mandar [nombreElemento=>variable, nombreElemento2=>variable2]
        // else
        //     return "No existe esa ubicación";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Encuentra la categoría por su ID
        $location =Location::findOrFail($id);

        // Retorna la vista del formulario de edición con la categoría encontrada
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $datos = $request->all;
        $location->update($datos);

        return redirect()->route('locations.index')->with('success', 'La ubi se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->back();
    }
}
