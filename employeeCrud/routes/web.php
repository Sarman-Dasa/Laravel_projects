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
use App\Http\Controllers\requestresponseController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentTeacherController;
use App\Mail\OrderShipped;
use App\Mail\sendImage;
use Doctrine\DBAL\Driver\Middleware;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
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


//Employee Controller
//Route::resource('employee',employeeController::class);

Route::group(['middleware'=>['auth','verified']],function(){
   
});

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

// ------------- MANY TO MANY --------------//

//Add  Course
Route::get('course/add',[studentTeacherController::class,'addCourse'])->name('course.create');
Route::post('course',[studentTeacherController::class,'storeCourse'])->name('course.store');

// Add Student Course 

Route::get('student/add',[studentTeacherController::class,'addStudentCourse'])->name('student.create');
Route::post('student',[studentTeacherController::class,'storeStudentCourse'])->name('student.store');

//show student subject
Route::get('student/show/{id}',[studentTeacherController::class,'showStudentSubject'])->name('showstudentCourse');



//Route For Middleware 


//check user Age for Global
Route::get('users', function () {
    return view('middlewareFile.checkAge');
})->name('addAge')->middleware('auth');

// Route::POST('users', function () {
//     return "Hello";
// })->name('checkAge');

//GroupMiddleware 

Route::group(['middleware'=>['userAge']],function(){
    Route::POST('users', function () {
        return "Hello from GroupMiddleware";
    })->name('checkAge');
});

 // RouteMiddleware

 Route::post('users', function () {
    return "Hello, via routeMiddleware.";
 })->name('checkAge')->middleware('mwcheckAge');

 //Login Registration
// Route::get('create',[studentTeacherController::class,'create'])->name('user.create');
// Route::post('/',[studentTeacherController::class,'store'])->name('User.store');  
// Route::get('login',[studentTeacherController::class,'login'])->name('login');
// Route::post('login',[studentTeacherController::class,'isValid'])->name('user.login');
Route::group(['prefix'=>'user','middleware'=>['auth']],function(){

});

//Request Response

Route::get('reqres',[requestresponseController::class,'index']);


//Send Mail 

Route::get('send-mail',function()
{
    $mailData = [
        'name' => "test Mail",
        'dob' => '12/03/2023',
    ];

    Mail::to("hello@example.com")->send(new OrderShipped($mailData));
    dd("Mail Sended..");
});

Route::get('send-image',function()
{
    $userData = [
        'name' => "my name",
        'city' => 'Surat',
        'image' => '/app/images/1675662544.jpg',
    ];

    Mail::to("hello@example.com")->send(new sendImage($userData));
    dd("Mail Sended..");
});



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::resource('employee',employeeController::class);
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';