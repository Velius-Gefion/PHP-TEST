<html>
<head>
	<link href="bootstrap.min.css" rel="stylesheet">
	<script src="jquery.min.js"></script>
</head>
<body>
	<div class="container-fluid pt-3 pb-3 bg-dark text-white" style="text-align:center";>
		<h1>Student Information Management</h1>
	</div>

	
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cataraja";



	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

		
	//display records
	// Check connection
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$var_id =  $_GET["student_id"];
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

			$sql = "SELECT student_id, student_name, course,year FROM student_info WHERE student_id='" .$var_id. "'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			// output data of each row
			  while($row = $result->fetch_assoc()) {


				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			  echo "<div class='container pt-5' style='text-align:center;'>";
			  echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
			  echo "<h4 class='container-fluid pb-3' style='text-align: center'>Updating Student Information</h4>";
			  echo "<input type='text' id='txtstudent_id' class='form-control' name='student_id' value='".$row["student_id"] ."' required placeholder='Student ID'><br>";
			  echo "<input type='text' id='lname' class='form-control' name='student_name' value='".$row["student_name"] ."' required placeholder='Student Name'><br>";
			  echo "<input type='text' id='lname' class='form-control' name='course' value='".$row["course"] ."' required placeholder='Course'><br>";
			  echo "<input type='text' id='lname' class='form-control' name='year' value='".$row["year"] ."' required placeholder='Year'><br>";
			  echo "<input type='submit' class='btn btn-success btn-outline-dark text-light' value='Update'>";
			  echo "<button class='btn'> <a class='btn btn-info btn-outline-dark text-light' href='list.php'>Cancel</a></button>";
			  echo "</form>";
		  	  echo "</div>";

			  }
			} else {
			  echo "0 results";
			}
		}
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$student_id= $_POST['student_id'];
				$student_name= $_POST['student_name'];
				$course= $_POST['course'];
				$year= $_POST['year'];
		
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}

				$sql = "UPDATE student_info

					SET student_name='" .$student_name."', course='" .$course."',year='" .$year."'
					WHERE student_id='".$student_id."'"; 
			

				if ($conn->query($sql) === TRUE) {
				  echo "Record successfully updated";
				  header("location: list.php");
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	
	$conn->close();
	?>
</body>

</html>

<style type="text/css">
	
	body
	{
  		color: black;
	    background-image: url("student_2.png");
	    background-color: limegreen;
	    background-size: contain;
	    background-position-x: 80%;
	    background-repeat: no-repeat;
	}

	form
	{
	    width: 50% !important;
	    border-radius: 30px;
	    margin-top: auto;
	    background-color: skyblue !important;
	    padding: 30px;
	}

	.form-control
	{
	    color: rgba(0,0,0,.87);
	    border-bottom-color: rgba(0,0,0,.50);
	    box-shadow: none !important;
	    border: none;
	    border-bottom: 2px solid;
	    border-radius: 10px 0 25px 0;
    }
</style>