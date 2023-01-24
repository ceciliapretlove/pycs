$("#createCheckVoucherForm").on('submit', function(e)
{
    
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createCheckVoucherForm').serialize();
    simPost(post_data, 'POST', '/4e843fc4=d600f3b8', createTaxVoucher); 
    e.preventDefault();
    return false;
});


function createTaxVoucher(x) {
	if(x == true){
        $('#submitBtn').attr('disabled', 'disabled');
Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Check Voucher Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/CheckRequestForm";
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

$('a[id="resetFields"]').on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "to clear this Check Voucher form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            location.reload();
        }
    })
});


$('#particular_code').on('change', function() {
    if (this.value == 1) {
        $(".bank_charge").show();
        computeTotalAmount();
        computeGrandTotalWithBankCharge();
    } else {
        $(".bank_charge").hide();
        computeTotalAmount();
        computeGrandTotal();
    }
});

$('.amount').keyup(delay(function() {
        computeTotalAmount();

        if($('#particular_code').val() == 1){
        computeGrandTotalWithBankCharge();
         }else{
        computeGrandTotal();
         }
    }, 200));

function computeGrandTotalWithBankCharge() {

    const totalAmount   = parseFloat($('input[name="totalAmount"]').val());
    let grandTotal = totalAmount + 300;

       $('#grand_total').val(grandTotal);
        
}

function computeGrandTotal() {

    const totalAmount         = parseFloat($('input[name="totalAmount"]').val());
    let grandTotal = totalAmount;

       $('#grand_total').val(grandTotal);
        
}

function computeTotalAmount() {
    var sum = 0;
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val;
    });
    $('#totalAmount').val(parseFloat(sum));
}


/* Variables */
var p = $("#taxparticular").val();
var row = $(".taxparticularRow");

/* Functions */
function getP(){
  p = $("#taxparticular").val();
}

function addRow() {
  row.clone(true, true).appendTo("#taxparticularTable");
  $(".amount:last").val('');
}

function removeRow(button) {
  button.closest("tr").remove();
}

/* Doc ready */
$(".add").on('click', function () {
  if($("#taxparticularTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#taxparticular").val(i);
  }
  $(this).closest("tr").appendTo("#taxparticularTable");
  if ($("#taxparticularTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#taxparticularTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#taxparticularTable tr").length - 3 ==3) {
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
  var rowCount = $("#taxparticularTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#taxparticularTable #addButtonRow").appendTo("#taxparticularTable");
  } else if(p < rowCount) {
  }
});



