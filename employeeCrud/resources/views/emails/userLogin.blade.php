@extends('layout.main')
@section('content')
    {{-- <div class="content text-center mb-4">
        <button type="button" id="btn" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#login"
            data-bs-whatever="@getbootstrap">Add user Detaile</button>
    </div> --}}

    <form action="{{ route('user.varifry') }}" method="POST">
        @csrf
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="loginlLabel"> User Login </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">User Email</label>
                            <input type="email" class="form-control" id="dname" name="email"
                                aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <input type="submit"  value="Login" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#login').modal('show');
            $(document).on("click","#close",function(){
                history.back();
            });
        });
    </script>
@endsection
