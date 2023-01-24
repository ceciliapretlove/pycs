
$('#addApprovalForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addApprovalForm').serialize();
    simPost(post_data, 'POST', '/createApproval', createApprovalResponse);
    e.preventDefault();
    return false;
});

function createApprovalResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Approval Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addApprovalForm')[0].reset();
        $('#addApprovalModal').hide();
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

$('#editApprovalForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editApprovalForm').serialize();
    simPost(post_data, 'POST', '/editApproval', editApprovalResponse);
    e.preventDefault();
    return false;
});

function editApprovalResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Approval has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editApprovalForm')[0].reset();
    $('#editApprovalModal').hide();
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

$(".editApproval").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getApproval', getApprovalResponse);
    e.preventDefault();
});

function getApprovalResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#approval_type").val(value.approval_type);
    });
}


  $("a.deactivateApproval").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateApproval', deactivateApprovalResponse);
      e.preventDefault();
  });


  $("a.activateApproval").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateApproval', activateApprovalResponse);
     e.preventDefault();

  }); 
    function deactivateApprovalResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Approval has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateApprovalResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Approval has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}