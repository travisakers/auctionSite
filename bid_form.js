$(document).ready(function() {

	$('#submitbid').click(function(e) {

		e.preventDefault();
		alert("bid submitted");
		var bidItemId = $("[name=bidItem]").val();
		var bidAmount = $("[name=bidAmount]").val();
		var dataString = 'bidItem=' + bidItemId + '&bidAmount=' + bidAmount;

		if (bidAmount == '') {
			alert("Please fill in the amount you wish to bid");
		} else {
			$.ajax({
				type : "POST",
				url : "bid_form.php",
				data : $('form').serialize(),
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