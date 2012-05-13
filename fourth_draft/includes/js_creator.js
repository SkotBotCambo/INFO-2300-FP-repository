var flavorclick = 0;
var icingclick = 0;
var specialclick = 0;

var flavor = $("<div>").attr(
	{
		"class" : "orderform",
		"id" : "flavor"
	}).append('<table>\n\t<tr>\n\t' +
		'<th colspan="3">Choose a flavor</th></tr>' +
		'\n<tr>\n\t' +
		'<td><input type="radio" name="flavor" value="chocolate" />Chocolate</td>\n' +
		'<td><input type="radio" name="flavor" value="bpandp" />Banana Pecan and Pineapple</td>\n' +
		'<td><input type="radio" name="flavor" value="sticky" />Stickey Pecan</td>\n' +
		'</tr>\n<tr>\n\t'+
		'<td><input type="radio" name="flavor" value="white" />White</td>\n' +
		'<td><input type="radio" name="flavor" value="vanilla" />Vanilla</td>\n' +
		'<td><input type="radio" name="flavor" value="redvelvet" />Red Velvet</td>\n' +
		'</tr>\n<tr>\n\t'+
		'<td><input type="radio" name="flavor" value="caramel" />Caramel</td>\n' +
		'<td><input type="radio" name="flavor" value="greentea" />Green Tea</td>\n' +
		'<td><input type="radio" name="flavor" value="cookiescream" />Cookies and Cream</td>\n' +
		'</tr>\n</table>'
	);

var cupcakeimg = $("<img>").attr(
	{
		"width" : "400",
		"height" : "400"
	});

var colorsbox = $("<div>").attr(
	{
		"class" : "colorsbox"
	});
	
var icing = $("<div>").attr(
	{
		"class" : "orderform",
		"id" : "icing"
	}).append('<table>\n\t<tr>\n\t' +
		'<th colspan="5">Choose an icing</th></tr>' +
		'\n<tr>\n\t' +
		'<td><input type="radio" name="icing" value="meringue" />Meringe</td>\n' +
		'<td><input type="radio" name="icing" value="creamcheese" />Cream Cheese</td>\n' +
		'<td><input type="radio" name="icing" value="coconut" />Coconut</td>\n' +
		'<td><input type="radio" name="icing" value="chocolate" />Chocolate</td>\n' +
		'<td><input type="radio" name="icing" value="greentea" />Green Tea</td>\n' +
		'</tr>\n<tr>\n\t'+
		'<td><input type="radio" name="icing" value="lemon" />Lemon</td>\n' +
		'<td><input type="radio" name="icing" value="strawberry" />Strawberry</td>\n' +
		'<td><input type="radio" name="icing" value="plain" />Plain</td>\n' +
		'<td><input type="radio" name="icing" value="espresso" />Espresso</td>\n' +
		'</tr>\n</table>'
	);

var colors = $("<div>").attr(
	{
		"class" : "orderform",
		"id" : "colors"
	}).append('<table>\n\t<tr>\n\t' +
		'<th colspan="4">Choose up to 3 flavors</th>\n\t</tr>\n\t' +
		'<tr>\n\t' +
		'<td><input type="checkbox" name="colors" value="#000000" />Black</td>\n' +
		'<td><input type="checkbox" name="colors" value="#0000ff" />Blue</td>\n' +
		'<td><input type="checkbox" name="colors" value="#673B00" />Brown</td>\n' +
		'<td><input type="checkbox" name="colors" value="#777777" />Gray</td>\n' +
		'<td><input type="checkbox" name="colors" value="#4EAD00" />Green</td>\n' +
		'</tr>\n<tr>\n\t'+
		'<td><input type="checkbox" name="colors" value="#FF9A00" />Orange</td>\n' +
		'<td><input type="checkbox" name="colors" value="#FD7899" />Pink</td>\n' +
		'<td><input type="checkbox" name="colors" value="#9955ED" />Purple</td>\n' +
		'<td><input type="checkbox" name="colors" value="#FF1300" />Red</td>\n' +
		'<td><input type="checkbox" name="colors" value="#FFFFFF" />White</td>\n' +
		'</tr>\n<tr>\n\t'+
		'<td><input type="checkbox" name="colors" value="#FFEF00" />Yellow</td>\n' +
		'</tr>\n</table>'
	);

