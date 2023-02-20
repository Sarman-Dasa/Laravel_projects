{{-- @extends('layout.main')
@section('content') --}}
    <div class="contenier table table-secondary mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="md-4 text-center bg-secondary">
                    <h3>Upload   Assignment</h3>
                </div>
                <form action="{{ route('image.store')}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Select Subject</label>
                        <select name="subject" id="" class="form-select">
                            <option value="-1" selected disabled>---Select One---</option>
                            <option value="Php">PHP</option>
                            <option value="Laravel">LARAVEL</option>
                            <option value="Python">PYTHON</option>
                            <option value="Java">JAVA</option>
                        </select>
                        <span class="text-danger">
                            @error('subject')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Upload image</label>
                        <input type="file" name="image" id="" class="form-control">
                        <span class="text-danger">
                            @error('image')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group d-grid">
                        <input type="submit" value="Upload" class="btn btn-info bg-secondary-subtle b-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- @endsection --}}