@include('layout.link')
<div class="modal" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Error mesage</h5>
          <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            @if (Session::has('error'))
                {{Session::get('error')}}
            @endif
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-close" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btn-next" class="btn btn-primary">Next</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
       $("#successModal").modal('show'); 
       $(document).on("click","#btn-close",function(){
            history.back();
       });
       $(document).on("click","#btn-next",function(){
            var url = "{{route('user.login')}}";
            location.href = url;
       });
    });
  </script>