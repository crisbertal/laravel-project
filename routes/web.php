<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/todos', function() {
    // dentro de la carpeta todos en el fichero index
    return view('todos.index');
});

// con el fin de que este fichero no sea inmenso, se puede mover la 
// logica que hay dentro de las rutas a los controladores
Route::get('/todos/create', 'TodoController@create');

Route::post('/todos/create', 'TodoController@store');

Route::get('/todos/edit', 'TodoController@edit');


Route::get('/', function () {
    return view('welcome');
});

// @ indica el metodo del controlador que se va a usar
Route::get('/user', 'UserController@index'); 

Route::post('/upload', 'UserController@uploadAvatar');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
