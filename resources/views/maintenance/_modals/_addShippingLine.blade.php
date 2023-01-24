<div class="modal fade" id="addShippingLineModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Add Check Type</b></small>
         </div>
         <form id="addShippingLineForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Shipping Line <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="shipping_line" name="shipping_line" required="">
                        <small class='error-message' id="error-title"></small>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Address <span class="text text-danger"></span></label>
                        <textarea class="form-control" id="shipping_line_address" name="shipping_line_address"rows="4"></textarea> 
                        <small class='error-message' id="error-title"></small>
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