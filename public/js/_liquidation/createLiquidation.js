$("#createLiquidationForm").on('submit', function(e)
{
    e.preventDefault();
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createLiquidationForm').serialize();
    // console.log(post_data)
    simPost(post_data, 'POST', '/createLiquidation', createLiquidationFormResponse); 
    return false;
});

// function errorResponse(eventObj) {
//     let temp = ''

//     if (eventObj.responseJSON.errors.pro_number) {
//         temp += eventObj.responseJSON.errors.pro_number + '\n'
//     }

//     Swal.fire({
//         imageUrl: './assets/images/error.jpg',
//         imageHeight: 250,
//         title: 'FAILED!',
//         text: temp,
//         showConfirmButton: false,
//         timer: 2000
//     })
// }

function createLiquidationFormResponse(x) {

	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Liquidation Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/liquidation";
      }, 2000);
	}else{
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1500
    })
	}
}

function calculateTotalExpenses() {
  
    var sum = 0;
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val;
    });
    $('#expenses').val(parseFloat(sum));
}

function calculateCashReturn() {
    var cashReturn = 0;
    var cashAdvance = parseInt($('input[name="cash_advance"]').val()); 
    var expenses =  parseInt($('input[name="expenses"]').val());
    var TotalCashReturn = cashAdvance - expenses;
    
        if(TotalCashReturn <= 0 || isNaN(TotalCashReturn)) {
          TotalCashReturn = 0;
          $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));
        } else {
          $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));
        }

        
}


function calculateCashRefund() {
    var cashRefund = 0;
    var cashAdvance = parseInt($('input[name="cash_advance"]').val());
    var expenses =  parseInt($('input[name="expenses"]').val());
    var TotalCashRefund = expenses - cashAdvance;
        if(TotalCashRefund < 0 || isNaN(TotalCashRefund)){
          TotalCashRefund = 0
          $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
       } else {
            $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
        }
}


/* Variables */
var p = $("#taxparticular").val();
var row = $(".particularRow");
var rowUnedited = $(".particularRowUnedited");

/* Functions */
function getP(){
  p = $("#taxparticular").val();
}

function addRow() {
  row.clone(true, true).appendTo("#particularTable");
}
  
function addRowUnedited() {
  rowUnedited.clone(true, true).appendTo("#particularTable");
}

$("#taxparticular").change(function () {
  var i = 0;
  p = $("#taxparticular").val();
  var rowCount = $("#particularTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#particularTable #addButtonRow").appendTo("#particularTable");
  } else if(p < rowCount) {
  }
});



function removeRow(event){
    let rowIndex = event.parentNode.parentNode.parentNode.rowIndex
    document.getElementById('particularTable').deleteRow(rowIndex)
}

function calculateAll() {
    calculateTotalExpenses();
    calculateCashReturn();
    calculateCashRefund();
}


/* Variables */
var p = $("#liqitem").val();
var row = $(".breakdownItemRow");
var rowAddBreakdownItem = $(".breakdownItemRowReadonly");

/* Functions */
function getP(){
  p = $("#liqitem").val();
}

function additemRow() {
  row.clone(true, true).appendTo("#breakdownItemTable");

}

function addBreakdownItemRow(){
  rowAddBreakdownItem.clone(true, true).appendTo("#breakdownItemTable");
 
}

function removeBreakdownItemRow(element){
  const id = element.find('td:eq(0) input[id=breakdown_id]').val()  
  const obj = {
    id: id
  }
  let liquidation_breakdown_type = $('input#liquidation_breakdown_type_default').val()
  let liq_particular = $('input#liq_particular_default').val()
  simDelete(obj, '/remove-liquidation-breakdown' ,function(res){
    swal_fire(res)
    simGet('/liquidation-breakdown/?liquidation_breakdown_type='+liquidation_breakdown_type+'&liq_particular='+liq_particular,function(res){
       renderLiquidationBreakdown(res)
     })
  });
}

function renderLiquidationBreakdown(items)
{
  $("#breakdownItemTable tbody").html('')
  console.log(items)
  items.map(( e , index) => {
     addBreakdownItemRow(index)
     $("#breakdownItemTable tbody tr").each(function (index2) {
        let element = $("#breakdownItemTable tbody tr").eq(index)
        element.find('td:eq(0) input[id=item]').val(e.item)
        element.find('td:eq(0) input[id=liquidation_breakdown_type]').val(e.type)
        element.find('td:eq(1) input[id=amount]').val(e.amount)
        element.find('td:eq(0) input[id=breakdown_id]').val(e.id)
        element.find('td:eq(0) input[id=liq_particular]').val(e.liq_particular)
     });
  })

}
   
function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */

function breakdownItemRow(event,actions){
  switch(actions){
    case 'add':
      addBreakdownItemRow()
      const defaultType = $('input#liquidation_breakdown_type_default').val()
      const defaultType2 = $('input#liq_particular_default').val()

      const targetIndex = $('#breakdownItemTable tbody tr').length - 1
      const targetElement  = $("#breakdownItemTable tbody tr").eq(targetIndex)
      targetElement.find('td:eq(0) input[id=liquidation_breakdown_type]').val(defaultType)
      targetElement.find('td:eq(0) input[id=liq_particular]').val(defaultType2)
    break;

    case 'remove':
      const element = $(event.parentNode.parentNode.parentNode)
      removeBreakdownItemRow(element)
    break

    default:
    break
  }
}
// $(".add").on('click', function () {
//   if($("#breakdownItemTable tr").length < 99) {
//     additemRow();
//     var i = Number(p)+1;
//     $("#liqitem").val(i);
//   }
//   $(this).closest("tr").appendTo("#breakdownItemTable");
//   if ($("#breakdownItemTable tr").length === 3) {
//     $(".remove").hide();
//   } else {
//     $(".remove").show();
//   }
// });

// $(".remove").on('click', function () {
//   if($("#breakdownItemTable tr").length === 3) {
//     //alert("Can't remove row.");
//     $(".remove").hide();
//   } else if($("#breakdownItemTable tr").length - 1 ==3) {
//     $(".remove").hide();
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#liqitem").val(i);
//   } else {
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#liqitem").val(i);
//   }
// });

// $("#liqitem").change(function () {
//   var i = 0;
//   p = $("#liqitem").val();
//   var rowCount = $("#breakdownItemTable tr").length - 4;
//   if(p > rowCount) {
//     for(i=rowCount; i<p; i+=1){
//       additemRow();
//     }
//     $("#breakdownItemTable #addButtonRow").appendTo("#breakdownItemTable");
//   } else if(p < rowCount) {
//   }
// });

//ADD BREAKDOWN ITEM
$('#breakdownItemForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#breakdownItemForm').serialize();
    simPost(post_data, 'POST', '/add-liquidation-breakdown', BreakdownItemResponse);
    e.preventDefault();
    return false;
});

function BreakdownItemResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Item Breakdown has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#breakdownItemForm')[0].reset();
    $('#breakdownItemModal').hide();
    $('.modal-backdrop').remove();
      // setTimeout(function(){
        
      // }, 1000);
  } else {
          Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1500
    })
    }
    return false;
}