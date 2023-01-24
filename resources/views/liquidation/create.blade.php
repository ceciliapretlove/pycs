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
                  <div class="page-title-subheading">Create and Register Liquidation.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <form method="post" id="createLiquidationForm" autocomplete="off">
         {{ csrf_field() }}
         {{ method_field('post') }}
         <div class="row">
            <div class="col-lg-12">
               <div class="main-card mb-3 card shadow">
                  <div class="card-header new-footer">
                     <span>Primary Details</span>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4">
                           @if(\Session::has('message'))
                           <script type="text/javascript">
                              $( document ).ready(function() {
                                  swal("Error!", "{{ \Session::get('message') }}", "danger");
                              });
                              
                           </script>
                           @endif
                           <span id="message"></span>
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-bol">
                                       <label for="pro_num">PRO Number<span class="text text-danger">*</span><span class="pro_num_error_message font-weight-bold text-danger"></span> <span class="pro_num_success_message font-weight-bold text-success"></span></label>
                                       <input type="text" class="form-control" id="bl_id" name="bl_id" readonly>
                                       <input type="text" class="form-control typeaheadPRONum" id="pro_number" name="pro_number" required="">
                                       <small class='error-message' id="error-bol"></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="processor">Request Type: <span class="text text-danger">*</span></label>
                                       <select class="form-control" id="request_type" name="request_type" required="">
                                          <option value="">Select One</option>
                                          <option value="processing_request">Processing</option>
                                          <option value="shipping_request">Shipping</option>
                                          <option value="cashadvance_request">Cash Advance</option>
                              
                                       </select>
                                    </div>
                                 </td>
                                 {{--                                  
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="consignee">Consignee: <span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="consignee"  name="consignee" readonly>
                                       <small class='error-message' id="error-consignee"></small>
                                    </div>
                                 </td>
                                 --}}
                              </tr>

                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-place_of_receipt">
                                       <label for="place_of_receipt">B/L No.<span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="bl_number" name="bl_number" readonly>
                                       <small class='error-message' id="error-por"></small>
                                    </div>
                                 </td>
                              </tr>
                                                            <tr>
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="processor">Processor: <span class="text text-danger">*</span></label>
                                        <input type="text" class="form-control" id="selected_processor_id" name="selected_processor_id" readonly>
                                       <select class="form-control" id="processor_id" name="processor_id" required="">
                                          <option value="">Select One</option>
                                          @foreach($user as $u)
                                          <option value="{{ $u->id }}">{{ $u->fname }} {{ $u->lname }}</option>

                                          @endforeach

                                       </select>
                                    </div>
                                 </td>
                                 {{--                                  
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="consignee">Consignee: <span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="consignee"  name="consignee" readonly>
                                       <small class='error-message' id="error-consignee"></small>
                                    </div>
                                 </td>
                                 --}}
                              </tr>
                              <tr class="releasedCATR" style="visibility: hidden;">
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="releasedCA">Released Cash Advance: <span class="text text-danger">*</span></label>
                                       <select class="form-control" id="releasedCA" name="releasedCA" required="">
                                          <option value="">Select One</option>
                                       </select>
                                       <small class='error-message' id="error-consignee"></small>
                                    </div>
                                 </td>
                              </tr>
                              {{--                          
                              <tr>
                                 <td>
                                    <div class="form-group border-eata_pod">
                                       <label for="CNTR">CNTR No.<span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="cntr_num" name="cntr_num" readonly>
                                       <small class='error-message' id="error-eata_pod"></small>
                                    </div>
                                 </td>
                              </tr>
                              --}}
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="table table-borderless">
                              <tr>
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="date">Date: <span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="date" name="date" value="{{ date('d/m/Y') }}" readonly>
                                       <small class='error-message' id="error-date"></small>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="requestedAmount"style="visibility: hidden;">
                                 <td>
                                    <div class="form-group border-brand">
                                       <label for="requestedAmount">Requested Amount: <span class="text text-danger">*</span></label>
                                       <input type="text" class="form-control" id="requestedAmount" name="requestedAmount" readonly>
                                       {{--               
                                       <select class="form-control" id="requestedAmount" name="requestedAmount" required="">
                                          <option value="">Select One</option>
                                       </select>
                                       --}}
                                       <small class='error-message' id="error-consignee"></small>
                                    </div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <div class="col-md-12">
                           <div class="float-right mb-2">
                              <a class="btn btn-primary text-white add" id="addButtonRow"> Add Item </a>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <table id="liquidationTable" class="table table-bordered">
                              <thead class="text-center thead-light">
                                 <tr>
                                    <th width="35%" class="font-weight-bold"><b>Particulars</b></th>
                                    <th class="font-weight-bold"><b>OR No.</b></th>
                                    <th class="font-weight-bold"><b>Amount</b></th>
                                    <th class="font-weight-bold"><b>Paid</b></th>
                                    <!--           <th class="font-weight-bold"><b>Break<br>down</b></th> -->
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="liquidationRow">
                                    <td>
                                       <select class="form-control" id="particular_id" name="particular_id[]" required="">
                                          <option value="">Select One</option>
                                          @foreach($particular_list as $particular)
                                          <option value="{{ $particular->id }}">[{{ $particular->code }}] {{ ucwords($particular->particular) }}</option>
                                          @endforeach
                                       </select>
                                       <input type="text" class="form-control mt-1" id="other" name="other[]" placeholder="Please specify here">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control or_num" id="or_num" name="or_num[]">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control amount" id="amount" name="amount[]">
                                    </td>
                                    <td>
                                       <input type="checkbox" class="form-check-input" id="paid" onchange="isPaid(this)">
                                       <span>Paid By Client</span>
                                       <input type="hidden" class="form-check-input" id="paid2" name="paid2[]">
                                    </td>
                                    <td>
                                       <center>
                                          <button class="btn btn-danger btn-sm m-1 remove" type="button"><i class="fa fa-times fa-sm"></i></button>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                              <tfoot>
                                 {{--                 
                                 <tr id="addButtonRow">
                                    <td colspan="4">
                                       <center>
                                          <button class="btn btn-info btn-rounded btn-xs add" type="button"> Add Row </button>
                                       </center>
                                    </td>
                                 </tr>
                                 --}}
                                 <tr >
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Cash Advance :</td>
                                    <td colspan="2" ><input type="text" id="total_cash_advance" name="cash_advance" class="form-control text-center" readonly></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Expenses :</td>
                                    <td colspan="2"><input type="text"  id="expenses" name="expenses" class="form-control text-center" data-decimal="2" readonly ></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Return :</td>
                                    <td colspan="2"><input type="text" id="cash_return" name="cash_return" class="form-control text-center" data-decimal="2" readonly ></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" class="text-right font-weight-bold"><span> Total Refund :</td>
                                    <td colspan="2"><input type="text" id="cash_refund"  name="cash_refund" class="form-control text-center"  data-decimal="2" readonly ></td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- col12 -->
                     </div>
                     <!-- row -->
                  </div>
                  <!-- card body -->
                  <div class="card-footer new-footer">
                     <a href="/liquidation" class="btn btn-danger">Back to list</a>
                     <a class="btn btn-outline-warning btn-sm" id="resetFields"><i class="fa fa-eraser fa-w-20"></i> Clear</a>
                     <button type="submit" class="btn btn-outline-success btn-sm ladda-button basic-ladda-button text-right" id="submitBtn"><i class="fa fa-save fa-w-20"></i> Save</button>
                  </div>
      {{--             <table style="display: none">
                     <tbody>
                        <tr class="particularRowUnedited">
                           <td>
                              <input type="text" class="form-control particular_code2" id="particular_code2" name="particular_code2[]" readonly>
                              <input type="hidden" class="form-control particular_id" id="particular_id" name="particular_id[]" >   
                              <input type="hidden" class="form-control particular_type" id="particular_type" name="particular_type[]" >      
                              <input type="hidden" class="form-control particular_type_id" id="particular_type_id" name="particular_type_id[]">     
                              <input type="hidden" class="form-control liquidation_breakdown_type" id="liquidation_breakdown_type" name="liquidation_breakdown_type[]">     
                              <input type="hidden" class="form-control mt-1" id="other" name="other[]" placeholder="Please specify here" style="display: none;">           
                           </td>
                           <td>
                              <input type="text" class="form-control or_num" id="or_num" name="or_num[]" readonly>
                           </td>
                           <td>
                              <input type="text" class="form-control amount" id="amount" name="amount[]" readonly value="0">
                           </td>
                           <td>
                              <input type="checkbox" class="form-check-input" id="paid" onchange="isPaid(this)">
                              <span>Paid By Client</span>
                              <input type="hidden" class="form-check-input" id="paid2" name="paid2[]">
                           </td>
                           <!--    <td class="text-center">
                              <input type="checkbox" class="form-check-input" id="breakdown" name="breakdown[]" onchange="breakDown(this)"><br>
                              <input type="hidden" class="form-check-input" id="breakdown"> 
                              </td> -->
                        </tr>
                     </tbody>
                  </table> --}}
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
@include('liquidation._modals._breakdown')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('/js/_liquidation/createLiquidation.js') }}"></script>
<script type="text/javascript">
   $(function() {
       $("#other").hide();
      $('select#particular_id').on('change', function() {
        if(this.value == 26){
          $("#other").show();
        }
        else{
          $("#other").hide();
        }
      });
      
      

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
               console.log(item)
                $("#pro_number").val(item.pro_number);
                $("#bl_id").val(item.bolm_id);
                $("#consignee").val(item.consignee);
                $("#bl_number").val(item.bl_number);
                // $("#total_cash_advance").val(item.cash_advance);
                $("#cntr_num").val( item.bolc.map(e => e.container_number ).join(', '));
                
             }
         });

       $("#pro_number").blur(function() {

                  var pro_number = $(this).val();

                  // get real data 
                  $.ajax({  
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "GET",
                    url: '/check_pro_num',
                    data: {pro_number},
                     // debug only 
                    error: function(xhr, status, error){
                        $('#pro_number').text(xhr.responseText);
                    },
                    
                    success: function(data){
                      if ( data != "exist"){
                           $('#pro_number').css({"background-color":"#F4364C","color":"#ffffff"});
                           $('.pro_num_error_message').text("(Invalid Pro Number!)");
                           $('.pro_num_success_message').text("");
                           
                      }
                      else{
                        $('#pro_number').css({"background-color":"#99ff99","color":"#000000"});
                        $('.pro_num_error_message').text("");
                        $('.pro_num_success_message').text("(Valid Pro Number)");
                      }
                    } 
                  })

        });
   
               $('#amount').on('keyup', function() {
                  calculateAll()

               }); 
      //          if(item.check_voucher.length > 1) $('.particularRow').remove()
   
      //          $("#particularTable tbody").html('')
               
      //          let check_voucher = item.check_voucher.map(a => {
      //             a.type = 'check_voucher'
      //             return a
      //          })
   
      //          let cash_advance = item.cash_advance.map(a=>{
      //             a.type='cash_advance'
      //             return a
      //          })
   
      //          let particulars = (check_voucher).concat(cash_advance) 
      //          console.log(particulars)
      //          particulars.map(( e , index) => {
      //             addRowUnedited(index)
   
      //             $("#particularTable tbody tr").each(function (index2) {
      //                let element = $("#particularTable tbody tr").eq(index)
      //                let keys = Object.keys(e)
      //                filteredKeys = keys.map( key => ['cashadvance_id','check_voucher_id'].includes(key) ? key : null ).filter( key => key)
      //                element.attr('index',filteredKeys+'-'+e.id)
   
      //                let getParticularType = ['cashadvance_id', 'check_voucher_id'];
      //                let filteredParticularType = (Object.keys(e)).map( type => getParticularType.includes(type) ? type : null).find( type => type)
      //                // console.log(element,e);
      //                console.log(e);
      //                element.find('td:eq(0) select[id=particular_code]').val(e.particular)
      //                element.find('td:eq(0) input[id=particular_id]').val(e.particular_id)
      //                element.find('td:eq(0) input[id=particular_code2]').val(e.particular)
      //                element.find('td:eq(0) input[id=particular_type]').val(filteredParticularType)
      //                element.find('td:eq(0) input[id=particular_type_id]').val(e[filteredParticularType])
      //                element.find('td:eq(4) input[id=breakdown]').val(e.id)
      //                element.find('td:eq(0) input[id=liquidation_breakdown_type]').val(e.type)
   
   
      //                element.find('td:eq(4) input[id=pro_num]').val(e.bill_id)
   
      //                element.find('td:eq(4) input[id=check_number]').val(e.check_req_number)
      //                element.find('td:eq(1) input[id=or_num]').val(e.or_num)
      //                element.find('td:eq(2) input[id=amount]').attr('defaultValue',e.amount)
                     
      //                if(e.particular_id == 26){
      //                   element.find('td:eq(0) input[id=other]').show()
      //                   element.find('td:eq(0) input[id=other]').attr('readonly',true)
      //                   element.find('td:eq(0) input[id=other]').val(e.other)
      //                   element.find('td:eq(4) input[id=breakdown]').hide()                  
      //                }  else {
      //                   element.find('td:eq(0) input[id=other]').hide()
      //                   element.find('td:eq(0) input[id=other]').val('')
      //                }
   
      //                if(e.paid){
      //                   element.find('td:eq(2) input[id=amount]').val(0)
      //                }else{
      //                   element.find('td:eq(2) input[id=amount]').val(e.amount)
      //                }
                     
      //                element.find('td:eq(3) input[id=paid]').prop('checked',Boolean(e.paid))
      //                element.find('td:eq(3) input[id=paid2]').val(Boolean(e.paid))
   
      //                element.find('td:eq(3) input[id=paid]').attr('parentId',filteredKeys+'-'+e.id)
      //             });
   
              
      //          })
      //          calculateAll()
      //       }
      //  });
   
      // $('input[name="total_cash_advance"]').keyup(() => {
      //    calculateAll()
      // })
   
      function isPaid(event){
         let element     = $(event.parentNode.parentNode)
         let isChecked = $(event).prop('checked')
         let amountDefault = element.find('td:eq(2) input[id=amount]').attr('defaultValue')
         let elementClass    = element.attr('class')
   
               console.log(elementClass)
         amountDefault = amountDefault ? amountDefault : 0 
   
         element.find('td:eq(3) input[id=paid2]').val(isChecked)
         if(isChecked)
         {
   
            element.find('td:eq(2) input[id=amount]').val(0)
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
   
      //    if (event.value == 26) {
      //       element.find('td:eq(0) input[id=other]').show()
      //     } 
      //    else {
      //       element.find('td:eq(0) input[id=other]').hide()
      //     }
      // }
   
      // function breakDown(event)
      // {
      //     let isChecked = $(event).prop('checked')
      //     let element     = $(event.parentNode.parentNode)
      //     let liquidation_breakdown_type = element.find('td:eq(0) input[id=liquidation_breakdown_type]').val()
      //     element.find('td:eq(4) input[id=breakdown]').val($(event).val())
      //     // console.log(element.find('td:eq(4) input[id=breakdown]'));
   
      //     $('#liq_particular_default').val(event.value);
      //    $('input#liquidation_breakdown_type_default').val(liquidation_breakdown_type)      
   
      //     simGet('/liquidation-breakdown/?liquidation_breakdown_type='+liquidation_breakdown_type+'&liq_particular='+event.value,function(res){
      //       renderLiquidationBreakdown(res)
      //     })
   
      //    // console.log(isChecked); // false
      //    if(isChecked == true)
      //    {
   
      //      $('#breakdownItemModal').modal('show')
      //    }else{
      //       $('#breakdownItemModal').modal('hide')
      //       $('.modal-backdrop').remove();
      //    }   
         
      // }
   $('select[id="request_type"').on('change', function(e) {
       var request_type = this.value;
       var bl_id = $('#bl_id').val();
       if(request_type == "processing_request"){
         simPost({bl_id:bl_id}, 'POST', '/getProcessingRequest', getProcessingRequestResponse); 
       }
       
   });
      function getProcessingRequestResponse(x) {
         console.log(x)
         //  var request_type
         // $('select[id="processor_id"').on('change', function(e) {
         //     var id = this.value;
         //     simPost({id:id}, 'POST', '/getProcessorID', getProcessorResponse); 
         // });
      }

   $('select[id="processor_id"').on('change', function(e) {
       var user_id = this.value;
       // var bl_id = $('#bl_id').val();
       // var selected_processor =$('select#processor_id').val();
       simPost({user_id:user_id}, 'POST', '/getProcessorID', getProcessorResponse); 
   });
   
   function getProcessorResponse() {
         console.log(x);

   
         // if(x == ''){
         //    $("tr.releasedCATR").css("visibility","hidden");
         //    $("tr.requestedAmount").css("visibility","hidden");
         //    $('#releasedCA').html('');
         //  }
         //  else{
         //     $(".releasedCATR").css("visibility","visible");
         //     $('#releasedCA').html('');
         //        $('#releasedCA').append($('<option value="">Select One</option>'));
         //        $.each(x, function (key, value) {
         //            $('#releasedCA').append($('<option>',{ 
         //                value: value.id,
         //                text:  value.pcv_number  + ' - ' + value.remarks ,
         //            }));
         //        });
         //  }
   }
   
   $('select[id="releasedCA"').on('change', function(e) {
       var id = this.value;

       simPost({id:id}, 'POST', '/getReleasedCAID', getReleasedCAResponse); 
   });
   
   
   function getReleasedCAResponse(x) {
   
      if(x == ''){
            $("tr.requestedAmount").css("visibility","hidden");
      
      }
      else{
       $(".requestedAmount").css("visibility","visible");
       $('#requestedAmount').html('');
       $("#requestedAmount").val(x[0].requested_amount);
       $("#total_cash_advance").val(x[0].requested_amount);
       }
   }


   
//    $(".add").on('click', function() {
//      var num         = Math.random().toString(36).substr(2, 7);
//      var table = $('#liquidationTable'),
//            lastRow = table.find('tbody tr:last'),
//            rowClone = lastRow.clone();
//        table.find('tbody').append(rowClone);
// calculateAll()
//    });
   
   
  /* Variables */
var p = $("#taxparticular").val();
var row = $(".liquidationRow");

/* Functions */
function getP(){
  p = $("#taxparticular").val();
}

function addRow() {

  row.clone(true, true).appendTo("#liquidationTable");
}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#liquidationTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#taxparticular").val(i);
  }
  $(this).closest("tr").appendTo("#liquidationTable");
  if ($("#liquidationTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#liquidationTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#liquidationTable tr").length - 3 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#taxparticular").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#taxparticular").val(i);
  }
});
$("#taxparticular").change(function () {
  var i = 0;
  p = $("#taxparticular").val();
  var rowCount = $("#liquidationTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#liquidationTable #addButtonRow").appendTo("#liquidationTable");
  } else if(p < rowCount) {
  }
});
   // $("#liquidationRow").change(function () {
   //   var i = 0;
   //   p = $("#liquidation").val();
   //   var rowCount = $("#liquidationTable tr").length - 4;
   //   if(p > rowCount) {
   //     for(i=rowCount; i<p; i+=1){
   //       addRow();
   //     }
   //     $("#liquidationTable #addButtonRow").appendTo("#liquidationTable");
   //   } else if(p < rowCount) {
   //   }
   // });
   
   // $('a#addLiquidationItem').on('click', function() {
   //     addItemRow();
   //     return false;
   // });
   
   // function addItemRow() {
   //     var num = Math.random().toString(36).substr(2, 7);
   
   //     $(".newItem").append(''+
   //         '<tr id="lineItem'+num+'">'+
   //             '<td id="'+num+'" class="particulars">'+
   //                 '<input type="text" id="particulars_'+num+'" data-id="'+num+'" class="form-control" required>'+
   //                 '<input type="hidden" id="particulars_id_'+num+'" name="particulars_id[]" class="form-control">'+
   //             '</td>'+
   //             '<td>'+
   //                 '<input type="number" class="form-control or_num text-right" id="amount" name="or_num[]" required>'+
   //             '</td>'+
   //             '<td>'+
   //                 '<input type="number" class="form-control amount text-right" id="amount" name="amount[]" required>'+
   //             '</td>'+
   //             '<td id="'+num+'" class="pro_num_data p-1">'+
   //                 '<center>'+
   //                     '<button class="btn btn-danger btn-xs m-1 removeLiqItem" type="button"><i class="fa fa-times fa-sm"></i></button>'+
   //                 '</center>'+
   //             '</td>'+
   //         '</tr>'
   //     );
   // }
</script>
@stop
@endsection