
$('#addShippingLineForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addShippingLineForm').serialize();
    simPost(post_data, 'POST', '/createShippingLine', createShippingLineResponse);
    e.preventDefault();
    return false;
});

function createShippingLineResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Shipping Line has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addShippingLineForm')[0].reset();
        $('#addShippingLineModal').hide();
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

$('#editShippingLineForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editShippingLineForm').serialize();
    simPost(post_data, 'POST', '/editShippingLine', editShippingLineResponse);
    e.preventDefault();
    return false;
});

function editShippingLineResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipping Line has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editShippingLineForm')[0].reset();
    $('#editShippingLineModal').hide();
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

$(".editShippingLine").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getShippingLine', getShippingLineResponse);
    e.preventDefault();
});

function getShippingLineResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_shipping_line").val(value.shipping_line);
        $("textarea#edit_shipping_line_address").val(value.shipping_line_address);
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