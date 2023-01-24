$("#createShippingForm").on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#createShippingForm').serialize();
    simPost(post_data, 'POST', '/createShipping', createShippingFormResponse, errorResponse);
    e.preventDefault();
    return false;
});

function errorResponse(eventObj) {
    let temp = ''

    if (eventObj.responseJSON.errors.bl_number) {
        temp += eventObj.responseJSON.errors.bl_number + '\n'
    }

    Swal.fire({
        imageUrl: './assets/images/error.jpg',
        imageHeight: 250,
        title: 'FAILED!',
        text: temp,
        showConfirmButton: false,
        timer: 2000
    })
}

function createShippingFormResponse(x) {

    if (x == true) {

        Swal.fire({
            imageUrl: './assets/images/success.jpg',
            imageHeight: 250,
            title: 'SUCCESS!',
            text: 'Shipping Succesfully Saved',
            showConfirmButton: false,
            timer: 1500
        })
        setTimeout(function() {
            window.location.href = "/shippingForm";
        }, 2000);
    } else {
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
$('a[id="resetFields"]').on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "to clear this shipping form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Im sure!'
    }).then((result) => {
        if (result.isConfirmed) {
            location.reload();
        }
    })
});

$(function() {
    addItemRow();
});

var path = "{{ url('shipping/action')}}";
$('input.typeaheadbl_number').typeahead({

    displayText: function(query) {
        return query.bl_number
    },
    source: function(query, process) {
        return $.get(path, {
            query: query
        }, function(data) {
            return process(data);
        });
    },

    afterSelect: function(item) {
        $("#pro_number").val(item.id);
    }


});

var pathPurpose = "{{ url('shipping/purposeaction')}}";
$('td#purpose > input.typeaheadpurpose').typeahead({

    displayText: function(query) {
        return query.code
    },
    source: function(query, process) {
        return $.get(pathPurpose, {
            query: query
        }, function(data) {
            return process(data);
        });
    },

    afterSelect: function(item) {
        $("#purpose").val(item.code);
        $("#purpose_id").val(item.id);

    }
});

var pathClient = "{{ url('shipping/clientaction')}}";
$('td#client > input.typeaheadclient').typeahead({
    displayText: function(query) {
        return query.code
    },
    source: function(query, process) {
        return $.get(pathClient, {
            query: query
        }, function(data) {
            return process(data);
        });
    },

    afterSelect: function(item) {
        $("#client").val(item.name);
        $("#client_id").val(item.id);

    }
});
var pathPRO = "{{ url('shipping/pronumaction')}}";
$('td#pro_num_data > input.typeaheadProNum').typeahead({
    displayText: function(query) {
        return query.pro_number
    },
    source: function(query, process) {
        return $.get(pathPRO, {
            query: query
        }, function(data) {
            return process(data);
        });
    },

    afterSelect: function(item) {
        $("#pro_num_data").val(item.pro_number);
        $("#pro_num").val(item.id);

    }
});

$('.typeaheadpayee').on('keyup', function() {
    var dataId = $(this).attr('data-id');
    var pathPurpose = "{{ url('shipping/payeeaction')}}";
    $('input.typeaheadpayee').typeahead({
        displayText: function(query) {
            return query.shipping_line
        },
        source: function(query, process) {
            return $.get(pathPurpose, {
                query: query
            }, function(data) {
                return process(data);
            });
        },
        afterSelect: function(item) {
            $("#payee_" + dataId).val(item.shipping_line);
            $("#payee_id_" + dataId).val(item.id);
        }
    });
});
$('a#addShippingItem').on('click', function() {
    addItemRow();
    return false;
});

$('.amount').keyup(delay(function() {
    computeTotalAmount();
    computeGrandTotal();
}, 200));



function computeTotalAmount() {
    var sum = 0;
    $('.amount').each(function() {
        var item_val = parseFloat($(this).val());
        if (isNaN(item_val)) {
            item_val = 0;
        }
        sum += item_val;
    });
    $('#totalAmount').val(parseFloat(sum));
}

$('#shipping_allowance').keyup(delay(function(e) {
    computeGrandTotal();
}, 200));



function computeGrandTotal() {

    var totalAmount = parseFloat($('input[name="totalAmount"]').val());
    var shippingAllowance = parseFloat($('input[name="shipping_allowance"]').val());
    let grandTotal = totalAmount += shippingAllowance;

    $('#grand_total').val(numberWithCommas(parseFloat(grandTotal).toFixed(2)));

}