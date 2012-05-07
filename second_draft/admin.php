<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Admin account");
include("includes/header.php");
include("includes/navbar.php");

include("includes/passwords.php");
    $file1= fopen("textfiles/contact_info.txt", 'r+');
    $file2= fopen("textfiles/about_baker.txt", 'r+');
    
    if(isset($_POST['updatefiles'])){
	file_put_contents("textfiles/contact_info.txt", "");
	file_put_contents("textfiles/about_baker.txt", "");
	fwrite($file1, $_POST['contactinfo']);
	fwrite($file2, $_POST['aboutbaker']);
    }
?>        
     <div id="adminbody">    
        <h1>Administrator</h1>
        <p><a href="index.php">Back to home</a></p>
	<p><a href="user_login.php?logout=yes">Sign out</a></p>
        <div id="addspecial">
            <p>This is where the form will go for adding a specialty cupcake</p>
        </div>
        <div id="updateabout">
	    <form action="admin.php" method="post">
	    <table>
		<tr>
		    <td><b>Update the company's contact information:</b></td>
			<!--This will be taken care of through an SQL query in PHP -->
		    <td><b>Update the information about the baker and the company:</b></td>
			<!--This will be accomplished through an SQL query using PHP -->
		</tr>
		<tr>
		    <td><textarea rows="10" cols="50" name="contactinfo">
			<?php
			$file1array = file("textfiles/contact_info.txt");
			if (!$file1array) {
			  print("Could not load file1 (contact_info)");
			} else {
			    foreach ($file1array as $info1) {
			        print($info1);
				}
			}?></textarea></td>
		    <td><textarea rows="10" cols="50" name="aboutbaker">
			<?php
			$file2array = file("textfiles/about_baker.txt");
			if (!$file2array) {
			  print("Could not load file2 (about_baker)");
			} else {
			    foreach ($file2array as $info2) {
			        print($info2);
			    }
			}?></textarea></td>
		</tr>
	    </table>
	    <input type="submit" name="updatefiles" value="Update Files"/>
	    </form>
        </div>
        <div id="vieworders">
            <p>This is where all orders yet to be fulfilled will be displayed</p>
        </div>
        <div id="addAdmin">
            <p>This is where the admin can make clients an admin</p>
			<!--This will be done through an SQL query -->
        </div>
     </div>
        <?php

    include("includes/footer.php");
    ?>

</body>
</html>