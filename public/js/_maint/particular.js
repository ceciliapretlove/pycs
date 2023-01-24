
$('#addParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addParticularForm').serialize();
    simPost(post_data, 'POST', '/createParticular', createParticularResponse);
    e.preventDefault();
    return false;
});

function createParticularResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Particular has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addParticularForm')[0].reset();
        $('#addParticularModal').hide();
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

$('#editParticularForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editParticularForm').serialize();
    simPost(post_data, 'POST', '/editParticular', editParticularResponse);
    e.preventDefault();
    return false;
});

function editParticularResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Particular has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editParticularForm')[0].reset();
    $('#editParticularModal').hide();
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

$(".editParticular").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getMaintParticular', getParticularResponse);
    e.preventDefault();
});

function getParticularResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_code").val(value.code);
        $("input#edit_particular").val(value.particular);
    });
}


  $("a.deactivateParticular").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateParticular', deactivateParticularResponse);
      e.preventDefault();
  });


  $("a.activateParticular").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateParticular', activateParticularResponse);
     e.preventDefault();

  }); 
    function deactivateParticularResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Particular has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateParticularResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Particular has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}