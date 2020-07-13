
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Smart method control panel</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v2">
	<div class="page-content">
		<div class="form-left">
				<img src="images/form-v2.jpg" alt="form">
				</div>
				<div class="text-1">
					<p>Direction  Of SM Robort <span> </span></p>
					
					<?php



//process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form

$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "sm_control";


	$u_left = $_POST["left_sm"]; //set PHP variables like this so we can use them anywhere in code below
	$u_right = $_POST["right_sm"];
	$u_forward = $_POST["forward_sm"];
	
	
	
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO directions (lefts , rights ,forwards) VALUES(?, ?, ?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss', $u_left, $u_right, $u_forward); //bind values and execute insert query
	
	if($statement->execute()){
		print "Hello , your directions has been saved in our records!";
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>
	
					
					</div>
					
					

		
	</div>
</body>
</html>


 