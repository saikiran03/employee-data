<<<<<<< HEAD


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

=======
var searchResults;

function fillData(id) {
	console.log(searchResults[id]);
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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

<<<<<<< HEAD
function fillData(id) {
	console.log(searchResults[id]);
	var json = searchResults[id];

	$("input[name='emp_no']").val(parseInt(json.empid));
	$("input[name='name']").val(json.empname);
	$("input[name='father_name']").val(json.father_name);
	$("input[name='dob']").val(json.dob);
	$("input[name='email']").val(json.email);
	$("input[name='phone']").val(json.mobile);
	$("input[name='adhar_no']").val(json.aadhaar);
	$("input[name='pan_no']").val(json.pan);
	// $("input[name='dept']").val(json.dept);
	// $("input[name='dept_code']").val(json.dept_code);
	SelectDept(json.dept_code);
	$("input[name='acc_no']").val(json.acc_num);
	$("input[name='ifsc']").val(json.ifsc);
	SelectBank(json.bank);
	// $("input[name='bank']").val(json.bank);
	$("input[name='area']").val(json.b_area);
	$("input[name='address']").val(json.flat_num +","+ json.area +","+ json.post);
	$("input[name='city']").val(json.city);
	$("input[name='zip']").val(json.zip);

	$("#myModal").modal("hide");
	return;
}

// document.getElementsByClassName("search-result").style.cursor = "pointer";
=======
function ajaxCheck(){
	var id = $("#empsearch").val();
	
	$.post("employSearch.php", {
		"empId" : id
	}, function(data, status){
		showEmployees(data);
	});

	return;
}
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
