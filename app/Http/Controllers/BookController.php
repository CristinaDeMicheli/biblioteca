<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        //
        $book = Book::all();
        return $book;
        //Esta función nos devolvera todas los libros que tenemos en nuestra BD
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 public function BookDisponible()
    {
        //if libro(estado)='Disponible'
        //mostrar
        //Book $book
   //     $book = Book::findOrFail(estado->'disponible');
        return $book;
    }
      public function BookPrestado(Request $request, Book $book)
    {
        //update Book(id,name,description,'Disponible')
         //busco el libro a actualizar
        $book = Book::findOrFail($request->id);
        //actualizo
        $book->name = $request->name;
        $book->description = $request->description;
        $book->estado = 'prestado'->estado;

        $book->save();

        return $book;
        //Esta función actualizará el libro que hayamos seleccionado
  }
    public function RegresarBook(Request $request, Book $book)
    {
        //update Book(id,name,description,'Disponible')
         //
        $book = Book::findOrFail($request->id);

        $book->name = $request->name;
        $book->description = $request->description;
        $book->estado = 'disponible'->estado;

        $book->save();

        return $book;
        //Esta función actualizará el libro que hayamos seleccionado

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        //Ej
       // $validatedData = $request->validate([
//'title' => 'required|string|unique:articles|max:255',
//'body' => 'required',
]);
         $book = new Book();
        $book->name = $request->name;
        $book->description = $request->description;
        $book->estado = $request->estado;

        $book->save();
        //Esta función guardará libros
       return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //Book $book
        $book = Book::findOrFail($request->id);
        return $book;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $book = Book::findOrFail($request->id);

        $book->name = $request->name;
        $book->description = $request->description;
        $book->estado = $request->estado;

        $book->save();

       // return $book;
        //Esta función actualizará el libro que hayamos seleccionado
        return response()->json($book, 201);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //Book $book
          $book = Book::destroy($request->id);
       // return $book;
        //Esta función obtendra el id del libro que hayamos seleccionado y la borrará de nuestra BD
        return response()->json(null, 204);
    }
}
