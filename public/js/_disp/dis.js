$('select[id="equipmentTypeFilter"').on('change', function(e) {
    var id = this.value;
    if(id == '0'){
        location.reload();
    }else{
        $('#dispatchListTable').html('');
        simPost({id:id}, 'POST', '/pX5xbNtn', filterDispatchBaseOnFilter);
    }
    function filterDispatchBaseOnFilter(x) {
        $.each(x, function(key, value) {
            var brand           = value.brand ?? '-';
            var model           = value.model ?? '-';
            var year_model      = value.year_model ?? '-';
            var chassis_number  = value.chassis_number ?? '-';
            var plate_number    = value.plate_number ?? '-';
            var engine_model    = value.engine_model ?? '-';
            var location        = value.location ?? '-';
            // status generator html
            if(value.status == 'Created'){
              var bg      = 'bg-default';
              var text    = 'Created';
              var user    = value.prep_lname+' ('+value.created_at+')';
              var btn     = '<a type="button" class="btn btn-outline-info btn-xs" href="updateDispatchTripping=adzatECREX'+value.id+'ctTQbxFBLFbZxEFenjHshKxZRsPdJetWvxuFEvu">Edit</a>';
            }else if(value.status == 'Checked'){
              var bg      = 'bg-warning';
              var text    = 'Checked';
              var user    = value.check_lname+' ('+value.checked_at+')';
              var btn     = '<a type="button" class="btn btn-outline-success btn-xs" href="viewDispatchTripping=mcukBsRETf'+value.id+'LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq">View</a>';
            }else{
              var bg      = 'bg-success';
              var text    = 'Completed';
              var user    = value.rev_lname+' ('+value.reviewed_at+')';
              var btn     = '<a type="button" class="btn btn-outline-success btn-xs" href="viewDispatchTripping=mcukBsRETf'+value.id+'LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq">View</a>';
            }
            
            var statusGen = '<span class="badge badge-dot"><i class="'+bg+'"></i>'+text+'</span>';

            $('tbody[id="dispatchListTable"]').append(''+
                '<tr class="text-center">'+
                    '<td>'+value.odt_date+'</td>'+
                    '<td><b>'+brand+'</b> - '+model+'<br>'+value.equipment_id_num+'</td>'+
                    '<td>'+location+'</td>'+
                    '<td>'+value.prep_lname+', '+value.prep_fname+'</td>'+
                    '<td>'+statusGen+'</td>'+
                    '<td>'+btn+'</td>'+
                '</tr>'
            );
        });
    }
});

$(".addTrip").on('click', function(e) {
    $('#zTsAex')[0].reset();
});

$("#fleet_type").on('change', function(e) {
    var id 	= $("#fleet_type").val();
    simPost({id:id}, 'POST', '/getFleetRegister', getFleetRegister); 
});

function getFleetRegister(x) {
	$('#fleet_unit').html('');
	$('#fleet_unit').append($('<option value="">Select One</option>'));
	$.each(x, function (key, value) {
		$('#fleet_unit').append($('<option>',{ 
		    value: value.id,
		    text : '('+value.equipment_id+') '+value.model+' ['+value.chassis_number+']',
		}));
	});
}

// $("#date_coverage_start").on('change', function(e) {
//     var date_coverage_start = $("#date_coverage_start").val();
//     var fleet_unit			= $("#fleet_unit").val();
// 	    // if(date_coverage_start != null){

// 	    // }
// });

// $("#fleet_unit").on('change', function(e) {
// 	var date_coverage_start = $("#date_coverage_start").val();
//     var fleet_unit			= $("#fleet_unit").val();
// });


$('#zTsAex').on('submit', function(e){
  
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#zTsAex').serialize();
  simPost(post_data, 'POST', '/zTsAex', zTsAex); 
  e.preventDefault();
  return false;
});

function aAVAasdvawe(x) {
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

function zTsAex(x) {
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Dispatch Tripping Succesfully Added',
    showConfirmButton: false,
    timer: 1500
  })
  $('#zTsAex')[0].reset();
  $('#addModal').hide();
  window.setInterval(function(){
    location.reload;
  }, 1600);


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

$('#VakjsK').on('submit', function(e){
  
  $('.modal-message').html('');
  $('.error-message').html(""); //reset messages
  $('.form-group').removeClass('has-error');
  var post_data = $('#VakjsK').serialize();
  simPost(post_data, 'POST', '/VakjsK', VakjsK); 
  e.preventDefault();
  return false;
});

function VakjsK(x) {
  $('#VakjsK')[0].reset();
  $('#editModal').hide();
  Swal.fire({
    imageUrl: './assets/images/success.jpg',
    imageHeight: 250,
    title: 'SUCCESS!',
    text: 'Dispatch trip updated',
    showConfirmButton: false,
    timer: 1500
    })
    setTimeout(function(){
     window.location.reload(1);
    }, 1000);
}

//ADD TRIP
$('.starthours').on('blur', function(e){
  calculateTime();
});
$('.endhours').on('blur', function(e){
  calculateTime();
});

function calculateTime() {
  var startTime   = $('input.starthours').val();
  var endTime     = $('input.endhours').val();
  var dif = ( new Date("1970-1-1 " + endTime) - new Date("1970-1-1 " + startTime) ) / 1000 / 60 / 60;
  if(dif <= 0){

  }else{
    $('input#totalhours').val(dif.toFixed(2));
  }
};

