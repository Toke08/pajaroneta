<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Post;

class ClientController extends Controller
{
   public function galeria_comidas()
    {
        $foods = Food::all();
        return view("client.galeria_comidas", ['foods'=> $foods]);
    }

    public function blog(){
        $posts = Post::all();
        return view("client.blog", ['posts'=> $posts]);
    }

}
