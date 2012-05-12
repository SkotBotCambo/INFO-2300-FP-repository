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