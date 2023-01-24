
$('#addCheckTypeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addCheckTypeForm').serialize();
    simPost(post_data, 'POST', '/createCheckType', createCheckTypeResponse);
    e.preventDefault();
    return false;
});

function createCheckTypeResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Check Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addCheckTypeForm')[0].reset();
        $('#addCheckTypeModal').hide();
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

$('#editCheckTypeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editCheckTypeForm').serialize();
    simPost(post_data, 'POST', '/editCheckType', editCheckTypeResponse);
    e.preventDefault();
    return false;
});

function editCheckTypeResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipping Line has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editCheckTypeForm')[0].reset();
    $('#editCheckTypeModal').hide();
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

$(".editCheckType").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getCheckType', getCheckTypeResponse);
    e.preventDefault();
});

function getCheckTypeResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_code").val(value.code);
        $("textarea#edit_description").val(value.description);
    });
}


//   $("a.deactivateShipper").on('click', function(e)
//   {
//       var id = this.id;
//       simPost({id:id}, 'POST', '/deactivateShipper', deactivateShipperResponse);
//       e.preventDefault();
//   });


//   $("a.activateShipper").on('click', function(e)
//   {
//       var id = this.id;
//       simPost({id:id}, 'POST', '/activateShipper', activateShipperResponse);
//      e.preventDefault();

//   }); 
//     function deactivateShipperResponse(response)
// {

//       Swal.fire({
//       imageUrl: './assets/images/success.jpg',
//       imageHeight: 250,
//       title: 'SUCCESS!',
//       text: 'Shipper has been Deactivated',
//       showConfirmButton: false,
//       timer: 1500
//     })
//       setTimeout(function(){
//          window.location.reload(1);
//       }, 1000);
// }
//   function activateShipperResponse(response)
// {
//       Swal.fire({
//       imageUrl: './assets/images/success.jpg',
//       imageHeight: 250,
//       title: 'SUCCESS!',
//       text: 'Shipper has been Activated',
//       showConfirmButton: false,
//       timer: 1500
//     })
//       setTimeout(function(){
//          window.location.reload(1);
//       }, 1000);
// }