var searchResults;

function fillData(id) {
	console.log(searchResults[id]);
	return;
}

function showEmployees(employeeData) {
	var parseObjects = employeeData.split("\n \n");
	var jsonObjects = [];
	var updObjects = []

	if (parseObjects.length==0){
		$("#employeeList").html("<p> No employee found </p>");
	}
	else {
		for (var id = 0; id < parseObjects.length; id++ ) {
			try {
				var Json = JSON.parse(parseObjects[id]);
				jsonObjects.push(Json);
				updObjects.push("<div class='search-result'><a onclick='fillData(" + id + ")'>" + Json.empid + "</a></div>");				
			}
			catch (err) {
				console.log(parseObjects[id]);
			}
		}

		$("#employeeList").html(updObjects.join("\n"));
		$("#myModal").modal("show");
		searchResults = jsonObjects;
	}
}

function ajaxCheck(){
	var id = $("#empsearch").val();
	
	$.post("employSearch.php", {
		"empId" : id
	}, function(data, status){
		showEmployees(data);
	});

	return;
}