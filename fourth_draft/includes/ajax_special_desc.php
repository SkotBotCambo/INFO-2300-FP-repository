<?php

$specialcupcake = $_POST["scc"];

$response = "";

include('mysql_config.php');
$mysqli = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
$query = "SELECT description FROM Spec_Cupcakes WHERE sc_name = \"".$specialcupcake."\";";
$result = $mysqli->query($query);
while($row = $result->fetch_assoc()){
	$response = $row['description'];
}

print($response);

?>