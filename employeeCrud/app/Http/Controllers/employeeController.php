<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
       return view('displayData',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form Data Validation

        $request->validate([
            'employeeName'=>'required',
            'employeeEmail'=>'required|email|unique:Employees',
            'employeeMobileNo'=>'required|numeric|digits:10|unique:Employees',
            'employeeDepartmentName'=>'required|alpha',
            'employeeHiredate'=>'required',
            'employeebirthdate'=>'required',
            'employeeGender'=>'required',
            'employeeSalary'=>'required|numeric',
            'employeeImage'=>'required'
        ]); 

        // Save Data 
        //  $request->file('employeeImage')->store('images');
        $extension = $request->file('employeeImage')->extension();
        $path = $request->file('employeeImage')->storeAs('images',time().".".$extension);

        $employee = new Employee();
        $employee->employeeName = $request->employeeName;
        $employee->employeeEmail = $request->employeeEmail;
        $employee->employeeMobileNo = $request->employeeMobileNo;
        $employee->employeeDepartmentName = $request->employeeDepartmentName;
        $employee->employeebirthdate = $request->employeebirthdate;
        $employee->employeeHiredate = $request->employeeHiredate;
        $employee->employeeGender = $request->employeeGender;
        $employee->employeeSalary = $request->employeeSalary;
        $employee->employeeImage = $path;

        $employee->save();
        return redirect('employee/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Show Called";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect('employee');
    }
}
