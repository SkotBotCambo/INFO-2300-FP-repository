<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Cupcake");
include("includes/header.php");
include("includes/navbar.php");
include("includes/passwords.php");


//The content of this page will be kept in the database and called through mysqli query in PHP
print("<div id=\"browseform\">\n");
print("<h3>Specialty Cupcakes</h3>\n<p>");
$mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
$query= "SELECT sc_name FROM Spec_Cupcakes";
$result= $mysqli->query($query);
while ($row= $result->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $index=>$data){
       print($data . "<br/>\n");
    }
}
print("</p>");

print("<h3>Flavors</h3>\n<p>");
$mysqli3= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
$query= "SELECT fl_name FROM Flavors";
$result= $mysqli3->query($query);
while ($row= $result->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $index=>$data){
       print($data . "<br/>\n");
    }
}
print("</p>");


print("<h3>Icings</h3>\n<p>");
$mysqli2= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
$query= "SELECT ic_name FROM Icing";
$result= $mysqli2->query($query);
while ($row= $result->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $index=>$data){
       print($data . "<br/>\n");
    }
}
print("</p>");
?>
    </div>
    <div id="cupcakediv">
        
    </div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>