@extends('layout.main')
@section('content')
    <form action="{{ route('employee.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Employee Data</h1>
                        <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employeeName" class="col-form-label">Full Name</label>
                                    <input type="text" name="employeeName" class="form-control" id="employeeName"
                                        value="{{ $data->employee_name }}">
                                    <span class="text-danger fs-20">
                                        @error('employeeName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 ms-auto">
                                    <label for="employeeEmail" class="col-form-label">Email</label>
                                    <input type="text" name="employee_email" class="form-control" id="employeeEmail"
                                        value="{{ $data->employee_email }}">
                                    <span class="text-danger fs-20">
                                        @error('employee_email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employeeMobileNo" class="col-form-label">Mobile number</label>
                                    <input type="text" name="employee_mobile_number" class="form-control"
                                        id="employeeMobileNo" value="{{ $data->employee_mobile_number }}">
                                    <span class="text-danger fs-20">
                                        @error('employee_mobile_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <label for="employeeDepartmentName" class="col-form-label">Department Name</label>
                                    <select name="department_id" id="department_id" class="form-select">
                                        <option value="-1" disabled selected>---Select Department---</option>
                                        @foreach ($departmentName as $name)
                                            <option value="{{ $name->id }}">{{ $name->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger fs-20">
                                        @error('department_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employeeHiredate" class="col-form-label">Hiredate</label>
                                    <input type="date" name="employeeHiredate" class="form-control" id="employeeHiredate"
                                        value="{{ $data->employee_hiredate }}">

                                    <span class="text-danger fs-20">
                                        @error('employeeHiredate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <label for="employeebirthdate" class="col-form-label">Birthdate</label>
                                    <input type="date" class="form-control" name="employeebirthdate"
                                        id="employeebirthdate" value="{{ $data->employee_birthdate }}">
                                    <span class="text-danger fs-20">
                                        @error('employeebirthdate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employeeSalary" class="col-form-label">Salary </label>
                                    <input type="text" class="form-control" name="employeeSalary" id="employeeSalary"
                                        value="{{ $data->employee_salary }}">
                                    <span class="text-danger fs-20">
                                        @error('employeeSalary')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 ms-auto">

                                    <label for="employeeGender" class="col-form-label d-block">Gender</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="Male" name="employeeGender"
                                            id="employeeGender1"
                                            value="Male"{{ $data->employee_gender == 'Male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="employeeGender1">
                                            Male
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="Female"
                                            name="employeeGender" id="employeeGender2"
                                            value="Female"{{ $data->employee_gender == 'Female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="employeeGender2">
                                            Female
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="Other"
                                            name="employeeGender" id="employeeGender2"
                                            value="Other"{{ $data->employee_gender == 'Other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="employeeGender2">
                                            Other
                                        </label>
                                    </div>
                                    <span class="text-danger fs-20 d-block">
                                        @error('employeeGender')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-12 ms-auto">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="employeeImage"
                                        value="{{ $data->employee_image }}" id="formFile">
                                    <span class="text-danger fs-20 d-block">
                                        @error('employeeImage')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btn-close"
                            data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="update" value="Update Data" class="btn btn-success">
                    </div>
                </div>
    </form>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
            $(document).on("click", "#btn-close", function() {
                history.back();
            });
        });
    </script>
@endsection
