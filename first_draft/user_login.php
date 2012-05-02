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
    ?>
    <div id="login">
        <h1>Log in</h1>
        <form action="" method="">
            <p>Username:<input type="text" name="username" value=""/><br/>
            Password:<input type="password" name="password" value=""><br/>
            <input type="submit" value="Sign in" name="submit"/></p>
        </form>
    </div>
    <div id="signup">
        <h1>New User?</h1>
        <form action="" method="">
            <table>
                <tr>
                    <td>Username:</td><td><input type="text" name="newusername" value=""/></td>
                </tr>
                <tr>
                    <td>Password:</td><td><input type="password" name="newpassword" value=""/></td>
                </tr>
                <tr>
                    <td>Name:</td><td><input type="text" name="u_name" value=""/></td>
                </tr>
                <tr>
                    <td>Address:</td><td><input type="text" name="address" value=""/></td>
                </tr>
                <tr>
                    <td>City:</td><td><input type="text" name="city" value=""/></td>
                </tr>
                <tr>
                    <td>State:</td><td><input type="text" name="state" value=""/></td>
                </tr>
                <tr>
                    <td>Zip Code:</td><td><input type="text" name="zipcode" value=""/></td>
                </tr>
            </table>
            <input type="submit" value="Make New Account" name="newsubmit"/></p>
        </form>
    </div>
    <?php
    if(isset($_POST['username'])&&isset($_POST['password'])&&!isset($_SESSION['logged_user'])) {
        $query = "SELECT * FROM Users WHERE username = ? AND password = ?";
        $stmt = $mysqli->stmt_init();
        if ($stmt->prepare($query)) {
            $stmt->bind_param('ss', $_POST['username'], "".hash('sha256', $_POST['password'].$gibberish));
            $result=$stmt->execute();
            while ($row = $stmt->fetch_row()){
               print($row);
            }
        }
        else print("It got here.");
    }
    
    
    include("includes/footer.php");
    ?>
</body>
</html>