$('button[id="checkReportbtn"]').on('click', function() {
    
	var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Are you sure?',
        text: "to approve or check this operations form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/ygYPCfWAPArpFRxn', checkReport); 
        }
    })
});

function checkReport(x) {
	Swal.fire({
    imageUrl: './assets/images/success.jpg',
    imageHeight: 250,
    title: 'SUCCESS!',
    text: 'Liquidation report checked',
    showConfirmButton: false,
    timer: 1500
    })
    setTimeout(function(){
     window.location.reload(1);
    }, 1000);
}

$('button[id="reviewReportbtn"]').on('click', function() {
    var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Are you sure?',
        text: "to review and complete this operations form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/qMnGPzTspbnMbBak', reviewReport); 
        }
    })
});

function reviewReport(x) {
    Swal.fire({
    imageUrl: './assets/images/success.jpg',
    imageHeight: 250,
    title: 'SUCCESS!',
    text: 'Liquidation report reviewed/completed',
    showConfirmButton: false,
    timer: 1500
    })
    setTimeout(function(){
     window.location.reload(1);
    }, 1600);
}


// 