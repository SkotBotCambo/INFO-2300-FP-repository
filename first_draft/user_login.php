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
    $mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
    if(isset($_GET['logout']) && $_GET['logout']=='yes'){
	unset($_SESSION['logged_user']);
	session_destroy();
    }
    
    /* if no one is logged in and no one has tried to log in */
    if(!isset($_POST['submit1']) && !isset($_POST['newsubmit']) && !isset($_SESSION['logged_user'])) {
    ?>
    <div id="login">
	<div class="formheader">
	    <h1>Log In</h1>
	</div>
    
	<div class="form">
	    <form action="user_login.php" method="post">
	        <p>Username:</p><input type="text" name="username" /><br /></p>
	        <p>Password:</p><input type="password" name="password" /><br /></p>
	        <input type="submit" value="submit" name="submit1"/>
	    </form>
	</div>
    </div>
    
    <?php
	include("includes/new_user_form.php");
    }
    
	/* If someone has submitted the login form */
        elseif(isset($_POST['submit1']) && !isset($_SESSION['logged_user'])) {
	    
	    /* check and make sure they didn't submit and empty form */
            if (trim($_POST['username']) != "" && trim($_POST['password']) != ""){
                $query = "SELECT * FROM Users WHERE username = ? AND pswrd = ?";
                if ($stmt= $mysqli->prepare($query)) {
                    $stmt->execute(array($_POST['username'], hash('sha256', $_POST['password'].$gibberish)));
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
		    
		    /* check if their submitted username and password match one in the database */
                    if ($r=$stmt->fetch()){
                        $sessionlog = TRUE;
                        $_SESSION['logged_user'] = $_POST['username'];
                    } else {
                        $sessionlog = FALSE;
                    }
                } else print("It didn't prepare the statement right.");
		}
	}
	
	/* if someone has submitted the signin form but it was invalid */
        if(isset($_POST['submit1']) && !isset($_SESSION['logged_user'])){
    ?>
    <div class="error">
	<div id="login">
	    <div class="formheader">
	        <h1>Log In</h1>
	    </div>
	    <p>Your username and/or password are invalid</p>
	    <form action="user_login.php" method="post">
	        <p>Username:</p><input type="text" name="username" /><br />
	        <p>Password:</p><input type="password" name="password" /><br />
	        <input type="submit" value="submit" name="submit1" />
	    </form>
	</div>
    <?php
    include("includes/new_user_form.php");
    print("</div>");
	}
	
    if(isset($_POST['newsubmit'])){
	$query = "INSERT INTO Users VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
            if ($stmt= $mysqli->prepare($query)) {
		$newusername=$_POST['newusername'];
		$newpassword=hash('sha256', $_POST['newpassword'].$gibberish);
		$u_name=$_POST['u_name'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zipcode=$_POST['zipcode'];
		
                $success=$stmt->execute(array($address, $city, $state, $zipcode, $newusername, $u_name, $newpassword));
                
		/* check if their submitted username and password match one in the database */
                if ($success){
                    $sessionlog = TRUE;
		    if(isset($_POST['username'])){
			$_SESSION['logged_user'] = $_POST['username'];
		    } else $_SESSION['logged_user'] = $_POST['newusername'];
                } else {
		    $sessionlog = FALSE;
                }
            } else print("It didn't prepare the statement right.");
    }
	
	
    /* if they successfully created a new account or successfully logged in */
    if(isset($_SESSION['logged_user'])){
    ?>
    <div class="status">
	<p>Login succesful!</p>
        <p><a href="index.php">Back to home</a></p>
	<p><a href="user_login.php?logout=yes">Sign out</a></p>
    </div>
    <?php
    }
    $mysqli= null;
    ?>

</body>
</html>