$("#updateProcessorForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateProcessorForm').serialize();
    simPost(post_data, 'POST', '/x6u961lv2r=ljhvpd75ti', updateProcessor); 
    e.preventDefault();
    return false;
});


function updateProcessor(x) {
if(x == true){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Processor Succesfully updated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.href = "/ProcessorForm";
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
$(".deleteProcessorCode").on('click', function (e) {
    var id = this.id;
    simPost({id:id}, 'POST', '/deleteProcessor', deleteProcessorCodeResponse);
    e.preventDefault();
});

function deleteProcessorCodeResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Processor has been Deleted.',
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


$('#editProcessorParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editProcessorParticularForm').serialize();
    simPost(post_data, 'POST', '/k1d3c1lrks', editProcessParticularResponse);
    e.preventDefault();
    return false;
});

function editProcessParticularResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Tax Particular has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editProcessorParticularForm')[0].reset();
    $('#editProcessorParticularModal').hide();
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


$(".editProcessorParticular").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getProcessorParticular', getProcessorParticularResponse);
    e.preventDefault();
});

function getProcessorParticularResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("select#edit_particular").val(value.particular);
        $("input#edit_amount").val(value.amount);
    });
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
  } else if($("#processorTable tr").length - 1 ==3) {
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

