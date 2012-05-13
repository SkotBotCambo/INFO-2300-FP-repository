<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Manage Account");
include("includes/header.php");
include("includes/navbar.php");
include("includes/passwords.php");
?>
<div id="managebody">    
        <h1>Manage Account</h1>
        <p id="managetop"><a href="index.php">Back to home</a><br/><a href="user_login.php?logout=yes">Sign out</a></p>
        <div id="pastorders">
			<!--This will be pulled up through an mysqli query in PHP -->
            <p>This is where the client can view past orders</p>
        </div>
			<!--This will be pulled up through an mysqli query in PHP -->
        <div id="updateinfo">
	    <div class="formheader">
	        <h1>Edit Your Information</h1>
	    </div>

<?php

include('input_checking.php');

/* if they desire to edit their information and have submitted the form... */
if(isset($_POST['submitedit'])){
	
    $username= sanatize($_POST['username']);
    $u_name= sanatize($_POST['u_name']);
    $address= sanatize($_POST['address']);
    $city= sanatize($_POST['city']);
    $state= sanatize($_POST['state']);
    $zipcode= sanatize($_POST['zipcode']);
    $email= sanatize($_POST['email']);
    $phone= sanatize($_POST['phone']);
	
	$new = false;
		
	if (strcasecmp($username,$_SESSION['logged_user']) != 0){
		$new = true;
	}
	
if (user_check($username, $u_name, $address, $city, $state, $zipcode, $email, $phone, $new)) {

	

	if (trim($_POST['password']) == "") {
		
		$mysqli2= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
		$query= "UPDATE Users SET username=?, u_name=?, Address=?, City=?, State=?, Zip=?, Email=?, Phone=? WHERE username=\"" . $_SESSION['logged_user'] . "\"";
		if ($stmt2= $mysqli2->prepare($query)) {
			$success=$stmt2->execute(array($username, $u_name, $address, $city, $state, $zipcode, $email, $phone));
		}
	} else {
		$newpassword=hash('sha256', sanatize($_POST['password']).$gibberish);
		$mysqli2= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
		$query= "UPDATE Users SET username=?, u_name=?, Address=?, City=?, State=?, Zip=?, Email=?, Phone=?, pswrd=? WHERE username=\"" . $_SESSION['logged_user'] . "\"";
		if ($stmt2= $mysqli2->prepare($query)) {
			$success=$stmt2->execute(array($username, $u_name, $address, $city, $state, $zipcode, $email, $phone, $newpassword));
		}
	}
		/* if all the queries were successful. */
		if ($success) {
		
		$mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
		$query = "SELECT * FROM Users WHERE username = ?";
		if ($stmt= $mysqli->prepare($query)) {
			$stmt->execute(array($_SESSION['logged_user']));
			$stmt->setFetchMode(PDO::FETCH_ASSOC);	    	    
		if ($r=$stmt->fetch()){
			$_SESSION['oldr']=$r;	
		}
		}
		
			print("<div class=\"form\">\n<form action=\"manage_account.php\" method=\"post\">\n");
			print("<table>\n<tr>\n<td>Username:</td>\n<td>" . $_SESSION['oldr']['username'] . "</td>\n</tr>\n");
			print("<tr>\n<td>New password:</td>\n<td>". $_POST['password'] . "</td>\n</tr>\n");
			print("<tr>\n<td>Name:</td>\n<td>" . $_SESSION['oldr']['u_name'] . "</td>\n</tr>\n");
			print("<tr>\n<td>Address:</td>\n<td>" . $_SESSION['oldr']['Address'] . "</td>\n</tr>\n");
			print("<tr>\n<td>City:</td>\n<td>" . $_SESSION['oldr']['City'] . "</td>\n</tr>\n");
			print("<tr>\n<td>State:</td>\n<td>" . $_SESSION['oldr']['State'] . "</td>\n</tr>\n");
			print("<tr>\n<td>Zipcode:</td>\n<td>" . $_SESSION['oldr']['Zip'] . "</td>\n</tr>\n");
			print("<tr>\n<td>Email:</td>\n<td>" . $_SESSION['oldr']['Email'] . "</td>\n</tr>\n");
			print("<tr>\n<td>Phone:</td>\n<td>" . $_SESSION['oldr']['Phone'] . "</td>\n</tr>\n");
		}
	} else {
		print ($_SESSION["error_feedback"]);
	
		include("includes/edit_form.php");

	}

    }


else{
	include("includes/edit_form.php");
}
    

    //include("includes/footer.php");
?>

</body>
</html>