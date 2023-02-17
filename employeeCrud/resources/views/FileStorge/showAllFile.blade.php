@extends('layout.main')
@section('content')
    <div class="container">
        <div class="table table-responsive">
            <div class="col-md-4">
                @foreach ($imageFile as $image)
                    <img src="{{ asset($image) }}" alt="" class="img-thumbnail ">
                @endforeach
            </div>
        </div>
    </div>
@endsection