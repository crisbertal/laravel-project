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

Route::middleware('auth')->group(function () {
    Route::resource('/todos', 'TodoController');
    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
    Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
});



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
