$(document).ready(function(e) {
    $("#filter").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
}); 

$('select[id="equipment_type"').on('change', function(e) {
    var id = this.value;
    simPost({id:id}, 'POST', '/dnJLtk', getEquipmentBaseOnType); 
});

function getEquipmentBaseOnType(x) {
    $('#equipment').html('');
    $('#equipment').append($('<option value="">Select One</option>'));
    $.each(x, function (key, value) {
        var brand           = value.brand ?? '-';
        var model           = value.model ?? '-';
        var year_model      = value.year_model ?? '-';
        var chassis_number  = value.chassis_number ?? '-';
        var plate_number    = value.plate_number ?? '-';
        var engine_model    = value.engine_model ?? '-';
        var location        = value.location ?? '-';            
        $('#equipment').append($('<option>',{ 
            value: value.id,
            text : '('+value.equipment_id+') '+brand+' - '+model,
        }));
    });
}

$('#filterUtilizationReport').on('submit', function(e){
    var post_data = $('#filterUtilizationReport').serialize();
    simPost(post_data, 'POST', '/getGasConsumptionBaseOnFilter', getGasConsumptionBaseOnFilter);
    e.preventDefault();
    return false;
});

function getGasConsumptionBaseOnFilter(response) {
    $('#getGasConsumptionBaseOnFilter').html('');
    var ctx = document.getElementById("getGasConsumptionBaseOnFilter").getContext('2d');
    if (response != '') {
        var income_report = new Chart(ctx, {
            type: 'bar',
            data: response,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            },
        });
    }
}