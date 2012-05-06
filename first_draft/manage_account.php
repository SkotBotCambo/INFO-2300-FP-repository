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
    <div id="managebody">    
        <h1>Manage Account</h1>
        <p><a href="index.php">Back to home</a></p>
	<p><a href="user_login.php?logout=yes">Sign out</a></p>
        <div id="pastorders">
            <p>This is where the client can view past orders</p>
        </div>
        <div id="updateinfo">
            <p>This is where the client can update their information</p>
        </div>
     </div>
        <?php

    include("includes/footer.php");
    ?>

</body>
</html>