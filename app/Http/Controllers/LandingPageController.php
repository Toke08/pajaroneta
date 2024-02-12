<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Location;
use App\Models\Post;

class LandingPageController extends Controller
{

    public function index()
    {
        $locations = Location::all();
        $foods = Food::all();
        $posts = Post::all();
        $restaurants = Restaurant::all();
        return view('index', compact('locations', 'foods', 'posts', 'restaurants'));

    }
}
