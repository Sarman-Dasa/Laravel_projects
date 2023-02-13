@extends('layout.main')
@section('content')
    <div class="content text-center mb-4">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userRegistrationmodal"
            data-bs-whatever="@getbootstrap">Add user Detaile</button>
    </div>

    <form action="{{ route('User.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="userRegistrationmodal" tabindex="-1" aria-labelledby="userRegistrationmodalLabel"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="userRegistrationmodallLabel"> User Registration </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" id="dname" name="name"
                                aria-describedby="emailHelp" placeholder="Enter User name">
                        </div>
                        <div class="form-group">
                            <label for="">User Email</label>
                            <input type="email" class="form-control" id="demail" name="email"
                                aria-describedby="emailHelp" placeholder="Enter User Email">
                        </div>
                        <div class="form-group">
                            <label for="">Select Role</label>
                            <select name="role" id="" class="form-select">
                                <option value="-1" selected disabled>---select Role--</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="save" value="Registration" class="btn btn-info">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
