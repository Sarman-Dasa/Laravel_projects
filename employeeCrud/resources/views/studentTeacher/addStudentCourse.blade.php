
@extends('layout.main')
@section('content')
    
<div class="content text-center mb-4">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#studentmodal"
        data-bs-whatever="@getbootstrap">Add New Course</button>
</div>

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="studentmodal" tabindex="-1" aria-labelledby="coursemodalLabel"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="studentmodallLabel">Add Student Course</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                                <label for="" class="col-form-label">Select Student Name</label>
                                <select name="student_id" id="studentid" class="form-select" >
                                  @foreach ($student as $name)
                                  <option value="{{$name->id}}">{{$name->student_name}}</option>
                                  @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Select Courses Name</label>
                            <select name="course_id[]" id="courseid" class="form-select" multiple >
                              @foreach ($subject as $name)
                              <option value="{{$name->id}}">{{$name->subject_name}}</option>
                              @endforeach
                            </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-info">
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection