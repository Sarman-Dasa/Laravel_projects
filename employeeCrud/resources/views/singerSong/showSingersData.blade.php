@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="table-responsive"></div>
       @include('singerSong.addSingers')
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th colspan="11" class="text-center table-dark">Singer Data</th>
            </tr>
            <tr class="table-info">
                    <th>Singer Id</th>
                    <th>Singer Name</th>
                    <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><a href="{{ route('showSong',$item->id) }}">Show Song</a></td>
                       </tr>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="11" class="text-center table-dark">Total {{count($data)}} Singers(s) </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection