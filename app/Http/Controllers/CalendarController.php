<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use App\Models\Calendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $locations = Location::all();
        $calendar = Calendar::paginate(7); // Obtener todos los datos del calendario
        return view('admin.calendar.index', compact('events', 'locations', 'calendar'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $request->validate([
            'start' => 'required|date|unique:calendars,start',
            'end' => 'required|date|after_or_equal:start',
            'location_id' => 'required|exists:locations,id',
            'event_id' => 'required|exists:events,id',
        ],
        [
            'start.unique' => 'La fecha seleccionada ya tiene una ubicación registrada.'
        ]);

        // Crear una nueva instancia del modelo Calendar
        $calendar = new Calendar();

        // Asignar los datos del formulario a la instancia
        $calendar->start = $request->input('start');
        $calendar->end = $request->input('end');
        $calendar->location_id = $request->input('location_id');
        $calendar->event_id = $request->input('event_id');

        $calendar->save();

        // Obtener los eventos y ubicaciones
        $events = Event::all();
        $locations = Location::all();

        // Devolver una respuesta JSON con los datos del evento guardado y la ruta de redirección
        return response()->json([
            'success' => true,
            'message' => 'Evento guardado exitosamente.',
            'start' => $calendar->start,
            'end' => $calendar->end,
            'location_id' => $calendar->location_id,
            'event_id' => $calendar->event_id,
            'events' => $events,
            'locations' => $locations,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
{
    $events = Event::all();
    $locations = Location::all();

    // Retorna una vista con los datos del calendario, eventos y ubicaciones asociadas
    return redirect()->back()->with('success', ' Ubicación asignada!');}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $calendar = Calendar::findOrFail($id);
        $calendar->delete();
        return redirect()->back();
    }
}
