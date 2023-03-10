@extends('layout.main')
@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3 mt-5">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th colspan="5" class="text-center table-dark">Assignment Data</th>
                </tr>
                <tr class="table-info">
                    <th colspan="2">Student Name :: {{$data->name}}</th>
                    <th colspan="3">Student Email :: {{$data->email}}</th>
                </tr>
                <tr class="table-dark">
                    <th>Subject</th>
                    <th>Image</th>
                    <th colspan="3" class="text-center">Action</th>
                    
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ( $data['image'] as $item)
                            <tr>
                                <td>{{$item->subject}}</td>
                                <td>
                                    <a href="{{$item->image}}" target="__black">
                                        <img src="{{asset($item->image)}}" alt="" style="width: 200px;height: 50px;">
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('image.download')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="path" value="{{$item->image}}">
                                        <input type="submit" value="Download" class="btn btn-info">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('image.delete',['id'=>$item->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-info">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('image.edit',['id'=>$item->id])}}">
                                        @csrf
                                        <input type="submit" value="EDIT" class="btn btn-info">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection