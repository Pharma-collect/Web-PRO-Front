<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session("pharmacy"));
        $pharmacy_name = $pharmacy->name;

        return view('home/index')->with("pharmacy_name", $pharmacy_name);
    }
}
