simPost(null, 'GET', '/pXSstvmTwrFDMvWJupcbUBGEZPQjUuaWuTPYzfhFbydjXXJWLh', pXSstvmTwrFDMvWJupcbUBGEZPQjUuaWuTPYzfhFbydjXXJWLh); 

function pXSstvmTwrFDMvWJupcbUBGEZPQjUuaWuTPYzfhFbydjXXJWLh(x) {
	var count = x.length;
	if(count == 0){
		$('span[id="notificationCount"]').html('').removeClass('badge-danger').addClass('badge-default');	
	}
	else{
		$('span[id="notificationCount"]').html(x.length).addClass('badge-danger');
	}
}

$('button[class="notificationbtn"]').on('click', function() {
	simPost(null, 'GET', '/pXSstvmTwrFDMvWJupcbUBGEZPQjUuaWuTPYzfhFbydjXXJWLh', viewNotification); 
	simPost(null, 'GET', '/rxnnSjhWZUFRKzepqFhegHdTPrDfKhKnZSAmBcxkudzMbgwdtj', viewOldNotification); 
});

function viewNotification(x) {
	$('tbody[id="notificationTable"]').html('');
	if(x.length != 0){
		$.each(x, function(key, value) {
			var matches = value.requested_action.match(/\b(\w)/g);
			var acronym = matches.join('');

			var requested_at_raw = value.requested_at;
			var requested_at = jQuery.timeago(new Date(requested_at_raw));
			if(value.tag == null){ var tag = ''}else{ var tag = value.tag}
			$('tbody[id="notificationTable"]').append(''+
			      '<tr id="trHref" href="/'+value.url+'">'+
			      	'<td width="20%" rowspan="3" class="text-center"><span class="numberCircle">'+acronym+'</span></td>'+
			        '<td class="pt-0 pb-0 pl-0">'+value.requested_action+'</td>'+
			      '</tr>'+
			      '<tr id="trHref" href="/'+value.url+'">'+
			      	'<td class="pt-0 pb-0 pl-0"><b>'+value.module+' '+tag+'</b></td>'+
			      '</tr>'+
			      '<tr id="trHref" href="/'+value.url+'" class="border-bottom">'+
			        '<td class="pt-0 pl-0 notificationLabel">by: '+value.fname+' ('+requested_at+')</td>'+
			      '</tr>'
			  );
		});
	}else{
		$('tbody[id="notificationTable"]').append('<tr><td class="text-center notificationLabel">No recent activity to review</td>');
	}
	
	$('tr[id="trHref"]').on('click', function() {
		var url = $(this).attr("href");
		window.location.href = url;
	});
}

function viewOldNotification(x) {
	$('tbody[id="oldNotificationTable"]').html('');
	if(x.length != 0){
		$.each(x, function(key, value) {
			var matches = value.requested_action.match(/\b(\w)/g);
			var acronym = matches.join('');

			var requested_at_raw = value.requested_at;
			var requested_at = jQuery.timeago(new Date(requested_at_raw));
			if(value.tag == null){ var tag = ''}else{ var tag = value.tag}
			$('tbody[id="oldNotificationTable"]').append(''+
			      '<tr id="trHref" href="/'+value.url+'">'+
			      	'<td width="20%" rowspan="3" class="text-center"><span class="numberCircle">'+acronym+'</span></td>'+
			        '<td class="pt-0 pb-0 pl-0">'+value.requested_action+'</td>'+
			      '</tr>'+
			      '<tr id="trHref" href="/'+value.url+'">'+
			      	'<td class="pt-0 pb-0 pl-0"><b>'+value.module+' '+tag+'</b></td>'+
			      '</tr>'+
			      '<tr id="trHref" href="/'+value.url+'" class="border-bottom">'+
			        '<td class="pt-0 pl-0 notificationLabel">by: '+value.fname+' ('+requested_at+')</td>'+
			      '</tr>'
			  );
		});
	}else{
		$('tbody[id="oldNotificationTable"]').append('<tr><td class="text-center notificationLabel">No recent activity to review</td>');
	}
	
	$('tr[id="trHref"]').on('click', function() {
		var url = $(this).attr("href");
		window.location.href = url;
	});
}