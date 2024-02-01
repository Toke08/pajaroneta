<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use App\Models\Calendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calendars = Calendar::with('event', 'location')->get();
        return view("admin.calendar.index", ['calendars'=> $calendars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations = Location::all();
        $events = Event::all();

        return view("admin.calendar.create", ['locations' => $locations, 'events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date' => 'required|date',
            'location_id' => 'required|exists:locations,id',
            'event_id' => 'required|exists:events,id',
        ]);

        // Crear una nueva instancia del modelo Calendar
        $calendar = new Calendar();

        // Asignar los datos del formulario a la instancia
        $calendar->date = $request->input('date');
        $calendar->location_id = $request->input('location_id');
        $calendar->event_id = $request->input('event_id');

        // Guardar la instancia en la base de datos
        $calendar->save();

        // Redirigir a la vista que desees después de guardar
        return redirect()->route('calendario.index')->with('success', 'Calendario actualizado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $calendar = Calendar::findOrFail($id);
        $calendar->delete();
        return redirect()->back();
    }
}
