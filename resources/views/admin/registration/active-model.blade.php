 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="m3"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="row g-2" action="{{ route('admin.activation') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
<input type="hidden" id="id_val" name="id">
                        <div class="col-md-12">
                            <p>Update the status for the user id: <span id="user_id_span"></span></p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Select Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="active">
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                                <option value="2">Reject</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Note</label>
                            <textarea class="form-control " type="text" placeholder="Note"
                                aria-label="default input example" name="note"></textarea>
                        </div>


                       
                        <div class="modal-footer">
                            <button type="button" id="m1" class="btn btn-secondary " data-bs-dismiss="modal">
                                Close</button>
                            <button type="submit" id="m2" class="btn btn-primary " data-bs-dismiss="modal">Update
    
                            </button>
                        </div>
                    </form>

                   
                </div>
            </div>
        </div>
    </div>