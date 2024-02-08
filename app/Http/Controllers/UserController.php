<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
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
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view("admin.users.index", ['users'=> $users, 'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('users.create',['users' => $users]);
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
        $nombreImagen = Str::random(10)."_".$request->file('img')->getClientOriginalName();
        // $nombreImagen = Str::random(10)."_".$datos['img']; esto se puede hacer gracias al request->all(), si no, se susa la otra manera con lo que trae el request(linea arriba)

        //mover imagen subido desde el form de letters.create al servidor
        $request->file('img')->move('img/letters', $nombreImagen);



        //obtener texto y papa
        $mensaje=$datos['mensaje'];
        $papas=$datos['papas'];

        //validar los datos
        $rules= ['mensaje' => 'required|string',
                'papas' => 'required|numeric'];

        //se puede omitir los mensajes personalizados($messages) si los quitas, que no se te olvide quitarlos del ($validator) tambien
        $messages = array('papas' => 'las papas son requeridas, subnormal',
                        'mensaje.string' => 'los mensajes deben ser textos, subnormal',
                        'mensaje.required' => 'los mensajes deben ser requeridas, subnormal', );
        $validator = validator::make($datos,$rules,$messages);

        if ($validator->fails()) {
            \Session::flash('message','error en las instrucciones de datos');
            return redirect()->back()->withErrors($validator);
        }else{
            $letter = new letter();
            $letter->description=$datos['mensaje'];
            $letter->user_id=auth()->user()->id;
            $letter->papa_id=$datos['papas'];
            $letter->img=$nombreImagen;
            $letter->save();

            // $user=auth()->user();
            // $user=letter->save($letter);

            \Session::flash('message','gracias por tu carta');
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
        // Obtener el usuario que se va a actualizar
        $user = User::findOrFail($id);

        // Actualizar los campos modificados
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');

        // Guardar los cambios en la base de datos
        //dd($request);
        $user->save();

        // Obtener todos los usuarios y roles nuevamente
        $users = User::all();
        $roles = Role::all();

        // Devolver la vista del índice con los usuarios y roles actualizados
        return view("admin.users.index", ['users'=> $users, 'roles'=> $roles])->with('success', 'Usuario actualizado correctamente');
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

}

