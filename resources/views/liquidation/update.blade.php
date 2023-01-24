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
                  <div class="page-title-subheading">Update Liquidation.
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
                  {{dd($fetch_liquidation)}}
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
                                       <input type="text" class="form-control" readonly value="{{ $fl->cntr_num }}">
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
                                       <input type="text" class="form-control" readonly value="{{ date('M d, Y', strtotime($fl->created_at)) }}">
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
                           <table id="particularTable" class="table table-bordered text-center mt-1">
                              <thead class="thead-light">
                                 <tr>
                                    <th class="font-weight-bold" width="50%">Particulars</th>
                                    <th class="font-weight-bold" width="25%">OR No.</th>
                                    <th class="font-weight-bold" width="25%">Amount</th>
                                    <th class="font-weight-bold"><b>Paid</b></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php
                                 $filtered_particular = $fetch_particular->where('liq_pro_num',$fl->id);
                                 @endphp
                                 @foreach($filtered_particular as $row)
                                    @php
                                       $all_particulars =   $row->cash_advance
                                       ->merge($row->check_voucher);
                                    @endphp

                                 @foreach($all_particulars as $all_particular)
                                    <tr class="text-center">
                                       @if($all_particular->particular_id == 26)
                                       <td class="text-center font-weight-bold">{{$all_particular->other}}</td>
                                       @else
                                       <td>
                                        <input type="text" class="form-control particular_type text-center font-weight-bold" id="particular_type" name="particular_type[]" value="{{$all_particular->particular_name}}" readonly>
                                       
                                        </td>    
                                       @endif
                                       <td>
                                          <input type="text" class="form-control or_num" id="or_num" name="or_num[]" data-decimal="2" value="{{$all_particular->or_num ?? 0}}" readonly>
                                       </td>
                                       <td class="text-center">
                                          <input type="text" class="form-control amount text-center font-weight-bold" id="amount" name="amount[]" onkeyup="calculateAll()" data-decimal="2" value="{{$all_particular->amount}}" readonly>
                                         
                                       </td>
                                       <td>
                                       <input type="checkbox" class="form-check-input" id="paid" name="paid[]" onchange="isPaid(this)">
                                       <input type="hidden" class="form-check-input" id="paid2" name="paid2[]" value="false">
                                    </td>
                                    </tr>

                                  

                                 @endforeach


                                 @endforeach
                                  <tr >   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Cash Advance :</td>
                                    <td><input type="text" id="cash_advance" name="cash_advance" class="form-control text-right" readonly value="{{$fl->cash_advance}}"></td>
                                    
                                 </tr>
                                 <tr>   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Expenses :</td>
                                       <td><input type="text"  id="expenses" name="expenses" class="form-control text-right" readonly value="{{$fl->expenses}}"></td>
                                 </tr>
                                                                   <tr>   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Return :</td>
                                       <td><input type="text" id="cash_return" name="cash_return" class="form-control text-right"   readonly value="{{$fl->cash_return}}"></td>
                                 </tr>
                                                                   <tr>   
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Refund :</td>
                                       <td><input type="text" id="cash_refund"  name="cash_refund" class="form-control text-right"  readonly value="{{$fl->cash_refund}}"></td>
                               
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
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('/js/_liquidation/viewLiquidation.js') }}"></script>
<script type="text/javascript">
$(function() {
    $("#other").hide();
});



 var path = "{{ url('liquidation/action')}}";
    $('input.typeaheadPRONum').typeahead({

         displayText: function(query) {
         return query.pro_number
        },
         source:  function (query, process) {
          return $.get(path, { query: query }, function (data) {
              return process(data);
          });
        },
        afterSelect: function(item) {
           
             $("#pro_number").val(item.pro_number);
             $("#bl_id").val(item.bolm_id);
             $("#consignee").val(item.consignee);
             $("#bl_number").val(item.bl_number);
             // $("#total_cash_advance").val(item.cash_advance);
             $("#cntr_num").val( item.bolc.map(e => e.container_number ).join(', '));
            
            if(item.check_voucher.length > 1) $('.particularRow').remove()

            $("#particularTable tbody").html('')
            
            let particulars = item.check_voucher.concat( item.cash_advance) 
         
            particulars.map(( e , index) => {
               addRowUnedited(index)

               $("#particularTable tbody tr").each(function (index2) {
                  let element = $("#particularTable tbody tr").eq(index)
                  let keys = Object.keys(e)
                  filteredKeys = keys.map( key => ['cashadvance_id','check_voucher_id'].includes(key) ? key : null ).filter( key => key)
                  element.attr('index',filteredKeys+'-'+e.id)

                  let getParticularType = ['cashadvance_id', 'check_voucher_id'];
                  let filteredParticularType = (Object.keys(e)).map( type => getParticularType.includes(type) ? type : null).find( type => type)

                  element.find('td:eq(0) select[id=particular_code]').val(e.particular)
                  element.find('td:eq(0) input[id=particular_code2]').val(e.particular)
                  element.find('td:eq(0) input[id=particular_type]').val(filteredParticularType)
                  element.find('td:eq(0) input[id=particular_type_id]').val(e[filteredParticularType])

                  element.find('td:eq(1) input[id=or_num]').val()
                  element.find('td:eq(2) input[id=amount]').attr('defaultValue',e.amount)

                  if(e.paid){
                     element.find('td:eq(2) input[id=amount]').val(0)
                  }else{
                     element.find('td:eq(2) input[id=amount]').val(e.amount)
                  }
                  
                  element.find('td:eq(3) input[id=paid]').prop('checked',Boolean(e.paid))
                  element.find('td:eq(3) input[id=paid2]').val(Boolean(e.paid))

                  element.find('td:eq(3) input[id=paid]').attr('parentId',filteredKeys+'-'+e.id)
               });
            })
            calculateAll()
         }
    });


   $('input[name="total_cash_advance"]').keyup(() => {
      calculateAll()
   })

   function isPaid(event){
      let element     = $(event.parentNode.parentNode)
      let isChecked = $(event).prop('checked')
      let amountDefault = element.find('td:eq(2) input[id=amount]').attr('defaultValue')
      let elementClass    = element.attr('class')

            // console.log(elementClass)
      amountDefault = amountDefault ? amountDefault : 0 

      element.find('td:eq(3) input[id=paid2]').val(isChecked)
      if(isChecked)
      {

         element.find('td:eq(2) input[id=amount]').val(0)
         element.find('td:eq(2) input[id=amount]').attr('readonly',true)


         if(elementClass == 'particularRowUnedited'){
            element.find('td:eq(2) input[id=amount]').attr('readonly',true)
         }
         
      }else{
         element.find('td:eq(2) input[id=amount]').val(amountDefault)
         
         if(elementClass == 'particularRowUnedited'){
            element.find('td:eq(2) input[id=amount]').attr('readonly',true)
         }else{
            element.find('td:eq(2) input[id=amount]').attr('readonly',false)
         }
      }     
      calculateAll()
   }
   // function getParticularID(event)
   // {
   //    let element     = $(event.parentNode.parentNode)
   //    element.find('td:eq(0) input[id=particular_code2]').val($(event).val())

   //    if (element.value == 26) {
   //      $("#other").show();
   //     } 
   //    else {
   //         $("#other").hide();
   //     }
   // }


    // }

</script>
@stop
@endsection