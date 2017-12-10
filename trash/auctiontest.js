$(document).ready(function() {
  var sellerName;
  var itemName;
  var itemPrice;
  var itemID = 0;
  var itemCat;
  var itemExp;
  var itemDesc;
  var submitform = [sellerName, itemName, itemDesc, itemPrice, itemCat, itemExp];
  /*
    $("input").click(function() {
      if ($("tr#" + $(this).data("itemDesc")).is(":visible")) {
        $("tr#" + $(this).data("itemDesc")).remove();
      } else {
        $(this).closest("tr").after('<tr id="' + $(this).data("itemDesc") + '"><td colspan="7">' +
          $('#' + $(this).data("itemDesc")).html() + '</td></tr>');
      }
    });*/


  $("#sellersubmit").click(function() {

    var sellerName = $("#sellername").val();
    var itemName = $("#itemname").val();
    var itemDesc = $("#itemdescription").val();
    var itemPrice = $("#startingprice").val();
    var itemCat = $("#itemcategory").val();
    var itemExp = $("#expirationdate").val();

    var markup = "<tr><td><input type='button' name='' value='Item Description' data-href='content2'></td><td>" + itemName + "</td><td>" + sellerName + "</td><td>" + itemCat + "</td><td>" + itemPrice + "</td><td>" + itemExp + "</td></tr>";
    $("#itemsTable").append(markup);
  });


});
