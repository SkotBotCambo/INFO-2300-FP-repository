<div id="new_user_form">
	<div class="formheader">
	    <h1>Sign Up</h1>
	</div>
	
	<div class="form">
	    <form action="user_login.php" method="post">
	    <table>
		<tr>
		    <td>Username:</td>
		    <td><input type="text" name="newusername" id="NewUsername" onkeyup="availability()"  /></td>
		    <td id="username_availability"></td>
		</tr>
		<tr>
		    <td>Password:</td>
		    <td><input type="password" name="newpassword" /></td>
		</tr>
		<tr>
		    <td>Name:</td>
		    <td><input type="text" name="u_name" /></td>
		</tr>
		<tr>
		    <td>Address:</td>
		    <td><input type="text" name="address" /></td>
		</tr>
		<tr>
		    <td>City:</td>
		    <td><input type="text" name="city" /></td>
		</tr>
		<tr>
		    <td>State:</td>
		    <td><input type="text" name="state" id="state" maxlength="2" onblur="check_state()" /></td>
		    <td id="state_error"></td>
		</tr>
		<tr>
		    <td>Zipcode:</td>
		    <td><input type="text" name="zipcode" id="zip" maxlength="5" onblur="check_zip()" /></td>
		    <td id="zip_error"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" id="email" onblur="check_email()" /></td>
			<td id="email_error"></td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" id="phone_num" maxlength="10" onkeyup="check_phone()" /></td>
			<td id="phone_error"></td>
		</tr>
		<tr>
			<td></td> 
			<td id="phone_format">e.g. 8005551212 (digits only)</td> 
	    </table>
	    <input type="submit" value="submit" name="newsubmit"/></p>
	    </form>
	</div>
    </div>