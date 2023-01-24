$(function() {
	var rInt = Math.random().toString(36).substring(5);
	var r = rInt.toUpperCase();
	var d = new Date();
	var y = d.getFullYear();
    var m = d.getMonth()+1;
  $('#diagnostics_id').val('DI'+y+m+'-'+r);
});

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

$(".removePresetItemRow").on('click', function(e) {
    var id = this.id;
    Swal.fire({
        title: 'Are you sure?',
        text: "Remove this item row",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            deletePresetItemRow(id);
        }
    })
});

function deletePresetItemRow(id) {
    $("tr#row_"+id).html('');
}

$('#aUpfydEaMGWkSAm').on('submit', function(e){
  $('#addModal').modal('hide');
  $('.modal-message').html("");
  $('.error-message').html("");
  $('.form-group').removeClass('has-error');
  var post_data = $('#aUpfydEaMGWkSAm').serialize();
  simPost(post_data, 'POST', '/createJobOrder', createJobOrder); 
  e.preventDefault();
  return false;
});

function createJobOrder(x) {
	if(x == true){
	Swal.fire({
	      imageUrl: './assets/images/success.jpg',
	      imageHeight: 250,
	      title: 'SUCCESS!',
	      text: 'Fleet Succesfully registered',
	      showConfirmButton: false,
	      timer: 1500
	    })
		setTimeout(function(){
		 window.location.href = '/joborder';
		}, 2000);
	}else{
		Swal.fire({
		imageUrl: './assets/images/error.jpg',
		imageHeight: 250,
		title: 'Oops Sorry!',
		text: 'Please double check the required fields',
		showConfirmButton: false,
		timer: 1500
		})
	}
}

$('#warehouse_item_add').on('change', function(e) {
    var id   = $("#warehouse_item_add").val();
    simPost({id:id}, 'POST', '/getWarehouseItem', getWarehouseItem);
    e.preventDefault();
});

function getWarehouseItem(x) {
    $.each(x, function(key, value) {
      $("input#qty_add").val(value.qty);
      $("input#unit_add").val(value.unit);
      $("input#item_id_add").val(value.item_id);
      $("input#amount_add").val(value.purchased_price);
    });
}

$('a#attachNewItem').on('click', function(){


  $("#addItemRowModal").modal('hide');

  var rInt = Math.random().toString(36).substring(5);
  var r = rInt.toUpperCase();
  var d = new Date();
  var y = d.getFullYear();
  var rowAttachedId = ('row_'+y+''+r);

  var warehouse_item_add  = $("#warehouse_item_add").val();
  var wiText              = $("#warehouse_item_add option:selected").text();
  var qty_add             = $("input#qty_add").val();
  var unit_add            = $("input#unit_add").val();
  var item_id_add         = $("input#item_id_add").val();
  var amount_add          = $("input#amount_add").val();


  $('tbody[id="newItemAttachedFromModal"]').append(''+
      '<tr class="text-center" id="row_'+rowAttachedId+'">'+
        '<td>'+wiText+'<input type="hidden" id="item_id" name="item_id[]" class="form-control" value="'+warehouse_item_add+'" readonly="" required=""></td>'+
        '<td><input type="text" id="qty" name="qty[]" value="'+qty_add+'" required=""></td>'+
        '<td><input type="text" id="unit" name="unit[]" class="form-control text-center" value="'+unit_add+'" required="" readonly=""></td>'+
        '<td><input type="text" id="reference_id" name="reference_id[]" class="form-control " value="'+item_id_add+'" required="" readonly=""></td>'+
        '<td><input type="number" id="purchased_price" name="purchased_price[]" class="text-right" value="'+amount_add+'" required=""></td>'+
        '<td><a class="btn btn-danger btn-custom removePresetItemRow text-white" id="'+warehouse_item_add+'"><i class="fa fa-times"></i></a>'+
      '</tr>'
  );

});


$('.addItem').on('click', function(){

  $("#addItemRow")[0].reset();

});

$('#createEquipmentMaintenanceBtn').on('click', function(e){
  var id = $("select[id='equipment']").val();
  Swal.fire({
        title: 'Are you sure?',
        text: "this equipment will generate a repair & maintenance form",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/nFxXnHQmJYpkfYy"+id+"zpDzaFKYrDnQQfr";
        }
    })
});
