
$('#addRateForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addRateForm').serialize();
    simPost(post_data, 'POST', '/createRate', createRateResponse);
    e.preventDefault();
    return false;
});

function createRateResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Rate Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addRateForm')[0].reset();
        $('#addRateModal').hide();
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

$('#editRateForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editRateForm').serialize();
    simPost(post_data, 'POST', '/editRate', editRateResponse);
    e.preventDefault();
    return false;
});

function editRateResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Rate has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editRateForm')[0].reset();
    $('#editRateModal').hide();
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

$(".editRate").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getRate', getRateResponse);
    e.preventDefault();
});

function getRateResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#rate").val(value.rate);
        $("select#edit_location").val(value.destination);
    });
}


  $("a.deactivateRate").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateRate', deactivateRateResponse);
      e.preventDefault();
  });


  $("a.activateRate").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateRate', activateRateResponse);
     e.preventDefault();

  }); 
    function deactivateRateResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Rate has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateRateResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Rate has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}