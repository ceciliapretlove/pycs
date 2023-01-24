$("#createProcessorForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createProcessorForm').serialize();
    simPost(post_data, 'POST', '/or7lyvqoha=42l4tl8o36', createProcessor); 
    e.preventDefault();
    return false;
});


function createProcessor(x) {
	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Processor Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/ProcessorForm";
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
        text: "to clear this Processor form?",
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


// $(document).ready(function() {

//     $("#amountTable").find("input#amount").each(function() {
//         $(this).keyup(function() {
//             calculateTotalBankChargeAmount();
//         });
//     });
// });

// function calculateTotalBankChargeAmount() {
//     const amount = document.getElementById('amount').value;
//     const TotalBankChangeAmount =+ amount + 300;
//     $("#total_amount").val(TotalBankChangeAmount.toFixed(2));
// }


$('.amount').keyup(delay(function() {
        computeTotalAmount();
        computeGrandTotal();
    }, 200));

function computeGrandTotal() {

    const totalAmount         = parseFloat($('input[name="totalAmount"]').val());
    let grandTotal = totalAmount + 300;

       $('#grand_total').val(numberWithCommas(parseFloat(grandTotal).toFixed(2)));
        
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
var p = $("#processor").val();
var row = $(".processorRow");

/* Functions */
function getP(){
  p = $("#processor").val();
}

function addRow() {
  row.clone(true, true).appendTo("#processorTable");
}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#processorTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#processor").val(i);
  }
  $(this).closest("tr").appendTo("#processorTable");
  if ($("#processorTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#processorTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#processorTable tr").length - 3 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#processor").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#processor").val(i);
  }
});
$("#processor").change(function () {
  var i = 0;
  p = $("#processor").val();
  var rowCount = $("#processorTable tr").length - 4;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#processorTable #addButtonRow").appendTo("#processorTable");
  } else if(p < rowCount) {
  }
});



