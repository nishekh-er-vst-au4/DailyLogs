<?php

use App\Http\Controllers\UserController;
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

Route::resource('/todo','TodoController');
// Route::get('/todos','TodoController@index')->name('todo.index');
// Route::get('/todos/create','TodoController@create');
// Route::post('/todos/create','TodoController@store');
// Route::get('/todos/{todo}/edit','TodoController@edit');
// Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update'); //put and patch methods 
// Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');

Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete'); //used for update
Route::put('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');

Route::get('/user', 'UserController@index');

Route::post('/upload','UserController@uploadAvatar'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
