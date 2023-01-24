<div class="modal fade" id="editEquipmentTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Edit Equipment Type</b></small>
      </div>
      <form id="editEquipmentTypeForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group border-edit_equipment_category">
                      <label for="edit_equipment_category">Equipment Category <span class="text text-danger">*</span></label>
                      <select class="form-control" id="edit_equipment_category" name="edit_equipment_category" required="">
                          <option value="">Select One</option>
                          @foreach($equipmentCategory as $ec)
                          <option value="{{ $ec->id }}">{{ $ec->type }}</option>
                          @endforeach
                      </select>
                      <small class='error-message' id="error-edit_equipment_category"></small>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group border-edit_equipment_type">
                    <label for="edit_equipment_type">Equipment Type <span class="text text-danger">*</span></label>
                    <input type="text" class="form-control" id="edit_equipment_type" name="edit_equipment_type" required="">
                    <input type="hidden" class="form-control" id="id" name="id" required="">
                    <small class='error-message' id="error-equipment_type"></small>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group border-edit_status">
                      <label for="edit_status">Status<span class="text text-danger">*</span></label>
                      <select class="form-control" id="edit_status" name="edit_status" required="">
                          <option value="0">Active</option>
                          <option value="1">Deactivated</option>
                      </select>
                      <small class='error-message' id="error-edit_status"></small>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-info btn-circle btn-sm" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-success btn-circle btn-sm ladda-button basic-ladda-button" >Update</button>
        </div>
      </form>
    </div>
  </div>
</div>