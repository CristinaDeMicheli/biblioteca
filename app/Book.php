<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['name', 'description', 'estado'];


      public function prestamos()
    {
      
   
     return $this->hasOne(Prestamo::class)->withTimestamps();

    	 }
       
}
