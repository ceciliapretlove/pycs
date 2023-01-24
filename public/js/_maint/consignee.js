
$('#addConsigneeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addConsigneeForm').serialize();
    simPost(post_data, 'POST', '/createConsignee', createConsigneeResponse);
    e.preventDefault();
    return false;
});

function createConsigneeResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Consignee Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addConsigneeForm')[0].reset();
        $('#addConsigneeModal').hide();
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

$('#editConsigneeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editConsigneeForm').serialize();
    simPost(post_data, 'POST', '/editConsignee', editConsigneeResponse);
    e.preventDefault();
    return false;
});

function editConsigneeResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Consignee has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editConsigneeForm')[0].reset();
    $('#editConsigneeModal').hide();
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

$(".editConsignee").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getConsignee', getConsigneeResponse);
    e.preventDefault();
});

function getConsigneeResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_consignee").val(value.consignee);
        $("textarea#edit_consignee_address").val(value.consignee_address);
    });
}


  $("a.deactivateConsignee").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateConsignee', deactivateConsigneeResponse);
      e.preventDefault();
  });


  $("a.activateConsignee").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateConsignee', activateConsigneeResponse);
     e.preventDefault();

  }); 
    function deactivateConsigneeResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Consignee has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateConsigneeResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Consignee has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}