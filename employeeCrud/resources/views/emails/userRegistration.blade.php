<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="userRegistrationmodal" tabindex="-1" aria-labelledby="userRegistrationmodalLabel"
        aria-hidden="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userRegistrationmodallLabel"> User Registration </h1>
                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" id="dname" name="name"
                            aria-describedby="emailHelp" placeholder="Enter User name" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">User Email</label>
                        <input type="email" class="form-control" id="demail" name="email"
                            aria-describedby="emailHelp" placeholder="Enter User Email" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control"
                            value="{{ old('password') }}">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirmPassword" id="" class="form-control">
                        <span class="text-danger">
                            @error('confirmPassword')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="close" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Registration" class="btn btn-info">
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        $("#userRegistrationmodal").modal('show');
        $(document).on("click", "#close", function() {
            history.back();
        });
    });
</script>
{{-- @endsection --}}
