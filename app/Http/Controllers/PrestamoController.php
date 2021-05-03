<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\User;
use App\Book;

class PrestamoController extends Controller
{
   


public function index()
    {
        //Request $request
        $prestamo = Prestamo::all();
        return $prestamo;
        //Esta función nos devolvera todas los prestamo que tenemos en nuestra BD
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

  public function PrestamosYUsers()
    {
        
        //Prestamo->id->user->name  mostrar prestamos con nombre de socios
        $prestamo = Prestamo::all();

        return view("prestamo.lista", compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $prestamo = new Prestamo();
           $prestamo->user_id = $request->user_id;
            $prestamo->book_id = $request->book_id;
     //    $prestamo->fecha = $request->fecha;
      // $libro
      // $usuario
       

        $prestamo->save();
        //Esta función guardará prestamo
   //return Prestamo::Create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Prestamo $prestamo Request $request
        $prestamo = Prestamo::findOrFail($id);
        return $prestamo;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $orestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Prestamo $prestamo
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->user_id = $request->user_id;
       $prestamo->book_id = $request->book_id;
        $prestamo->fecha = $request->fecha;

        $prestamo->save();
//$prestamo->update($request->all());
        return $prestamo;
        //Esta función actualizará el prestamo que hayamos seleccionado
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Prestamo $prestamo
        $prestamo== Prestamo::findOrFail($id);
          $prestamo->destroy();
          //
        return 204;
        //Esta función obtendra el id del prestamo que hayamos seleccionado y la borrará de nuestra BD
 
    }
    
   
}
