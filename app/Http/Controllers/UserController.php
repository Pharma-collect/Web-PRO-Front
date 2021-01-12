<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session("pharmacy"));
        $pharmacy_name = $pharmacy->name;

        return view('user/index')->with("pharmacy_name", $pharmacy_name);
    }
}
