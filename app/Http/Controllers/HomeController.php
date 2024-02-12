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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables = [
            'restaurants' =>  Restaurant::all(),
            'posts' => Post::all(),
            'foods' => Food::all(),
            'locations' => Location::all(),
        ];
        return view('home', $variables);

    }
}
