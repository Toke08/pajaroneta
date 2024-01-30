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
Route::group(['middleware' => ['language']], function() {

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)/*->only('create','update','destroy')->middleware('admin')*/;

Route::resource('/blog', App\Http\Controllers\PostController::class);

//Route::resource('/comments', App\Http\Controllers\CommentController::class)->except(['edit', 'update']);

Route::post('/comments/{post_id}', 'App\Http\Controllers\CommentController@store')->name('comments.store');


Route::resource('/encuentranos', App\Http\Controllers\LocationController::class);

Route::resource('/roles', App\Http\Controllers\RoleController::class);

Route::resource('/ubicaciones', App\Http\Controllers\LocationController::class);

Route::resource('/eventos', App\Http\Controllers\EventController::class);

Route::resource('/tags', App\Http\Controllers\TagController::class);

Route::resource('/restaurants', App\Http\Controllers\RestaurantController::class);

Route::resource('/categorias', App\Http\Controllers\CategoryController::class);
//Dashboard admin
Route::resource('/dashboard-admin', App\Http\Controllers\DashboardController::class);
//Dashboard usuario normal
Route::resource('/dashboard-user', App\Http\Controllers\DashboardController::class);

//esto es una prueba


Auth::routes();

Route::get('idiomas/{locale}',[App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');
});
