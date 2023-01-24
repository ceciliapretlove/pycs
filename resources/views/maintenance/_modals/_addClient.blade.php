<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Add Client</b></small>
         </div>
         <form id="addClientForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Code<span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" required="">
                        <small class='error-message' id="error-title"></small>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-title">
                        <label for="title">Description <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required="">
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