$('.startkms').on('change', function(e){
  calculateKms();
});
$('.endkms').on('change', function(e){
  calculateKms();
});

function calculateKms() {
  var start   = parseFloat($('input.startkms').val());
  var end     = parseFloat($('input.endkms').val());
  var dif     = end - start;
  if(dif <= 0){

  }else{
    $('input#totalkms').val(dif);
  }
};

//EDIT TRIP
$('.editstarthours').on('change', function(e){
  calculateEditTime();
});
$('.editendhours').on('change', function(e){
  calculateEditTime();
});
function calculateEditTime() {
  var startTime   = $('input.editstarthours').val();
  var endTime     = $('input.editendhours').val();
  var dif = ( new Date("1970-1-1 " + endTime) - new Date("1970-1-1 " + startTime) ) / 1000 / 60 / 60;
  if(dif <= 0){

  }else{
    $('input#edittotalhours').val(dif.toFixed(2));
  }
};

$('.editstartkms').on('change', function(e){
  calculateEditKms();
});
$('.editendkms').on('change', function(e){
  calculateEditKms();
});

function calculateEditKms() {
  var start   = parseFloat($('input.editstartkms').val());
  var end     = parseFloat($('input.editendkms').val());
  var dif     = end - start;
  if(dif <= 0){

  }else{
    $('input#edittotalkms').val(dif);
  }
};

$(".editDispatchTrip").on('click', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getTrip', getTripResponse);
    e.preventDefault();
});

function getTripResponse(z) {
    $.each(z, function(key, value) {
        $("input#id").val(value.id);
        $("input#editdate").val(value.date);
        $("select#editlocation").val(value.location);
        $("input#editstarthours").val(value.operating_hours_start);
        $("input#editendhours").val(value.operating_hours_end);
        $("input#editstartkms").val(value.operating_kms_start);
        $("input#editendkms").val(value.operating_kms_end);
        $("input#edittotalhours").val(value.total_hours);
        $("input#edittotalkms").val(value.total_kms);
        $("input#runhours").val(value.running_hours);
        $("input#runkms").val(value.running_kms);
        $("input#refuel").val(value.consumption);
    });
}

$(".deleteDispatchTrip").on('click', function(e)
{
  var id = this.id;
  simPost({id:id}, 'POST', '/deleteDispatchTrip', deleteDispatchTripResponse);
 e.preventDefault();

}); 
function deleteDispatchTripResponse(response)
{
  Swal.fire({
  imageUrl: './assets/images/success.jpg',
  imageHeight: 250,
  title: 'SUCCESS!',
  text: 'Dispatch Tripping Succesfully Deleted',
  showConfirmButton: false,
  timer: 1500
})
  setTimeout(function(){
     window.location.reload(1);
  }, 1000);
}


$(".approveDispatchTrip").on('click', function(e)
{
    var id = this.id;
    Swal.fire({
        title: 'Are you sure?',
        text: "Approve this trip record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/uMajHq', uMajHq);
        }
    })
}); 

function uMajHq(x) {
    if(x == 1){
        Swal.fire({
            imageUrl: './assets/images/success.jpg',
            imageHeight: 250,
            title: 'SUCCESS!',
            text: 'Dispatch Tripping Succesfully Approved',
            showConfirmButton: false,
            timer: 1500
        })
        setTimeout(function(){
            window.location.reload(1);
        }, 1000);
    }
}

$(".rejectDispatchTrip").on('click', function(e)
{
    var id = this.id;
    Swal.fire({
        title: 'Are you sure?',
        text: "Reject this trip record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/kBAUFm', kBAUFm);
        }
    })
}); 

function kBAUFm(x) {
    Swal.fire({
        imageUrl: './assets/images/success.jpg',
        imageHeight: 250,
        title: 'SUCCESS!',
        text: 'Dispatch Tripping Succesfully Rejected',
        showConfirmButton: false,
        timer: 1500
    })
    setTimeout(function(){
        window.location.reload(1);
    }, 1000);
}

$(".completeReport").on('click', function(e)
{
    var id = this.id;
    Swal.fire({
      title: 'Period coverage end',
      html: '<input type="date" id="date_coverage_end" name="date_coverage_end" class="form-control">',
      inputAttributes: {
        autocapitalize: 'off',
      },
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: (date) => {
        var dce = $('#date_coverage_end').val();
        return fetch(`/caHeWLvr/${dce}`)
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if(result.isConfirmed){
        var dce = $('#date_coverage_end').val();
        completeReportFinalize(id, dce);
      }
    })
}); 

function completeReportFinalize(id, dce) {
    simPost({id:id, dce:dce}, 'POST', '/vgcTeRwy', vgcTeRwy);
}

function vgcTeRwy(x) {
    Swal.fire({
        imageUrl: './assets/images/success.jpg',
        imageHeight: 250,
        title: 'SUCCESS!',
        text: 'Dispatch/Tripping succesfully closed and completed',
        showConfirmButton: false,
        timer: 1500
    })
    setTimeout(function(){
        window.location.reload(1);
    }, 1000);
}