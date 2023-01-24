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

        <div class="row">
            <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-header bg-info">
                    Job Order & Diagnostics Report
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pb-0 pt-0">
                                        <div class="form-group border-equipment_category">
                                           <label for="equipment_category">Diagnostics ID:</label>
                                           <input type="text" class="form-control" readonly="" id="diagnostics_id" name="diagnostics_id" required="" value="{{ $jo->diagnostics_id }}">
                                           <small class='error-message' id="error-equipment_category"></small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pb-0 pt-0">
                                        <div class="form-group border-reported_date">
                                           <label for="reported_date">Reported Date: </label>
                                           <input type="date" class="form-control text-right" readonly="" value="{{ $jo->reported_date }}">
                                           <small class='error-message' id="error-reported_date"></small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-equipment_category">
                                       <label for="equipment_category">Category/Type:</label>
                                       <input type="text" class="form-control" readonly="" id="equipment_category" name="equipment_category" required="" value="{{ $jo->equipment_category }} ( {{ $jo->equipment_type }} )">
                                       <small class='error-message' id="error-equipment_category"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-equipment_id">
                                       <label for="equipment_id">Equip ID:</label>
                                       <input type="text" class="form-control" readonly="" value="{{ $jo->equipment_id }}">
                                       <small class='error-message' id="error-equipment_id"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-brand_model">
                                       <label for="brand_model">Brand(Model):</label>
                                       <input type="text" class="form-control" readonly="" value="{{ $jo->brand }} ( {{ $jo->model }} )">
                                       <small class='error-message' id="error-brand_model"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-plate_no">
                                       <label for="plate_no">Plate(Chassis):</label>
                                       <input type="text" class="form-control" readonly="" id="plate_no" name="plate_no" required="" value="{{ $jo->plate_number }} ( {{ $jo->chassis_number }} )">
                                       <small class='error-message' id="error-plate_no"></small>
                                    </div>
                                </td>
                                
                                
                            </tr>
                            </table>
                            <table class="table table-borderless">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-reported_by">
                                       <label for="reported_by">Reported By: </label>
                                       <input type="text" class="form-control" readonly="" value="{{ $jo->reported_lname }}, {{ $jo->reported_fname }}">
                                       <small class='error-message' id="error-reported_by"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-location">
                                       <label for="location">Equipment Location: </label>
                                        <input type="text" class="form-control" readonly="" value="{{ $jo->location }}">
                                       <small class='error-message' id="error-location"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_type">
                                       <label for="labor_type">Labor Type:</label>
                                       <input type="text" class="form-control" readonly="" value="{{ $jo->labor_type }}">
                                       <small class='error-message' id="error-labor_type"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-running_km">
                                       <label for="running_km">Running KM:</label>
                                       <input type="text" class="form-control" readonly="" value="{{ strtoupper($jo->running_km) }}">
                                       <small class='error-message' id="error-running_km"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-running_hr">
                                       <label for="running_hr">Running HR:</label>
                                       <input type="text" class="form-control" readonly="" value="{{ strtoupper($jo->running_hr) }}">
                                       <small class='error-message' id="error-running_hr"></small>
                                    </div>
                                </td>
                            </tr>
                           </table>
                        </div><!-- col-12 -->
                    </div><!-- row -->

                    <div class="row border-top pt-2">
                        <div class="col-md-6">
                            <table class="table table-borderless border-right">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-problems_encountered">
                                        <label for="problems_encountered">Problems Encountered: </label>
                                        <textarea class="form-control" id="viewTextarea" type="text" rows="4" readonly="">{{ $jo->problems_encountered }}</textarea>
                                        <small class='error-message' id="error-problems_encountered"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-inspected_by">
                                        <label for="inspected_by">Inspected By: </label>
                                        <input type="text" class="form-control" readonly="" value="{{ $jo->inspected_lname }}, {{ $jo->inspected_fname }}">
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
                                        <label for="details_of_work_done">Details Work Done:</label>
                                        <textarea class="form-control" id="viewTextarea" type="text" rows="4" readonly="">{{ $jo->details_of_work_done }}</textarea>
                                        <small class='error-message' id="error-details_of_work_done"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-conducted_by">
                                        <label for="conducted_by">Conducted By:</label>
                                        <input type="text" class="form-control" readonly="" value="{{ $jo->conducted_lname }}, {{ $jo->conducted_fname }}">
                                        <small class='error-message' id="error-conducted_by"></small>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row border-bottom">
                        <div class="col-md-6">
                            <table class="table table-borderless border-right">
                            <tr>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_date_started">
                                        <label for="labor_date_started">Date Started: </label>
                                        <input type="date" class="form-control" readonly="" value="{{ $jo->labor_date_started }}">
                                        <small class='error-message' id="error-labor_date_started"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_time_started">
                                        <label for="labor_time_started">Time Started: </label>
                                        <input type="time" class="form-control" readonly="" value="{{ $jo->labor_time_started }}">
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
                                        <label for="labor_date_completed">Date Completed:</label>
                                        <input type="date" class="form-control" readonly="" value="{{ $jo->labor_date_completed }}">
                                        <small class='error-message' id="error-labor_date_completed"></small>
                                    </div>
                                </td>
                                <td class="pb-0 pt-0">
                                    <div class="form-group border-labor_time_completed">
                                        <label for="labor_time_completed">Time Completed:</label>
                                        <input type="time" class="form-control"readonly="" value="{{ $jo->labor_time_completed }}">
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
                            <table class="table table-bordered text-center mt-1">
                                <thead class="thead-light">
                                    <th>Spare Part / Material</th>
                                    <th width="10%">Qty</th>
                                    <th width="10%">Unit</th>
                                    <th>Reference No.</th>
                                    <th>Amount</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <small class="text-left text-muted">TRIAL RUN/TURN-OVER</small>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pb-0 pt-0">
                                        <div class="form-group border-trial_result">
                                            <label for="trial_result">Results: </label>
                                            <textarea class="form-control" id="viewTextarea" readonly="" type="text" rows="4">{{ $jo->trial_result }}</textarea>
                                            <small class='error-message' id="error-trial_result"></small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <table class="table table-borderless">
                            <tr>
                                <td>
                                    <div class="form-group mb-0">
                                       <label for="odometer_start">Trial/Personnel:</label>
                                       <small class='error-message'></small>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom text-center">
                                <td>
                                   <b>{{ $jo->trial_personnel_lname }}, {{ $jo->trial_personnel_fname }}</b>
                                   <br>{{ date('M d, Y', strtotime($jo->trial_at)) }} {{ date('H:i:s a', strtotime($jo->trial_at)) }}
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group mb-0">
                                       <label for="odometer_start">Accepted By:</label>
                                       <small class='error-message'></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="border-bottom text-center">
                                 @if($jo->accepted_by == '')
                                    <td>
                                       @if(auth()->user()->approver == 1)
                                          <button id="acceptReportbtn" class="btn btn-warning" data-id="{{ $jo->id }}">Accept Report</button>
                                       @else
                                          <small class="text-muted">for <br>Accepting</small>
                                       @endif
                                    </td>
                                 @else
                                    <td>
                                       <b>{{ $jo->accepted_lname }}, {{ $jo->accepted_fname }}</b>
                                       <br>{{ date('M d, Y', strtotime($jo->accepted_at)) }} {{ date('H:i:s a', strtotime($jo->accepted_at)) }}
                                    </td>
                                 @endif
                              </tr>
                           </table>
                        </div>
                        <div class="col-md-2">
                            <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group mb-0">
                                       <label for="odometer_start">Noted By:</label>
                                       <small class='error-message'></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="border-bottom text-center">
                                 @if($jo->noted_by == '')
                                    <td>
                                       @if(auth()->user()->approver == 1)
                                          @if($jo->accepted_by == '')
                                             <small class="text-muted">pending <br>Accepted status</small>
                                          @else
                                             <button class="btn btn-success" id="noteReportbtn" data-id="{{ $jo->id }}">Note Report</button>
                                          @endif
                                       @else
                                          @if($jo->accepted_by == '')
                                             <small class="text-muted">pending <br>Note status</small>
                                          @else
                                             <small class="text-muted">for <br>Noting</small>
                                          @endif
                                       @endif
                                    </td>
                                 @else
                                    <td>
                                       <b>{{ $jo->noted_lname }}, {{ $jo->noted_fname }}</b>
                                       <br>{{ date('M d, Y', strtotime($jo->noted_at)) }} {{ date('H:i:s a', strtotime($jo->noted_at)) }}
                                    </td>
                                 @endif
                              </tr>
                           </table>
                        </div>
                    </div>

                </div><!-- card body -->
                <div class="card-footer new-footer">
                    <a href="/joborder" class="btn btn-danger">Back to list</a>
                </div>
            </div><!-- maincard -->
            </div><!-- col-12 -->
        </div><!-- row -->

   </div>
</div>
</div>
@endforeach
<script type="text/javascript" src="{{ URL::asset('/js/_jobo/view_job.js') }}"></script>
@endsection