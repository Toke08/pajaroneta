<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    //
    public function index(){
        $events = Event::with('location')->paginate(7);
        return view('admin.fullcalendar.index', compact('events'));
    }

}
