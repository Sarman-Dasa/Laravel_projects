@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="table-responsive"></div>
       {{-- @include('singerSong.addSingers') --}}
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th colspan="11" class="text-center table-dark">Patient Data</th>
            </tr>
            <tr class="table-info">
                    <th>Patient Id</th>
                    <th>Patient Name</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{}}</td>
                       </tr>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="11" class="text-center table-dark">Total {{count($data)}} Patient(s) </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection