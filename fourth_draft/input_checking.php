<?php 
	function sanatize($arg1) {
		$clean = strip_tags(trim($arg1));
		return $clean; 	
	}
	
	include('includes/mysql_config.php');
	
	//for the new user and user information update forms
	
	function user_check($username, $name, $address, $city, $state, $zip, $email, $phone, $new_username) {		
		
		$ready = true;
		$error_message = "<div id=\"error_info\"><p>Oops! Something went wrong with your form. Errors found:</p><ul>";
		
		//patterns for matching
		$phone_patt = '/^[0-9]{10}$/';
		$name_patt = '/^[A-z]+ [A-z]+$/';
		$state_patt = '/[A-Z]{2}/';
		$zip_patt = '/[0-9]{5}/';
		$email_patt = '/^[A-z0-9]+@[A-z0-9]+\.[a-z]{2,3}$/';
		
		$mysqli = new mysqli('localhost', 'Cupcake_Warriors', 'rpf0efxht9f', 'info230_SP12FP_Cupcake_Warriors');
		$query = 'SELECT * FROM Users WHERE username = "'. $username . '"';
		
		$query_results = $mysqli->query($query);
		
		//testing the username input
		if (strlen($username) < 1) {
			$error_message = $error_message . "<li>Please fill in username</li>";
			$ready = false;
		} elseif ($new_username && ($query_results->num_rows) > 0) {
			$error_message = $error_message . "<li>That username is already in use.</li>"; 
			$ready = false;
		} 
		
		$mysqli->close();
		
		//testing the rest of the input
		if (strlen($name) < 1 || preg_match($name_patt, $name) == 0) {
			$error_message = $error_message . "<li>Your name should be your first and last with a space and only letter characters.</li>";
			$ready = false;
		} if (strlen($address) < 1) {
			$error_message = $error_message . "<li>Please do not leave the address field blank.</li>";
			$ready = false;
		} if (strlen($city) < 1) {
			$error_message = $error_message . "<li>Please do not leave the city field blank.</li>";
			$ready = false;
		} if (preg_match($state_patt, $state) == 0 || strlen($state) < 1) {
			$error_message = $error_message . "<li>The state should be a two capital letter abbreviation.</li>";
			$ready = false;
		} if (preg_match($zip_patt, $zip) == 0 || strlen($zip) < 1) {
			$error_message = $error_message . "<li>The zip should be 5 digits.</li>";
			$ready = false;
		} if(preg_match($phone_patt,$phone) == 0 || strlen($phone) < 1) {
			$error_message = $error_message . "<li>Your phone number must be 10-digits with no delimiters.</li>";
			$ready = false;
		} if (preg_match($email_patt, $email) == 0 || strlen($email) < 1) {
			$error_message = $error_message . "<li>Please enter a valid email address.</li>";
			$ready = false;
		}
		
		$error_message = $error_message . "</ul></div>";
		$_SESSION["error_feedback"] = $error_message;
		return $ready;

		
	}
?>