<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Country Cupcakes</title>
    <link rel="stylesheet" href="style/style.css" type="text/css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
    <?php
    include("includes/header.php");
    include("includes/navbar.php");

    ?>
	<div id="maincontent">
			<h3>Welcome to Cupcake Country!</h3>
			<p>
			We are a made-to-order cupcake company dedicated to unique,
			decadent flavors and beautiful decoration. With a Wilton-trained head chef,
			there are cupcakes that appeal to both the eyes and taste buds. 
			Order pre-made specialty cupcakes, or create your own from our choice flavors.
			Country Cupcakes are sure to add to any  occasion. 
			</p>
	</div>
	<img id="mainpic" src="graphics/maincupcake.png" height="375" width="500" alt="main cupcake" />
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>