<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <small><b>Add Account</b></small>
            </div>
            <form id="addAccountForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group border-fname">
                            <label for="fname">First Name<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" id="fname" name="fname" required="">
                            <small class='error-message' id="error-fname"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group border-mname">
                            <label for="mname">Middle Name<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="mname" name="mname" required="">
                                <small class='error-message' id="error-mname"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group border-lname">
                            <label for="lname">Last Name <span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="lname" name="lname" required="">
                                <small class='error-message' id="error-lname"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group border-email">
                            <label for="email">Email<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" required="">
                                <small class='error-message' id="error-email"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group border-role">
                            <label for="role">Role<span class="text text-danger">*</span></label>
                                <select class="form-control" id="role" name="role">
                                    <option value="">Please select</option>
                                    @foreach($role as $x)
                                    <option value=" {{ $x->id }}"> {{ $x->title }}</option>
                                    @endforeach
                                </select>
                                <small class='error-message' id="error-role"></small>
                                <input type="hidden" class="form-control" id="job" name="job" required="">
                                <input type="hidden" class="form-control" id="approver" name="approver" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group border-password">
                            <label for="password">Desired Password <span class="text text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required="">
                                <small class='error-message' id="error-password"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fa fa-times fa-w-20"></i> Close</button>
                <button class="btn btn-outline-success btn-sm ladda-button basic-ladda-button" ><i class="fa fa-save fa-w-20"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>