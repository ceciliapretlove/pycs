$("#createCashAdvanceForm").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createCashAdvanceForm').serialize();
    simPost(post_data, 'POST', '/or7lyvqoha=42l4tl8o36', createCashAdvanceFormResponse); 
    e.preventDefault();
    return false;
});


function createCashAdvanceFormResponse(x) {
	if(x == true){

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



$('.amount').keyup(delay(function() {
        computeTotalAmount();
    }, 200));


function computeTotalAmount() {
    var sum = 0;
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val;
    });
    $('#totalAmount').val(numberWithCommas(parseFloat(sum).toFixed(2)));
}


/* Variables */
// var p = $("#cashadvance").val();
// var row = $(".cashAdvanceRow");

// /* Functions */
// function getP(){
//   p = $("#cashadvance").val();
// }

// function addRow() {
//   row.clone(true, true).appendTo("#particularTable");
// }

// function removeRow(button) {
//   button.closest("tr").remove();
// }
// /* Doc ready */
// $(".add").on('click', function () {
//   if($("#particularTable tr").length < 99) {
//     addRow();
//     var i = Number(p)+1;
//     $("#cashadvance").val(i);
//   }
//   $(this).closest("tr").appendTo("#particularTable");
//   if ($("#particularTable tr").length === 3) {
//     $(".remove").hide();
//   } else {
//     $(".remove").show();
//   }
// });
// $(".remove").on('click', function () {
//   if($("#particularTable tr").length === 3) {
//     //alert("Can't remove row.");
//     $(".remove").hide();
//   } else if($("#particularTable tr").length - 3 ==3) {
//     $(".remove").hide();
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#cashadvance").val(i);
//   } else {
//     removeRow($(this));
//     var i = Number(p)-1;
//     $("#cashadvance").val(i);
//   }
// });
// $("#cashadvance").change(function () {
//   var i = 0;
//   p = $("#cashadvance").val();
//   var rowCount = $("#particularTable tr").length - 4;
//   if(p > rowCount) {
//     for(i=rowCount; i<p; i+=1){
//       addRow();
//     }
//     $("#particularTable #addButtonRow").appendTo("#particularTable");
//   } else if(p < rowCount) {
//   }
// });


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





