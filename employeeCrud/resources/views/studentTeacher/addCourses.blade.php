@extends('layout.main')
@section('content')
    
<div class="content text-center mb-4">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#coursemodal"
        data-bs-whatever="@getbootstrap">Add New Course</button>
</div>

    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="coursemodal" tabindex="-1" aria-labelledby="coursemodalLabel"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="coursetmodallLabel">Add Course</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Course Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name"
                                aria-describedby="emailHelp" placeholder="Enter Subject name">
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