<div class="modal fade" id="addEquipmentTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Add Equipment Type</b></small>
      </div>
      <form id="addEquipmentTypeForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group border-equipment_category">
                      <label for="equipment_category">Equipment Category <span class="text text-danger">*</span></label>
                      <select class="form-control" id="equipment_category" name="equipment_category" required="">
                          <option value="">Select One</option>
                          @foreach($equipmentCategory as $ec)
                          <option value="{{ $ec->id }}">{{ $ec->type }}</option>
                          @endforeach
                      </select>
                      <small class='error-message' id="error-equipment_category"></small>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group border-equipment_type">
                    <label for="equipment_type">Equipment Type <span class="text text-danger">*</span></label>
                    <input type="text" class="form-control" id="equipment_type" name="equipment_type" required="">
                    <small class='error-message' id="error-equipment_type"></small>
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