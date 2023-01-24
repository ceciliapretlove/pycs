@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-note icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                  Liquidation Form
                  <div class="page-title-subheading">View Liquidation.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <form method="POST" id="viewLiquidationForm">
         {{ csrf_field() }}
         {{ method_field('post') }}
         <div class="row">
            <div class="col-lg-12">
               <div class="main-card mb-3 card shadow">
                  <div class="card-header new-footer">
                     <span>Primary Details</span>
                  </div>
           {{--       {{dd($fetch_liquidation)}} --}}
                  @foreach($fetch_liquidation as $fl)

                  <input type="hidden" id="id" name="id" value="{{ $id }}" required="" readonly="">
                  <input type="hidden" id="liquidation_num" name="liquidation_num" value="{{ $fl->liquidation_num }}" required="" readonly="">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-bol">
                                       <label for="pro_num">PRO Number : </label>
                          
                                       <input type="text" class="form-control" readonly value="{{ $fl->pro_number }}">
                     
                                       <small class='error-message' id="error-bol"></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="consignee">Consignee : </label>
                                  
                                       <input type="text" class="form-control" readonly value="{{ $fl->consignee }}">
                                 
                                       <small class='error-message' id="error-consignee"></small>
                                    </div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-place_of_receipt">
                                       <label for="place_of_receipt">B/L No.</label>
                                
                                       <input type="text" class="form-control" readonly value="{{ $fl->bl_number }}">
                                 
                                       <small class='error-message' id="error-por"></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group border-eata_pod">
                                       <label for="CNTR">CNTR No.</label>
                                       {{-- <input type="text" class="form-control" readonly value=" --}}
                                       @foreach($fl->cntr as $row)
                               
                                       <input type="text" class="form-control" readonly value="{{ $row->container_number }}">
                                        @endforeach
                                       <small class='error-message' id="error-eata_pod"></small>
                                    </div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-eata_pod">
                                       <label for="date">Date : </label>
                                       <input type="text" class="form-control" readonly value="{{ date('M d, Y', strtotime($fl->created_at))}} ">
                                       <small class='error-message' id="error-eata_pod"></small>
                                    </div>
                                 </td>
                              </tr>
                                                            
                           </table>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <div class="col-md-12">
                           <table id="particularTable" class="table table-bordered">
                           <table id="particularTable" class="table table-bordered text-center mt-1">
                              <thead class="thead-light">
                                 <tr>
                                    <th class="font-weight-bold" width="50%">Particulars</th>
                                    <th class="font-weight-bold" width="25%">OR No.</th>
                                    <th class="font-weight-bold" width="25%">Amount</th>
                                 </tr>
                              </thead>
                              <tbody>
                               
                                    @foreach($fl->liquidation_particulars as $liquidation_particulars)
                               
                                       <tr class="text-center">
                                          @if($liquidation_particulars->particular_id == 26)
                                             <td class="text-center font-weight-bold">{{$liquidation_particulars->other}}</td>
                                              @else
                                              <td class="text-center font-weight-bold"> {{$liquidation_particulars->particular}}
                                              </td>

                                             @endif
                                         
                                          <td>
                                             {{ $liquidation_particulars->or_num ?? 0 }}
                                          </td>
                                          <td class="text-center">
                                     
                                              {{  number_format($liquidation_particulars->amount, 2) }}
                                              @if($liquidation_particulars->paid == 1)
                                              <br>
                                               <small class="font-weight-bold">( Paid By Client )</small>
                                              @else
                                              @endif
                                
                                          </td>
                                       </tr>
                                    @endforeach 
  
                                 <tr >   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Cash Advance :</td>
                                    <td><input type="text" id="cash_advance" name="cash_advance" class="form-control text-right" readonly value="{{ number_format($fl->car, 2) }}"></td>
                                    
                                 </tr>
                                 <tr>   
                               
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Expenses :</td>
                                       <td><input type="text"  id="expenses" name="expenses" class="form-control text-right" readonly value="{{ number_format($fl->expenses != null ? $fl->expenses :  0, 2) }}"></td>
                  

                                 </tr>
                                                                   <tr>   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Return :</td>
                                       <td><input type="text" id="cash_return" name="cash_return" class="form-control text-right"  readonly></td>
                                 </tr>
                                                                   <tr>   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Refund :</td>
                                       <td><input type="text" id="cash_refund"  name="cash_refund" class="form-control text-right"  readonly></td>
                               
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- row -->
                  </div>
                  <!-- card body -->
                  @endforeach
                  <div class="card-footer new-footer">
                     <a href="/liquidation" class="btn btn-danger">Back to list</a>
                     <a href="/liquidation/pdf{{$id}}" class="btn btn-outline-success btn-sm ladda-button basic-ladda-button text-right"><i class="fa fa-save fa-w-20"></i> Print </a>
      
                  </div>
               </div>
               <!-- main card -->
            </div>
            <!-- col12 -->
         </div>
         <!-- row -->
      </form>

   </div>
</div>
</div>
<script type="text/javascript" src="{{ URL::asset('/js/_liquidation/viewLiquidation.js') }}"></script>
@endsection