<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customAuthcontroller extends Controller
{
    public function login(){

    return view("auth.login");
    

    }
    public function Registration(){
      return ("auth.registration");
    }
}
