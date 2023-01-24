$('select[id="equipment_category"').on('change', function(e) {
    $('input#equipment_id').val('');
    var id = this.value;
    simPost({id:id}, 'POST', '/nyeGKv', getEquipmentTypeBaseOnCategory); 
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


$('#generateReportBtn').on('click', function(e){
	$('#filterEquipmentStatus').modal('hide');
	$('.modal-message').html('');
	$('.error-message').html(""); //reset messages
	$('.form-group').removeClass('has-error');
	var post_data = $('#filterEquipmentStatusForm').serialize();
	simPost(post_data, 'POST', '/getEquipmentsBaseOnFilter', getEquipmentsBaseOnFilter);
	e.preventDefault();
	return false;
});

function getEquipmentsBaseOnFilter(x) {
	$('#gLzVMcY').html('');
	$("input[id='totalEq']").val(x.length);
	$.each(x, function(key, value) {
		var id = value.id;
		$('tbody[id="gLzVMcY"]').append(''+
	      '<tr class="text-center" id="row_'+id+'">'+
	        '<td><small>'+value.equipment_id+'<br>'+value.model+' ('+value.year_model+')</small></td>'+
	        '<td><small>'+value.plate_number+'<br>'+value.chassis_number+'</small></td>'+
	        '<td class="contentTD" id="'+id+'_01"></td>'+
	        '<td class="contentTD" id="'+id+'_02"></td>'+
	        '<td class="contentTD" id="'+id+'_03"></td>'+
	        '<td class="contentTD" id="'+id+'_04"></td>'+
	        '<td class="contentTD" id="'+id+'_05"></td>'+
	        '<td class="contentTD" id="'+id+'_06"></td>'+
	        '<td class="contentTD" id="'+id+'_07"></td>'+
	        '<td class="contentTD" id="'+id+'_08"></td>'+
	        '<td class="contentTD" id="'+id+'_09"></td>'+
	        '<td class="contentTD" id="'+id+'_10"></td>'+
	        '<td class="contentTD" id="'+id+'_11"></td>'+
	        '<td class="contentTD" id="'+id+'_12"></td>'+
	        '<td class="contentTD" id="'+id+'_13"></td>'+
	        '<td class="contentTD" id="'+id+'_14"></td>'+
	        '<td class="contentTD" id="'+id+'_15"></td>'+
	        '<td class="contentTD" id="'+id+'_16"></td>'+
	        '<td class="contentTD" id="'+id+'_17"></td>'+
	        '<td class="contentTD" id="'+id+'_18"></td>'+
	        '<td class="contentTD" id="'+id+'_19"></td>'+
	        '<td class="contentTD" id="'+id+'_20"></td>'+
	        '<td class="contentTD" id="'+id+'_21"></td>'+
	        '<td class="contentTD" id="'+id+'_22"></td>'+
	        '<td class="contentTD" id="'+id+'_23"></td>'+
	        '<td class="contentTD" id="'+id+'_24"></td>'+
	        '<td class="contentTD" id="'+id+'_25"></td>'+
	        '<td class="contentTD" id="'+id+'_26"></td>'+
	        '<td class="contentTD" id="'+id+'_27"></td>'+
	        '<td class="contentTD" id="'+id+'_28"></td>'+
	        '<td class="contentTD" id="'+id+'_29"></td>'+
	        '<td class="contentTD" id="'+id+'_30"></td>'+
	        '<td class="contentTD" id="'+id+'_31"></td>'+
	      '</tr>'
  		);
	});
	var post_data = $('#filterEquipmentStatusForm').serialize();
	simPost(post_data, 'POST', '/gjUWAVuzfEXpZkgh', gjUWAVuzfEXpZkgh); 
}

function gjUWAVuzfEXpZkgh(x) {
	$.each(x, function(key, value) {
		var location 	= value.location;
		var loc 		= location.substring(0, 3);
		$('td[id="'+value.equipment_id+'_'+value.date+'"]').css({"background-color":"#1F6980", "font-weight":"bold", "color":"#ffffff"}).html('<span><small>'+loc+'</small></span>');
		updateTotalDeployedFooter(value.date);
	});
	var post_data = $('#filterEquipmentStatusForm').serialize();
	simPost(post_data, 'POST', '/vdeZgqxkQgKntdqe', vdeZgqxkQgKntdqe); 
}

function vdeZgqxkQgKntdqe(x) {
	$.each(x, function(key, value) {
		var location 	= value.location;
		var loc 		= location.substring(0, 3);
		$('td[id="'+value.equipment_id+'_'+value.date+'"]').css({"background-color":"#FAAE43", "font-weight":"bold", "color":"#ffffff"}).html('<span><small>'+loc+'</small></span>');
		updateTotalUnderRepairFooter(value.date);
	});
	var post_data = $('#filterEquipmentStatusForm').serialize();
	simPost(post_data, 'POST', '/fAhSJBseFSEJYCmh', fAhSJBseFSEJYCmh); 
}

function fAhSJBseFSEJYCmh(x) {
	$.each(x, function(key, value) {
		var location 	= value.location;
		var loc 		= location.substring(0, 3);
		$('td[id="'+value.equipment_id+'_'+value.date+'"]').css({"background-color":"#998973", "font-weight":"bold", "color":"#ffffff"}).html('<span><small>'+loc+'</small></span>');
	});
}

function updateTotalDeployedFooter(d){
	var existingInput 	= $('input[id=input_total_d_'+d+']').val();
	var rawInput		= parseInt(existingInput)+1;
	var totalEq 		= $('input[id="totalEq"]').val();
	var newInput 		= ((rawInput/totalEq)*100).toFixed(0);

	$('input[id=input_total_d_'+d+']').val(newInput);
	$('span[id=total_d_'+d+']').html(newInput+'%');
}

function updateTotalUnderRepairFooter(u) {
	var existingInput 	= $('input[id=input_total_ur_'+u+']').val();
	var rawInput		= parseInt(existingInput)+1;
	var totalEq 		= $('input[id="totalEq"]').val();
	var newInput 		= ((rawInput/totalEq)*100).toFixed(0);
	$('input[id=input_total_ur_'+u+']').val(newInput);
	$('span[id=total_ur_'+u+']').html(newInput+'%');
	findTotalIdle();
}

function findTotalIdle(){
	$('td[class="contentTd"]:empty').each(function() {
		var emptyTD = $(this).attr('id');
		$('td[id="'+emptyTD+'"]').html('<span><small>-</small></span>');
		var splitId = emptyTD.split("_").pop();
		
		var existingInput 	= $('input[id=input_total_i_'+splitId+']').val();
		var newInput		= parseInt(existingInput)+1;
		$('input[id=input_total_i_'+splitId+']').val(newInput);
		$('span[id=total_i_'+splitId+']').html(newInput);

		var getExist 		= $('input[id=input_total_i_'+splitId+']').val();
		var totalEq 		= $('input[id="totalEq"]').val();
		var percNew 		= ((getExist/totalEq)*100).toFixed(0);
		$('span[id=total_i_'+splitId+']').html(percNew+'%');
	});
}