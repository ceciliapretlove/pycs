<div class="modal" id="editRateModal" tabindex="-1" Rate="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-md" Rate="document">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Edit Rate</b></small>
         </div>
         <form action="/editRate" id="editRateForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <div class="row">
               	   <div class="col-md-12">
                     <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="hidden" class="form-control" id="id" name="id" required="">
                   
                        <select class="form-control" id="edit_location" name="edit_location">
                           <option >Please select</option>
                                	@foreach($role_location as $x)
                                    <option value="{{ $x->id }}"> {{ $x->location }}</option>
                                    @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group border-rate">
                        <label for="rate">Rate  <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="rate" name="rate" required="">
                        <small class='error-message' id="error-rate"></small>
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