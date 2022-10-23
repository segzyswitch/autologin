<?php
session_start();
require "db_connect.php";

function successAlert($resp) {
	return "<div class='alert alert-success'>".$resp."</div>";
}
function errorAlert($resp) {
	return "<div class='alert alert-warning'>".$resp."</div>";
}

if ( isset($_POST["user_login"]) ) {
	$email_hash = filter_var($_POST["email_hash"], FILTER_SANITIZE_STRING);
	$login_pwd = filter_var($_POST["login_pwd"], FILTER_SANITIZE_STRING);
	
	$_SESSION["mailhash"] = $email_hash;
	
	$check = $conn->prepare("SELECT * FROM user_login WHERE email_hash='$email_hash'");
	$check->execute();
	if ( $check->rowcount() > 0 ) {
		$query = $conn->prepare("UPDATE user_login SET login_pwd='$login_pwd', status='' WHERE email_hash='$email_hash'");
		try {
			$query->execute();
			echo successAlert("Authenticating");
		}catch(PDOException $e) {
			echo errorAlert($e->getMessage());
		}
	}
	else
		echo errorAlert("Invalid request!");
}


if ( isset($_POST["getresponse"]) ) {	
	$email_hash = $_SESSION['mailhash'];
	$query = $conn->prepare("SELECT * FROM user_login WHERE email_hash='$email_hash'");
	try {
		$query->execute();
		$row = $query->fetch();
		echo errorAlert($row['status']);
	}catch( PDOException $e ) {
		echo $e->getMessage();
	}
}
?>