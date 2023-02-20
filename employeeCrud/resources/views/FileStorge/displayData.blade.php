@extends('layout.main')
@section('content')
    <div class="container">
        @include('FileStorge.uploadImage')
        <div class="col-md-12 offset-md-0 mt-5">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="6" class="text-center table-dark">Assignment Data</th>
                </tr>
                
                <tr class="table-info">
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Submited Assignment </th>
                    <th>View Assignment</th>
                    @if (Auth::user()->role == "Teacher")
                    <th>Status</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @if (Auth::user()->role == "Teacher")
                    <tr>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->image_count}}</td>
                                <td><a href="{{ route('image.show', ['id'=>$item->id]) }}" class="btn btn-secondary ">View</a></td>
                                <td><a href="{{ route('status', ['id'=>$item->id]) }}" class="btn btn-info">{{$item->status=='1' ? 'Active' : 'Deactive'}}</a></td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->image_count}}</td>
                            <td><a href="{{ route('image.show', ['id'=>$data->id]) }}" class="btn btn-secondary ">View</a></td>
                            
                        </tr>
                    @endif
                    
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection