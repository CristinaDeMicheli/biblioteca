<?php

namespace App;
use App\Book;
use App\User;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    protected $fillable = ['id', 'user_id', 'book_id','fecha'];
     public function users()
    {
      
   
     return $this->hasOne(User::class)->withTimestamps();

    	 }


     public function books()
    {
      
   
     return $this->hasOne(Book::class)->withTimestamps();

    	 }
}
