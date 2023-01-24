<div class="modal fade" id="addEquipmentCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Add Equipment Category</b></small>
      </div>
      <form id="addEquipmentCategoryForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                  <div class="form-group border-type">
                      <label for="type">Category <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="type" name="type" required="">
                      <small class='error-message' id="error-type"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-plate_number">
                    <label for="plate_number">Plate Number <span class="text text-danger">*</span></label>
                        <select class="form-control" id="plate_number" name="plate_number" required="">
                            <option value="">Select One</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                      <small class='error-message' id="error-plate_number"></small>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-info btn-circle btn-sm" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-success btn-circle btn-sm ladda-button basic-ladda-button" >Save</button>
        </div>
      </form>
    </div>
  </div>
</div>