$("#updateLiquidationForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateLiquidationForm').serialize();
    simPost(post_data, 'POST', '/editLiquidation', editLiquidationFormResponse); 
    e.preventDefault();
    return false;
});


function editLiquidationFormResponse(x) {
	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Refund Succesfully Saved',
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

$(document).ready(function() {
            calculateCashReturn();
            calculateCashRefund();
});

function calculateCashReturn() {
    var cashReturn = 0;
    var cashAdvance = parseInt($('input[name="cash_advance"]').val());
    var expenses =  parseInt($('input[name="expenses"]').val());
    var TotalCashReturn = cashAdvance - expenses;
        if(TotalCashReturn <= 0) {
               let TotalCashReturn = 0;
                $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));          
        } else {
              $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));

        }

        
}


function calculateCashRefund() {
    var cashRefund = 0;
    var cashAdvance = parseInt($('input[name="cash_advance"]').val());
    var expenses =  parseInt($('input[name="expenses"]').val());
    var TotalCashRefund =    cashAdvance  - expenses;
    if(TotalCashRefund < 0){
        let TotalCashRefund = 0;
        $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));

    }
        
          $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
}


$(".deleteParticulars").on('click', function (e) {

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
    simPost({id:id}, 'POST', '/deleteParticular', deleteParticularResponse);
    e.preventDefault();
}
})
});

function deleteParticularResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Particular has been Deleted.',
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

$('#editParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editParticularForm').serialize();
    simPost(post_data, 'POST', '/v5l01i90d1lmr2s', editParticularResponse);
    e.preventDefault();
    return false;
});

function editParticularResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Particular has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editParticularForm')[0].reset();
    $('#editParticularModal').hide();
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

$(".editParticular").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getParticular', getParticularResponse);
    e.preventDefault();
});

function getParticularResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("select#edit_particular").val(value.particular_id);
        $("input#edit_or_number").val(value.or_num);
        $("input#edit_amount").val(value.amount);
    });
}

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

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#particularTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#taxparticular").val(i);
  }
  $(this).closest("tr").appendTo("#particularTable");
  if ($("#particularTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#particularTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#particularTable tr").length - 5 ==3) {
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
  var rowCount = $("#particularTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#particularTable #addButtonRow").appendTo("#particularTable");
  } else if(p < rowCount) {
  }
});

$(document).ready(function() {
  
function calculateAll() {
        calculateCashReturn();
        calculateCashRefund();
        calculateNetIncome();
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

    function calculateNetIncome() {
        var netincome = 0;
        var client = parseInt($('input[name="client_payment"]').val());
        var expenses =  parseInt($('input[name="expenses"]').val());
        var totalnetincome = expenses + client;
                $('#net_income').val(numberWithCommas(parseFloat(totalnetincome).toFixed(2)));          
    }
});