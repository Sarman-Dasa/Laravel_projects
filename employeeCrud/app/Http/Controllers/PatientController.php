<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
   public function create()
   {
        $patient = new Patient();
        $patient->name = "Dilip";
        $patient->save();

        $patient->profile()->create([
            'email'=>'Dilip@gmail.com',
            'phone'=>'7867564566'
        ]);
   }

   public function show()
   {
       $data = Patient::all();
      // $data->profile;
      return view('doctorPatient.showPatientDetails',compact('data'));
   }
}
