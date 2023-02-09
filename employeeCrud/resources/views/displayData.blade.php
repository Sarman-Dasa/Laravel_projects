@extends('layout.main')
@section('content')
    <div class="container mt-5">
        <div class="table-responsive">
            @include('create')
           
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="12" class="text-center table-dark">Employee Data</th>
                </tr>
                <tr class="table-info">
                    <th>Employee Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Department</th>
                        <th>Hiredate</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Salary</th>
                        <th>Image</th>
                        <th colspan="2" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                           <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->employee_name}}</td>
                                <td>{{$item->employee_email}}</td>
                                <td>{{$item->employee_mobile_number}}</td>
                                <td>{{$item['department']['department_name']}}</td>
                                <td>{{$item->employee_hiredate}}</td>
                                <td>{{$item->employee_birthdate}}</td>
                                <td>{{$item->employee_gender}}</td>
                                <td>{{number_format($item->employee_salary,2)}}</td>
                              <td><img src="{{asset($item->employee_image)}}" style="width: 50px;height:50px;" download></td>
                                <td>
                                    <form action="{{route('employee.edit',$item->id)}}" method="POST">
                                        @csrf
                                        @method('GET')
                                            <input type="submit" value="Edit" name="" class="btn btn-info">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('employee.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        @method("Delete")
                                            <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                    </form>
                                </td>
                           </tr>
                        @endforeach
                    </tr>
                    <tr>
                        <th colspan="11" class="text-center table-dark">Total {{count($data)}} Employee(s) </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
