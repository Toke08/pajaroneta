<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Location;
use App\Models\Event;
use App\Models\Post;
use Carbon\Carbon;

class LandingPageController extends Controller
{

    public function index()
    {
        $foods = Food::all();
        $posts = Post::all();
        $restaurants = Restaurant::all();
        $locations = Location::all();

        // Obtener el URL para hoy
        $url = null;
        $today = Carbon::today();
        $events = Event::with('location')->get();
        foreach ($events as $event) {
            $start = Carbon::parse($event->start);
            if ($start->isSameDay($today)) {
                $url = $event->location->url;
                break;
            }
        }

        // Retorna la vista 'index' con todas las variables necesarias
        return view('index', compact('locations', 'foods', 'posts', 'restaurants', 'url'));
    }
}
