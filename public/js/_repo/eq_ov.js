$('select[id="equipmentTypeFilter"').on('change', function(e) {
    var id = this.value;
    if(id == '0'){
        location.reload();
    }else{
        $('.equipmentOverviewList').html('');
        simPost({id:id}, 'POST', '/eUDqxY6b', filterEquipmentOverviewList);
    }
    function filterEquipmentOverviewList(x) {
    	$.each(x, function(key, value) {
            var brand           = value.brand ?? '-';
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
                }else{ 
                    var bg      = 'bg-success';
                    var text    = 'Active';
                }
            }else{
                var bg      	= 'bg-warning';
                var text    	= 'Ongoing repair';
            }
            var btn     		= '<a href="viewEquipment=tfEarwUXDs'+value.id+'ghVSGPXxeMLcvVkwqcngXgcHsYKWstJDgSCGBgu" type="button" class="btn btn-outline-success btn-fw">Edit</a>';
            var statusGen 		= '<span class="badge badge-dot"><i class="'+bg+'"></i>'+text+'</span>';

            $('tbody[class="equipmentOverviewList"]').append(''+
                '<tr class="text-center">'+
                    '<td>'+value.equipment_category+'<br>'+value.equipment_type+'</td>'+
                    '<td>'+value.equipment_id+'<br>'+brand+'</td>'+
                    '<td>'+model+'<br>'+year_model+'</td>'+
                    '<td>'+chassis_number+'<br>'+plate_number+'</td>'+
                    '<td>'+engine_model+'</td>'+
                    '<td>'+value.purchase_amount+'<br>'+value.purchase_date+'</td>'+
                    '<td>'+statusGen+'</td>'+
                    '<td>'+btn+'</td>'+
                '</tr>'
            );
        });
    } //func
}); //click