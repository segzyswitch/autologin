<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BLOCKSP</title>
	<link rel="stylesheet" href="../bootstrap-3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<aside class="col-sm-2">
		
		</aside>
		<div class="col-sm-10">
			<nav class="navbar navbar-default row">
				<div class="navbar-header">
					<a href="index" class="navbar-brand">ADMIN PANEL</a>
				</div>
				<input type="hidden" id="initCounter" onchange="reloadTable()">
				<input type="hidden" id="autoCounter" onchange="updateItem()">
			</nav>
			<div class="thumbnail">
				<a href="#myModal" data-toggle="modal" class="btn btn-primary">Add record</a>
			</div>

			<div class="well" id="base">
				
			</div>

			<!-- Add new record -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm">

					<!-- Modal content-->
					<form class="modal-content" action="#" id="newRecordForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add new record</h4>
						</div>
						<div class="modal-body">
							<label for="email">Email address</label>
							<input type="email" id="email" name="email" placeholder="Enter email address" class="form-control" required>
							<input type="hidden" name="add_record">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn submit-btn btn-primary pull-left">Submit</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/jquery-3.min.js"></script>
<script src="../bootstrap-3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	// PRELOAD DATA
	$.post("config/process.php", {"row_counter":"true"},
		function(data, status){
			if (status == 'success') {
				$("#initCounter").val(data);
				$("#autoCounter").val(data);
				//console.log(data);
			}else {
				alert(data);						
			}
		}
	);
	//FETCH TABLE
	$.post("config/process.php", {"fetch_table":"true"},
		function(data, status){
			if (status == 'success') {
				$("#base").html(data);
			}else {
				alert(data);							
			}
		}
	);
	
	var myTimer = setInterval(reloadPage, 500);
	
	function reloadPage(){
		$.post("config/process.php", {"row_counter":"true"},
			function(data, status){
				if (status == 'success') {
					$("#autoCounter").val(data);
					if ( $("#autoCounter").val() !== $("#initCounter").val() ) {
						//FETCH TABLE
						$.post("config/process.php", {"fetch_table":"true"},
							function(data, status){
								if (status == 'success') {
									$("#base").html(data);
								}else {
									alert(data);							
								}
							}
						);
						$("#initCounter").val( $("#autoCounter").val() );
					}
				}else {
					alert(data);
				}
			}
		);
	}
	
});
	
function sendAuth(render) {
	var form_id = render.id;
	$.ajax({
		url: "config/process.php",
		type: "POST",
		data: new FormData(render),
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			//alert("sending...");
		},
		success: function(data) {
			alert(data);
		},
		error: function() {
			alert("Error!");
		}
	});
}

$("#newRecordForm").on('submit', function(e){
	e.preventDefault();
	$.ajax({
		url: "config/process.php",
		type: "POST",
		data: new FormData(this),
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			$('#newRecordForm .submit-btn').html('<i class="fa fa-spinner fa-spin"></i>');
			$("#newRecordForm .submit-btn").attr("disabled", "disabled");
		},
		success: function(data) {
			$("#newRecordForm .submit-btn").html("Submit");
			$("#newRecordForm .submit-btn").removeAttr("disabled");
			alert(data);
		},
		error: function(err) {
			$("#newRecordForm .submit-btn").html("Submit");
			$("#newRecordForm .submit-btn").removeAttr("disabled");
			alert(err);
		}
	})
});
</script>
</body>
</html>







