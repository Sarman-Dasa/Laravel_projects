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
            'employee_email'=>'required|email|unique:Employees',
            'employee_mobile_number'=>'required|numeric|digits:10|unique:Employees',
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
        $employee->employee_name = $request->employeeName;
        $employee->employee_email = $request->employee_email;
        $employee->employee_mobile_number = $request->employee_mobile_number;
        $employee->employee_department_name = $request->employeeDepartmentName;
        $employee->employee_birthdate = $request->employeebirthdate;
        $employee->employee_hiredate = $request->employeeHiredate;
        $employee->employee_gender = $request->employeeGender;
        $employee->employee_salary = $request->employeeSalary;
        $employee->employee_image = $path;

        $employee->save();
        return redirect()->route('employee.index');
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
    public function edit($employee)
    {   
        $data = Employee::find($employee);
        return view('update',compact('data'));
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
       
        $request->validate([
            'employeeName'=>'required',
            'employee_email'=>'required|email',
            'employee_mobile_number'=>'required|numeric|digits:10',
            'employeeDepartmentName'=>'required|alpha',
            'employeeHiredate'=>'required',
            'employeebirthdate'=>'required',
            'employeeGender'=>'required',
            'employeeSalary'=>'required|numeric',
            'employeeImage'=>'required'
        ]); 

        $extension = $request->file('employeeImage')->extension();
        $path = $request->file('employeeImage')->storeAs('public/images',time().".".$extension);
        $employee = Employee::find($id);
        $employee->employee_name = $request->employeeName;
        $employee->employee_email = $request->employee_email;
        $employee->employee_mobile_number = $request->employee_mobile_number;
        $employee->employee_department_name = $request->employeeDepartmentName;
        $employee->employee_birthdate = $request->employeebirthdate;
        $employee->employee_hiredate = $request->employeeHiredate;
        $employee->employee_gender = $request->employeeGender;
        $employee->employee_salary = $request->employeeSalary;
        $employee->employee_image = $path;
        $employee->save();
        return redirect()->route('employee.index');
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

    public function deletedData()
    {
        $data = Employee::onlyTrashed()->get();
        return view('restore',['data'=>$data]);
    }

    public function restoreData($id){
        

        Employee::onlyTrashed()->find($id)->restore();
        return redirect()->route('employee.restoreDataShow');
    }

    public function permanentDelete($id)
    {
        Employee::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('employee.restoreDataShow');
    }
}
