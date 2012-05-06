<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Country Cupcakes</title>
    <link rel="stylesheet" href="style/style.css" type="text/css"/>
</head>
<body>
    
    <?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("includes/passwords.php");
?>        
     <div id="adminbody">    
        <h1>Administrator</h1>
        <p><a href="index.php">Back to home</a></p>
	<p><a href="user_login.php?logout=yes">Sign out</a></p>
        <div id="addspecial">
            <p>This is where the form will go for adding a specialty cupcake</p>
        </div>
        <div id="updateabout">
            <p>This is where admin can update the About the Baker page</p>
        </div>
        <div id="vieworders">
            <p>This is where all orders yet to be fulfilled will be displayed</p>
        </div>
        <div id="addAdmin">
            <p>This is where the admin can make clients an admin</p>
        </div>
     </div>
        <?php

    include("includes/footer.php");
    ?>

</body>
</html>