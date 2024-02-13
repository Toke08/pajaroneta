<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function index()
    {
        $foods=Food::all();
        $posts = Post::where('status', 'published')->get();
        $users=User::all();
        $postMasBuscado = Post::orderBy('views', 'desc')->first();
        $comidaMasBuscada = Food::orderBy('views', 'desc')->first();
        return view('admin.dashboard', compact('foods', 'posts', 'users','postMasBuscado','comidaMasBuscada'));
    }




}
