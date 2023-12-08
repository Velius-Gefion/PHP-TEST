<html>
<head>
	<title>Student Information Management System</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<script src="jquery.min.js"></script>
</head>
<body>
<div class="bgCover" style="text-align:center;">
	<div class="container-fluid pt-3 pb-3 bg-dark text-white">
		<h1>Student Information Management</h1>
	</div>
	
	<div class="container pt-5">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<h4 class="container-fluid pb-3" style="text-align: center">Adding Student Information into the Database</h4>
			<input type="text" id="fname" class="form-control" name="student_id" value="" required placeholder="Student ID"><br>
			<input type="text" id="lname" class="form-control" name="student_name" value="" required placeholder="Student Name"><br>
			<input type="text" id="lname" class="form-control" name="course" value="" required placeholder="Course"><br>
			<input type="text" id="lname" class="form-control" name="year" value="" required placeholder="Year"><br>
			<input type="submit" id="forPopUp" class="btn btn-success btn-outline-dark text-light" value="Submit">
			<button class="btn"> <a class="btn btn-info btn-outline-dark text-light" href="list.php">Student List</a></button>
		</form>
	</div>


	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cataraja";
	$error = "";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$student_id= $_POST['student_id'];
		$student_name= $_POST['student_name'];
		$course= $_POST['course'];
		$year= $_POST['year'];
		

		// Check connection
		if ($conn->connect_error)
		{
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO student_info (student_id, student_name, course,year)
		VALUES ('" .$student_id."','".$student_name."','". $course."','". $year."')";

		if (empty($student_id) || empty($student_name) || empty($course) || empty($year))
		{
          	$error = "All fields are required!";
        }
        else
        {
          	if ($conn->query($sql) === TRUE)
          	{
            	echo "<div id='message' class='message' style='text-align: center;'>";
              	echo "New record created successfully";
              	echo "</div>";
          	}
          	else
          	{
          	  	echo "<div id='message' class='message' style='text-align: center;'>";
              	echo "Error: " .$sql. "<br>" .$conn->error;
              	echo "</div>";
          	}
        }
    }
	?>

	<div class="error">
      <?php 
      echo $error; 
      ?>
    </div>

</div>
	
</body>

</html>

<style type="text/css">
	body
	{
  		color: black;
	    background-image: url("guraspin.gif");
	    background-color: lightgreen;
	    background-size: contain;
	    background-position-x: 80%;
	    background-repeat: no-repeat;
	}

	form
	{
	    width: 55% !important;
	    border-radius: 25px;
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

    .message
	{
	    width: 50% !important;
	    border-radius: 25px;
	    background-color: skyblue !important;
	    margin-left: auto;
  		margin-right: auto;
	    padding: 10px;
    }
</style>

<script>
	$(document).ready(function()
	{
  		$("#message").on({
  			mouseenter: function() {
  				$(this).fadeOut("slow");
  			}
  		});
	});
</script>