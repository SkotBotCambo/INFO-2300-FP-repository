<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - About Us");
include("includes/header.php");
include("includes/navbar.php");
$file1= fopen("textfiles/contact_info.txt", 'a');
$file2= fopen("textfiles/about_baker.txt", 'a');
?>
    <div id='aboutbakermain'>
    <h2>Information about the baker.</h2>
    <p id="bakingpar"><img id="bakingpic" src="images/hands.PNG" height="345" width="300" alt="main cupcake" /></p>

    <div id="bakerbody">
    <?php
    $file1array = file("textfiles/contact_info.txt");
        if (!$file1array) {
          print("<p>Could not load file1 (contact_info)</p>\n");
        }
    
    $file2array = file("textfiles/about_baker.txt");
        if (!$file2array) {
          print("<p>Could not load file2 (about_baker)</p>\n");
        }
    
    
    print("<p>");
    foreach ($file2array as $info2) {
        print($info2 . "<br/>");
    }
    ?>
    </p>
    </div>
    
    <div id="contactbody">
    <?php
    
    foreach ($file1array as $info1) {
        print("<p>" . $info1 . "</p>");
    }
    ?>
    </div>
    </div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>