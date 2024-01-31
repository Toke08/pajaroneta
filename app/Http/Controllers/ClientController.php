<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

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

    public function blog_show($id){
        $post = Post::with('tag')->findOrFail($id);
        $comments = Comment::where('post_id', $post->id)->get();
        return view('blog.show', compact('post', 'comments'));
    }

    public function category()
    {
        $categories = Category::all();
        return view("client.categorias", ['categories'=> $categories]);
    }

}
