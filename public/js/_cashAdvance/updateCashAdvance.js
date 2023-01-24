$("#updateCashAdvanceForm").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateCashAdvanceForm').serialize();
    simPost(post_data, 'POST', '/x6u961lv2r=ljhvpd75ti', editCashAdvanceFormResponse); 
    e.preventDefault();
    return false;
});


function editCashAdvanceFormResponse(x) {

	if(x == 1){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Cash Advance Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/cashAdvanceForm";
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




//EDIT
$('#editCashAdvanceParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editCashAdvanceParticularForm').serialize();
    simPost(post_data, 'POST', '/k1d3c1lrks', editCashAdvanceParticularResponse);
    e.preventDefault();
    return false;
});

function editCashAdvanceParticularResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Cash Advance Particular has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editCashAdvanceParticularForm')[0].reset();
    $('#editCashAdvanceParticularModal').hide();
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
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

$(".editCashAdvanceParticular").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getCashAdvanceParticular', getCashAdvanceParticularResponse);
    e.preventDefault();
});

function getCashAdvanceParticularResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("select#edit_particular").val(value.particular);
        $("input#edit_amount").val(value.amount);
    });
}

//DELETE

$(".deleteCashAdvanceParticular").on('click', function (e) {
 
 Swal.fire({
  title: 'Are you sure you?',
  text: "You won't be able to Delete this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
  }).then((result) => {
  if (result.isConfirmed) {
    var id = this.id;
    simPost({id:id}, 'POST', '/deleteCashAdvanceParticular', deleteCashAdvanceParticualrResponse);
    e.preventDefault();
    }
})
});

function deleteCashAdvanceParticualrResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Cash Advance Paritcular has been Deleted.',
      showConfirmButton: false,
      timer: 1500
    })

      setTimeout(function(){
         window.location.reload(1);
      }, 1000);

  }
  else 
  {
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please check the details.',
      showConfirmButton: false,
      timer: 1500
    })
  } 
  return false;
}

/* Variables */
// var p = $("#cashAdvance").val();
// var row = $(".CashAdvanceRow");

// /* Functions */
// function getP(){
//   p = $("#cashAdvance").val();
// }

// function addRow() {
//   row.clone(true, true).appendTo("#CashAdvanceTable");
// }

// function removeRow(button) {
//   button.closest("tr").remove();
// }
// /* Doc ready */
// $(".add").on('click', function () {
//   if($("#CashAdvanceTable tr").length < 99) {
//     addRow();
//     var i = Number(p)+1;
//     $("#cashAdvance").val(i);
//   }
//   $(this).closest("tr").appendTo("#CashAdvanceTable");
//   if ($("#CashAdvanceTable tr").length === 3) {
//     $(".remove").hide();
//   } else {
//     $(".remove").show();
//   }
// });
// $(".remove").on('click', function () {
//   if($("#CashAdvanceTable tr").length === 3) {
//     //alert("Can't remove row.");
//     $(".remove").hide();
//   } else if($("#CashAdvanceTable tr").length - 1 ==3) {
//     $(".remove").hide();
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#cashAdvance").val(i);
//   } else {
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#cashAdvance").val(i);
//   }
// });
// $("#cashAdvance").change(function () {
//   var i = 0;
//   p = $("#cashAdvance").val();
//   var rowCount = $("#CashAdvanceTable tr").length - 4;
//   if(p > rowCount) {
//     for(i=rowCount; i<p; i+=1){
//       addRow();
//     }
//     $("#CashAdvanceTable #addButtonRow").appendTo("#CashAdvanceTable");
//   } else if(p < rowCount) {
//   }
// });


function calculateAll() {
    calculateTotalRequestAmount();
}

function calculateTotalRequestAmount() {
  
    var sum = 0;
    var prev_request_amount =  parseInt($('input[name="totalAmount"]').val());
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val + prev_request_amount;
    });
    // var TotalRequestAmount = sum + prev_request_amount;
    $('#addtotalAmount').val(parseFloat(sum));
}

$(document).ready(function() {
    var prev_request_amount =  parseInt($('input[name="totalAmount"]').val());
    $('#addtotalAmount').val(parseFloat(prev_request_amount));  
});

/* Variables */
var p = $("#taxparticular").val();
var row = $(".particularRow");

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



