<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;

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

Route::prefix('/admin-dashboard')->group(function () {
    // Ruta para el método home del DashboardController
    Route::get('/', [DashboardController::class, 'home'])->name('adminHome');
    // Rutas para las operaciones bajo el prefijo /admin-dashboard
    Route::get('/galeria-comidas/create', [FoodController::class, 'create'])->name('galeria-comidas.create');;
    Route::get('/galeria-comidas/{id}/edit', [FoodController::class, 'edit'])->name('galeria-comidas.edit');;
    Route::put('/galeria-comidas/{id}', [FoodController::class, 'update'])->name('galeria-comidas.show');;
    Route::delete('/galeria-comidas/{id}', [FoodController::class, 'destroy'])->name('galeria-comidas.destroy');;
});
//crear index y view sin el prefijo /admin-dashboard
Route::resource('/galeria-comidas', FoodController::class)->except(['create', 'edit','update','destroy']);


/*Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)*//*->only('create','update','destroy')->middleware('admin')*/;

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
// Route::get('/admin-dashboard', [DashboardController::class, 'home'])->name('adminHome');

//esto es una prueba


Auth::routes();

Route::get('idiomas/{locale}',[App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');
});
