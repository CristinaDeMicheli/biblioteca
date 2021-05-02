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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'Usuario'], function () {
    Route::get('/Usuario/ejemplo', 'Usuario\EjemploController@index');
    Route::get('/Usuario/ejemplo/{id}', 'Usuario\EjemploController@edit');
});

Route::group(['middleware' => 'Bibliotecario'], function () {
    Route::get('/Bibliotecario/ej', 'Bibliotecario\ejController@index');
    Route::get('/Bibliotecario/ej/{id}', 'Admin\SeriesController@edit');
});
