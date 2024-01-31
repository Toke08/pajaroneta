<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;

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



Route::prefix('/admin')->group(function () {
    // Ruta para el método home del DashboardController
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('adminHome');

    //rutas admin
    Route::resource('/roles', RoleController::class)/*->middleware('admin')*/;
    Route::resource('/ubicaciones', LocationController::class)/*->middleware('admin')*/;
    Route::resource('/eventos', EventController::class)/*->middleware('admin')*/;
    Route::resource('/tags', TagController::class)/*->middleware('admin')*/;
    Route::resource('/restaurants', RestaurantController::class)/*->middleware('admin')*/;
    Route::resource('/categorias', CategoryController::class)/*->middleware('admin')*/;
    Route::resource('/encuentranos', LocationController::class)/*->middleware('admin')*/;
    Route::resource('/blog', PostController::class)/*->middleware('admin')*/;

    //rutas admin con prefijo /admin MENOS show
    Route::resource('/galeria-comidas', FoodController::class)->except('show')/*->middleware('admin')*/;
});

//ejemplo rutas cleinte y su controlador
Route::get('/galeria-comidas', [ClientController::class, 'galeria_comidas'])->name('galeria_comidas');
Route::get('/galeria-comidas/{id}', [ClientController::class, 'galeria_comidas_show'])->name('galeria_comidas_show');
Route::get('/galeria-comidas/{id}', [FoodController::class, 'show'])->name('galeria-comidas.show');


Route::get('/blog', [ClientController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [ClientController::class, 'blog_show'])->name('blog_show');

// function galeria_comidas(){

//     return view('client.galeria_comidas'.['comidas'=>  Food:all());
// }


/*Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)*//*->only('create','update','destroy')->middleware('admin')*/;



Route::post('/comments/{post_id}', 'App\Http\Controllers\CommentController@store')->name('comments.store');

Auth::routes();

Route::get('idiomas/{locale}',[App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');
});
