<div class="modal fade" id="editEquipmentCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Edit Equipment Category</b></small>
      </div>
      <form   action="/editEquipmentCategory" id="editEquipmentCategoryForm" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                  <div class="form-group border-edit_type">
                      <label for="edit_type">Category <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_type" name="edit_type" required="">
                      <input type="hidden" class="form-control" id="id" name="id" required="">
                      <small class='error-message' id="error-edit_type"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-edit_plate_number">
                    <label for="edit_plate_number">Plate Number <span class="text text-danger">*</span></label>
                        <select class="form-control" id="edit_plate_number" name="edit_plate_number" required="">
                            <option value="">Select One</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                      <small class='error-message' id="error-edit_plate_number"></small>
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