<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    function index(){
        return "Calling Controller...";
    }

    //Paramenter print

    function getName($name)
    {
        return "My Name is: ".$name;
    }

    function create()
    {
        return view('user');
    }
}
