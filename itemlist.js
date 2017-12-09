$(document).ready(function() {


    $("#item_name").keyup(function() {
        var $search_item = $("#item_name").val(); // gets the search
        var dataString = 'itemauto=' + $search_item;

        $.ajax({
            type: "POST",
            url: "itemlist",
            data: dataString,
            cache: false,
            success: function(result) {
                alert(result);
            }

        });

    });
    return false;

});