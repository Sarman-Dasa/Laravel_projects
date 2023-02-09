
<div class="text-center mt-5 mb-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSinger" data-bs-whatever="@mdo">Add Songs</button>
</div>
<div class="modal" id="addSinger" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Singer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('addSinger')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="" class="col-form-label">Singer Name</label>
                  <input type="text" class="form-control" name="name" id="Singer-name">
                </div>
                <div class="mb-3">
                    <label for="" class="col-form-label">Select Song Name</label>
                    <select name="songid[]" id="songid" multiple class="form-select" >
                      @foreach ($songname as $name)
                      <option value="{{$name->id}}">{{$name->title}}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="mb-3">
                    <input type="submit" value="Add Singer" class="btn btn-info">
                  </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
