<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
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
Route::resource('department',departmentController::class);

Route::get('mechanic',[MechanicController::class,'addMechanic']);

Route::get('car/{id}',[CarController::class,'addCar']);
Route::get('ownwer/{id}',[OwnerController::class,'addOwner']);

Route::get('showoner/{id}',[OwnerController::class,'showOwner']);

Route::get('project',[ProjectController::class,'addProject']);

Route::get('language/{id}',[LanguageController::class,'addLanguage']);
Route::get('addDeployement/{id}',[DeploymentController::class,'addDeployement']);

Route::get('showProjectDeployement/{id}',[DeploymentController::class,'showData']);


//------Many To Many ---------------- //

//--------Song-----------
Route::get('song/create',[SongController::class,'create']);
Route::post('song',[SongController::class,'store'])->name('addSongs');
Route::get('song',[SongController::class,'show'])->name('showsong');
Route::get('song/{id}',[SingerController::class,'showSinger'])->name('showSingersong');

//--------Singer----------

Route::get('singer/add',[SingerController::class,'create']);
Route::post('singer',[SingerController::class,'store'])->name('addSinger');
Route::get('singer',[SingerController::class,'show'])->name('showSinger');
Route::get('singer/{id}',[SongController::class,'showSong'])->name('showSong');


//--------------- Polymorphic Relationships -----------------//

//-------ONE TO ONE ------------------//

Route::get('doctor/add',[DoctorController::class,'create']);
Route::get('doctor',[DoctorController::class,'show'])->name('doctorDataShow');
Route::get('doctorprofile/{id}',[DoctorController::class,'profile'])->name('doctorProfile');


Route::get('patient/add',[PatientController::class,'create']);
Route::get('doctor',[DoctorController::class,'show'])->name('doctorDataShow');
Route::get('patientprofile/{id}',[DoctorController::class,'profile'])->name('patientProfile');

//--------------ONE TO MANY -----------------//

Route::get('post/add',[PostController::class,'addPost']);
Route::get('post/{id}',[PostController::class,'showPost'])->name('showPost');


