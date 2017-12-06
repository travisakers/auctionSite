$(document).ready(function() {

  var sellerName;
  var itemName;
  var itemPrice;
  var itemID = 0;
  var itemCat;
  var itemExp;
  var itemDesc;
  var submitform = [sellerName, itemName, itemDesc, itemPrice, itemCat, itemExp];

  $("input").on("click", function() {
    revealText(this);
  });

  function revealText(this) {
    if ($("tr#" + $(this).data("itemDesc")).is(":visible")) {
      $("tr#" + $(this).data("itemDesc")).remove();
    } else {
      $(this).closest("tr").after('<tr id="' + $(this).data("itemDesc") + '"><td colspan="7">' +
        $('#' + $(this).data("itemDesc")).html() + '</td></tr>');
    }
  }

  $("#sellersubmit").on("click", function() {
    alert("submittted");
    submitItem(this);
    itemID++;
  });

  function submitItem(this) {
    sellerName = $("#sellername").val();
    itemName = $("#itemname").val();
    itemDesc = $("#itemdescription").val();
    itemPrice = $("#startingprice").val();
    itemCat = $("#itemcategory").val();
    itemExp = $("#expirationdate").val();
    var $newtr1 = $("<tr></tr>");
    var $newtd1;
    $newtd1 = $('<td>', {
      "class": "itemname"
    });
    $newtd1.text("".itemName);
    $newtr1.append($newtd1);

    $newtd1 = $('<td>', {
      "class": "sellername"
    });
    $newtd1.text("".sellerName);
    $newtr1.append($newtd1);

    $newtd1 = $('<td>', {
      "class": "itemcategory"
    });
    $newtd1.text("".itemCat);
    $newtr1.append($newtd1);

    $newtd1 = $('<td>', {
      "class": "expirationdate"
    });
    $newtd1.text("".itemExp);
    $newtr1.append($newtd1);
    // -----------------------
    //
    var $newDesc = $("<div><p></p></div>", id: itemID, "class": "itemdescription");
    $newDesc.text("".itemDesc);
    $newDesc.hide();
    $("allitems").append($newtr1);
    $("itemsTable").after($newDesc);
  }

});
