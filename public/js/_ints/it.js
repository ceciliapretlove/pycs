// simplified ajax submit version 5
function simPost(post_data, method, url, success_callback, error_callback)
{
    $.ajax({
        type: method,
        url: url,
        data: post_data,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        error: function (data) {
            error_callback(data)
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}
function simGet(url, success_callback)
{
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        error: function (data) {
            success_callback(data)
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}

function simDelete(post_data, url, callback)
{
    $.ajax({
        type: 'DELETE',
        url: url,
        data: JSON.stringify(post_data),
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            callback(data);
        },
        error: function (data) {
            callback(data)
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}

function swal_fire(status){
    if(status == 1){
        Swal.fire({
          imageUrl: './assets/images/success.jpg',
          imageHeight: 250,
          title: 'SUCCESS!',
          text: 'Item Breakdown has been Deleted.',
          showConfirmButton: false,
          timer: 1500
        })
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

function simPostUpload(post_data, method, url, success_callback, error_callback)
{
    $.ajax({
        type: method,
        url: url,
        data: post_data,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (data) {
           success_callback(data);
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            $('form').show();
        }
    });
}
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};


function addZero(number)
{
    if (number < 10) {
        return number = '0' + number;
    }

    return number;
}

function currentDateTime()
{
    var date = new Date();

    var year = date.getFullYear();
    var month = addZero(date.getMonth() + 1);
    var day = addZero(date.getDate());
    var hours = addZero(date.getHours());
    var minutes = addZero(date.getMinutes());
    var seconds = addZero(date.getSeconds());

    return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
}

function currentDate()
{
    var date = new Date();

    var year = date.getFullYear();
    var month = addZero(date.getMonth() + 1);
    var day = addZero(date.getDate());

    return year + '-' + month + '-' + day;
}

function mysqlDateToHtml( post_data )
{
    var final_date = post_data.split('-');
    return final_date[1]+'/'+final_date[2]+'/'+final_date[0];
}

function displayErrors(errors)
{
    $.each(errors, function (key, value) {
        $('#error-' + key).html(value);
        $('.border-' + key).addClass('has-error');
    });
}

// notification message
function pageNotification(target_class, message_type, icon, message_title, message)
{
    var result = $('.'+target_class).html('' +
        '<div class="alert alert-'+message_type+'">' +
            '<i class="fa '+icon+'"></i> <strong>'+message_title+'</strong> '+message+'.' +
        '</div>'

        
    ); 

    return result;
}
async function simPDF(elementID, opt1 = {})
{   
    // OPTIONAL VALUE
    // paper sizes = a0, a1, a2, a3, a4, letter, legal, a5, a6, a7, a8, a9, a10
    // type        = stream or save
    let IDorCLass, pdf, opt, pdfFileBlob
    let option = {
             margin:      opt1.margin ?? 0.1,
             papersize:   opt1.papersize ?? 'letter',
             filename:    opt1.filename ?? 'file.pdf',
             type:        opt1.type ?? 'save',
             orientation: opt1.orientation ?? 'portrait'
        }
    IDorCLass = document.querySelector('[sim-pdf-id="'+elementID+'"]');
    opt = {
        margin:       option.margin,
        filename:     option.filename ?? Math.random(),
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: `${window.devicePixelRatio  + 1}` },
        jsPDF:        { unit: 'in', format: option.papersize, orientation: option.orientation}
    };
    pdf = html2pdf().set(opt).from(IDorCLass);
    if(option.type == 'save'){
        pdf.then(() => { setTimeout(() => { pdf.outputPdf().save(); }, 2000); });
    }else{
        pdfFileBlob = await pdf.output('bloburl');
        window.open(pdfFileBlob, '_blank')
    }
    console.log(option,pdf)
}

function PDFGenerate(element){
    let option = {
             margin:       '0.3',
             papersize:    'letter',
             filename:     'RemovedItemReport.pdf',
             type:         'save',
             orientation:  'portrait'
    }
    simPDF(element,option)
}

// notification message
// function pageNotification(target_class, message_type, icon, message_title, message)
// {
//     var result = $('.'+target_class).html('' +
//         '<div class="alert alert-'+message_type+'">' +
//             '<i class="fa '+icon+'"></i> <strong>'+message_title+'</strong> '+message+'.' +
//         '</div>'
//     ); 

//     return result;
// }
