<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
    //
     public function index(Request $request)
    {
        //
        $role = RoleController::all();
        return $role;
        
    }

    //mas
     public function store(Request $request)
    {
        //
         $role = new Role();
        $role->name = $request->name;
        $role->save();
       
   
    }
    
}
