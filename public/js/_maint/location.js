$(".addLocationBtn").on('click', function(e) {
    $('#addLocationForm')[0].reset();
    $('#editLocationForm')[0].reset();
});

$('#addLocationForm').on('submit', function(e){
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#addLocationForm').serialize();
  simPost(post_data, 'POST', '/createLocation', createLocationResponse); 
  e.preventDefault();
  return false;
});

function createLocationResponse(response) {
	if(response==true)
	{
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Location has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#addLocationForm')[0].reset();
    $('#addLocationModal').modal('hide');
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
	}
	else 
	{
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

$('#editLocationForm').on('submit', function(e)
{
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#editLocationForm').serialize();
  simPost(post_data, 'POST', '/editLocation', editLocationResponse); 
  e.preventDefault();
  return false;
});

function editLocationResponse(response)
{
  if(response==1)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Location has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editLocationForm')[0].reset();
    $('#editLocationModal').modal('hide');
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
	}
	else 
	{
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

$(".editLocation").on('click', function(e)
{
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({id:id}, 'POST', '/getLocation', getLocationResponse);
    e.preventDefault();
});

function getLocationResponse(response)
{

    $.each(response, function(key, value)
    {
        $("input#id").val(value.id);
        $("input#location").val(value.location);
    });
}