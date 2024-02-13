<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $foods=Food::all();
        $posts = Post::where('status', 'published')->get();
        $users=User::all();
        return view('admin.dashboard', compact('foods', 'posts', 'users'));
    }




}
