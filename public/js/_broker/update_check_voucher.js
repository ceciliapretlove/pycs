$("#updateCheckVoucherForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateCheckVoucherForm').serialize();
    simPost(post_data, 'POST', '/3a221e8b=ektvfdcnrpi', updateTaxVoucher); 
    e.preventDefault();
    return false;
});


function updateTaxVoucher(x) {
if(x == true){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Check Voucher Succesfully updated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.href = "/CheckRequestForm";
      }, 1600);
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
        text: "to clear this Tax Voucher form?",
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

$(document).ready(function() {

    $("#amountTable").find("input#amount").each(function() {
        $(this).keyup(function() {
            calculateTotalBankChargeAmount();
        });
    });
});

function calculateTotalBankChargeAmount() {
    const amount = document.getElementById('amount').value;
    const TotalBankChangeAmount =+ amount + 300;
    $("#total_amount").val(TotalBankChangeAmount.toFixed(2));
}

$('#editTaxParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editTaxParticularForm').serialize();
    simPost(post_data, 'POST', '/mtxthlrhku', editTaxParticularResponse);
    e.preventDefault();
    return false;
});

function editTaxParticularResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Tax Particular has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editTaxParticularForm')[0].reset();
    $('#editTaxParticularModal').hide();
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


$(".editTaxParticular").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getTaxParticular', getTaxParticularResponse);
    e.preventDefault();
});

function getTaxParticularResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("select#edit_particular").val(value.particular);
        $("input#edit_amount").val(value.amount);
    });
}

//Delete
$(".deleteTaxCode").on('click', function (e) {
  
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
    simPost({id:id}, 'POST', '/deleteTaxParticular', deleteTaxParticularResponse);
    e.preventDefault();
    }
})
});

function deleteTaxParticularResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Tax Code has been Deleted.',
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
var p = $("#taxparticular").val();
var row = $(".taxparticularRow");

/* Functions */
function getP(){
  p = $("#taxparticular").val();
}

function addRow() {
  row.clone(true, true).appendTo("#taxparticularTable");
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
  } else if($("#taxparticularTable tr").length - 1 ==3) {
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

