
    <div class="content text-center mb-4">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@getbootstrap">Add Employee</button>
    </div>
 
        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
         {{-- <pre>
            @php
                print_r($errors->all());   
           @endphp
         </pre> --}}
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Employee Registration </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeName" class="col-form-label">Full Name</label>
                                        <input type="text" name="employeeName" class="form-control" id="employeeName" value="{{old('employeeName')}}">
                                        <span class="text-danger fs-20">
                                            @error('employeeName'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6 ms-auto">
                                        <label for="employeeEmail" class="col-form-label">Email</label>
                                        <input type="text" name="employee_email" class="form-control" id="employeeEmail" value="{{old('employee_email')}}"> 
                                        <span class="text-danger fs-20">
                                            @error('employee_email'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeMobileNo" class="col-form-label">Mobile number</label>
                                        <input type="text" name="employee_mobile_number" class="form-control"
                                            id="employeeMobileNo"  value="{{old('employee_mobile_number')}}">
                                            <span class="text-danger fs-20">
                                                @error('employee_mobile_number'){{
                                                    $message
                                                }}
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="employeeDepartmentName" class="col-form-label">Department Name</label>
                                        <input type="text" class="form-control" name="employeeDepartmentName" id="employeeDepartmentName"  value="{{old('employeeDepartmentName')}}">
                                        <span class="text-danger fs-20">
                                            @error('employeeDepartmentName'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeHiredate" class="col-form-label">Hiredate</label>
                                        <input type="date" name="employeeHiredate" class="form-control"
                                            id="employeeHiredate"  value="{{old('employeeHiredate')}}">

                                            <span class="text-danger fs-20">
                                                @error('employeeHiredate'){{
                                                    $message
                                                }}
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="employeebirthdate" class="col-form-label">Birthdate</label>
                                        <input type="date" class="form-control" name="employeebirthdate" id="employeebirthdate"  value="{{old('employeebirthdate')}}">
                                        <span class="text-danger fs-20">
                                            @error('employeebirthdate'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="employeeSalary" class="col-form-label">Salary </label>
                                        <input type="text" class="form-control" name="employeeSalary" id="employeeSalary"  value="{{old('employeeSalary')}}">
                                        <span class="text-danger fs-20">
                                            @error('employeeSalary'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 ms-auto">

                                        <label for="employeeGender" class="col-form-label d-block">Gender</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Male" name="employeeGender"
                                                id="employeeGender1"  value="Male"{{old('employeeGender') == 'Male'?'checked':''}}>
                                            <label class="form-check-label" for="employeeGender1">
                                                Male
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Female" name="employeeGender"
                                                id="employeeGender2" value="Female"{{old('employeeGender') == 'Female'?'checked':''}}>
                                            <label class="form-check-label" for="employeeGender2">
                                                Female
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="Other" name="employeeGender"
                                                id="employeeGender2" value="Other"{{old('employeeGender') == 'Other'?'checked':''}}>
                                            <label class="form-check-label" for="employeeGender2">
                                                Other
                                            </label>
                                        </div>
                                        <span class="text-danger fs-20 d-block">
                                            @error('employeeGender'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-12 ms-auto">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" value= "{{old('employeeImage')}}"  name="employeeImage" id="formFile">
                                        <span class="text-danger fs-20 d-block">
                                            @error('employeeImage'){{
                                                $message
                                            }}
                                            @enderror
                                        </span>
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
@if(count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function(){
            $('#exampleModal').modal('show');
        });
    </script>
@endif