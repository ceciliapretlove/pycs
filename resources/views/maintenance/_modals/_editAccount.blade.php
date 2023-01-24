<div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <small><b>Add Account</b></small>
            </div>
            <form id="editAccountForm" method="post">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group border-edit_fname">
                            <label for="edit_fname">First Name<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_fname" name="edit_fname" required="">
                            <input type="hidden" class="form-control" id="id" name="id" required="">
                            <small class='error-message' id="error-edit_fname"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group border-edit_mname">
                            <label for="edit_mname">Middle Name<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_mname" name="edit_mname" required="">
                                <small class='error-message' id="error-edit_mname"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group border-edit_lname">
                            <label for="edit_lname">Last Name <span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_lname" name="edit_lname" required="">
                                <small class='error-message' id="error-edit_lname"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group border-edit_email">
                            <label for="edit_email">Email<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_email" name="edit_email" required="">
                                <small class='error-message' id="error-edit_email"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group border-edit_role">
                            <label for="edit_role">Role<span class="text text-danger">*</span></label>
                                <select class="form-control" id="edit_role" name="edit_role">
                                        <option value="">Select One</option>
                                        @foreach($role_edit as $w)
                                        <option value="{{ $w->id }}">{{ $w->title }}</option>
                                        @endforeach
                                </select>
                                <small class='error-message' id="error-edit_role"></small>
                            <input type="hidden" class="form-control" id="edit_job" name="edit_job" required="">
                            <input type="hidden" class="form-control" id="edit_approver" name="edit_approver" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group border-edit_password">
                            <label for="edit_password">New Password <span class="text text-muted">-- Optional</span></label>
                                <input type="edit_password" class="form-control" id="edit_password" name="edit_password" required="">
                                <small class='error-message' id="error-edit_password"></small>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fa fa-times fa-w-20"></i> Close</button>
          <button class="btn btn-outline-success btn-sm ladda-button basic-ladda-button" ><i class="fa fa-save fa-w-20"></i> Update</button>
        </div>
            </form>
        </div>
    </div>
</div>