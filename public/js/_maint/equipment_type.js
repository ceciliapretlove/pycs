$(".addEquipmentTypeBtn").on('click', function(e) {
    $('#addEquipmentTypeForm')[0].reset();
    $('#editEquipmentTypeForm')[0].reset();
});

$('#addEquipmentTypeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addEquipmentTypeForm').serialize();
    simPost(post_data, 'POST', '/createEquipmentType', createEquipmentTypeResponse);
    e.preventDefault();
    return false;
});

function createEquipmentTypeResponse(response) {
    if (response == true) {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Type has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
      $('#addEquipmentTypeForm')[0].reset();
      $('#addEquipmentTypeModal').modal('hide');
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

$('#editEquipmentTypeForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editEquipmentTypeForm').serialize();
    simPost(post_data, 'POST', '/editEquipmentType', editEquipmentTypeResponse);
    $('#editEquipmentTypeModal').modal('hide');
    e.preventDefault();
    return false;
});

function editEquipmentTypeResponse(response) {
    $('#editEquipmentTypeForm')[0].reset();
    $('#editEquipmentTypeModal').modal('hide');
    if (response == 1) {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Type has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
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

$(".editEquipmentType").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getEquipmentType', getEquipmentTypeResponse);
    e.preventDefault();
});

function getEquipmentTypeResponse(response) {

    $.each(response, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_equipment_type").val(value.equipment_type);
        $("select#edit_equipment_category").val(value.equipment_category);
        $("select#edit_status").val(value.status);
    });
}

  $("span.deactivateEquipmentType").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateEquipmentType', deactivateEquipmentTypeResponse);
      e.preventDefault();
  });


  $("span.activateEquipmentType").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateEquipmentType', activateEquipmentTypeResponse);
     e.preventDefault();

  }); 

    function deactivateEquipmentTypeResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Type has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateEquipmentTypeResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Type has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}