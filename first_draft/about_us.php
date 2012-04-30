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
    <div id='aboutbakermain'>
    <h2>Information about the baker.</h2>
    
    <?php
    $file1array = file("textfiles/contact_info.txt");
        if (!$file1array) {
          print("<p>Could not load file1 (contact_info)</p>\n");
        }
    
    $file2array = file("textfiles/about_baker.txt");
        if (!$file2array) {
          print("<p>Could not load file2 (about_baker)</p>\n");
        }
    
    foreach ($file1array as $info1) {
        print("<p>" . $info1 . "</p>");
    }
    
    print("<p>");
    foreach ($file2array as $info2) {
        print($info2 . "<br/>");
    }
    print("</p>");
    ?>
    
    </div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>