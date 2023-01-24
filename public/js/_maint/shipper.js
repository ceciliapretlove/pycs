
$('#addShipperForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addShipperForm').serialize();
    simPost(post_data, 'POST', '/createShipper', createShipperResponse);
    e.preventDefault();
    return false;
});

function createShipperResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Shipper Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addShipperForm')[0].reset();
        $('#addShipperModal').hide();
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

$('#editShipperForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editShipperForm').serialize();
    simPost(post_data, 'POST', '/editShipper', editShipperResponse);
    e.preventDefault();
    return false;
});

function editShipperResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipper has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editShipperForm')[0].reset();
    $('#editShipperModal').hide();
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

$(".editShipper").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getShipper', getShipperResponse);
    e.preventDefault();
});

function getShipperResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_shipper").val(value.shipper);
        $("textarea#edit_shipper_address").val(value.shipper_address);
    });
}


  $("a.deactivateShipper").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateShipper', deactivateShipperResponse);
      e.preventDefault();
  });


  $("a.activateShipper").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateShipper', activateShipperResponse);
     e.preventDefault();

  }); 
    function deactivateShipperResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipper has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateShipperResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Shipper has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}