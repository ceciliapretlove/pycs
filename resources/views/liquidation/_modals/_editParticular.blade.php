<div class="modal fade" id="editParticularModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Add Check Type</b></small>
         </div>
         <form id="editParticularForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Tax Particular <span class="text text-danger">*</span></label>
                        <select class="form-control" id="edit_particular" name="edit_particular">
                            <option value="">Select One</option>
                        @foreach($particular as $particular)
                            <option value="{{ $particular->id }}">[ {{ $particular->code }} ] - {{ ucwords($particular->particular) }}</option>
                        @endforeach
                        </select>
                        <input type="hidden" name="id" id="id">
                        <small class='error-message' id="error-title"></small>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">OR Number <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_or_number" name="edit_or_number">
                        <small class='error-message' id="error-title"></small>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Amount <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_amount" name="edit_amount" required="">
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