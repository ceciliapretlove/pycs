<div class="modal fade" id="addWarehouseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Add Warehouse Inventory</b></small>
      </div>
      <form id="addWarehouseForm" method="post">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-item">
                      <label for="item">Item ID <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="item" name="item" required="" readonly="">
                      <small class='error-message' id="error-item"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-serial">
                      <label for="serial">Serial ID <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="serial" name="serial" required="">
                      <small class='error-message' id="error-serial"></small>
                  </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-item_name">
                      <label for="item_name">Item Name <span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="item_name" name="item_name" required="">
                      <small class='error-message' id="error-item_name"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-brand">
                      <label for="brand">Brand </label>
                      <input type="text" class="form-control" id="brand" name="brand">
                      <small class='error-message' id="error-brand"></small>
                  </div>
                </div>
             </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group border-condition">
                      <label for="condition">Condition<span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="condition" name="condition">
                      <small class='error-message' id="error-condition"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group border-location">
                      <label for="location">Warehouse/Site/Location<span class="text text-danger">*</span></label>
                        <select class="form-control" id="location" name="location">
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
                  <div class="form-group border-qty">
                      <label for="qty">Qty<span class="text text-danger">*</span></label>
                      <input type="number" min="1" class="form-control" id="qty" name="qty" required="">
                      <small class='error-message' id="error-qty"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-unit">
                      <label for="unit">Unit<span class="text text-danger">*</span></label>
                      <input type="text" class="form-control" id="unit" name="unit" required="">
                      <small class='error-message' id="error-unit"></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group border-purchased_price">
                      <label for="purchased_price">Purchase price<span class="text text-danger">*</span></label>
                      <input type="number" class="form-control" id="purchased_price" name="purchased_price" required="">
                      <small class='error-message' id="error-purchased_price"></small>
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