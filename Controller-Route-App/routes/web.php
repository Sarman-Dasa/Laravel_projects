<?php

use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/mycontroller",[userController::class,'index']);
Route::get("/mycontroller/{name}",[userController::class,'getName']);

Route::get('/user',[userController::class,'create']);
Route::post("/user",[userController::class,'print']);

Route::resource('Employee', EmployeeProfileController::class);
