<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/tasks', 'TaskController@index')->name('tasks.index');
    Route::post('/tasks', 'TaskController@store')->name('tasks.store');
    Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
});

