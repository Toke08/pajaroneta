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

Route::prefix('/admin')->group(function () {
    // Ruta para el método home del DashboardController
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('adminHome');

    //rutas admin
    Route::resource('/roles', App\Http\Controllers\RoleController::class)/*->middleware('admin')*/;
    Route::resource('/ubicaciones', App\Http\Controllers\LocationController::class)/*->middleware('admin')*/;
    Route::resource('/eventos', App\Http\Controllers\EventController::class)/*->middleware('admin')*/;
    Route::resource('/tags', App\Http\Controllers\TagController::class)/*->middleware('admin')*/;
    Route::resource('/restaurants', App\Http\Controllers\RestaurantController::class)/*->middleware('admin')*/;
    Route::resource('/categorias', App\Http\Controllers\CategoryController::class)/*->middleware('admin')*/;
    Route::resource('/encuentranos', App\Http\Controllers\LocationController::class)/*->middleware('admin')*/;
    Route::resource('/blog', App\Http\Controllers\PostController::class)/*->middleware('admin')*/;
    Route::resource('/galeria-comidas', FoodController::class)/*->middleware('admin')*/;
});

//ejemplo rutas cleinte y su controlador
Route::get('/galeria-comidas', [ClientController::class, 'galeria_comidas'])->name('galeria-comidas');
// function galeria_comidas(){

//     return view('client.galeria_comidas'.['comidas'=>  Food:all());
// }


/*Route::resource('/galeria-comidas', App\Http\Controllers\FoodController::class)*//*->only('create','update','destroy')->middleware('admin')*/;



Route::post('/comments/{post_id}', 'App\Http\Controllers\CommentController@store')->name('comments.store');

Auth::routes();

Route::get('idiomas/{locale}',[App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');
});
