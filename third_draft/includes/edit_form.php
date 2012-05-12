<?php

include("includes/mysql_config.php");

$mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
	$query = "SELECT * FROM Users WHERE username = ?";
	if ($stmt= $mysqli->prepare($query)) {
		$stmt->execute(array($_SESSION['logged_user']));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);	    	    
		if ($r=$stmt->fetch()){
			$_SESSION['oldr']=$r;	
?>        
	    
	    <div class="form">
	        <form action="manage_account.php" method="post">
<?php
print("<table>\n<tr>\n<td>Username:</td>\n<td><input type=\"text\" name=\"username\" id=\"NewUsername\" value=\"" . $r['username'] . "\" onkeyup=\"availability()\"/></td>\n<td id=\"username_availability\"></td>\n</tr>\n");
print("<tr>\n<td>Password:</td>\n<td><input type=\"password\" name=\"password\" value=\"\"/></td>\n</tr>\n");
print("<tr>\n<td>Name:</td>\n<td><input type=\"text\" name=\"u_name\" value=\"" . $r['u_name'] . "\"/></td>\n</tr>\n");
print("<tr>\n<td>Address:</td>\n<td><input type=\"text\" name=\"address\" value=\"" . $r['Address'] . "\"/></td>\n</tr>\n");
print("<tr>\n<td>City:</td>\n<td><input type=\"text\" name=\"city\" value=\"" . $r['City'] . "\"/></td>\n</tr>\n");
print("<tr>\n<td>State:</td>\n<td><input type=\"text\" name=\"state\" maxlength=\"2\" value=\"" . $r['State'] . "\" id=\"state\" onblur=\"check_state()\"/></td>\n<td id=\"state_error\"></td>\n</tr>\n");
print("<tr>\n<td>Zipcode:</td>\n<td><input type=\"text\" name=\"zipcode\" maxlength=\"5\" value=\"" . $r['Zip'] . "\" id=\"zip\" onblur=\"check_zip()\"/></td>\n<td id=\"zip_error\"></td>\n</tr>\n");
print("<tr>\n<td>Email:</td>\n<td><input type=\"text\" name=\"email\" value=\"" . $r['Email'] . "\" id=\"email\" onblur=\"check_email()\"/></td>\n<td id=\"email_error\"></td>\n</tr>\n");
print("<tr>\n<td>Phone:</td>\n<td><input type=\"text\" name=\"phone\" value=\"" . $r['Phone'] . "\" id=\"phone_num\" onkeyup=\"check_phone()\"/></td>\n<td id=\"phone_error\"></td>\n</tr>\n");
?>
	    </table>
	        <input type="submit" value="submit" name="submitedit"/></p>
	        </form>
    	    </div>
	    </div>
	</div>
<?php
		}
	}
?>