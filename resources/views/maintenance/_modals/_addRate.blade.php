<div class="modal fade" id="addRateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <small><b>Add Rate</b></small>
            </div>
            <form id="addRateForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             
                  
                <div class="row">
                        <div class="col-md-12">
                        <div class="form-group border-role">
                            <label for="destination">Location / Destination<span class="text text-danger">*</span></label>
                                <select class="form-control" id="destination" name="destination">
                                    <option value="">Please select</option>
                                @foreach($location as $x)
                                    <option value=" {{ $x->id }}"> {{ $x->location }}</option>
                                    @endforeach
                                </select>
                          
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group border-email">
                            <label for="Rate">Rate<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" id="rate" name="rate" required="">
                                <small class='error-message' id="error-email"></small>
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