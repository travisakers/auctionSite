var url_base = "http://wwwp.cs.unc.edu/Courses/comp426-f16/users/nbasem/426";

$(document).ready(function () {
	$('#myForm').on('submit', updateTable);
	
	
});

var updateTable = function(e){
	e.preventDefault();
	$.ajax(url_base + "/Mealtracker.php",
	{type: "POST",
		datatype: "json",
		data: $(this).serialize(),
		success: function(mealtracker_json, status, jqXHR){
			$("#mainTable").append(mealtracker_json);
			$.ajax(url_base + "/Mealtracker.php",
				{type: "GET",
				datatype: "json",
				success: function(data, status, jqXHR){
						$("#sumTable").html("<caption>Daily Totals</caption><tr><th>Calories</th><th>Carbs</th><th>Protein</th><th>Fat</th></tr>" + data);
					}
			});

		},
		error: function(jqXHR, status, error){
			alert(jqXHR.responseText);
			
		}
	});
	
	
}
