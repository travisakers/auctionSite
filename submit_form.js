var url_base = "localhost/final/auction.html";

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
							alert("Item Posted! Thank you!");
							$("#table1 tbody").append(
								"<tr>"+
								"<td>"+
									"<button type='button' class='btn btn-secondary'"+
									"data-container='body' data-toggle='popover' data-placement='right'"+
									"data-content="+itemDesc+">"+
									"Item Description</button>"+
								"</td>"+
								"<td>"+itemName+"</td>"+
								"<td>"+itemCat+"</td>"+
								"<td>"+itemPrice+"</td>"+
								"<td>"+itemExp+"</td>"+
								"</tr>"
							);
							$.ajax({
								type : "POST",
								url : "submit_form.php",
								data : $("#submitform").serialize(),
								cache : false,
								success : function(result) {
									console.log("submitted item");
								},
								error : function() {
									console.log("WRONG");
								}
							});
							return false;
						}

					});

		});
