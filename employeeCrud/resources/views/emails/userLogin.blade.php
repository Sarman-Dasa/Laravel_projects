@include('layout.link')
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
                        <span class="text-success d-block">
                            @if (Session::has('success'))
                                {{Session::get('success')}}
                            @endif
                        </span>
                        <div class="form-group">
                            <label for="">User Email</label>
                            <input type="email" class="form-control" id="dname" name="email"
                                aria-describedby="emailHelp" value="{{old('email')}}" placeholder="Enter Email">
                                <span class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                            <span class="text-danger">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group"> 
                            <span class="text-danger">
                            @if (Session::has('error'))
                                {{Session::get('error')}}
                            @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('user.forgotpassword') }}" class="btn btn-danger"> Forgot password</a>
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
                var url = "{{route('home')}}";
                location.href = url;
            });
        });
    </script>
