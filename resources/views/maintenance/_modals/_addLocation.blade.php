<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Add Location/Site/Address</b></small>
         </div>
         <form id="addLocationForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-location">
                        <label for="location">Location/Site/Address <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" name="location" required="" placeholder="e.g. TGY1 - Tagaytay Site 1">
                        <small class='error-message' id="error-location"></small>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-outline-danger  btn-sm" data-dismiss="modal"> <i class="fa fa-times fa-w-20"></i>Close</button>
               <button class="btn btn-outline-success  btn-sm ladda-button basic-ladda-button" > <i class="fa fa-save fa-w-20"></i>Save</button>
            </div>
         </form>
      </div>
   </div>
</div>