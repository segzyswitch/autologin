<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "autologin";

try {
  $conn = @new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
	echo "Connect failed!". $e->getMessage();
}
?>