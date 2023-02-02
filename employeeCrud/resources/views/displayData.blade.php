@extends('layout.main')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                        <th colspan="9" class="text-center table-dark">Employee Data</th>
                </tr>
                <tr class="table-info">
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Department</th>
                        <th>Hiredate</th>
                        <th>Birthdate</th>
                        <th>Salary</th>
                        <th>Gender</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                           <tr>
                                <td>{{$item->employeeName}}</td>
                                <td>{{$item->employeeEmail}}</td>
                                <td>{{$item->employeeMobileNo}}</td>
                                <td>{{$item->employeeDepartmentName}}</td>
                                <td>{{$item->employeeHiredate}}</td>
                                <td>{{$item->employeebirthdate}}</td>
                                <td>{{$item->employeeGender}}</td>
                                <td>{{$item->employeeSalary}}</td>
                                
                                <td><a href="{{"employee/delete/".$item->id}}">Delete</a></td>
                           </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection