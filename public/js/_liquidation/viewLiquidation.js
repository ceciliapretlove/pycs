
// $('a[id="checkLiquidationReportbtn"]').on('click', function() {
    
//     var id = $(this).attr("data-id");
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "to approve or check this operations form?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, Im sure!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             simPost({id:id}, 'POST', '/VPdyQFyOjToIUt9c', checkLiquidationReportResponse); 
//         }
//     })
// });
// function checkLiquidationReportResponse(x) {
// 	Swal.fire({
//     imageUrl: './assets/images/success.jpg',
//     imageHeight: 250,
//     title: 'SUCCESS!',
//     text: 'Daily operations report checked',
//     showConfirmButton: false,
//     timer: 1500
//     })
//         setTimeout(function(){
//      window.location.reload(1);
//     }, 1000);
// }

// $('a[id="reviewLiquidationReportbtn"]').on('click', function() {
//     var id = $(this).attr("data-id");
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "to review and approve this liquidation form?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, Im sure!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             simPost({id:id}, 'POST', '/0leJcz0jmsPftmAX', reviewReport); 
//         }
//     })
// });

// function reviewReport(x) {
//     Swal.fire({
//     imageUrl: './assets/images/success.jpg',
//     imageHeight: 250,
//     title: 'SUCCESS!',
//     text: 'Liquidation report reviewed/completed',
//     showConfirmButton: false,
//     timer: 1500
//     })
//     setTimeout(function(){
//      window.location.reload(1);
//     }, 1600);
// }



$(document).ready(function() {
    
    let particulars_amount = []
    $("#particularTable tbody tr").each(function (index) {
      let exemptions = [
        $("#particularTable tbody tr").length - 1,
        $("#particularTable tbody tr").length - 2,
        $("#particularTable tbody tr").length - 3
      ]
      if(!exemptions.includes(index + 1)){
        particulars_amount.push($(this).find('td:eq(2)').text().trim())
        particulars_amount = particulars_amount.filter(e => e)
      }

      if($("#particularTable tbody tr").length == (index+1))
      {
        let particulars_amount_final = particulars_amount.reduce( (a,b) => parseFloat(a)+parseFloat(b) )
        // $('input[id="expenses"]').val(particulars_amount_final)
        // $('input[id="total_expenses"]').val(particulars_amount_final)
        calculateAll()
      }

    });

    function calculateCashReturn() {
        var cashReturn = 0;
        var cashAdvance = parseInt($('input[name="cash_advance"]').val());
        var expenses =  parseInt($('input[name="expenses"]').val());
        var TotalCashReturn = cashAdvance - expenses;
        if(TotalCashReturn <= 0) {
               let TotalCashReturn = 0;
                $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));          
        } else {
              $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));

        } 
    }


    function calculateCashRefund() {
        var cashRefund = 0;
        var cashAdvance = parseInt($('input[name="cash_advance"]').val());
        var expenses =  parseInt($('input[name="expenses"]').val());
        var TotalCashRefund =    cashAdvance  - expenses;
        if(TotalCashRefund < 0){
            let TotalCashRefund = 0;
            $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));

        }
            
              $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
    }

    function calculateAll() {
        calculateCashReturn();
        calculateCashRefund();
        calculateNetIncome();
    }

    function calculateCashReturn() {
        var cashReturn = 0;
        var cashAdvance = parseInt($('input[name="cash_advance"]').val()); 
        var expenses =  parseInt($('input[name="expenses"]').val());
        var TotalCashReturn = cashAdvance - expenses;
        
        if(TotalCashReturn <= 0 || isNaN(TotalCashReturn)) {
          TotalCashReturn = 0;
          $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));
        } else {
          $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));
        }   
    }


    function calculateCashRefund() {
        var cashRefund = 0;
        var cashAdvance = parseInt($('input[name="cash_advance"]').val());
        var expenses =  parseInt($('input[name="expenses"]').val());
        var TotalCashRefund = expenses - cashAdvance;
        if(TotalCashRefund < 0 || isNaN(TotalCashRefund)){
          TotalCashRefund = 0
          $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
       } else {
            $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
        }
    }

    function calculateNetIncome() {
        var netincome = 0;
        var client = parseInt($('input[name="client_payment"]').val());
        var expenses =  parseInt($('input[name="expenses"]').val());
        var totalnetincome = expenses + client;
                $('#net_income').val(numberWithCommas(parseFloat(totalnetincome).toFixed(2)));          
    }
});
