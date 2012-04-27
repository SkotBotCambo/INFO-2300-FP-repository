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
    $file1= fopen("textfiles/contact_info.txt", 'a');
    $file2= fopen("textfiles/about_baker.txt", 'a');
    
    ?>
    <p>Information about the baker.</p>
    
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>