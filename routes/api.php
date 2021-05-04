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

 //Route::get('/login/', 'LoginControllen');
 
      
      //En esta sección se crearán los endpoints para nuestra aplicación,
      //Todas las rutas dentro de api.php tendrán el prefijo /api/
//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('user', 'UserController@getAuthenticatedUser');
});//

Route::group(['middleware' => 'Usuario'], function () { //solo user
	//book
  Route::get('/book/Disponible', 'BookController@BookDisponible');
  //prestamo
    Route::get('/prestamo/Prestamo', 'PrestamoController@store');
     
});



Route::group(['middleware' => 'Bibliotecario'], function () { //solo rol bibliotecario
  //role
	   Route::get('/roles/CrearRole', 'RoleController@store');
      Route::get('/roles/Mostrar', 'RoleController@index');
//book
    Route::get('/book/Mostrar', 'BookController@index');
    Route::put('/book/actualizar/', 'BookController@update');
    Route::post('/book/guardar', 'BookController@store');

	Route::delete('/book/borrar/{id}', 'BookController@destroy');

    Route::get('/book/buscar', 'BookController@show');

	Route::get('/book/Disponible', 'BookController@BookDisponible');

	Route::get('/book/Regresar', 'BookController@RegresarBook');
//prestamo
    Route::get('/prestamo/PrestamosYUser', 'PrestamoController@PestamosYUsers');
   Route::get('/prestamo/Editar', 'PrestamoController@update');



});


//});