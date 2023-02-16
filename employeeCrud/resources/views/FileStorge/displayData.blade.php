@extends('layout.main')
@section('content')
    <div class="container">
        <div class="col-md-12 offset-md-0 mt-5">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="5" class="text-center table-dark">Assignment Data</th>
                </tr>
                <tr class="table-info">
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Submited Assignment </th>
                    <th>View Assignment</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->image_count}}</td>
                                <td><a href="{{ route('image.show', ['id'=>$item->id]) }}" class="btn btn-secondary ">View</a></td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection