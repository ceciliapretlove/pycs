$('select[id="equipmentTypeFilter"').on('change', function(e) {
    var id = this.value;
    if(id == '0'){
        location.reload();
    }else{
        $('.equipmentList').html('');
        simPost({id:id}, 'POST', '/v7tHuN6x', filterEquipmentListOnView);
    }
    function filterEquipmentListOnView(x) {
        $.each(x, function(key, value) {
            var model           = value.model ?? '-';
            var year_model      = value.year_model ?? '-';
            var chassis_number  = value.chassis_number ?? '-';
            var plate_number    = value.plate_number ?? '-';
            var engine_model    = value.engine_model ?? '-';
            var location        = value.location ?? '-';
            // status generator html
            if(value.status = 'Active'){
                if(value.pms_status == 'Needs PMS'){ 
                    var bg      = 'bg-danger';
                    var text    = 'Needs PMS';
                    var btn     = '';
                }else{ 
                    var bg      = 'bg-success';
                    var text    = 'Active';
                    var btn     = '<a href="updateEquipmentDetails=vWurSks'+value.id+'faWHGBmHPaMpKdKtfebpRwJLYJCVUcbqcHmPppUSJuy" type="button" class="btn btn-outline-success btn-fw">Edit</a>';
                }
            }else{
                var bg      = 'bg-warning';
                var text    = 'Ongoing repair';
                var btn     = '';
            }
            var statusGen = '<span class="badge badge-dot"><i class="'+bg+'"></i>'+text+'</span>';

            $('tbody[class="equipmentList"]').append(''+
                '<tr class="text-center">'+
                    '<td>'+value.equipment_category+'</td>'+
                    '<td>'+value.equipment_type+'</td>'+
                    '<td>'+value.equipment_id+'<br>'+value.brand+'</td>'+
                    '<td>'+model+'<br>'+year_model+'</td>'+
                    '<td>'+chassis_number+'<br>'+plate_number+'</td>'+
                    '<td>'+engine_model+'</td>'+
                    '<td>'+value.purchase_amount+'<br>'+value.purchase_date+'</td>'+
                    '<td>'+location+'</td>'+
                    '<td>'+statusGen+'</td>'+
                    '<td>'+btn+'</td>'+
                '</tr>'
            );
        });
    }
});

$('select[id="equipment_category"').on('change', function(e) {
    $('input#equipment_id').val('');
    var id = this.value;
    simPost({id:id}, 'POST', '/nyeGKv', getEquipmentTypeBaseOnCategory); 
    simPost({id:id}, 'POST', '/kyJLhm', checkIfPlateNumberEnabled); 
});

function getEquipmentTypeBaseOnCategory(x) {
    $('#equipment_type').html('');
    $('#equipment_type').append($('<option value="">Select One</option>'));
    $.each(x, function (key, value) {
        $('#equipment_type').append($('<option>',{ 
            value: value.id,
            text : value.equipment_type,
        }));
    });
}

$('select[id="equipment_type"').on('change', function(e) {
    let text = $( "#equipment_type option:selected" ).text();
    let acronym = text.split(/\s/).reduce((response,word)=> response+=word.slice(0,1),'').toUpperCase();
    var rInt = Math.random().toString(36).substring(5);
    var r = rInt.toUpperCase();
    var d = new Date();
    var y = d.getFullYear();
    var m = d.getMonth()+1;
    $('input#equipment_id').val(acronym+''+y+''+m+'-'+r);
});

function checkIfPlateNumberEnabled(x) {
    $.each(x, function(key, value)
    {
        if(value.plate_number == 'Yes')
        {
            $('span[id="plateNumberWarn"]').addClass('text-danger').text('*');
            $('input[id="plate_number"]').attr({required:"required", placeholder:"required"});
            $('input[id="pms_type"]').val('2');

        }else{
            $('span[id="plateNumberWarn"]').removeClass('text-danger').text('optional');
            $('input[id="plate_number"]').removeAttr('required','required').removeAttr('placeholder', 'required').attr('placeholder', 'optional');
            $('input[id="pms_type"]').val('1');
        }
    });
}

$('a[id="resetFields"]').on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "to clear this equipment form?",
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



$("#createEquipmentRegistration").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createEquipmentRegistration').serialize();
    simPost(post_data, 'POST', '/createEquipmentRegistration', createEquipmentRegister); 
    e.preventDefault();
    return false;
});


function createEquipmentRegister(x) {
	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Succesfully registered',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.reload(1);
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
