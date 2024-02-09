<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Event;

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
        $events = Event::all();
        return view("locations.index", ['locations'=> $locations, 'events'=>$events]);
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

        $datos=$request->all();
        //recoger los datos
        $province=$datos["province"];
        $city=$datos["city"];
        $address=$datos["address"];
        $cp=$datos["cp"];

        $location= new Location();
        $location->province=$province;
        $location->city=$city;
        $location->address=$address;
        $location->cp=$cp;

        $location->save();


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
        

        $location=Location::all();
        return response()->json($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location =Location::findOrFail($id);
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
        $datos = $request->validate([
            'address'   => 'required',
            'cp'        => 'required',
            'province'  => 'required',
            'city'      => 'required',
        ]);
        $location->update();
        return redirect()->route('ubicaciones.index')->with('success', 'La ubicaión se ha actualizado exitosamente.');
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
