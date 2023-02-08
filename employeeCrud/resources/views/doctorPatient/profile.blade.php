@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="table-responsive"></div>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th colspan="11" class="text-center table-dark">Profile</th>
            </tr>
            <tr>
                <td>
                   Welcome, <b> {{$data1->name}}</b>
                </td>
            </tr>
            <tr class="table-info">
                    <th>Email </th>
                    <th>Phone</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
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