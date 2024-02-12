<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //el request es para coger los datos del buscador (form), si no no poner.
     public function index(Request $request)
{
    $column = $request->get('column', 'id');
    $direction = $request->get('direction', 'asc');

    // Cambiar la dirección de ordenación si es necesario
    $direction = ($direction === 'asc') ? 'desc' : 'asc';

    $search = trim($request->get('search'));

    $users = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereHas('role', function ($categoryQuery) use ($search) {
                    $categoryQuery->where('name', 'LIKE', "%{$search}%");
                });
        })
        ->orderBy($column, $direction)
        ->paginate(10);

    $roles = Role::all();
    return view("admin.users.index", [
        'users' => $users,
        'roles' => $roles,
        'column' => $column,
        'direction' => $direction,
        'search' => $search,
    ]);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.create',['users' => $users,'roles' => $roles]);
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

        // Verificar si la imagen está presente en la solicitud
        if (isset($datos['profile_img'])) {
            $nombreImagen = $request->file('img')->getClientOriginalName();
            // $nombreImagen = Str::random(10)."_".$datos['img']; esto se puede hacer gracias al request->all(), si no, se susa la otra manera con lo que trae el request(linea arriba)

            //mover imagen subido desde el form de letters.create al servidor
            $request->file('img')->move('img/users', $nombreImagen);

            }



        //obtener texto y papa
        // $mensaje=$datos['mensaje'];
        // $papas=$datos['papas'];

        //validar los datos
        $rules= ['name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8|confirmed',
                'role_id' => 'required|exists:roles,id',];


        $validator = Validator::make($datos,$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $user = new User();
            $user->name=$datos['name'];
            $user->email=$datos['email'];
            $user->password=$datos['password'];
            $user->role_id=$datos['role_id'];

            // Verificar si la imagen está presente en la solicitud
            if (isset($datos['profile_img'])) {
            // Asegurarse de que el campo de imagen sea un archivo válido
            if ($datos['profile_img']->isValid()) {
            $user->profile_img = $nombreImagen;
            }
            }
            $user->save();


            \Session::flash('message','Usuario creado con exito');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return view('client.user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Encuentra la categoría por su ID
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Actualiza el nombre si se proporciona
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        // Actualiza el role_id si se proporciona
        if ($request->has('role')) {
            $user->role_id = $request->input('role');
        }

        $user->save();

        return response()->json(['message' => 'Usuario actualizado con éxito']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Elimina el user
        $user->delete();
        return redirect()->back()->with('success', 'Post eliminado exitosamente.');
    }

    public function changePassword(Request $request)
{
    // Validar los campos del formulario
    $request->validate([
        'current_password' => 'required',
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Obtener el usuario autenticado
    $user = auth()->user();

    // Verificar que la contraseña actual sea correcta
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
    }

    // Cambiar la contraseña
    $user->password = Hash::make($request->new_password);
    $user->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('user_show')->with('success', 'Contraseña cambiada con éxito.');
}

    public function logout(){
        Auth::logout();
        return redirect() -> route("home");
    }

}