var instructions = $("<div>").attr(
	{
		"class" : "orderform",
		"id" : "instructions"
	}).append('<table>\n\t<tr>\n\t' + 
	'<th>Specific Instructions:</th>\n<tr>' +
	'\n\t<td>Give us a description of the design you would like for your cupcakes.  ' +
	'Also, If you don\'t see the colors you would like. Describe them here.' +
	'</td>\n</tr>'+
	'\n\t<td><textarea name="instructions" rows="3" cols="70" ></textarea></td>'+
	'\n</tr>\n<tr>' +
	'\t<td><input id="submit" type="submit" name="submit" /></table>');
	
$('#specialties input[name="specialties"]').click(function() {
	console.log('specialties button pushed');
	if(specialclick == 0){
		$.post("includes/ajax_special_desc.php",
			{
				scc: $(this).val()
			}, function(data, textStatus){
				console.log("status is " + textStatus);
				console.log("data is " + data);
				$('#specialties').append('<p id="desc">' + data + '</p>');
			});
		$.post("includes/ajax_specialphoto.php",
			{
				sc_name: $(this).val()
			}, function(data, textStatus){
				console.log("special photo status is " + textStatus);
				console.log("Data returned is " + data);
				$("#wrapper_front").after('<img id="specialimg" src="images/'+data+'" width="350" height="350" alt="specialty image" />');
			});
		$('#specialties').after(instructions);
		instructions.animate({"opacity" : "1"}, {duration : 300});
		specialclick = 1;
	} else {
		$.post("includes/ajax_special_desc.php",
			{
				scc: $(this).val()
			}, function(data, textStatus){
				console.log("status is " + textStatus);
				console.log("data is " + data);
				$('#desc').text(data);
			});
		$.post("includes/ajax_specialphoto.php",
			{
				sc_name: $(this).val()
			}, function(data, textStatus){
				console.log("special photo status is " + textStatus);
				console.log("Data returned is " + data);
				$("#specialimg").attr({"src" : 'images/'+data});
			});
	}
});

$('#specialties input[name="custom"]').click(function() {
	console.log('custom cupcake started');
	if(specialclick ==0){
		$("#specialties").delay(300, "remove").queue("remove", function(next) {
				$(this).remove();
				$("form").append(flavor);
				$("#flavor").animate({"opacity" : "1"},{duration : 300});
				next();
		})
		.dequeue("remove")
		.animate({"opacity" : "0"}, {duration: 300});
	} else {
		$("#specialties").delay(300, "remove").queue("remove", function(next) {
				$(this).remove();
				$("#instructions").remove();
				$("form").append(flavor);
				$("#flavor").animate({"opacity" : "1"},{duration : 300});
				next();
		})
		.dequeue("remove")
		.animate({"opacity" : "0"}, {duration: 300});
		}
});

flavor.find('input[name="flavor"]').click(function() {
	console.log('function is called');
	var val = $(":checked").val();
	var flavorimg = cupcakeimg.clone();
	if (flavorclick == 0){
		
		flavorimg.attr({
			"src" : "graphics/creator/flavor_" + val + ".png",
			"id" : "flavorpic"});
		$("#wrapper_back").after(flavorimg);
		flavorimg.animate({"opacity" : "1"}, {duration : 300});
		flavorclick = 1;
		$('#flavor').after(icing);
		icing.animate({"opacity" : "1"}, {duration : 300});
	} else if (flavorclick == 1){
		$("#flavorpic")
			.delay(300, "change")
			.queue("change", function(next) {
				$(this).attr({ "src" : "graphics/creator/flavor_" + val + ".png"})
				.animate({"opacity" : "1"}, "slow");
			next();
		})
		.dequeue("change")
		.animate({"opacity" : "0"}, {duration: 400});
	}	
});

