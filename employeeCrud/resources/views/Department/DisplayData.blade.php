@extends('layout.main')
@section('content')
    <div class="container mt-5">
        <div class="table-responsive">
            @include('create')
           
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="6" class="text-center table-dark">Employee Data</th>
                </tr>
                <tr class="table-info">
                    <th>ID</th>
                        <th>Department Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                       
                        <th colspan="2" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                           <tr>
                            <td>{{$item->id}}</td>
                                <td>{{$item->department_name}}</td>
                                <td>{{$item->department_email}}</td>
                                <td>{{$item->department_mobile_number}}</td>
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
                        <th colspan="6" class="text-center table-dark">Total {{count($data)}} Employee(s) </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
