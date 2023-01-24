<div class="modal fade" id="addPMSModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <small><b>Add PMS Type</b></small>
      </div>
      <form id="addPMSTypeForm" method="post">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="pms_main_var">PMS Type<span class="text text-danger">*</span></label>
                    <select class="form-control" id="pms_main_var" name="pms_main_var">
                      <option >Please select</option>
                      @foreach($pms_var as $pv)
                        <option value="{{ $pv->id }}">{{ $pv->pms_main }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                  <div id="pms_milestone" class="form-group">
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