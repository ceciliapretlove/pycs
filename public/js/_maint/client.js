
$('#addClientForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addClientForm').serialize();
    simPost(post_data, 'POST', '/createClient', createClientResponse);
    e.preventDefault();
    return false;
});

function createClientResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Client has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addClientForm')[0].reset();
        $('#addClientModal').hide();
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

$('#editClientForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editClientForm').serialize();
    simPost(post_data, 'POST', '/editClient', editClientResponse);
    e.preventDefault();
    return false;
});

function editClientResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Client has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editClientForm')[0].reset();
    $('#editClientModal').hide();
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

$(".editClient").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getClient', getClientResponse);
    e.preventDefault();
});

function getClientResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
         $("input#edit_code").val(value.code);
        $("input#edit_name").val(value.name);
    });
}


  $("a.deactivateClient").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateClient', deactivateClientResponse);
      e.preventDefault();
  });


  $("a.activateClient").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateClient', activateClientResponse);
     e.preventDefault();

  }); 
    function deactivateClientResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Client has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateClientResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Client has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}