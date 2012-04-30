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

    ?>
    <div id="browseform">
        <h3>Specialty Cupcakes</h3>
        <p>White Mountain Chocolate Cupcakes<br />
        Hummingbird Swirls<br/>
        Sticky Pecan Upsidedown Cupcake<br/>
        Lemon Coconut Snowballs<br/>
        </p>
        <h3>Cake Flavors</h3>
        <p>Chocolate<br/>
        Banana Pecan and Pinapple<br/>
        Sticky Pecan<br/>
        White<br/>
        Vanilla<br/>
        Red Velvet<br/>
        Caramel<br/>
        Green Tea<br/>
        Cookies and Cream<br/>
        </p>
        <h3>Icing Flavors</h3>
        <p>Meringe<br/>
        Cream Cheese<br/>
        Cococut<br/>
        Chocolate<br/>
        Green Tea<br/>
        Lemon<br/>
        Strawberry<br/>
        Plain<br/>
        Espresso<br/>
        </p>
    </div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>