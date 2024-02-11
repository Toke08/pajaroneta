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
use App\Models\User;
use App\Models\Calendar;
use App\Models\Event;
use App\Models\Location;

class ClientController extends Controller
{
   public function galeria_comidas(Request $request){
        //recoge el id de la url (?id=1)
        $selectedCategory = $request->input('id');
        $categories = Category::all();

        //si hay categoria seleccionada diferente de 1(?id=2)
        if ($selectedCategory && $selectedCategory!=1) {
            //busca las comidas de esa categoriacon la relacion de los modelos
            $foods = Category::findOrFail($selectedCategory)->foods;
        } else {
            // Si no se selecciona una categoría o es 1, muestra todos los productos de todas las categorías.
            $foods = Food::inRandomOrder()->get();;
        }

        return view("client.galeria_comidas", ['foods'=> $foods, 'categories'=> $categories]);
    }

    public function galeria_comidas_show($id){
        $food = Food::find($id);

        if ($food != null) {
            $category = Category::find($food->category_id);

            if ($category != null) {
                return view('client.galeria_comidas_show', ['food' => $food, 'category' => $category]);
            } else {
                return "No se encontró la categoría asociada a esta comida";
            }
        } else {
            return "No existe esa comida";
        }
    }

    public function category(){
        $categories = Category::all();
        return view("client.categorias", ['categories'=> $categories]);
    }

    public function blog(){
        $tags = Tag::all();
        $posts = Post::all();
        $posts = Post::where('status', 'Published')->orderBy('created_at', 'desc')->get();
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


    public function user_show($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return view('client.user_show', ['user' => $user]);
    }

    public function user_store(Request $request){
        $datos = $request->all();
        $nombreImagen = $request->file('img')->getClientOriginalName();
        // $nombreImagen = Str::random(10)."_".$datos['img']; esto se puede hacer gracias al request->all(), si no, se susa la otra manera con lo que trae el request(linea arriba)

        //mover imagen subido desde el form de letters.create al servidor
        $request->file('img')->move('img/users', $nombreImagen);



        //obtener texto y papa
        $name=$datos['name'];
        $email=$datos['email'];


        //validar los datos
        $rules= ['name' => 'required|string',
                'email' => 'required|string|unique:users',
                'img' => 'file|mimes:jpeg,png,jpg,webp|max:2048',];

        //se puede omitir los mensajes personalizados($messages) si los quitas, que no se te olvide quitarlos del ($validator) tambien

        $validator = validator::make($datos,$rules);

        if ($validator->fails()) {
            \Session::flash('message','error en las instrucciones de datos');
            return redirect()->back()->withErrors($validator);
        }else{
            $user = new User();
            $user->name=$name;
            $user->email=$email;
            $user->profile_img=$nombreImagen;
            $user->save();

            \Session::flash('message','gracias por tu carta');
            return redirect()->back();
        }
    }
    public function user_edit($name){
        // Obtener el usuario de la base de datos
        $user = User::where('name', $name)->firstOrFail();

        // Retornar la vista de edición del perfil con los datos del usuario
        return view('client.user_edit', compact('user'));


    }
    public function user_update(Request $request, $name) {
        $user = User::where('name', $name)->firstOrFail();
        $data = $request->only('name');

        // Verificar si se proporciona una nueva imagen
        if ($request->hasFile('img')) {
        // Obtener la imagen actual
        $currentImage = $user->profile_img;

        // Guardar la nueva imagen
        $newImage = $request->file('img');
        $imageName = time() . '_' . $newImage->getClientOriginalName();
        $newImage->move(public_path('img/users'), $imageName);

        // Actualizar el nombre de la imagen en la base de datos
        $data['profile_img'] = $imageName;

        // Eliminar la imagen anterior si existe y no es la imagen predeterminada
        if ($currentImage && $currentImage !== 'user_default.jpg' && file_exists(public_path('img/users/' . $currentImage))) {
            unlink(public_path('img/users/' . $currentImage));
        }

    }
    $user->update($data);

        return redirect()->route('user_show', ['name' => $user->name])->with('success', 'Los datos del usuario se han actualizado exitosamente.');

    }

    public function user_destroy($id){



    }

    public function calendar(){
        $events = Event::all();
        $locations = Location::all();
        $calendario= Calendar::all();
        return view('client.calendar', ['events'=> $events, 'locations'=>$locations]);

    }

}
