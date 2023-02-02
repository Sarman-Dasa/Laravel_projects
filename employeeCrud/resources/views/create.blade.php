@extends('layout.main')
@section('content')
    <div class="content text-center">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>
    </div>
        <form action="" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeName" class="col-form-label">Full Name</label>
                                        <input type="text" name="employeeName" class="form-control" id="employeeName">
                                    </div>

                                    <div class="col-md-6 ms-auto">
                                        <label for="employeeEmail" class="col-form-label">Email</label>
                                        <input type="text" name="employeeEmail" class="form-control" id="employeeEmail">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeMobileNo" class="col-form-label">Mobile number</label>
                                        <input type="text" name="employeeMobileNo" class="form-control"
                                            id="employeeMobileNo">
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="employeeDepartmentName" class="col-form-label">Department Name</label>
                                        <input type="text" class="form-control" id="employeeDepartmentName">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeHiredate" class="col-form-label">Hiredate</label>
                                        <input type="date" name="employeeHiredate" class="form-control"
                                            id="employeeHiredate">
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="employeebirthdate" class="col-form-label">Birthdate:</label>
                                        <input type="date" class="form-control" id="employeebirthdate">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeSalary" class="col-form-label">Salary </label>
                                        <input type="text" class="form-control" id="employeeSalary">
                                    </div>
                                    <div class="col-md-6 ms-auto">

                                        <label for="employeeGender" class="col-form-label d-block">Gender</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Male" name="employeeGender"
                                                id="employeeGender1">
                                            <label class="form-check-label" for="employeeGender1">
                                                Male
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Female" name="employeeGender"
                                                id="employeeGender2">
                                            <label class="form-check-label" for="employeeGender2">
                                                Female
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Other" name="employeeGender"
                                                id="employeeGender2">
                                            <label class="form-check-label" for="employeeGender2">
                                                Other
                                            </label>
                                        </div>
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="employeeImage" id="formFile">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           <input type="submit" name="save" value="Registration" class="btn btn-info">
                        </div>
                    </div>
        </form>
    </div>
    </div>
@endsection
