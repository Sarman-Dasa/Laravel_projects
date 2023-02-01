<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
  // return view('welcome');
  //redirect route
  return redirect("Abount");
});
Route::get('/facads', function () {
   // return Facades\App\PaymentService\PaypalApi::pay();
    return \App\Facades\PaymentFacades::pay(); 
   //dump($payment->pay());
});
/* 
Route::get("/Abount",function(){
   return view('Abount');
});

Route::view("contactus","/contactus");

// pass data with route 

Route::get("/userinput/{name}",function($name){
   return view("Dataprint",["name"=>$name]);
});

// Optional Parameters

Route::get("/userinput/{name?}",function($name= "xyz")
{
   return view("Dataprint",["name"=>$name]);
});

//Regular Expression Constraints

Route::get("/user/{name?}",function($name= null){
   return "My Name is :".$name;
})->where('name','[a-zA-Z]+');

Route::get('/user/{uid}', function ($id=null) {
    return $id;
})->where('uid','[0-9]+');

// Route::get("/user/{uid}/{name}",function($id,$name){
//    return "Id is ::" .$id . " Name is :: ".$name;
// })->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

Route::get("/user/{uid}/{name}",function($id,$name){
   return "Id is ::" .$id . " Name is :: ".$name;
})->whereNumber('uid')->whereAlpha('name');


//naming Route 
// it's use to sort url 
Route::get("/naming",function(){
   return view('namingRoute');
})->name('my'); */

//Route Group

Route::group(['prefix'=>'/group','middleware'=>'throttle:10,1'],function(){


   Route::get("/naming",function(){
      return view('namingRoute');
   })->name('my');

   Route::get("/Abount",function(){
      return view('Abount');
   })->name('Abount');
   
   Route::view("contactus","/contactus")->name('contactus');

   Route::get("/userinput/{name?}",function($name= "xyz")
   {
      return view("Dataprint",["name"=>$name]);
   })->name("userinput");
});

