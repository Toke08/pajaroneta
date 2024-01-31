<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Restaurant;

class ClientController extends Controller
{
   public function galeria_comidas(){
        $categories = Category::all();
        $foods = Food::all();
        return view("client.galeria_comidas", ['foods'=> $foods, 'categories'=> $categories]);
    }

    public function galeria_comidas_show($id){
        $food = Food::find($id);
        if ($food != null)
            return view('client.galeria_comidas_show', ['food' => $food]);
        else
            return "No existe esa comida";
    }

    public function category(){
        $categories = Category::all();
        return view("client.categorias", ['categories'=> $categories]);
    }

    public function blog(){
        $tags = Tag::all();
        $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $restaurants = Restaurant::all();
        return view('client.blog', ['posts'=> $posts, 'tags'=>$tags, 'restaurants'=>$restaurants]);
    }

    public function blog_show($id){
        $post = Post::with('tag')->findOrFail($id);
        $comments = Comment::where('post_id', $post->id)->get();
        return view('client.blog_show', compact('post', 'comments'));
    }

    public function tags_show($id){
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts ?? collect();
        $restaurants = $tag->restaurants ?? collect();

        return view('client.tags_show', compact('tag', 'posts', 'restaurants'));
    }

}
