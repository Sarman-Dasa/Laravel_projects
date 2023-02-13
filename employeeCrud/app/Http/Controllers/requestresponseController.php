<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestresponseController extends Controller
{
    public function index(Request $req)
    {
        //return $req->path();
        //return $req->url();
       // return $req->method();
       if($req->isMethod('GET')){
            //return "Get Method";
            //return $req->ip();
           // return $req->getAcceptableContentTypes();
           //return $req->query('name','dasa');
           return response()->json([
                'name'=>'dasa sarman',
                'city'=>'porbandar',
           ]);
       }
       else{
            return "Other Method";
       }
    }
}
