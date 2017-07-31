

function SelectBank(valueToSelect)
{    
	console.log(valueToSelect);
	if ($("#bank").val(valueToSelect))
		console.log("done");
	else
		console.log("error");
}

function SelectDept(valueToSelect)
{    
	console.log(valueToSelect);
	var element = document.getElementById('deptcode');
    element.value = valueToSelect;
}



var searchResults;

function showNotification (message) {
	$("#notification-message").html(message);
	$("#notificationModal").modal("show");

	setInterval(function() {
		$("#notificationModal").modal("hide");
	}, 5000);
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

function fillData(id) {
	console.log(searchResults[id]);
	var json = searchResults[id];

	$("input[name='emp_no']").val(parseInt(json.empid));
	$("input[name='name']").val(json.empname);
	$("input[name='father_name']").val(json.father_name);
	$("input[name='dob']").val(json.dob);
	$("input[name='phone']").val(json.mobile);
	$("input[name='adhar_no']").val(json.aadhaar);
	$("input[name='pan_no']").val(json.pan);
	$("input[name='dept']").val(json.dept);
	$("input[name='deptcode']").val(json.dept_code);
	// SelectDept(json.dept_code);
	$("input[name='acc_no']").val(json.acc_no);
	$("input[name='ifsc']").val(json.ifsc);
	SelectBank(json.bankname);
	// $("input[name='bank']").val(json.bankname);
	$("input[name='branch']").val(json.branch);
	$("input[name='dno']").val(json.doorno);
	$("input[name='fno']").val(json.flat_no);
	$("input[name='street']").val(json.street);
	$("input[name='area']").val(json.area);
	$("input[name='post']").val(json.post);
	$("input[name='city']").val(json.city);
	$("input[name='zip']").val(json.pincode);

	$("#myModal").modal("hide");
	return;
}

// document.getElementsByClassName("search-result").style.cursor = "pointer";
