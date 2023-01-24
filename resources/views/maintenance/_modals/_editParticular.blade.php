<div class="modal" id="editParticularModal" tabindex="-1" Particular="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg" Particular="document">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Edit Particular</b></small>
         </div>
         <form  action="/editParticular" id="editParticularForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Code<span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_code" name="edit_code" required="">
                        <small class='error-message' id="error-title"></small>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Description <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_particular" name="edit_particular" required="">
                        <input type="hidden" name="id" id="id">
                        <small class='error-message' id="error-title"></small>
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