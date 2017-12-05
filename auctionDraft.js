$(document).ready(function() {

  $('#item_list tr').on('dblclick', function(e) { //div text is item description
    revealText(e, this);
  })

  function revealText(e, text) { //reveals the description text of the item or hides it
    var itemDesc = text.find('div.itemDesc');
    var displaySetting = itemDesc.style.display;
    if (displaySetting == 'block') {
      text.style.display = 'none';

    } else {
      text.style.display = 'block';
    }
  }
  $('#item_list tr').on('click', function(e) {
    /retrieves info from the clicked item and puts it up on screen
    fetchItemInfo(e, this);
  })
  var currentPrice;
  var isSeller = true;
  var itemName;
  var itemID = 0;
  var itemCat;
  var itemPrice;
  var itemDesc;

  function fetchItemInfo(e, text) {
    $('#input_name').val() = this.find('.itemName').text();
    $('#input_category').val() = this.find('.itemCat').text();
    $('#input_description').val() = this.find('div.itemDesc').text();
    itemID = this.find('.itemId').text();
    currentPrice = this.find('.itemPrice').text();
  }

  $('submit').on('click', function(e) { //clicking submit will call the submitItem function
    submitItem(e, this);
  })

  function submitItem(e, jObject) { //submit item will determine if
    itemPrice = $('#input_price').val(); //needed for both for s it is starting for b it is bidding
    if (isSeller == true) { //i am a seller
      itemName = $('#input_name').val(); // gets the item name from the input_name box
      itemID = itemID;
      itemID++;
      itemCat = $('#input_category').val(); // gets the item name from the input_category box
      itemDesc = $('#input_description').val();
      var newTr1 = $('<tr>');
      var newtd1;
      newtd1 = $('<td>', {
        class = "itemName"
      });
      newtd1.text(itemName);
      newTr1.append(newtd1);
      newtd1 = $('<td>', {
        class = "itemId"
      });
      newtd1.text(itemId);
      newTr1.append(newtd1);
      newtd1 = $('<td>', {
        class = "itemCat"
      });
      newtd1.text(itemCat);
      newTr1.append(newtd1);
      newtd1 = $('<td>', {
        class = "itemPrice"
      });
      newtd1.text(itemPrice);
      newTr1.append(newtd1);
      newtd1 = $('<td>', {
        class = "itemDesc"
      });
      newtd1.text(itemDesc);
      newTr1.append(newtd1);

      newDesc = $('<div>');
      newDesc.text("".itemDesc);
      $('#item_list tablebody').append(newTr1).append(newDesc);
    } else { //i am a buyer
      if (itemPrice > currentPrice) {
        $('tr.itemPrice contains'.itemID).find(.itemPrice).text(itemPrice);
      } else {
        alert('please bid at a higher price');
      }
      $('#item_list tr')
    }

  }
  $('#input_name').val()

})
