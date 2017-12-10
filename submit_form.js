var url_base = "localhost/final/auction.html";

$(document).ready(
		function() {

			$("#submitItem").click(
					function(e) {
						e.preventDefault();
						alert("submit clicked");
						var itemName = $("#itemname").val();
						var itemDesc = $("#itemdescription").val();
						var itemPrice = $("#startingprice").val();
						var itemCat = $("#itemcategory").val();
						var itemExp = $("#expirationdate").val();
						var dataString = 'itemname=' + itemname
								+ '&itemdescription=' + itemdescription
								+ '&startingprice=' + startingprice
								+ '&itemcategory=' + itemcategory
								+ '&expirationdate=' + password;

						if (itemName == '') {
							alert("Please fill in the item name");
						} else if (itemPrice == '') {
							alert("Please fill in the item price");
						} else if (itemCat == '') {
							alert("Please select an item category");
						} else if (itemExp == '') {
							alert("Please specify an expiration date");
						} else {
							$.ajax(url_base + "/submit_form.php", {
								type : "POST",
								url : "submit_form.php",
								data : dataString,
								cache : false,
								success : function() {
									alert(result);
								}
							});
							return false;
						}

					});

		});
