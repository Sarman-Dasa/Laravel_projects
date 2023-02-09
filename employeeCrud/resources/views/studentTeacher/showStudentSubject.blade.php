@extends('layout.main')
@section('content')

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="11" class="text-center table-dark">Student Subject Data</th>
                </tr>
                <tr class="table-info">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>city</th>
                        <th>address</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                           <tr>
                                <td>{{$item->student_name}}</td>
                                <td>{{$item->student_email}}</td>
                                <td>{{$item->student_mobile_number}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->student_address}}</td>
                            </tr>
                        @endforeach
                    </tr>
                    <tr>
                        <th colspan="11" class="text-center table-dark">Total {{count($data)}} studen(s) </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="1" class="text-center table-dark">Student Subject Data</th>
                </tr>
                <tr class="table-info">
                        <th>Name</th>
                </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        @foreach ($data as $item)
                            <tr>
                                  <td>{{$item->subject_name}}</td>
                            </tr>
                        @endforeach
                    </tr>
                    <tr>
                        <th colspan="1" class="text-center table-dark">Total {{count($data)}} subject(s) </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection