$(document).ready(function() {


      $('#allitems tr').on('dblclick', function(e) { //div text is item description
        revealText(e, this);
      })

      function revealText(e, this) { //reveals the description text of the item or hides it

        $('[colspan="5"]').parent('tr').remove();
        $(this).parents('tr').after('<tr/>').next().append('<td colspan="5"/>').children('td').append('<div/>').children().html($('#content').html()).slideDown();
      }

      var itemDesc = "first edition."
      var newDesc = $('<div>', {
        id: "content"
      });
      newDesc.text("".itemDesc);
      $('table').after(newDesc);
    }
