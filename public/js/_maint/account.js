$('#role').on('change', function(e) {
    var id   = $("#role").val();
    var role = $("#role option:selected").text();
    $('#job').val(role);
    simPost({id:id}, 'POST', '/getRoleInformation', getRoleInformation);
});

function getRoleInformation(x) {
    $.each(x, function(key, value) {
        $("input#approver").val(value.approver);
    });
}

$('#addAccountForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addAccountForm').serialize();
    simPost(post_data, 'POST', '/createAccount', createAccountResponse);
    e.preventDefault();
    return false;
});

function createAccountResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Role has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addAccountForm')[0].reset();
        $('#addAccountModal').hide();
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

$('#editAccountForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editAccountForm').serialize();
    simPost(post_data, 'POST', '/editAccount', editAccountResponse);
    e.preventDefault();
    return false;
});

function editAccountResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Role has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editAccountForm')[0].reset();
    $('#editAccountModal').hide();
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

$(".editAccount").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getAccount', getAccountResponse);
    e.preventDefault();
});

function getAccountResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_fname").val(value.fname);
        $("input#edit_mname").val(value.mname);
        $("input#edit_lname").val(value.lname);
        $("input#edit_email").val(value.email);
        $("input#edit_job").val(value.job);
        $("input#edit_approver").val(value.approver);
        $("select#edit_role").val(value.role);
    });
}

$('select#edit_role').on('change', function(e) {
    var id      = $("select#edit_role").val();
    var roleE   = $("#edit_role option:selected").text();
    $('#edit_job').val(roleE);
    simPost({id:id}, 'POST', '/getRoleInformation', editGetRoleInformation);
});

function editGetRoleInformation(x) {
    $.each(x, function(key, value) {
        $("input#edit_approver").val(value.approver);
    });
}



  $("a.deactivateAccount").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateAccount', deactivateAccountResponse);
      e.preventDefault();
  });


  $("a.activateAccount").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateAccount', activateAccountResponse);
     e.preventDefault();

  }); 
    function deactivateAccountResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Account has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateAccountResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Account has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}