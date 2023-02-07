
<div class="content text-center mb-4">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#departmentmodal"
        data-bs-whatever="@getbootstrap">Add Department Detaile</button>
</div>

    <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="departmentmodal" tabindex="-1" aria-labelledby="departmentmodalLabel"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="departmentmodallLabel"> Department Registration </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" class="form-control" id="dname" name="department_name"
                                aria-describedby="emailHelp" placeholder="Enter department name">
                        </div>
                        <div class="form-group">
                            <label for="">Department Email</label>
                            <input type="email" class="form-control" id="demail" name="department_email"
                                aria-describedby="emailHelp" placeholder="Enter department Email">
                        </div>
                        <div class="form-group">
                            <label for="">Department Phone</label>
                            <input type="tel" class="form-control" id="dphone" name="department_mobile_number"
                                aria-describedby="emailHelp" placeholder="Enter department Phone">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="save" class="btn btn-info mt-2 mb-2 btn-block">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="save" value="Registration" class="btn btn-info">
                    </div>
                </div>
            </div>
        </div>
    </form>

