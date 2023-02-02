<?php

use App\Http\Controllers\employeeController;
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

// Route::get('/', function () {
//     return view('create');
// });

Route::get('employee/delete/{id}',[employeeController::class,'destroy']);
Route::resource('employee',employeeController::class);
