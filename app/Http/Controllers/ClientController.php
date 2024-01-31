<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class ClientController extends Controller
{
   public function galeria_comidas()
    {
        $foods = Food::all();
        return view("client.galeria_comidas", ['foods'=> $foods]);
    }
}
