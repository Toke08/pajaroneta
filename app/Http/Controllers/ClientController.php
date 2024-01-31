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
        $categories = Category::all();
        $foods = Food::all();
        return view("client.galeria_comidas", ['foods'=> $foods, 'categories'=> $categories]);
    }

    public function galeria_comidas_show($id)
    {
        $food = Food::find($id);
        if ($food != null)
            return view('client.galeria_comidas_show', ['food' => $food]); //carpeta.archivo , array de objetos que queremos mandar [nombreElemento=>variable, nombreElemento2=>variable2]
        else
            return "No existe esa comida";
    }

    public function blog(){
        $posts = Post::all();
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
