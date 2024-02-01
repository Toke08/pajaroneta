<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $location = Location::all();
        return view("events.index", ['events'=> $events, 'location'=>$location]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view("events.create", ['locations'=> $locations]);
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

        //recoger datos de events
        $name=$datos["name"];
        $description=$datos["description"];
        $date=$datos["date"];
        $location_id=$datos["location_id"];

        $event= new Event();
        $event->name=$name;
        $event->description=$description;
        $event->date=$date;
        $event->location_id=$location_id;


        $event->save(); //guardar
        \Session::flash('message', 'evento creado correctamente!'); //mensaje feedback
        return redirect()->back(); //volver a las vista
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event =Event::findOrFail($id);
        return view('eventos.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $datos = $request->only(['name', 'description', 'date', 'address']);
        $event->update($datos);
        return redirect()->route('eventos.index')->with('success', 'La ubicaión se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back();
    }
}
