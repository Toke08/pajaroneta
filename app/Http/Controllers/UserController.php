<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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
        return view("users.index", ['users'=> $users]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Corregir el nombre del campo
        ], [
            'name.required' => 'El nombre del usuario es obligatorio',
            'name.string' => 'El nombre del usuario debe ser un texto',
            'profile_img.required' => 'La imagen es obligatoria',
            'profile_img.image' => 'El archivo debe ser una imagen',
            'profile_img.mimes' => 'Formatos de imagen permitidos: jpeg, png, jpg, gif',
            'profile_img.max' => 'El tamaño máximo de la imagen es 2MB',
        ]);

        if ($validator->fails()) {
            \Session::flash('message', 'Error en las instrucciones de datos');
            return redirect()->back()->withErrors($validator);
        }

        if ($request->hasFile('profile_img')) {
            $nombreImagen = $request->file('profile_img')->getClientOriginalName();
            $request->file('profile_img')->move('public/img/users', $nombreImagen);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->profile_img = $nombreImagen;

        $user->save();

        \Session::flash('message', 'Usuario creado exitosamente.');
        return redirect('/');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function changePassword(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        // Cambiar la contraseña
        $user->password = bcrypt($request->new_password);
        $user->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('user_show')->with('success', 'Contraseña cambiada con éxito.');
    }

}
