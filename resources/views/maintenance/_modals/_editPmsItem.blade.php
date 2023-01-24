<div class="modal fade" id="editPMSItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Edit Preset Item</b></small>
         </div>
         <form id="editPMSItemForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">

               <div class="row">
                  <div class="col-md-7">
                     <div class="form-group">
                        <label for="pms_type">Warehouse Item</label>
                        <input type="hidden" class="form-control" id="id" name="id" required="">
                        <select class="form-control" id="edit_warehouse_item" name="warehouse_item">
                      <option value="">Select One</option>
                          @foreach($warehouse as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->item_name }}</option>
                            @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" required="">
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks">
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