<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\LocationController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function() {
Route::prefix('/admin')->group(function () {
    // Ruta para el método home del DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminHome');

    //rutas admin
    Route::resource('/roles', RoleController::class);
    Route::resource('/evento', EventController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/restaurants', RestaurantController::class);
    Route::resource('/categorias', CategoryController::class);
    Route::resource('/blog', PostController::class);
    Route::resource('/galeria-comidas', FoodController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/fullcalendar', FullCalendarController::class);
    Route::resource('/ubicaciones', LocationController::class);
});
});
//ejemplo rutas cliente y su controlador
Route::get('/encuentranos', [ClientController::class, 'encuentranos_show'])->name('encuentranos_show');

Route::get('/galeria-comidas', [ClientController::class, 'galeria_comidas'])->name('galeria_comidas');
Route::get('/galeria-comidas/{id}', [ClientController::class, 'galeria_comidas_show'])->name('galeria-comidas.show');

Route::get('/blog', [ClientController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [ClientController::class, 'blog_show'])->name('blog_show');

Route::get('/categoria', [ClientController::class, 'categoria'])->name('categoria');
Route::get('/categoria/{id}', [ClientController::class, 'categoria_show'])->name('categoria_show');

Route::get('/tags/{id}', [ClientController::class, 'tags_show'])->name('tags_show');

Route::get('/user/{name}', 'App\Http\Controllers\UserController@show')->name('user_show');
Route::get('/user/{name}', [ClientController::class, 'user_show'])->name('user_show');
Route::put('/user/cambiar_contrasena', [UserController::class, 'changePassword'])->name('cambiar_contrasena');
Route::post('/user', [ClientController::class, 'user_store'])->name('user_store');
Route::get('/user/{name}/edit', [ClientController::class, 'user_edit'])->name('user_edit');
Route::put('/user/{name}', [ClientController::class, 'user_update'])->name('user_update');
Route::delete('/user/{name}', [ClientController::class, 'user_destroy'])->name('user_destroy');

//logout
Route::get('/logout', [userController::class, 'logout'])->name('logout');








// function galeria_comidas(){

//     return view('client.galeria_comidas'.['comidas'=>  Food:all());
// }


/*Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)*//*->only('create','update','destroy')->middleware('admin')*/;



Route::post('/comments/{post_id}', 'App\Http\Controllers\CommentController@store')->name('comments.store');

Auth::routes();

Route::get('idiomas/{locale}',[App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');
});
