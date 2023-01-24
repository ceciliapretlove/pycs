$(function() {
	$('#filterEquipmentStatus').modal('show');
});


$('#filterEquipmentStatusForm').on('submit', function(e){
	$('#filterEquipmentStatus').modal('hide');
	$('.modal-message').html('');
	$('.error-message').html(""); //reset messages
	$('.form-group').removeClass('has-error');
	var post_data = $('#filterEquipmentStatusForm').serialize();
	simPost(post_data, 'POST', '/gjUWAVuzfEXpZkgh', gjUWAVuzfEXpZkgh); 
	simPost(post_data, 'POST', '/vdeZgqxkQgKntdqe', vdeZgqxkQgKntdqe);
	e.preventDefault();
	return false;
});

function gjUWAVuzfEXpZkgh(x) {
	$.each(x, function(key, value) {
		var location 	= value.location;
		var loc 		= location.substring(0, 3);
		$('td[id="'+value.equipment_id+'_'+value.date+'"]').css({"background-color":"#1F6980", "font-weight":"bold", "color":"#ffffff"}).html('<span><small>'+loc+'</small></span>');
		updateTotalDeployedFooter(value.date);
	});
}

function vdeZgqxkQgKntdqe(x) {
	$.each(x, function(key, value) {
		$('td[id="'+value.equipment_id+'_'+value.date+'"]').css({"background-color":"#998973", "font-weight":"bold", "color":"#ffffff"}).html('<span><small>UR</small></span>');
		updateTotalUnderRepairFooter(value.date);
	});

	var filterDate 	= $('input[id=filter]').val();
	var dateRaw		= new Date(filterDate);
	var year 		= dateRaw.getFullYear();
	const month 	= dateRaw.toLocaleString('default', { month: 'long' });

	$('h6[id=filterDate').text(month+' - '+year);
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
