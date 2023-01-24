<div class="modal fade" id="addPortModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <small><b>Add Port</b></small>
            </div>
            <form id="addPortForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             
                  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group border-email">
                            <label for="Port">Port<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="port" name="port" required="">
                                <small class='error-message' id="error-email"></small>
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