icing.find('input[name="icing"]').click(function() {
	var icingval = $(this).val();
	var icingimg = cupcakeimg.clone();
	console.log("icing is called");
	console.log("icingval is " + icingval);
	console.log("icingclick is " + icingclick);
	if (icingclick == 0){
		icingimg.attr({
			"src" : "graphics/creator/icing_" + icingval + ".png",
			"id" : "icingpic"});
		$("#wrapper_front").after(icingimg);
		icingimg.animate({"opacity" : "1"}, {duration : 300});
		icingclick = 1
		$('#icing').after(colors);
		colors.animate({"opacity" : "1"}, {duration : 300});
		$('#colors').after(instructions);
		instructions.delay(300).animate({"opacity" : "1"}, {duration : 300});
		
	} else if (icingclick == 1){
		$("#icingpic").delay(300, "change").queue("change", function(next) {
			$(this)
			.attr({ "src" : "graphics/creator/icing_" + icingval + ".png"})
			.animate({"opacity" : "1"}, "slow");
			next();
		})
		.dequeue("change")
		.animate({"opacity" : "0"}, {duration: 400});
	}
});	

colors.find('input[name="colors"]').click(function() {
	console.log("colors were selected and val = " + $(this).val() );
	var checknum = $('input[name="colors"]').filter(':checked').length;
	
	console.log(checknum + " color(s) are selected.");
	
	var colorbox1 = colorsbox.clone();
	var colorbox2 = colorsbox.clone();
	var colorbox3 = colorsbox.clone();
	
	var checking = $(this);
		
	if ((checknum == 1) && (checking.is(":checked"))){
		console.log("first box is checked");
		colorbox1.css("background-color", $(this).val());
		colorbox1.attr({"id" : $(this).val()});
		console.log("box 1 is set as " + $(this).val());
		$("#colorsdiv").append(colorbox1);
	} else if ((checknum == 0) && !(checking.is(":checked"))){
		console.log("colorbox removed function called");
		var val = $(this).val();
		$(".colorsbox").each(function() {
			console.log("background is " + $(this).css('backgroundColor'));
			console.log("val is " + val);
			
			if($(this).attr("id") == val){
				$(this).remove();
			}
		});
		
	} else if (checknum == 2 && (checking.is(":checked"))){
		console.log("second box is checked");
		console.log("box 2 is set as " + $(this).val());
		colorbox2.css("background-color", $(this).val());
		colorbox2.attr({"id" : $(this).val()});
		$("#colorsdiv").append(colorbox2);
		
	} else if (checknum == 1 && !(checking.is(":checked"))){
		var val = $(this).val();
		console.log("The unchecked value is " + val);

		$(".colorsbox").each(function() {
			console.log("background is " + $(this).css('backgroundColor'));
			console.log("val is " + val);
			
			if($(this).attr("id") == val){
				$(this).remove();
			}

		});
		
	} else if (checknum == 3 && checking.is(":checked")){
		console.log("adding color box 3");
		colorbox3.css("background-color", $(this).val() );
		colorbox3.attr({'id': $(this).val()});
		$("#colorsdiv").append(colorbox3);
		$('input[name="colors"]:not(:checked)').attr("disabled", "disabled");
	} else if (checknum == 2 && !checking.is(":checked")){
		var val = $(this).val();
		console.log("colorbox 3 was removed");
		
			$(".colorsbox").each(function() {
				console.log("background is " + $(this).attr('id'));
				console.log("val is " + val);
				
				if($(this).attr("id") == val){
					$(this).remove();
				}
			});
		$('input[name="colors"]:not(:checked)').removeAttr("disabled");
	} 
});
	