<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Home");
include("includes/header.php");
include("includes/navbar.php");
?>
<div id="mainbody">
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
	<p id="mainpar"><img id="mainpic" src="images/pink.PNG" height="375" width="500" alt="main cupcake" /></p>
</div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>