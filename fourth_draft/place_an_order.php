<?php
session_start();
include("includes/functions.php");

//this function writes the header for the html document and takes the title for the page as a parameter
docheader("Cupcake Country - Place An Order");

include("includes/header.php");
include("includes/navbar.php");
?>

<div id="creator">
	<div id="display">
		<img id="wrapper_back" src="graphics/creator/wrapper_back.png" width="400" height="400" />
		<img id="wrapper_front" src="graphics/creator/wrapper_front.png" width="400" height="400" />
		<div id="colorsdiv"></div>
	</div>
	<form>
		<div class="orderform" id="specialties">
		<table>
			<th colspan="2">Choose one of our specialties or start a custom order</th>
<?php
	$specialties = queryspecialties();
	//echo("array length is ".count($specialties));
	$i = 0;
	print("\t<tr>\n\t");
	foreach($specialties as $name => $description){
		if (($i%2 == 0) && ($i != 0)){
			echo('
	</tr>
	<tr>
		<td><input type="radio" name="specialties" value="'.$name.'" />'.$name."</td>\n\t");
		} else {
			echo('<td><input type="radio" name="specialties" value="'.$name.'" />'.$name."</td>\n\t");
		}
		$i++;
	}
	if($i%2 == 0){
	echo("<tr>\n\t");
	}
	echo('<td><input type="radio" name="custom" value="custom" />Custom Cupcake</td>
	</tr>');
		
?>
	

		</table>
		</div>
	</form>
</div>
<script type="text/javascript" src="includes/js_creator.js"></script>
<?php

/*When the form is done and checked through javascript,
 PHP will use mysqli to connect with the database and enter tuples for the orders
 and an e-mail will be sent to the administrator to inform them that an order has been placed and the client is awaiting correspondence
*/
    include("includes/footer.php");
?>
</body>
</html>