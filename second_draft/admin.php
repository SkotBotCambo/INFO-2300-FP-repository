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
    
<?php
    /* if the admin tried to upload a new cupcake */
    if(isset($_POST['Uploadphoto'])){
	
	/* check that all the forms were filled out
	    INPUT STILL NEEDS TO BE CHECKED!!!! */
	if (($_FILES['newphoto']['error'] == 0) &&
	    (trim($_POST['sc_name']) != "") &&
	    (trim($_POST['description']) != "") &&
	    (($_POST['oldfl_name'] != "nothing") || (trim($_POST['newfl_name']) != "" && trim($_POST['ic_price']) != "")) &&
	    (($_POST['oldic_name'] != "nothing") || (trim($_POST['newic_name']) != "" && trim($_POST['ic_price']) != ""))) {
	    move_uploaded_file($_FILES['newphoto']['tmp_name'], "images/" . $_FILES['newphoto']['name']);
	    
	    /* checks whether or not they invented a new flavor, or used an old one. */
	    if(!($_POST['oldfl_name'] == 'nothing')) {
	        $flavor= $_POST['oldfl_name'];
	    } else {
	        $flavor= $_POST['newfl_name'];
	        $flprice= $_POST['fl_price'];
		$mysqli4= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
		$query= "INSERT INTO Flavors VALUES (?, ?)";
		if ($stmt= $mysqli4->prepare($query)) {
		    $successflavor= $stmt->execute(array($flprice, $flavor));
		}
		
	    }
	    
	    /*checks whether or not they invented a new icing, or used an old one. */
	    if(!($_POST['oldic_name']== 'nothing')) {
	        $icing= $_POST['oldic_name'];
		print("icing: " . $icing);
	    } else {
	        $icing= $_POST['newic_name'];
	        $icprice= $_POST['ic_price'];
		$mysqli5= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
		$query= "INSERT INTO Icing VALUES (?, ?)";
		if ($stmt= $mysqli5->prepare($query)) {
		    $successicing=$stmt->execute(array($icprice, $icing));
		}
	    }
	    $sc_name= $_POST['sc_name'];
	    $desc= $_POST['description'];
	    $url= $_FILES['newphoto']['name'];
	    
	    $mysqli3= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
	    $query= "INSERT INTO Spec_Cupcakes VALUES (?, ?, ?, ?, ?)";
	    if ($stmt= $mysqli3->prepare($query)) {
		$successcake=$stmt->execute(array($sc_name, $flavor, $icing, $url, $desc));
	    }
	    
	    /* If the queries were made successfully */
	    if ((isset($successcake) && $successcake) &&
		(!isset($successflavor) || $successflavor) &&
		(!isset($successicing) || $successicing)) {
		print("<p>Your new Specialty Cupcake, the " . $sc_name . " was added successfully to your menu<br/>\n");
		print("You can view it on the <a href=\"cupcakes.php\">Cupcakes Page</a>.</p>\n");
		print("<p><img src=\"images/" . $_FILES['newphoto']['name'] . "\" width=\"200\" height=\"200\" alt=\"" . $_FILES['newphoto']['name'] . "\"/></p>");
		print("<p>Cake Flavor:" . $flavor . "<br/>");
		print("Icing Flavor:" . $icing . "<br/>");
		$totalprice= $icprice + $flprice;
		print("Price per Cupcake:" . $totalprice . "<br/>");
		print("Description:" . $desc . "</p>");
	    } else {
		print("<p>Your cupcake was not loaded successfully, please try again.");
		include("includes/new_spec_form.php");
	    }
	}
	else {
	    print("You did not fill out the form correctly");
	    
	    /*Adding a specialty cupcake form */
	    include("includes/new_spec_form.php");
	    }
    } else {
	
/*Adding a specialty cupcake using a file uploader and an SQL Query */
include("includes/new_spec_form.php");
    }
?>
	
	<!--Updating the 'About the Baker' page using textfiles -->
        <div id="updateabout">
	    <form action="admin.php" method="post">
	    <table>
		<tr>
		    <td><b>Update the company's contact information:</b></td>
		    <td><b>Update the information about the baker and the company:</b></td>
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
			<!--This will be done through an SQL query -->
        </div>
        <div id="addAdmin">
            <p>This is where the admin can make clients an admin</p>
			<!--This will be done through an SQL query -->
        </div>
     </div>
        <?php
    $mysqli= null;
    $mysqli2= null;
    $mysqli3= null;
    $mysqli4= null;
    $mysqli5= null;
    include("includes/footer.php");
    ?>

</body>
</html>