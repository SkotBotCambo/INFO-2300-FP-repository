//function to check username availability
function check_availability(){

		//get the username
		var username = $('#username').val();

		//run the check
		if(isset($_POST['username'])) {
			$username = $_POST['username'];

			include(mysql_config.php);
			
			$db = $mysqli = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
			$query = 'SELECT * FROM Users WHERE username = "' . mysql_real_escape_string($username);
			$result = $mysqli->query($query);

			if ($result->num_rows > 0) {
				document.getElementById("username_availability").innerHTML = "That username is already in use";
				return false;
			} else {
				document.getElementById("username_availability").innerHTML = "Available!";
				return true;
			}
		
			$mysqli->close();
			}
}

//function to check that email format is valid (code adapted from W3 schools)
function check_email(){
		email = document.getElementById("email").value;
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= email.length) {
  			document.getElementById("email_error").innerHTML = "Please enter a valid email address";
  			return false;
  		} else {
			return true;
		}
}

/*
function check_address(){
	address = document.getElementById("address").value;
	var patt = new RegExp([0-9]{1,}[

}
*/