$(document).ready(
		function() {

			$("#submitItem").click(
					function(e) {
						e.preventDefault();
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
							$.ajax({
								type : "POST",
								url : "submit_form",
								data : dataString,
								cache : false,
								success : function(result) {
									alert(result);
								},
								error : function(jqXHR, textStatus,
										errorMessage) {
									console.log(errorMessage); // Optional
								}
							});
						}

					});
		});