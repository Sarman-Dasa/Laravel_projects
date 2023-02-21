<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        return response()->json(['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validation = $request->validate([
        //     'name'   => 'required|alpha',
        //     'age'    => 'required',
        //     'job'    => 'required|alpha_dash',
        //     'salary' => 'required|numeric',
        // ]);
        $data = $request->all();
        $validation = validator($data,[
            'name'   => 'required|alpha',
            'age'    => 'required|numeric',
            'job'    => 'required|alpha_dash',
            'salary' => 'required|numeric',
        ]);
        if($validation->fails())
        {
            return response()->json($validation->errors());
        }
        else
        {
            Employee::create($data);
            return response()->json(['success'=>"data Inserted Successfully"]);
            return back();
        }
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
       return response()->json(['status'=>true,'message'=>'Data Get Successfully','Data'=>$employee],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->all();
        $validation = validator($data,[
            'name'   => 'required|alpha',
            'age'    => 'required|numeric',
            'job'    => 'required|alpha_dash',
            'salary' => 'required|numeric',
        ]);
        if($validation->fails())
        {
            return response()->json($validation->errors());
        }
        else{
            $employee->name    = $request->name;
            $employee->age     = $request->age;
            $employee->job     = $request->job;
            $employee->salary  = $request->salary;
            $employee->save();
            return response()->json(['success'=>"Data Updated Successfully"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['success'=>"Employee Data Deleted"]);
    }
}
