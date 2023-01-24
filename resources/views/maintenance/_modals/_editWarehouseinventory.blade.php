<div class="modal fade" id="editWarehouseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Add Warehouse Inventory</b></small>
      </div>
      <form id="editWarehouseForm" method="post">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-edit_item">
                      <label for="edit_item">Item ID <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_item" name="edit_item" required="" readonly="">
                      <input type="hidden" class="form-control" id="id" name="id" required="" readonly="">
                      <small class='error-message' id="error-edit_item"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-edit_serial">
                      <label for="edit_serial">Serial ID <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_serial" name="edit_serial" required="">
                      <small class='error-message' id="error-edit_serial"></small>
                  </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-edit_item_name">
                      <label for="edit_item_name">Item Name <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_item_name" name="edit_item_name" required="">
                      <small class='error-message' id="error-edit_item_name"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-edit_brand">
                      <label for="edit_brand">Brand </label>
                      <input type="text" class="form-control" id="edit_brand" name="edit_brand">
                      <small class='error-message' id="error-edit_brand"></small>
                  </div>
                </div>
             </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-edit_condition">
                      <label for="edit_condition">Condition<span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_condition" name="edit_condition">
                      <small class='error-message' id="error-edit_condition"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-edit_location">
                      <label for="edit_location">Warehouse/Site/Location<span class="text text-danger">*</span></label>
                        <select class="form-control" id="edit_location" name="edit_location">
                            <option value="">Select One</option>
                        @foreach($location as $location)
                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                        </select>
                  </div>
                </div>
              </div>

               <div class="row">
                <div class="col-md-4">
                  <div class="form-group border-edit_qty">
                      <label for="edit_qty">Qty<span class="text text-danger">*</span></label>
                      <input type="number" min="1" class="form-control" id="edit_qty" name="edit_qty" required="">
                      <small class='error-message' id="error-edit_qty"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-edit_unit">
                      <label for="edit_unit">Unit<span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="edit_unit" name="edit_unit" required="">
                      <small class='error-message' id="error-edit_unit"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-edit_purchased_price">
                      <label for="edit_purchased_price">Purchase price<span class="text text-danger">*</span></label>
                      <input type="number" class="form-control" id="edit_purchased_price" name="edit_purchased_price" required="">
                      <small class='error-message' id="error-edit_purchased_price"></small>
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