// the nav bar javascript 
	$(document).ready(function(){$("#menu div").hover(
			function() {
				$(this).find('img').stop().animate({"opacity" : "1"}, "slow");
			},
			function(){
				$(this).find('img').stop().animate({"opacity" : "0"}, "slow");
				});
			});


//function to check that email format is valid (code adapted from W3 schools)
function check_email(){
		email = document.getElementById("email").value;
		atpos=email.indexOf("@");
		dotpos=email.lastIndexOf(".");
		if (email.length == 0) {
			document.getElementById("email_error").innerHTML = "";
		}else if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= email.length) {
  			document.getElementById("email_error").innerHTML = "Please enter a valid email address";
  			return false;
  		} else {
			document.getElementById("email_error").innerHTML = "";
			return true;
		}
}

//function to check that phone number is properly formatted
function check_phone(){
	
	patt=new RegExp("[0-9]{10}");
	
	phone = document.getElementById("phone_num").value;
	
	if(patt.test(phone) || phone.length == 0){
		document.getElementById("phone_error").innerHTML = "";
	} else {
		document.getElementById("phone_error").innerHTML = "Please enter 10-digit number with no delimiters";
	}
	
}

//function to check that the zip code is properly formatted
function check_zip() {
	
	patt = new RegExp("[0-9]{5}");
	
	zip = document.getElementById("zip").value;
	
	if(patt.test(zip) || zip.length == 0) {
		document.getElementById("zip_error").innerHTML = "";
	} else {
		document.getElementById("zip_error").innerHTML = "Please enter a proper 5-digit zip code";
	}
	
}

//function to check that the state is properly formatted
function check_state() {
	
	patt = new RegExp("[A-Z]{2}");
	
	state = document.getElementById("state").value;
	
	if(patt.test(state) || state.length == 0) {
		document.getElementById("state_error").innerHTML = "";
	} else {
		document.getElementById("state_error").innerHTML = "Please enter the 2-letter, capitalized abbreviation for your state.";
	}
}

//function to check availability of new username
function availability() {

str = document.getElementById("NewUsername").value;

var xmlhttp;

if (str.length==0){ 
  document.getElementById("username_availability").innerHTML="";
  return;
  }
  
if (window.XMLHttpRequest){
  xmlhttp=new XMLHttpRequest();
  }else{
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function()
  
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
    document.getElementById("username_availability").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","includes/ajax_username_check.php?q="+str,true);
xmlhttp.send();
}