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
    simPost(post_data, 'POST', '/getMeanTimeReportBaseOnFilterMajor', getMeanTimeReportBaseOnFilterMajor);
    simPost(post_data, 'POST', '/getMeanTimeReportBaseOnFilterMajorHours', getMeanTimeReportBaseOnFilterMajorHours);
    e.preventDefault();
    return false;
});

function getMeanTimeReportBaseOnFilterMajor(major) {
    
    var post_data = $('#filterUtilizationReport').serialize();
    simPost(post_data, 'POST', '/getMeanTimeReportBaseOnFilterMinor', getMeanTimeReportBaseOnFilterMinor);

    function getMeanTimeReportBaseOnFilterMinor(minor) {
        var numberWithCommas = function(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
         };
         var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

         var bar_ctx = document.getElementById('getMeanTimeReportBaseOnFilter');
         var bar_chart = new Chart(bar_ctx, {
         type: 'bar',
         data: {
             labels: months,
             datasets: [
             {
                 label: 'Major',
                 data: major,
                             backgroundColor: "#496076",
                             hoverBackgroundColor: "#496076",
                             hoverBorderWidth: 0
             },
             {
                 label: 'Minor',
                 data: minor,
                             backgroundColor: "#c2f1db",
                             hoverBackgroundColor: "#c2f1db",
                             hoverBorderWidth: 0
             },
             ]
         },
         options: {
                 animation: {
                 duration: 10,
             },
             tooltips: {
                         mode: 'days',
               callbacks: {
               label: function(tooltipItem, data) { 
                 return data.datasets[tooltipItem.datasetIndex].label + ": " + tooltipItem.yLabel.toFixed(2);
               }
               }
              },
             scales: {
               xAxes: [{ 
                 stacked: false, 
                 gridLines: { display: true },
                 }],
               yAxes: [{ 
                 stacked: false, 
                 ticks: {
                         callback: function(value) { return value.toFixed(2); },
                         }, 
                 }],
             }, // scales
             legend: {display: true}
         } // options
         }
         );
    }
}

function getMeanTimeReportBaseOnFilterMajorHours(major) {
    
    var post_data = $('#filterUtilizationReport').serialize();
    simPost(post_data, 'POST', '/getMeanTimeReportBaseOnFilterMinorHours', getMeanTimeReportBaseOnFilterMinorHours);

    function getMeanTimeReportBaseOnFilterMinorHours(minor) {
        var numberWithCommas = function(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
         };
         var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

         var bar_ctx = document.getElementById('getMeanTimeReportBaseOnFilterHours');
         var bar_chart = new Chart(bar_ctx, {
         type: 'bar',
         data: {
             labels: months,
             datasets: [
             {
                 label: 'Major',
                 data: major,
                             backgroundColor: "#496076",
                             hoverBackgroundColor: "#496076",
                             hoverBorderWidth: 0
             },
             {
                 label: 'Minor',
                 data: minor,
                             backgroundColor: "#c2f1db",
                             hoverBackgroundColor: "#c2f1db",
                             hoverBorderWidth: 0
             },
             ]
         },
         options: {
                 animation: {
                 duration: 10,
             },
             tooltips: {
                         mode: 'hours',
               callbacks: {
               label: function(tooltipItem, data) { 
                 return data.datasets[tooltipItem.datasetIndex].label + ": " + tooltipItem.yLabel.toFixed(2);
               }
               }
              },
             scales: {
               xAxes: [{ 
                 stacked: false, 
                 gridLines: { display: true },
                 }],
               yAxes: [{ 
                 stacked: false, 
                 ticks: {
                         callback: function(value) { return value.toFixed(2); },
                         }, 
                 }],
             }, // scales
             legend: {display: true}
         } // options
         }
         );
    }
   // var numberWithCommas = function(x) {
   //  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   //  };
   //  var dataPack1 = [
   //  <?php 
   //  foreach($inbound as $key => $value) { ?>
   //  <?php 
   //  echo $value; ?>,
   //  <?php } ?>
   //  ];
   //  var dataPack2 = [
   //  <?php foreach($outbound as $key => $value2) { ?>
   //  <?php 
   //  echo $value2; ?>,
   //  <?php } ?>
   //  ];
   //  var dates = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

   //  var bar_ctx = document.getElementById('bar-chart');
   //  var bar_chart = new Chart(bar_ctx, {
   //  type: 'bar',
   //  data: {
   //      labels: dates,
   //      datasets: [
   //      {
   //          label: 'Inbound',
   //          data: dataPack1,
   //                      backgroundColor: "#496076",
   //                      hoverBackgroundColor: "#496076",
   //                      hoverBorderWidth: 0
   //      },
   //      {
   //          label: 'Outbound',
   //          data: dataPack2,
   //                      backgroundColor: "#c2f1db",
   //                      hoverBackgroundColor: "#c2f1db",
   //                      hoverBorderWidth: 0
   //      },
   //      ]
   //  },
   //  options: {
   //          animation: {
   //          duration: 10,
   //      },
   //      tooltips: {
   //                  mode: 'label',
   //        callbacks: {
   //        label: function(tooltipItem, data) { 
   //          return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
   //        }
   //        }
   //       },
   //      scales: {
   //        xAxes: [{ 
   //          stacked: false, 
   //          gridLines: { display: true },
   //          }],
   //        yAxes: [{ 
   //          stacked: false, 
   //          ticks: {
   //                  callback: function(value) { return numberWithCommas(value); },
   //                  }, 
   //          }],
   //      }, // scales
   //      legend: {display: true}
   //  } // options
   //  }
   //  );
}