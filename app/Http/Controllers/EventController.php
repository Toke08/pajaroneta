<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        // $events = Event::all();
        // return view("events.index", ['events'=> $events]);
        return view("events.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $events = Event::all();
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Event::$rules);
        $event=Event::create($request->all());
        return response()->json(['message' => 'Evento creado correctamente'], 200);

        // $datos=$request->all();
        // recoger datos de events
        // $name=$datos["name"];
        // $description=$datos["description"];
        // $event= new Event();
        // $event->title=$title;
        // $event->description=$description;
        // $event->save(); //guardar
        // \Session::flash('message', 'Evento creado correctamente!'); //mensaje feedback
        // return redirect()->back(); //volver a las vista
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event=Event::all();
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // $event =Event::findOrFail($id);
        // return view('eventos.edit', compact('event'));
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
        // $event = Event::findOrFail($id);
        // $datos = $request->only(['name', 'description', 'date', 'address']);
        // $event->update($datos);
        // return redirect()->route('eventos.index')->with('success', 'La ubicaión se ha actualizado exitosamente.');
    }

    /**->
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
