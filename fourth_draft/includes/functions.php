<?php

//writes the html doc header, takes the title for the page as a parameter
function docheader($title){
	echo("
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <title>$title</title>
    <link rel=\"stylesheet\" href=\"style/style.css\" type=\"text/css\"/>
	<link href='http://fonts.googleapis.com/css?family=Sunshiney|Happy+Monkey' rel='stylesheet' type='text/css'/>
	<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
	<script type=\"text/javascript\" src=\"includes/js_functions.js\"></script>
</head>
<body>
	");
}

//queries and returns specialty cupcake names and their descriptions in an associative array
//$specialties['sc_name'] = ['description']
function queryspecialties() {
	include("includes/mysql_config.php");
	$mysqli = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
	$spec_query = "SELECT sc_name, description FROM Spec_Cupcakes";
	$sc_array = $mysqli->query($spec_query);
	while ($row = $sc_array->fetch_assoc()){
		$specialties[$row['sc_name']] = $row['description'];
	}
	$mysqli->close();
	return $specialties;
}