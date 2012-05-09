<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - User Login");

include("includes/header.php");
include("includes/navbar.php");
include("includes/passwords.php");

//connection to database
$mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);
$mysqli2= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbname, $dbpassword);

//case that logs out user
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
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		
                $success=$stmt->execute(array($address, $city, $state, $zipcode, $email, $phone, $newusername, $u_name, $newpassword));
                
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
	
	/* figure out if they are an admim */
	$query = "SELECT * FROM Users WHERE username = ?";
	if ($stmt2= $mysqli2->prepare($query)) {
	    $stmt2->execute(array($_SESSION['logged_user']));
	    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
	    	    
	    if ($r=$stmt2->fetch()){
                
                /* if they are an admin, direct them to the admin.php page. */
	        if ($r['admin']==1) {
	   
    ?>
    <div class="status">
	<script type="text/javascript">
	    location.replace("admin.php");
	</script>
    </div>
    <?php
		}
                /*if they are not an admin, direct them to the manage_account.php page. */
		if ($r['admin']==0) {
		    
		 ?>
    <div class="status">
	<script type="text/javascript">
	    location.replace("manage_account.php");
	</script>
    </div>
    <?php
		    
		}
		} else {
	        print("<p>something went wrong</p>");
	    }
        } else print("it didn't prepare the statment right");
    }
    $mysqli= null;
    $mysqli2= null;
    include("includes/footer.php");
    ?>

</body>
</html>