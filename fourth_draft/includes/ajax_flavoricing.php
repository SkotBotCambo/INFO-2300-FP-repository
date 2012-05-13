<?php

$dbname='Cupcake_Warriors';
$dbpassword="rpf0efxht9f";
$mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
$query= "SELECT urlFROM Spec_Cupcakes WHERE sc_name=\"". $_POST['sc_name'] . "\"";
$result= $mysqli->query($query);
while ($row= $result->fetch(PDO::FETCH_ASSOC)){
    $url=$row['url'];
}
print($url);

?>