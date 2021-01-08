<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistersController extends Controller
{
    public function create()
    {
        return view('register');
    }
     
    public function store()
    {

        $firstname = request("firstname");
        $lastname = request("lastname");
        var_dump($lastname);
        exit(200);
        $email = request("email");
        $username = request("username");
        $password = request ("pasword");
        $confirmpassword = request("confirm-password");
      
        
    }
}



