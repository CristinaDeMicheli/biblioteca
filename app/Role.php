<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
         protected $fillable = ['name'];
   
    public function users()
    {
      
   
     return $this->belongsToMany(User::class)->withTimestamps();

    	 }
    	   public function permissions()
    {
      
   
     return $this->belongstoMany(Permission::class)->withTimestamps();

         }
}
