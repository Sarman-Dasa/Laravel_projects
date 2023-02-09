@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="table-responsive"></div>
       @include('singerSong.addSongs')
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th colspan="11" class="text-center table-dark">Song Data</th>
            </tr>
            <tr class="table-info">
                    <th>Song Id</th>
                    <th>Song Name</th>
                    <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td><a href="{{ route('showSingersong',$item->id) }}">Show Singer</a></td>
                       </tr>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="11" class="text-center table-dark">Total {{count($data)}} Song(s) </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection