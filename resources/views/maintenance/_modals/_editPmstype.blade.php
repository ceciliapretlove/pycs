<div class="modal fade" id="editPMSModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Edit PMS Type</b></small>
      </div>
      <form   action="/editPmsType" id="editPMSTypeForm" method="post">
        {{ csrf_field() }}
        {{ method_field('post') }}
          <div class="modal-body">
            <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="pms_type">PMS Type</label>
                    <input type="hidden" name="id" id="id">
                    <select class="form-control" id="pms_type" name="pms_type">
                      <option >Please select</option>
                      <option value="Per KM">Per KM</option>
                      <option value="Per Hour">Per Hour</option>
                      <option value="Defined Date">Defined Date</option>
                      <option value="Odometer">Odometer</option>
                    </select>
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