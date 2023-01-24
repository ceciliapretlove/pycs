$("#createSummaryExpensesForm").on('submit', function(e)
{
    e.preventDefault();
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createSummaryExpensesForm').serialize();
    // console.log(post_data)
    simPost(post_data, 'POST', '/cptkbhgrvja', createSummaryExpensesFormResponse); 
    return false;
});


function createSummaryExpensesFormResponse(x) {

    if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Summary of Expenses Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/summaryExpenses";
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

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".addParticularRow").on('click', function () {
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


function calculateAll() {
    calculateTotalExpenses();
    calculateCashReturn();
    calculateCashRefund();
}

