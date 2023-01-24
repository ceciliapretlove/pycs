
$("#createBillOfLading").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createBillOfLading').serialize();
    simPost(post_data, 'POST', '/8fd6e0fb=wnqbcjsagey', createBillOfLading,errorResponse); 
    e.preventDefault();
    return false;
});


function createBillOfLading(x) {
	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Bill of Lading Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/BillofladingManagement";
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
        text: "to clear this equipment form?",
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

function errorResponse(eventObj) {
    let temp = ''

    if (eventObj.responseJSON.errors.bl_number) {
        temp += eventObj.responseJSON.errors.bl_number + '\n'
    }

    Swal.fire({
        imageUrl: './assets/images/error.jpg',
        imageHeight: 250,
        title: 'FAILED!',
        text: temp,
        showConfirmButton: false,
        timer: 2000
    })
}


/* Variables */
var p = $("#containers").val();
var row = $(".containerRow");

/* Functions */
function getP(){
  p = $("#containers").val();
}

function addRow() {
  row.clone(true, true).appendTo("#containerTable");
  

}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#containerTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#containers").val(i); 
      }
  $(this).closest("tr").appendTo("#containerTable");
  if ($("#containerTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#containerTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#containerTable tr").length - 1 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#containers").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#containers").val(i);
  }
});
$("#containers").change(function () {
  var i = 0;
  p = $("#containers").val();
  var rowCount = $("#containerTable tr").length - 2;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#containerTable #addButtonRow").appendTo("#containerTable");
  } else if(p < rowCount) {
  }
});


