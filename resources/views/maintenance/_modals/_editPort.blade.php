<div class="modal" id="editPortModal" tabindex="-1" Port="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-md" Port="document">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Edit Port</b></small>
         </div>
         <form action="/editPort" id="editPortForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group border-port">
                        <label for="port">Port  <span class="text text-danger">*</span></label>
                         <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="edit_port" name="edit_port" required="">
                        <small class='error-message' id="error-port"></small>
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