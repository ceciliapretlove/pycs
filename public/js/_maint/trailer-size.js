
$('#addTrailerSizeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addTrailerSizeForm').serialize();
    simPost(post_data, 'POST', '/createTrailerSize', createTrailerSizeResponse);
    e.preventDefault();
    return false;
});

function createTrailerSizeResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Trailer has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addTrailerSizeForm')[0].reset();
        $('#addTrailerSizeModal').hide();
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

$('#editTrailerSizeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editTrailerSizeForm').serialize();
    simPost(post_data, 'POST', '/editTrailerSize', editTrailerSizeResponse);
    e.preventDefault();
    return false;
});

function editTrailerSizeResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Trailer Size has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editTrailerSizeForm')[0].reset();
    $('#editTrailerSizeModal').hide();
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

$(".editTrailerSize").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getTrailerSize', getTrailerSizeResponse);
    e.preventDefault();
});

function getTrailerSizeResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_trailer_size").val(value.description);
        $("input#amount").val(value.amount)
    });
}


//   $("a.deactivatePort").on('click', function(e)
//   {
//       var id = this.id;
//       simPost({id:id}, 'POST', '/deactivatePort', deactivatePortResponse);
//       e.preventDefault();
//   });


//   $("a.activatePort").on('click', function(e)
//   {
//       var id = this.id;
//       simPost({id:id}, 'POST', '/activatePort', activatePortResponse);
//      e.preventDefault();

//   }); 
//     function deactivatePortResponse(response)
// {

//       Swal.fire({
//       imageUrl: './assets/images/success.jpg',
//       imageHeight: 250,
//       title: 'SUCCESS!',
//       text: 'Port has been Deactivated',
//       showConfirmButton: false,
//       timer: 1500
//     })
//       setTimeout(function(){
//          window.location.reload(1);
//       }, 1000);
// }
//   function activatePortResponse(response)
// {
//       Swal.fire({
//       imageUrl: './assets/images/success.jpg',
//       imageHeight: 250,
//       title: 'SUCCESS!',
//       text: 'Port has been Activated',
//       showConfirmButton: false,
//       timer: 1500
//     })
//       setTimeout(function(){
//          window.location.reload(1);
//       }, 1000);
// }