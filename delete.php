<html>
<head>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
	
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cataraja";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$var_id =  $_GET["student_id"];
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// sql to delete a record
		$sql = "DELETE FROM student_info WHERE student_id='" .$var_id. "'";

		if ($conn->query($sql) === TRUE) {
		   header("location: list.php");
		} else {
		  	echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
		?>
</body>

</html>