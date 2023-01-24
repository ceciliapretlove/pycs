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

$("#updateEquipmentRegistration").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateEquipmentRegistration').serialize();
    simPost(post_data, 'POST', '/editEquipmentRegister', updateEquipmentRegistration); 
    e.preventDefault();
    return false;
});


function updateEquipmentRegistration(x) {
if(x == true){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Equipment Succesfully updated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.href = "/equipmentRegister";
      }, 1600);
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
