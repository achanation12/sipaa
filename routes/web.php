<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('root')->name('root.')->group(function(){
    Route::resource('users', 'UsersController');
    Route::resource('karyawan', 'KaryawanController');
    Route::resource('gaji', 'GajiController');
    Route::resource('todolist', 'TodolistsController');
});
