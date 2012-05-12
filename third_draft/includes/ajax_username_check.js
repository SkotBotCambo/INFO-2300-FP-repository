function availability()
{

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
  
xmlhttp.open("GET","includes/ajax_check.php?q="+str,true);
xmlhttp.send();
}