<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// @ indica el metodo del controlador que se va a usar
Route::get('/user', 'UserController@index'); 

Route::post('/upload', function(Request $request) {
    // solo funciona con el enctype
    //dd($request->image);

    // almacena la imagen en el filesystem que queramos (se pueden ver en config/filesystems.php)
    $request->image->store('images', 'public');
    return 'uploaded';
    // sirve para asegurar que se ha seleccionado una foto (devuelve boolean)
    //dd($request->hasFile('image'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
