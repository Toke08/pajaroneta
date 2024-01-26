<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $restaurants=Restaurant::all();
        return view('restaurants.index', ['restaurants'=>$restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $restaurants=Restaurant::all();
        return view('restaurants.create',['restaurants'=>$restaurants]);
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
        $datos = $request->all();
        $nombreImagen = $request->file('img')->getClientOriginalName();
        $request->file('img')->move('img/restaurants', $nombreImagen);

        //$this->middleware('admin')->only('show');

        $name = $datos['name'];
        $description = $datos['description'];
        $url = $datos['url'];
        $tag_id = $datos['tag_id'];
        //
        $restaurant = new Restaurant();
        $restaurant->name = $name;
        $restaurant->description = $description;
        $restaurant->url = $url;
        $restaurant->img = $nombreImagen;
        $restaurant->tag_id=$tag_id;
        $restaurant->save();

        // Additional logic or redirection after successful data storage

        return redirect()->back()->with('success', 'New restaurant added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return redirect()->back();
    }
}