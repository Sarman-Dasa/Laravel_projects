@extends('layout.main')
@section('content')
    <div class="container-xl mt-5 mb-5 table table-secondary ">
     <div class="row">
        <div class="col-md-4 offset-md-4">
        <form action="{{ route('user.setnewpassword')}}" method="POST">
            @csrf
            <div class="mb-4">
                <span class="text-success d-block">
                    @if (Session::has('success'))
                        {{Session::get('success')}}
                    @endif
                </span>
              <input type="hidden" name="token"  class="form-control"  id="token" value="{{$data->token}}">
              <input type="hidden" name="email"  class="form-control"  id="emailId" value="{{$data->email}}">
              <span class="text-danger">
               @if (Session::has('error'))
                   {{Session::get('error')}}
               @endif
              </span>
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password"  class="form-control" name="password" id="password">
                <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
                </span>
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Confirm Pasword</label>
                <input type="password"  class="form-control" name="confirmPassword" id="confirmpassword">
                <span class="text-danger">
                @error('confirm_paasword')
                    {{$message}}
                @enderror
                <span class="text-danger">
            </div>
            <input type="submit" value="Reset password" class=" btn btn-light fs-6">
          </form>
        </div>
     </div>
    </div>
@endsection