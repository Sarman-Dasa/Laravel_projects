@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="table-responsive"></div>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th colspan="11" class="text-center table-dark">Doctor Data</th>
            </tr>
            <tr class="table-info">
                    <th>Doctor Id</th>
                    <th>Doctor Name</th>
                    <th>View profile</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><a href="{{route('doctorProfile',$item->id)}}">View Profile</a></td>
                       </tr>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="11" class="text-center table-dark">Total {{count($data)}} Doctor(s) </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection