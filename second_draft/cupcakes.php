<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Cupcake");
include("includes/header.php");
include("includes/navbar.php");
//The content of this page will be kept in the database and called through mysqli query in PHP
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