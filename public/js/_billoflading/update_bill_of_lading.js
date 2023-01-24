$("#updateBillOfLading").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#updateBillOfLading').serialize();
    simPost(post_data, 'POST', '/fb47dd3b=nepxlwrkvhz', updateBillOfLading); 
    e.preventDefault();
    return false;
});


function updateBillOfLading(x) {
if(x == true){

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Bill Of Lading Succesfully updated',
      showConfirmButton: false,
      timer: 1500
    })
      setTimeout(function(){
         window.location.href = "/BillofladingManagement";
      }, 1600);
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

$('a[id="resetFields"]').on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "to clear this equipment form?",
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

// $( ".addeditContainerNumber").on( "click", function() {
//         $('#editContainerNumberTable > tbody:last-child').append('<tr>'+
//             '<td><input class="form-control" name="container_number[]"></td>'+
//             '<td><input class="form-control" name="container_size[]"></td>'+
//             '</tr>');
//         var count = $('#editContainerNumberTable tr').length -2;
//         $("#number_container").val(count);
       
// }); 

// $(".deleteeditContainerNumber").click(function(){

//             $('#editContainerNumberTable tr:last').remove();
//             var count = $('#editContainerNumberTable tr').length -2;
//             $("#number_container").val(count);
           
//         });


// $(document).ready(function() {
//     var rowCount = $('#editbillofladingForm >tbody >tr').length;
//     $("#number_container").val(rowCount);   

    
// });

// $("#addrows").click(function () {

//      $("#editbillofladingForm").each(function () {
//          var tds = '<tr>';
//          jQuery.each($('tr:last td', this), function () {
//              tds += '<td>' + $(this).html() + '</td>';
//          });
//          tds += '</tr>';
//          if ($('tbody', this).length > 0) {
//              $('tbody', this).append(tds);

//          } else {
//              $(this).append(tds);

//          }
          
//      });
//      var rowCount = $('#billofladingForm >tbody >tr').length;
//      $("#number_container").val(rowCount); 

// });

$('#editContainerForm').on('submit', function(e) {
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#editContainerForm').serialize();
    simPost(post_data, 'POST', '/ew4pbtuqz6', editContainerResponse);
    e.preventDefault();
    return false;
});

function editContainerResponse(response) {
    if (response == 1)   {

    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Container has been updated.',
      showConfirmButton: false,
      timer: 1500
    })
    $('#editContainerForm')[0].reset();
    $('#editContainerModal').hide();
      setTimeout(function(){
         window.location.reload(1);
      }, 1000);
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
    return false;
}


$(".editContainer").on('click', function(e) {

    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var id = this.id;
    simPost({
        id: id
    }, 'POST', '/getContainer', getContainerResponse);
    e.preventDefault();
});

function getContainerResponse(x) {
    $.each(x, function(key, value) {
        $("input#id").val(value.id);
        $("input#edit_contaniner_number").val(value.container_number);
        $("input#edit_size").val(value.size);
    });
}

$(".deleteContainer").on('click', function (e) {
  Swal.fire({
  title: 'Are you sure you?',
  text: "You won't be able to Delete this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
  }).then((result) => {
  if (result.isConfirmed) {
    var id = this.id;
    simPost({id:id}, 'POST', '/deleteContainer', deleteContainerResponse);
    e.preventDefault();
    }
})
});

function deleteContainerResponse(response) {
  if(response==true)
  {
    Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Container has been Deleted.',
      showConfirmButton: false,
      timer: 1500
    })

      setTimeout(function(){
         window.location.reload(1);
      }, 1000);

  }
  else 
  {
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please check the details.',
      showConfirmButton: false,
      timer: 1500
    })
  } 
  return false;
}





/* Variables */
var p = $("#containers").val();
var row = $(".containerRow");

/* Functions */
function getP(){
  p = $("#containers").val();
}

function addRow() {
  row.clone(true, true).appendTo("#containerTable");
}

function removeRow(button) {
  button.closest("tr").remove();
}
/* Doc ready */
$(".add").on('click', function () {
  if($("#containerTable tr").length < 99) {
    addRow();
    var i = Number(p)+1;
    $("#containers").val(i);
  }
  $(this).closest("tr").appendTo("#containerTable");
  if ($("#containerTable tr").length === 3) {
    $(".remove").hide();
  } else {
    $(".remove").show();
  }
});
$(".remove").on('click', function () {
  if($("#containerTable tr").length === 3) {
    //alert("Can't remove row.");
    $(".remove").hide();
  } else if($("#containerTable tr").length - 1 ==3) {
    $(".remove").hide();
    removeRow($(this));
    var i = Number(p)-1;
    $("#containers").val(i);
  } else {
    removeRow($(this));
    var i = Number(p)-1;
    $("#containers").val(i);
  }
});
$("#containers").change(function () {
  var i = 0;
  p = $("#containers").val();
  var rowCount = $("#containerTable tr").length - 2;
  if(p > rowCount) {
    for(i=rowCount; i<p; i+=1){
      addRow();
    }
    $("#containerTable #addButtonRow").appendTo("#containerTable");
  } else if(p < rowCount) {
  }
});

