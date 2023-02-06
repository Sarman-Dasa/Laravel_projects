@extends('layout.main')
@section('content')
    <div class="container mt-5">
        <div class="table-responsive">
           
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="10" class="text-center table-dark">Employee Data</th>
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
                        <th colspan="2" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                           <tr>
                                <td>{{$item->employee_name}}</td>
                                <td>{{$item->employee_email}}</td>
                                <td>{{$item->employee_mobile_number}}</td>
                                <td>{{$item->employee_department_name}}</td>
                                <td>{{$item->employee_hiredate}}</td>
                                <td>{{$item->employee_birthdate}}</td>
                                <td>{{$item->employee_gender}}</td>
                                <td>{{$item->employee_salary}}</td>
                               
                                <td>
                                    <form action="{{route('employee.restoreData',$item->id)}}" method="POST">
                                        @csrf
                                        @method('GET')
                                            <input type="submit" value="Restore" name="" class="btn btn-info">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('employee.permanentDelete',$item->id)}}" method="POST">
                                        @csrf
                                        @method("Delete")
                                            <input type="submit" value="Permanent Delete" name="permanentdelete" class="btn btn-danger">
                                    </form>
                                </td>
                           </tr>
                        @endforeach
                    </tr>
                    <tr>
                        <th colspan="10" class="text-center table-dark">Total {{count($data)}} Employee(s) </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
