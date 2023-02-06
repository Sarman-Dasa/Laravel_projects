<?php

use App\Http\Controllers\departmentController;
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


//Employee Controller
Route::resource('employee',employeeController::class);
Route::get('employee/deletedData/restore',[employeeController::class,'deletedData'])->name('employee.restoreDataShow');
Route::get('employee/deletedData/restore/{id}',[employeeController::class,'restoreData'])->name('employee.restoreData');
Route::delete('employee/deletedData/delete/{id}',[employeeController::class,'permanentDelete'])->name('employee.permanentDelete');

// Department Controller
Route::resource('depaertment',departmentController::class);


