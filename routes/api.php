<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Prestamo;
use App\Book;
use App\Role;
use App\User;
use App\Permission;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 //Route::get('/login/', 'LoginController@____');
 //     Route::get('/login/', 'RegisterController@____');
      
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'Usuario'], function () {
	
  Route::get('/book/Disponible', 'BookController@BookDisponible');
    Route::get('/prestamo/Prestamo', 'PrestamoController@store');
});

Route::group(['middleware' => 'Bibliotecario'], function () {
	
    Route::get('/book/Mostrar', 'BookController@index');
    Route::put('/book/actualizar/', 'BookController@update');
    Route::post('/book/guardar', 'BookController@store');

	Route::delete('/book/borrar/{id}', 'BookController@destroy');

    Route::get('/book/buscar', 'BookController@show');

	Route::get('/book/Disponible', 'BookController@BookDisponible');

	Route::get('/book/Regresar', 'BookController@RegresarBook');

    Route::get('/prestamo/PrestamosYUser', 'PrestamoController@PestamosYUsers');
   Route::get('/prestamo/Editar', 'PrestamoController@update');



});


