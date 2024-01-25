<?php

use Illuminate\Support\Facades\Route;
use App\Models\Food;

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

Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)/*->only('create','update','destroy')->middleware('admin')*/;
// Route::view('/galeria-comidas/{nombre-comida}', App\Http\Controllers\FoodController::class);
Route::resource('/blog', App\Http\Controllers\PostController::class);
Route::resource('/crear-publicacion', App\Http\Controllers\PostController::class);
// Route::view('/blog/{nombre-post}', App\Http\Controllers\PostController::class);
Route::resource('/encuentranos', App\Http\Controllers\LocationController::class);
// Route::view('/encuentranos/{fecha}', App\Http\Controllers\LocationController::class);

Route::resource('/ubicaciones', App\Http\Controllers\LocationController::class);
Route::resource('/eventos', App\Http\Controllers\EventController::class);

Route::resource('/categorias', App\Http\Controllers\CategoryController::class);
//Dashboard admin
Route::resource('/dashboard-admin', App\Http\Controllers\DashboardController::class);
//Dashboard usuario normal
Route::resource('/dashboard-user', App\Http\Controllers\DashboardController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
