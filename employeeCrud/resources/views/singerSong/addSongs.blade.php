
<div class="text-center mt-5 mb-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSongs" data-bs-whatever="@mdo">Add Songs</button>
</div>
<div class="modal" id="addSongs" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Song</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('addSongs')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="" class="col-form-label">Song Name</label>
                  <input type="text" class="form-control" name="title" id="Song-name">
                </div>
                <div class="mb-3">
                  <input type="submit" value="Add Song" class="btn btn-info">
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
  