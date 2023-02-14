@extends('layout.main')
@section('content')
    <div class="container-xl mt-5 mb-5 table table-secondary ">
     <div class="row">
        <div class="col-md-4 offset-md-4">
        <form action="{{ route('user.checkValidEmail')}}" method="POST">
            @csrf
            <div class="mb-4">
                <span class="text-success">
                    @if (Session::has('success'))
                        {{Session::get('success')}}
                    @endif
                </span>
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="email"  class="form-control" name="email" id="emailId" placeholder="Enter Your registered Email id">
              <span class="text-danger">
               @if (Session::has('error'))
                   {{Session::get('error')}}
               @endif
              </span>
            </div>
            <input type="submit" value="EMAIl PASSWORD RESET LINK" class=" btn btn-light fs-6">
          </form>
        </div>
     </div>
    </div>
@endsection