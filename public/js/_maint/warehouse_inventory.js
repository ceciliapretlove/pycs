$(function() {
    var rInt = Math.random().toString(36).substring(5);
    var r = rInt.toUpperCase();
    var d = new Date();
    var y = d.getFullYear();
    $('#item').val('WI'+y+'-'+r);
});

$('#addWarehouseForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#addWarehouseForm').serialize();
    simPost(post_data, 'POST', '/createWarehouseInventory', createWarehouseResponse);
    e.preventDefault();
    return false;
});

function createWarehouseResponse(response) {
    if (response == true) {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'New Material has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
        $('#addWarehouseForm')[0].reset();
        $('#addWarehouseModal').hide();
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

$('#editWarehouseForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editWarehouseForm').serialize();
    simPost(post_data, 'POST', '/editWarehouseInventory', editWarehouseResponse);
    e.preventDefault();
    return false;
});

function editWarehouseResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Material has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editWarehouseForm')[0].reset();
    $('#editWarehouseModal').hide();
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

$(".editWarehouse").on('click', function(e)
{
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({id:id}, 'POST', '/getWarehouseInventory', getWarehouseResponse);
    e.preventDefault();
});

function getWarehouseResponse(response) {

    $.each(response, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_item").val(value.item_id);
        $("input#edit_serial").val(value.serial_id);
        $("input#edit_item_name").val(value.item_name);
        $("input#edit_brand").val(value.brand);
        $("input#edit_condition").val(value.conditions);
        $("select#edit_location").val(value.location);
        $("input#edit_purchased_price").val(value.purchased_price);
        $("input#edit_qty").val(value.qty);
        $("input#edit_unit").val(value.unit);
    });
}

  $("a.deactivateWarehouse").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/deactivateWarehouseInventory', deactivateWarehouseResponse);
      e.preventDefault();
  });


  $("a.activateWarehouse").on('click', function(e)
  {
      var id = this.id;
      simPost({id:id}, 'POST', '/activateWarehouseInventory', activateWarehouseResponse);
     e.preventDefault();

  }); 
    function deactivateWarehouseResponse(response)
{

      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Warehouse has been Deactivated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}
  function activateWarehouseResponse(response)
{
      Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Warehouse has been Activated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}