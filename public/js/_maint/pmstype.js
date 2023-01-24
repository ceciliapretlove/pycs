$('#pms_main_var').on('change', function(){
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var pms_main_var = $('#pms_main_var').val();

  $('div[id="pms_milestone"]').html('');
  if(pms_main_var == 1){ /*perhour*/
    $('div[id="pms_milestone"]').append(''+
        '<label for="pms_milestone">PMS Milestone <span class="text text-danger">*</span></label>'+
        '<input type="number" class="form-control" id="pms_milestone" name="pms_milestone" required="" placeholder="KM Milestone e.g. 200 hr">'+
        '<small class="error-message" id="error-pms_milestone"></small>'
    );
  }
  if(pms_main_var == 2){ /*perKM*/
    $('div[id="pms_milestone"]').append(''+
        '<label for="pms_milestone">PMS Milestone <span class="text text-danger">*</span></label>'+
        '<input type="number" class="form-control" id="pms_milestone" name="pms_milestone" required="" placeholder="KM Milestone e.g. 300 km">'+
        '<small class="error-message" id="error-pms_milestone"></small>'
    );
  }
  if(pms_main_var == 3){ /*specificDate*/
    $('div[id="pms_milestone"]').append(''+
        '<label for="pms_milestone">PMS Milestone <span class="text text-danger">*</span></label>'+
        '<input type="date" class="form-control" id="pms_milestone" name="pms_milestone" required="">'+
        '<small class="error-message" id="error-pms_milestone"></small>'
    );
  }
});


$('#addPMSTypeForm').on('submit', function(e){
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#addPMSTypeForm').serialize();
  simPost(post_data, 'POST', '/createPmsType', creatPMSResponse); 
  e.preventDefault();
  return false;
});

$('#wpgM9FWzB6gCpVNB').on('submit', function(e){
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#wpgM9FWzB6gCpVNB').serialize();
  simPost(post_data, 'POST', '/wpgM9FWzB6gCpVNB', wpgM9FWzB6gCpVNB); 
  e.preventDefault();
  return false;
});

function wpgM9FWzB6gCpVNB(x) {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'PMS required item added',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
}


function creatPMSResponse(response) {
	if(response==true)
	{
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'PMS has been Added.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#addPMSTypeForm')[0].reset();
    $('#addPMSModal').modal('hide');
      setTimeout(function(){
         // window.location.reload(1);
         location.reload();
      }, 1000);

	}
	else 
	{
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please check the details.',
      showConfirmButton: false,
      timer: 1500
    })
	} 
	return false;
}

$('#editPMSTypeForm').on('submit', function(e)
{
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#editPMSTypeForm').serialize();
  simPost(post_data, 'POST', '/editPmsType', editPMSTypeResponse); 
  e.preventDefault();
  return false;
});

function editPMSTypeResponse(response)
{
  if(response==1)
  {
  Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'PMS has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editPMSTypeForm')[0].reset();
    $('#editPMSModal').modal('hide');
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
    });
	} 
	return false;
}

$(".editPms").on('click', function(e)
{
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({id:id}, 'POST', '/getPmsType', getPMSResponse);
    e.preventDefault();
});

$('#editPMSItemForm').on('submit', function(e){
  $('.modal-message').html("");
  $('.error-message').html("");
  $('.form-group').removeClass('has-error');
  var post_data = $('#editPMSItemForm').serialize();
  simPost(post_data, 'POST', '/editPMSItem', editPMSItemResponse); 
  e.preventDefault();
});

function editPMSItemResponse(x) {
  if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'PMS Preset Item Succesfully updated',
      showConfirmButton: false,
      timer: 1500
    })
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

function getPMSResponse(response)
{

    $.each(response, function(key, value)
    {
        $("input#id").val(value.id);
        $("select#pms_type").val(value.pms_type);
    });
}
$(".deletePmsItem").on('click', function (e) {
    var id = this.id;
    simPost({id:id}, 'POST', '/deletePmsItem', deletePmsItemResponse);
    e.preventDefault();
});


$(".editPmsItem").on('click', function(e)
{
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({id:id}, 'POST', '/getPmsItem', getPMSItemResponse);
{    e.preventDefault();}
});
function getPMSItemResponse(response)
{

    $.each(response, function(key, value)
    {
        $("input#id").val(value.id);
        $("input#amount").val(value.amount);
        $("input#remarks").val(value.remarks);
         $("select#edit_warehouse_item").val(value.warehouse_item);

    });
}
function deletePmsItemResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'PMS has been Deleted.',
      showConfirmButton: false,
      timer: 1500
    })

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
      text: 'Please check the details.',
      showConfirmButton: false,
      timer: 1500
    })
  } 
  return false;
}
/* Variables */
var p = $("#participants").val();
var row = $(".participantRow");

/* Functions */
function getP(){
  p = $("#participants").val();
}

function addRow() {
  row.clone(true, true).appendTo("#participantTable");
}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#participantTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#participants").val(i);
  }
  $(this).closest("tr").appendTo("#participantTable");
  if ($("#participantTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#participantTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#participantTable tr").length - 1 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#participants").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#participants").val(i);
  }
});
$("#participants").change(function () {
  var i = 0;
  p = $("#participants").val();
  var rowCount = $("#participantTable tr").length - 2;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#participantTable #addButtonRow").appendTo("#participantTable");
  } else if(p < rowCount) {
  }
});