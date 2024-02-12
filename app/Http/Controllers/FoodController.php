<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $column = $request->get('column', 'id');
        $direction = $request->get('direction', 'asc');

        // Cambiar la dirección de ordenación si es necesario
        $direction = ($direction === 'asc') ? 'desc' : 'asc';

        $search = trim($request->get('search'));

        $foods = Food::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                // ->orWhereHas asume que ya hay una relacion con category
                ->orWhereHas('category', function ($categoryQuery) use ($search) {
                    $categoryQuery->where('name', 'LIKE', "%{$search}%");
                });
      })
      ->orderBy($column, $direction)
      ->paginate(10);

        return view("admin.foods.index", ['foods'=> $foods,
            'column' => $column,
            'direction' => $direction,
            'search' => $search,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return view('admin.foods.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $nombreImagen = $request->file('img')->getClientOriginalName();
        // $nombreImagen = Str::random(10)."_".$datos['img']; esto se puede hacer gracias al request->all(), si no, se susa la otra manera con lo que trae el request(linea arriba)

        //mover imagen subido desde el form de letters.create al servidor
        $request->file('img')->move('img/foods', $nombreImagen);



        //obtener texto y papa
        $name=$datos['name'];
        $price=$datos['price'];
        $categories=$datos['categories'];
        $description=$datos['description'];

        //validar los datos
        $rules= ['name' => 'required|string|unique:foods',
                'price' => 'required|numeric',
                'categories' => 'required|integer',
                'description' => 'required|string',];

//se puede omitir los mensajes personalizados($messages) si los quitas, que no se te olvide quitarlos del ($validator) tambien

        $validator = validator::make($datos,$rules);

        if ($validator->fails()) {
            \Session::flash('message','error en las instrucciones de datos');
            return redirect()->back()->withErrors($validator);
        }else{
            $food = new Food();
            $food->name=$name;
            $food->price=$price;
            $food->category_id=$categories;
            $food->img=$nombreImagen;
            $food->description=$description;
            $food->save();

            \Session::flash('message','gracias por tu carta');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        if ($food != null)
            return view('client.galeria_comidas_show', ['food' => $food]); //carpeta.archivo , array de objetos que queremos mandar [nombreElemento=>variable, nombreElemento2=>variable2]
        else
            return "No existe esa comida";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Encuentra la categoría por su ID
        $food = Food::findOrFail($id);
        $categories =Category::all();

        // Retorna la vista del formulario de edición con la categoría encontrada
        return view('admin.foods.edit', compact('food'),['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $food = Food::findOrFail($id);

    // Obtener los datos del formulario
    $data = $request->only('name', 'description', 'price', 'category_id');

    // Verificar si se proporciona una nueva imagen
    if ($request->hasFile('img')) {
        // Obtener la imagen actual
        $currentImage = $food->img;

        // Guardar la nueva imagen
        $newImage = $request->file('img');
        $imageName = time() . '_' . $newImage->getClientOriginalName();
        $newImage->move(public_path('img/foods'), $imageName);

        // Actualizar el nombre de la imagen en la base de datos
        $data['img'] = $imageName;

        // Eliminar la imagen anterior si existe
        if ($currentImage && file_exists(public_path('img/foods/' . $currentImage))) {
            unlink(public_path('img/foods/' . $currentImage));
        }
    }

    // Actualizar los datos del alimento en la base de datos
    $food->update($data);

    return redirect()->route('galeria-comidas.index')->with('success', 'La comida se ha actualizado exitosamente.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back();
    }
}
