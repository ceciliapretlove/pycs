$("#updateShippingForm").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateShippingForm').serialize();
    simPost(post_data, 'POST', '/editShipping', editShippingFormResponse); 
    e.preventDefault();
    return false;
});


function editShippingFormResponse(x) {

	if(x == 1){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipping Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/shippingForm";
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


var p = $("#shippping").val();
var row = $(".shippingRow");

/* Functions */
function getP(){
  p = $("#shippping").val();
}

function addRow() {
  row.clone(true, true).appendTo("#shippingTable");
}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
 
  if($("#shippingTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#shippping").val(i);
  }
  $(this).closest("tr").appendTo("#shippingTable");
  if ($("#shippingTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#shippingTable tr").length === 4) {
    // alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#shippingTable tr").length - 1 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#shippping").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#shippping").val(i);
  }
});
$("#shippping").change(function () {
  var i = 0;
  p = $("#shippping").val();
  var rowCount = $("#shippingTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#shippingTable #addButtonRow").appendTo("#shippingTable");
  } else if(p < rowCount) {
  }
});


function calculateAll() {
    calculateTotalRequestAmount();
}

function calculateTotalRequestAmount() {
  
    var sum = 0;
    var prev_request_amount =  parseFloat($('input[name="grand_total"]').val().replace(/,/g, ''));
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val + prev_request_amount;
    });
    // var TotalRequestAmount = sum + prev_request_amount;
    $('#addtotalAmount').val(numberWithCommas(parseFloat(sum).toFixed(2)));
}

$(document).ready(function() {
    var prev_request_amount =  parseFloat($('input[name="grand_total"]').val().replace(/,/g, ''));
    $('#addtotalAmount').val(numberWithCommas(parseFloat(prev_request_amount).toFixed(2)));  
});


//DELETE

$(".deleteShippingItem").on('click', function (e) {
 
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
    simPost({id:id}, 'POST', '/deleteShippingItem', deleteShippingItemResponse);
    e.preventDefault();
    }
})
});

function deleteShippingItemResponse(response) {
  if(response==true)
  {
    computeGrandTotal();
    calculateTotalRequestAmount();
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipping Item has been Deleted.',
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


//UPDATE
$('#editShippingItemForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editShippingItemForm').serialize();
    simPost(post_data, 'POST', '/IkQnMBq9orDpLgP', editShippingItemResponse);
    e.preventDefault();
    return false;
});

function editShippingItemResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipping Item has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editShippingItemForm')[0].reset();
    $('#editShippingItemModal').hide();
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

$(".editShippingItem").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getShippingItem', getShippingItemResponse);
    e.preventDefault();
});

function getShippingItemResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("select#edit_payee").val(value.payee);
        $("select#edit_purpose").val(value.purpose);
        $("select#edit_client").val(value.client);
        $("input#edit_amount").val(value.amount);
    });
}