<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    public function show($user){

       dd($searchUser= User::where('username','LIKE','%'.$user.'%')
       ->orWhere('name','LIKE','%'.$user.'%')
       ->get());
        return $search;
    }
}
