$('button[id="acceptReportbtn"]').on('click', function() {
	var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Are you sure?',
        text: "to accept or check this job order/diagnostic report?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/aMMQKddVWZMkVHRp', acceptReport); 
        }
    })
});

function acceptReport(x) {
	Swal.fire({
    imageUrl: './assets/images/success.jpg',
    imageHeight: 250,
    title: 'SUCCESS!',
    text: 'Job order/diagnostic report accepted',
    showConfirmButton: false,
    timer: 1500
    })
    setTimeout(function(){
        window.location.reload(1);
    }, 1600);
}

$('button[id="noteReportbtn"]').on('click', function() {
    var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Are you sure?',
        text: "to note and finalize this job order/diagnostic report?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            simPost({id:id}, 'POST', '/xnLsKjzhvnGCxsvj', noteReport); 
        }
    })
});

function noteReport(x) {
    Swal.fire({
    imageUrl: './assets/images/success.jpg',
    imageHeight: 250,
    title: 'SUCCESS!',
    text: 'Job order/diagnostic report accepted',
    showConfirmButton: false,
    timer: 1500
    })
    setTimeout(function(){
        window.location.reload(1);
    }, 1600);
}