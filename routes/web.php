<?php

use Illuminate\Support\Facades\Route;
use App\Prestamo;
use App\Book;
use App\Role;
use App\User;
use App\Permission;
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
//ACA VAN LAS RUTAS PARA WEB, PARA VER LAS RUTAS DE API IR A api.php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/book/Mostrar', 'BookController@index');

Route::put('/book/actualizar', 'BookController@update');

Route::post('/book/guardar', 'BookController@store');

Route::delete('/book/borrar/{id}', 'BookController@destroy');

Route::get('/book/buscar', 'BookController@show');



Route::get('/Role', 'RoleController@index');
/*

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Auth::routes();


