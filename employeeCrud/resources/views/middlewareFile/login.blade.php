@extends('layout.main')
@section('content')
    <div class="content text-center mb-4">
        <button type="button" id="btn" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#login"
            data-bs-whatever="@getbootstrap">Add user Detaile</button>
    </div>

    <form action="{{ route('user.login') }}" method="POST">
        @csrf
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="loginlLabel"> User Login </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" id="dname" name="name"
                                aria-describedby="emailHelp" placeholder="Enter User name">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Select Role</label>
                            <select name="role" id="" class="form-select">
                                <option value="-1" selected disabled>---select Role--</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <input type="submit"  value="Login" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#btn').hide();
            $('#login').modal('show');
        });
    </script>
@endsection
