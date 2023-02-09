<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function create()
    {
        $doctor = new Doctor();
        $doctor->name = "Dr. pathk";
        $doctor->save();

        $doctor->profile()->create([
            'email'=>'pathk@gmail.com',
            'phone'=>'906756455'
        ]);
        return redirect()->route('doctorDataShow');
    }

    public function show()
    {
        $data = Doctor::all();
       // $data->profile;
       return view('doctorPatient.showDoctorDetails',compact('data'));
    }

    public function profile($id)
    {
        $data1 = Doctor::find($id);
        $data = [$data1->profile];
        //return $data1->name;
        return view('doctorPatient.profile',['data'=>$data,'data1'=>$data1]);
    }
}
