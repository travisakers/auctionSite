var url_base = "localhost/final/auction.html";

$(document).ready(
		function() {
			$("#submitItem").submit(
					function(e) {
						e.preventDefault();
						alert("submit clicked");
						var itemName = $("#itemname").val();
						var itemDesc = $("#itemdescription").val();
						var itemPrice = $("#startingprice").val();
						var itemCat = $("#itemcategory").val();
						var itemExp = $("#expirationdate").val();
						var dataString = 'itemname=' + itemName
								+ '&itemdescription=' + itemDesc
								+ '&startingprice=' + itemPrice
								+ '&itemcategory=' + itemCat
								+ '&expirationdate=' + itemExp;

						if (itemName == '') {
							alert("Please fill in the item name");
						} else if (itemPrice == '') {
							alert("Please fill in the item price");
						} else if (itemCat == '') {
							alert("Please select an item category");
						} else if (itemExp == '') {
							alert("Please specify an expiration date");
						} else {
							$.ajax({
								type : "POST",
								url : "submit_form.php",
								data : $('form').serialize(),
								cache : false,
								success : function(result) {
									console.log("Signup was successful");
								},
								error : function() {
									console.log("Signup was unsuccessful");
								}
							});
							return false;
						}

					});

		});
