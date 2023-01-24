
$('#addPortForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addPortForm').serialize();
    simPost(post_data, 'POST', '/createPort', createPortResponse);
    e.preventDefault();
    return false;
});

function createPortResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Port Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addPortForm')[0].reset();
        $('#addPortModal').hide();
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

$('#editPortForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editPortForm').serialize();
    simPost(post_data, 'POST', '/editPort', editPortResponse);
    e.preventDefault();
    return false;
});

function editPortResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Port has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editPortForm')[0].reset();
    $('#editPortModal').hide();
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

$(".editPort").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getPort', getPortResponse);
    e.preventDefault();
});

function getPortResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_port").val(value.port);
    });
}


  $("a.deactivatePort").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivatePort', deactivatePortResponse);
      e.preventDefault();
  });


  $("a.activatePort").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activatePort', activatePortResponse);
     e.preventDefault();

  }); 
    function deactivatePortResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Port has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activatePortResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Port has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}