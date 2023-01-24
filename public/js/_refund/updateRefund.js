$("#updateRefundForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateRefundForm').serialize();
    simPost(post_data, 'POST', '/editRefund', editRefundFormResponse); 
    e.preventDefault();
    return false;
});


function editRefundFormResponse(x) {
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


$('#editEmptyReturnForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editEmptyReturnForm').serialize();
    simPost(post_data, 'POST', '/updateEmptyReturn', editEmptyReturnResponse);
    e.preventDefault();
    return false;
});

function editEmptyReturnResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Container has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editEmptyReturnForm')[0].reset();
    $('#editEmptyReturnModal').hide();
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


$(".editContainerEmptyReturn").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getContainer', getContainerResponse);
    e.preventDefault();
});

function getContainerResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_container_number").val(value.container_number);
        $("input#edit_size").val(value.size);
        $("input#edit_container_deposit").val(value.container_deposit);
        $("input#edit_empty_return").val(value.empty_return);
        $("input#edit_trucker").val(value.trucker);
    });
}

