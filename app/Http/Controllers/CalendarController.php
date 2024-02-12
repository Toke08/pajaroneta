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
    // Verificar si ya existe una entrada en la fecha seleccionada
    $existingEntry = Calendar::where('start', $request->input('start'))->first();

    // Si ya existe una entrada para esa fecha, mostrar un mensaje de error
    if ($existingEntry) {
        return redirect()->back()->withInput()->with('error', 'La fecha seleccionada ya tiene una ubicación registrada.');
    }

    // Si no existe una entrada para esa fecha, realizar la validación normal
    $request->validate([
        'start' => 'required|date',
        'end' => 'required|date|after_or_equal:start',
        'location_id' => 'required|exists:locations,id',
        'event_id' => 'required|exists:events,id',
    ]);

    // Crear una nueva instancia del modelo Calendar
    $calendar = new Calendar();

    // Asignar los datos del formulario a la instancia
    $calendar->start = $request->input('start');
    $calendar->end = $request->input('end');
    $calendar->location_id = $request->input('location_id');
    $calendar->event_id = $request->input('event_id');

    $calendar->save();

    // Redirigir de vuelta con un mensaje de éxito
    \Session::flash('message','Nueva entrada ingresada');
    return redirect()->back();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        // Retorna una vista con los datos del calendario, eventos y ubicaciones asociadas
        return redirect()->back()->with('success', ' Ubicación asignada!');
    }

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
        return redirect()->back()->with('success', 'La entrada ha sido eliminada exitosamente.');
    }
}
