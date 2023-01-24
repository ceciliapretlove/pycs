$('select[id="equipment_type"').on('change', function(e) {
    var id = this.value;
    simPost({id:id}, 'POST', '/dnJLtk', getEquipmentBaseOnType); 
});

function getEquipmentBaseOnType(x) {
    $('#equipment').html('');
    $('#equipment').append($('<option value="">Select One</option>'));
    $.each(x, function (key, value) {
        $('#equipment').append($('<option>',{ 
            value: value.id,
            text : '('+value.equipment_id.toUpperCase()+') '+value.brand.toUpperCase()+' - '+value.model.toUpperCase()+' '+value.chassis_number.toUpperCase(),
        }));
    });
}

$('#editDispatchTrippingOperationsReport').on('submit', function(e){
  $('#addModal').modal('hide');
  $('.modal-message').html("");
  $('.error-message').html("");
  $('.form-group').removeClass('has-error');
  var post_data = $('#editDispatchTrippingOperationsReport').serialize();
  simPost(post_data, 'POST', '/editDispatchTrippingOperationsReport', editDispatchTrippingOperationsReport); 
  e.preventDefault();
  return false;
});

function editDispatchTrippingOperationsReport(x) {
    if(x == true){
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Operation/Dispatch/Tripping has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#editDispatchTrippingOperationsReport')[0].reset();
      setTimeout(function(){
         window.location.href = "/dispatchUtilizationTripping";
      }, 1600);
    }else{
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1500
    });

    }
}
