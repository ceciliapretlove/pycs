@extends('layouts.app')
@section('content')
@foreach($jo_main as $jo)
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                    Preventive & Corrective Maintenance: Equipment Overview
                    <div class="page-title-subheading">
                        Update & Edit Report
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
            </div>
         </div>
      </div>

        <form id="eWVAzQheYf" method="post">
        <div class="row">
            <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-header bg-info">
                    Preventive & Corrective Diagnostic Report
                </div>
                <div class="card-body">
                
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-equipment_category">
                                       <label for="equipment_category">Diagnostics ID: <span class="text text-muted"> * auto gen</span></label>
                                       <input type="text" class="form-control" readonly="" id="diagnostics_id" name="diagnostics_id" required="" value="{{ $jo->diagnostics_id }}">
                                       <input type="hidden" class="form-control" readonly="" id="id" name="id" required="" value="{{ $jo->id }}">
                                       <small class='error-message' id="error-equipment_category"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-reported_by">
                                       <label for="reported_by">Reported By: <span class="text text-danger"> *</span></label>
                                        <select class="form-control" id="reported_by" name="reported_by" required="">
                                            <option value="">select one</option>
                                            @foreach($reported_by->sortBy('title') as $rb)
                                                <option value="{{ $rb->id }}" {{ ( $rb->id == $jo->reported_by) ? 'selected' : '' }}>[ {{$rb->title}} ] {{ $rb->lname }}, {{ $rb->fname }}</option>
                                            @endforeach
                                        </select>
                                       <small class='error-message' id="error-reported_by"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-location">
                                       <label for="location">Equipment Location: <span class="text text-danger"> *</span></label>
                                        <select class="form-control" id="location" name="location" required="">
                                            <option value="">select one</option>
                                            @foreach($location->sortBy('location') as $loc)
                                                <option value="{{ $loc->id }}" {{ ( $loc->id == $jo->location) ? 'selected' : '' }}>{{ $loc->location }}</option>
                                            @endforeach
                                        </select>
                                       <small class='error-message' id="error-location"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-reported_date">
                                       <label for="reported_date">Reported Date: <span class="text text-danger"> *</span></label>
                                       <input type="date" class="form-control" id="reported_date" name="reported_date" required="" value="{{ $jo->reported_date }}">
                                       <small class='error-message' id="error-reported_date"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_type">
                                       <label for="labor_type">Equipment Location: <span class="text text-danger"> *</span></label>
                                        <select class="form-control" id="labor_type" name="labor_type" required="">
                                            <option value="">select one</option>
                                            <option value="Auto Electrical" {{ ( $jo->labor_type == 'Auto Electrical' ) ? 'selected' : '' }}>Auto Electrical</option>
                                            <option value="Body Repair" {{ ( $jo->labor_type == 'Body Repair' ) ? 'selected' : '' }}>Body Repair</option>
                                            <option value="Machine Shop" {{ ( $jo->labor_type == 'Machine Shop' ) ? 'selected' : '' }}>Machine Shop</option>
                                            <option value="Other Maintenance" {{ ( $jo->labor_type == 'Other Maintenance' ) ? 'selected' : '' }}>Other Maintenance</option>
                                            <option value="Preventive Maintenance" {{ ( $jo->labor_type == 'Preventive Maintenance' ) ? 'selected' : '' }}>Preventive Maintenance</option>
                                            <option value="Tire Shop" {{ ( $jo->labor_type == 'Tire Shop' ) ? 'selected' : '' }}>Tire Shop</option>
                                        </select>
                                       <small class='error-message' id="error-labor_type"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-running_km">
                                       <label for="running_km">Running KM:</label>
                                       <input type="text" class="form-control" id="running_km" name="running_km" readonly="" value="{{ strtoupper($jo->running_km) }}">
                                       <small class='error-message' id="error-running_km"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-running_hr">
                                       <label for="running_hr">Running HR:</label>
                                       <input type="text" class="form-control" id="running_hr" name="running_hr" readonly="" value="{{ strtoupper($jo->running_hr) }}">
                                       <small class='error-message' id="error-running_hr"></small>
                                    </div>
                                </td>
                            </tr>
                           </table>
                        </div><!-- col-12 -->
                    </div><!-- row -->

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-problems_encountered">
                                        <label for="problems_encountered">Problems Encountered: <span class="text text-muted"> optional</span></label>
                                        <textarea class="form-control" id="problems_encountered" name="problems_encountered" type="text" rows="4">{{ $jo->problems_encountered }}</textarea>
                                        <small class='error-message' id="error-problems_encountered"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-inspected_by">
                                        <label for="inspected_by">Inspected By: <span class="text text-muted"> optional</span></label>
                                        <select class="form-control" id="inspected_by" name="inspected_by">
                                            <option value="">select one</option>
                                            @foreach($inspected_by->sortBy('title') as $ib)
                                                <option value="{{ $ib->id }}" {{ ( $ib->id == $jo->inspected_by) ? 'selected' : '' }}>[ {{$ib->title}} ] {{ $ib->lname }}, {{ $ib->fname }}</option>
                                            @endforeach
                                        </select>
                                        <small class='error-message' id="error-inspected_by"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-details_of_work_done">
                                        <label for="details_of_work_done">Details Work Done: <span class="text text-muted"> optional</span></label>
                                        <textarea class="form-control" id="details_of_work_done" name="details_of_work_done" type="text" rows="4">{{ $jo->details_of_work_done }}</textarea>
                                        <small class='error-message' id="error-details_of_work_done"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-conducted_by">
                                        <label for="conducted_by">Conducted By: <span class="text text-muted"> optional</span></label>
                                        <select class="form-control" id="conducted_by" name="conducted_by">
                                            <option value="">select one</option>
                                            @foreach($conducted_by->sortBy('title') as $cb)
                                                <option value="{{ $cb->id }}" {{ ( $cb->id == $jo->conducted_by) ? 'selected' : '' }}>[ {{$cb->title}} ] {{ $cb->lname }}, {{ $cb->fname }}</option>
                                            @endforeach
                                        </select>
                                        <small class='error-message' id="error-conducted_by"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row border-bottom">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_date_started">
                                        <label for="labor_date_started">Date Started: <span class="text text-muted"> optional</span></label>
                                        <input type="date" class="form-control" id="labor_date_started" name="labor_date_started" value="{{ $jo->labor_date_started }}">
                                        <small class='error-message' id="error-labor_date_started"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_time_started">
                                        <label for="labor_time_started">Time Started: <span class="text text-muted"> optional</span></label>
                                        <input type="time" class="form-control" id="labor_time_started" name="labor_time_started" value="{{ $jo->labor_time_started }}">
                                        <small class='error-message' id="error-labor_time_started"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_date_completed">
                                        <label for="labor_date_completed">Date Completed: <span class="text text-muted"> optional</span></label>
                                        <input type="date" class="form-control" id="labor_date_completed" name="labor_date_completed" value="{{ $jo->labor_date_completed }}">
                                        <small class='error-message' id="error-labor_date_completed"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_time_completed">
                                        <label for="labor_time_completed">Time Completed: <span class="text text-muted"> optional</span></label>
                                        <input type="time" class="form-control" id="labor_time_completed" name="labor_time_completed" value="{{ $jo->labor_time_completed }}">
                                        <small class='error-message' id="error-labor_time_completed"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <small class="text-left text-muted mt-2">MATERIAL/SPARE PART REQUIREMENT</small>
                            <a class="btn btn-custom btn-success text-white addItem" data-toggle="modal" data-target="#addItemRowModal">Add Item</a>
                            <table class="table table-bordered text-center mt-1">
                                <thead class="thead-light">
                                    <th>Spare Part / Material</th>
                                    <th width="10%">Qty</th>
                                    <th width="10%">Unit</th>
                                    <th>Reference No.</th>
                                    <th>Amount</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($jo_secondary as $jos)
                                    <tr class="text-center" id="row_{{ $jos->id }}">
                                        <td>
                                            {{ $jos->brand }} - {{ $jos->item_name }}
                                        </td>
                                        <td>
                                            {{$jos->qty }}
                                        </td>
                                        <td>
                                            {{ $jos->unit }}
                                        </td>
                                        <td>
                                            {{$jos->information_id }}
                                        </td>
                                        <td>
                                            {{ $jos->purchased_price }}
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-custom removePresetItemRow text-white" id="{{ $jos->id }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="newItemAttachedFromModal">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4">
                            <small class="text-left text-muted">TRIAL RUN/TURN-OVER</small>
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-trial_personnel">
                                        <label for="trial_personnel">Maintenance Personnel: <span class="text text-muted"> optional</span></label>
                                        <select class="form-control" id="trial_personnel" name="trial_personnel">
                                            <option value="">select one</option>
                                            @foreach($trial_personnel_by->sortBy('title') as $tp)
                                                <option value="{{ $tp->id }}" {{ ( $tp->id == $jo->trial_personnel) ? 'selected' : '' }}>[ {{$tp->title}} ] {{ $tp->lname }}, {{ $tp->fname }}</option>
                                            @endforeach
                                        </select>
                                        <small class='error-message' id="error-trial_personnel"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-trial_at">
                                        <label for="trial_at">Time Completed: </label>
                                        <?php $date = date("Y-m-d\TH:i:s", strtotime($jo->trial_at)); ?>
                                        <input type="datetime-local" class="form-control" id="trial_at" name="trial_at" value="<?php echo $date; ?>">
                                        <small class='error-message' id="error-trial_at"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <small class="text-left text-muted">&nbsp;</small>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pb-0 pt-0">
                                        <div class="form-group border-trial_result">
                                            <label for="trial_result">Results: </label>
                                            <textarea class="form-control" id="trial_result" name="trial_result" type="text" rows="4">{{ $jo->trial_result }}</textarea>
                                            <small class='error-message' id="error-trial_result"></small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div><!-- card body -->
                <div class="card-footer new-footer">
                    <a href="/joborder" class="btn btn-danger">Back to list</a>
                    <button type="submit" class="btn btn-outline-success btn-sm ladda-button basic-ladda-button text-right" id="submitBtn"><i class="fa fa-save fa-w-20"></i> Update Report</button>
                </div>
            </div><!-- maincard -->
            </div><!-- col-12 -->
        </div><!-- row -->
        </form>

   </div>
</div>
</div>
@endforeach
@include('pms._modals._addItem')
<script type="text/javascript" src="{{ URL::asset('/js/_jobo/job.js') }}"></script>
@endsection