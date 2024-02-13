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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $locations = Location::all();
        $selectedDate = $request->query('selected_date');
        if (!$selectedDate) {
            $selectedDate = now()->toDateTimeLocalString();
        }

        return view("admin.evento.create", ['selectedDate' => $selectedDate, 'locations' => $locations]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'id_location' => 'required|exists:locations,id',
        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->id_location = $request->input('id_location');

        $event->save();
        \Session::flash('message','Nuevo evento asignado.');

        // Redirigir de vuelta al índice del calendario después de guardar el evento
        return redirect()->route('fullcalendar.index');
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
    public function edit($id)
    {

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
        \Session::flash('message','Evento eliminado exitosamente.');
        return redirect()->back()->with('success', 'Evento eliminado exitosamente.');
    }

}
