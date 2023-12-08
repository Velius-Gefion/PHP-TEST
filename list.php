<html>
<head>
	<title>Student Information Management System</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<script src="jquery.min.js"></script>
</head>
<body >
	<div class="container-fluid pt-3 pb-3 bg-dark text-white" style="text-align:center";>
		<h1>Student Information Management</h1>
	</div>
	<div class="container my-3">
		<div>
			<h3 class="container-fluid mx-3 pb-2">List of Students <button class="btn mx-4"><a class="btn btn-success btn-outline-dark text-light" href='index.php'> Add New </a> </button></h3>
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
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT student_id, student_name, course,year FROM student_info";
		$result = $conn->query($sql);

		if ($result->num_rows == 0) {
		  	echo "  <table class='table'>";
			echo "<thead>";
		    echo "<tr>";
		    echo  "<th>STUDENT ID</th>";
		    echo  "<th>STUDENT NAME</th>";
			echo  "<th>COURSE</th>";
			echo  "<th>YEAR</th>";
			echo  "<th></th>";
		    echo  "</tr>";
		    echo "</thead>";
		    echo "</table><br>";
		    echo "<div class='search_result' style='text-align: center;'>";
		  	echo "0 results";
		  	echo "</div>";
		}
		else
		{
		  	echo "  <table class='table'>";
			echo "<thead>";
		    echo "<tr>";
		    echo  "<th>STUDENT ID</th>";
		    echo  "<th>STUDENT NAME</th>";
			echo  "<th>COURSE</th>";
			echo  "<th>YEAR</th>";
			echo  "<th></th>";
			echo  "<th></th>";
		    echo  "</tr>";
		    echo "</thead>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	echo "<tr>";	
		    echo  "<td>" .$row["student_id"] . "</td><td>" . $row["student_name"]. "</td><td> " . $row["course"]. "</td><td>" . $row["year"]. "</td>"
			. "<td><button class='btn'><a href='edit.php?student_id=". $row["student_id"] ."&student_name=".$row["student_name"] ."' class='btn btn-primary btn-outline-dark text-light'>Edit</a> </button>
			<button id='del_button' class='btn'><a href='delete.php?student_id=". $row["student_id"]."' class='btn btn-danger btn-outline-dark text-light'>Delete</a> </button></td>";
			
		    echo "</tr>";
		  }
		  echo "</table>";
		}
	
		$conn->close();
		?>
	</div>
</body>

</html>

<style>
    .delete
    {
        background-color: red; 
        color: white; 
        cursor: pointer;
    }
    .edit
    {
        background-color: teal; 
        color: white; 
        cursor: pointer;
    }
    .search_result
    {
    	width: 50% !important;
	    border-radius: 15px;
	    background-color: skyblue !important;
	    margin-left: auto;
  		margin-right: auto;
	    padding: 10px;
    }
</style>