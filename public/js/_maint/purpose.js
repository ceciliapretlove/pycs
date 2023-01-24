
$('#addPurposeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addPurposeForm').serialize();
    simPost(post_data, 'POST', '/createPurpose', createPurposeResponse);
    e.preventDefault();
    return false;
});

function createPurposeResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Purpose has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addPurposeForm')[0].reset();
        $('#addPurposeModal').hide();
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

$('#editPurposeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editPurposeForm').serialize();
    simPost(post_data, 'POST', '/editPurpose', editPurposeResponse);
    e.preventDefault();
    return false;
});

function editPurposeResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Purpose has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editPurposeForm')[0].reset();
    $('#editPurposeModal').hide();
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

$(".editPurpose").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getPurpose', getPurposeResponse);
    e.preventDefault();
});

function getPurposeResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_name").val(value.Purpose_num);
    });
}


  $("a.deactivatePurpose").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivatePurpose', deactivatePurposeResponse);
      e.preventDefault();
  });


  $("a.activatePurpose").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activatePurpose', activatePurposeResponse);
     e.preventDefault();

  }); 
    function deactivatePurposeResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Purpose has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activatePurposeResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Purpose has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}