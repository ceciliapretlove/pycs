$('select[id="equipment_type"').on('change', function(e) {
    var id = this.value;
    simPost({id:id}, 'POST', '/dnJLtk', getEquipmentBaseOnType); 
});

function getEquipmentBaseOnType(x) {
    $('#equipment').html('');
    $('#equipment').append($('<option value="">Select One</option>'));
    $.each(x, function (key, value) {
        var model           = value.model ?? '-';
        var year_model      = value.year_model ?? '-';
        var chassis_number  = value.chassis_number ?? '-';
        $('#equipment').append($('<option>',{ 
            value: value.id,
            text : '('+value.equipment_id.toUpperCase()+') '+value.brand.toUpperCase()+' - '+model.toUpperCase()+' '+chassis_number.toUpperCase(),
        }));
    });
}

$('a[id="resetFields"]').on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "to clear this operations form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            location.reload();
        }
    })
});

$('#createDispatchTrippingOperationsReport').on('submit', function(e){
  $('#addModal').modal('hide');
  $('.modal-message').html("");
  $('.error-message').html("");
  $('.form-group').removeClass('has-error');
  var post_data = $('#createDispatchTrippingOperationsReport').serialize();
  simPost(post_data, 'POST', '/createDispatchTrippingOperationsReport', createDispatchTrippingOperationsReport); 
  e.preventDefault();
  return false;
});

function createDispatchTrippingOperationsReport(x) {
    if(x == true){
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Dispatch Tripping has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#createDispatchTrippingOperationsReport')[0].reset();
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
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

