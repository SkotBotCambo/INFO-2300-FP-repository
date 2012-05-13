<?php
        $mysqli= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
	$query= "SELECT fl_name FROM Flavors";
        $result= $mysqli->query($query);
        $mysqli2= new PDO("mysql:host=localhost; dbname=info230_SP12FP_Cupcake_Warriors", $dbusername, $dbpassword);
	$query= "SELECT ic_name FROM Icing";
	$result2= $mysqli2->query($query);
?>
        
            <h3>Add a Specialty Cupcake:</h3>
	    <form action="admin.php" method="post" enctype="multipart/form-data">
		<ol>
		    <li>What is this Specialty Cupcake's country singer's name?<input type="text" name="sc_name"/></li>
		    <li>If the flavor of the cake is already one you offer, please choose it.
			<select name="oldfl_name">
				<option value="nothing"></option>
<?php
	while ($row= $result->fetch(PDO::FETCH_ASSOC)){
	    foreach ($row as $index=>$data){
		print("<option value=\"" . $data . "\">" . $data . "</option>\n");
	    }
	}
?>
			</select><br/>
			If the flavor of cupcake is brand new, please name the flavor and indicate its price per cupcake.<br/>
			Flavor:<input type="text" name="newfl_name"/> Price:<input type="text" name="fl_price"/><br/></li>
		    <li>If the flavor of the icing is already one you offer, please choose it.
			<select name="oldic_name">
			<option value="nothing"></option>
<?php
	while ($row2= $result2->fetch(PDO::FETCH_ASSOC)){
	    foreach ($row2 as $index2=>$data2){
		print("<option value=\"" . $data2 . "\">" . $data2 . "</option>\n");
	    }
	}
?>
			</select><br/>
			If the icing of cupcake is brand new, please name the flavor and indicate its price per cupcake.<br/>
			Flavor:<input type="text" name="newic_name"/> Price:<input type="text" name="ic_price"/><br/></li>
		    <li>Please provide a description of this cupcake, including any traditional names and special ingredients<br/>
		        <textarea rows="4" cols="50" name="description"></textarea><br/></li>
		    <li>Finally, please upload a photo of your new Specialty cupcake.<br/>
		    <input type="file" name="newphoto"/><br/></li>
		</ol>
		<p><input type="submit" name="Uploadphoto" value="Add Cupcake to Menu"/></p>
	    </form>
