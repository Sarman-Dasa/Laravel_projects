@extends('layout.main')

@section('content')
<div class="container">
    <form action="{{route('depaertment.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="">Department Name</label>
          <input type="text" class="form-control" id="dname" name="dname" aria-describedby="emailHelp" placeholder="Enter department name">
        </div>
        <div class="form-group">
            <label for="">Department Email</label>
            <input type="email" class="form-control" id="demail" name="email" aria-describedby="emailHelp" placeholder="Enter department Email">
        </div>
        <div class="form-group">
            <label for="">Department Phone</label>
            <input type="tel" class="form-control" id="dphone" name="email" aria-describedby="emailHelp" placeholder="Enter department Phone">
        </div>
        <div class="form-group">
            <input type="submit" value="save" class="btn btn-info mt-2 mb-2 btn-block">
        </div>
      </form>
</div>
@endsection