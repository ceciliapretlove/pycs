$(".addRoleBtn").on('click', function(e) {
    $('#addRoleForm')[0].reset();
    $('#editRoleForm')[0].reset();
});

$('#addRoleForm').on('submit', function(e){
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#addRoleForm').serialize();
  simPost(post_data, 'POST', '/createRole', createRoleResponse); 
  e.preventDefault();
  return false;
});

function createRoleResponse(response) {
	if(response==true)
	{

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Role has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#addRoleForm')[0].reset();
    $('#addRoleModal').hide();
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

$('#editRoleForm').on('submit', function(e)
{
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#editRoleForm').serialize();
  simPost(post_data, 'POST', '/editRole', editRoleResponse); 
  e.preventDefault();
  return false;
});

function editRoleResponse(response)
{
  if(response==1)
  {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Role has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editRoleForm')[0].reset();
    $('#editRoleModal').hide();
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

$(".editRole").on('click', function(e)
{
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({id:id}, 'POST', '/getRole', getRoleResponse);
    e.preventDefault();
});

function getRoleResponse(response)
{

    $.each(response, function(key, value)
    {
        $("input#id").val(value.id);
        $("input#title").val(value.title);
        $("select#approver").val(value.approver);
    });
}