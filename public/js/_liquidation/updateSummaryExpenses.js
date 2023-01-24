$("#updateSummaryExpensesForm").on('submit', function(e)
{
    $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateSummaryExpensesForm').serialize();
    simPost(post_data, 'POST', '/rfukdukfwlu', editSummaryExpensesFormResponse); 
    e.preventDefault();
    return false;
});


function editSummaryExpensesFormResponse(x) {
	if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Summary of Expenses Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/summaryExpenses";
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
// $(document).ready(function() {
//     $("#particularTable").find("input#particular_amount").each(function() {
//         $(this).keyup(function() {
//             calculateTotalExpenses();
//             calculateCashReturn();
//             calculateCashRefund();
//         });
//     });

// });

// function calculateTotalExpenses() {
//     var expenses = 0;
//     $("#particularTable tr").not("tr:last").each(function() {
//         $(this).find('input[id="particular_amount"]').each(function() {
//             if (!isNaN(this.value) && this.value.length != 0) {
//                 expenses += parseInt(this.value);
//             }
//         });
//     });
//     $("#expenses").val(expenses.toFixed(2));
// }

// function calculateCashReturn() {
//     var cashReturn = 0;
//     var cashAdvance = parseInt($('input[name="cash_advance"]').val());
//     var expenses =  parseInt($('input[name="expenses"]').val());
//     var TotalCashReturn = cashAdvance - expenses;
//         if(TotalCashReturn <= 0) {
//                let TotalCashReturn = 0;
//                 $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));
         
         
//         } else {
         
//               $('#cash_return').val(numberWithCommas(parseFloat(TotalCashReturn).toFixed(2)));

//         }

        
// }


// function calculateCashRefund() {
//     var cashRefund = 0;
//     var cashAdvance = parseInt($('input[name="cash_advance"]').val());
//     var expenses =  parseInt($('input[name="expenses"]').val());
//     var TotalCashRefund= expenses - cashAdvance;
//     if(TotalCashRefund < 0){
//         let TotalCashRefund = 0;
//         $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));

//     }
        
//           $('#cash_refund').val(numberWithCommas(parseFloat(TotalCashRefund).toFixed(2)));
// }