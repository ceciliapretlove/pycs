$(".addEquipmentCategoryBtn").on('click', function(e) {
    $('#addEquipmentCategoryForm')[0].reset();
    $('#editEquipmentCategoryForm')[0].reset();
});

$('#addEquipmentCategoryForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addEquipmentCategoryForm').serialize();
    simPost(post_data, 'POST', '/createEquipmentCategory', createEquipmentCategoryResponse);
    e.preventDefault();
    return false;
});

function createEquipmentCategoryResponse(response) {
    if (response == true) {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Category has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
      $('#addEquipmentCategoryForm')[0].reset();
      $('#addEquipmentCategoryModal').modal('hide');
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

$('#editEquipmentCategoryForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editEquipmentCategoryForm').serialize();
    simPost(post_data, 'POST', '/editEquipmentCategory', editEquipmentCategoryResponse);
    e.preventDefault();
    return false;
});

function editEquipmentCategoryResponse(response) {
    $('#editEquipmentCategoryModal').modal('hide');
    $('#editEquipmentCategoryForm')[0].reset();
    if (response == 1) {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Category has been updated.',
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

$(".editEquipmentCategory").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getEquipmentCategory', getEquipmentCategoryResponse);
    e.preventDefault();
});

function getEquipmentCategoryResponse(response) {

    $.each(response, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_type").val(value.type);
        $("select#edit_plate_number").val(value.plate_number);
    });
}

  $("a.deactivateEquipmentCategory").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateEquipmentCategory', deactivateEquipmentCategoryResponse);
      e.preventDefault();
  });


  $("a.activateEquipmentCategory").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateEquipmentCategory', activateEquipmentCategoryResponse);
     e.preventDefault();

  }); 

    function deactivateEquipmentCategoryResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Category has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateEquipmentCategoryResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Fleet Type has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}