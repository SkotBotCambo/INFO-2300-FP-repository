<?php

$user_input = $_GET["q"];

$response = "";

include('mysql_config.php');

if (strlen($user_input) > 0) {
	
	$mysqli = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
	
	$query = 'SELECT * FROM Users WHERE username = "'. $user_input . '"'; 
	
	$result = $mysqli->query($query); 
	
	if (($result->num_rows) > 0) {
		$response = "<p>Not Available</p>";
	} else {
		$response = "<p>Available!</p>"; 
	}
	
	$mysqli->close();
	 
	}

print($response); 

?>