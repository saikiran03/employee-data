function ajaxCheck(){
	var id = $("#empsearch").val();
	
	$.post("employSearch.php", {
		"empId" : id
	}, function(data, status){
		console.log("data : " + data + "\n status : " + status);
	});

	return;
}