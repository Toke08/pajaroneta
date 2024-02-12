<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Food;
use App\Models\Post;
use App\Models\Restaurant;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = Location::all();
        $foods = Food::all();
        $posts = Post::all();
        $restaurants = Restaurant::all();
        return view('home', compact('locations', 'foods', 'posts', 'restaurants'));

    }
}
