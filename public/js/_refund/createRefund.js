$("#createRefundForm").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createRefundForm').serialize();
    simPost(post_data, 'POST', '/createRefund', createRefundFormResponse); 
    e.preventDefault();
    return false;
});


function createRefundFormResponse(x) {
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
         window.location.href = "/refundManagement";
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


$('a[id="addCheckNo"]').on('click', function() {
    addItemRow();
});

function addItemRow() {
    $(".newCheck").append(''+
        '<input type="number" class="form-control mt-2" id="check_num" name="check_num[]">'
    );
}