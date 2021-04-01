<!DOCTYPE html>
<html>
<head>
	<title>Database Insertion</title>
</head>
<body>
	<h1>Database Insertion</h1>
	<?php 
	$host = "localhost";
	$user = "user1";
	$pass = "123";
	$db = "task";
	// Mysqli object-oriented
	$conn1 = new mysqli($host, $user, $pass, $db);
	if($conn1->connect_error) {
		echo "Database Connection Failed!";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else {
		echo "Database Connection Successful!";

		


		$stmt1 = $conn1->prepare("insert into user (username, password, gender, dob, address, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt1->bind_param("ssssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7);
		$p1 = $_POST['username'];
		$p2 = $_POST['email'];
		$p3 = $_POST['password'];
		$p4 = $_POST['phone'];
		$p5 = $_POST['gender'];
		$p6 = $_POST['dob'];
		$p7 = $_POST['address'];
		
		$status = $stmt1->execute();

		if($status) {
			echo "Data Insertion Successful.";
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $conn1->error;
		}
	}

	$conn1->close();

	?>
</body>
</html>