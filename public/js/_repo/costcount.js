$('#generateFilterCostForm').on('submit', function(e){
	$('#generateFilterCostModal').modal('hide');
	var post_data = $('#generateFilterCostForm').serialize();
	simPost(post_data, 'POST', '/generateFilterCost', generateFilterCost);
	e.preventDefault();
	return false;
});

function generateFilterCost(x) {
	$("thead[id='generatedReportSection']").html('');
	$.each(x, function(key, value) {
		$('thead[id="generatedReportSection"]').append(''+
	      	'<tr class="border-bottom">'+
	          	'<th>'+value.brand+' - '+value.model+'<br>'+value.equipment_id+'<span class="pull-right">'+value.purchased_price+'</span>'+
	            '</th>'+
			'</tr>'
  		);
	});
}