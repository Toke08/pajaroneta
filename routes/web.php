<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class);
// Route::view('/galeria-comidas/{nombre-comida}', App\Http\Controllers\FoodController::class);
Route::resource('/blog', App\Http\Controllers\PostController::class);
// Route::view('/blog/{nombre-post}', App\Http\Controllers\PostController::class);
Route::resource('/encuentranos', App\Http\Controllers\LocationController::class);
// Route::view('/encuentranos/{fecha}', App\Http\Controllers\LocationController::class);





www.pajaroneta/.com

www.pajaroneta/galeria-comidas.com

