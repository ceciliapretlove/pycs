
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


