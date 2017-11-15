function ipo()
		{
		window.open("/index/marketnews/ipo rss.php","_new");
		}

    	function user(id)
    {
    //alert(id);
    if(id == "user")
    {
     document.getElementById("user").style.display="block";
    }
     }
 
 function popup(url)
{
 var width  = 580;
 var height = 405;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}

function validateLogin()
{

 	if(document.form1.UserName.value=='')
	{
		alert('Please enter User Name.');
		return false;
	}
	if(document.form1.Password.value=='')
	{
		alert('Please enter Password.');
		return false;
	}

}

function newuser(id)
    {

    if(id == "newuser")
    {
     document.getElementById("user").style.display="none";
     document.getElementById("newuser").style.display="block";
    }
     }





function test(obj){
document.getElementById("top").style.top=obj.offsetTop+60;
document.getElementById("top").style.left=obj.offsetLeft+40;
document.getElementById("top").style.display='block';
}
function test1(obj){
document.getElementById("top").style.top=obj.offsetTop+100;
document.getElementById("top").style.left=obj.offsetLeft+40;
document.getElementById("top").style.display='block';
}
function test2(obj){
document.getElementById("top").style.top=obj.offsetTop+107;
document.getElementById("top").style.left=obj.offsetLeft+40;
document.getElementById("top").style.display='block';
}

function test3(obj){
document.getElementById("top").style.top=obj.offsetTop+70;
document.getElementById("top").style.left=obj.offsetLeft+40;
document.getElementById("top").style.display='block';
}




function hidedive()
{
document.getElementById("top").style.display='none';
}



function topbse(td)
		{
		//alert(td);
		   var strURL="/index/gainerslosersbse.php?td="+td;
		   if (window.XMLHttpRequest)
 			 {// code for IE7+, Firefox, Chrome, Opera, Safari

  			xmlhttp=new XMLHttpRequest();
  			}
			else
 			 {// code for IE6, IE5
 		 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

 			 }
			xmlhttp.onreadystatechange=function()
  			{

			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("top").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}
			
			
			
			
			function top(td)
		{
	//	alert(td);
		   var strURL="/index/gainerslosers.php?td="+td;
		   if (window.XMLHttpRequest)
 			 {// code for IE7+, Firefox, Chrome, Opera, Safari

  			xmlhttp=new XMLHttpRequest();
  			}
			else
 			 {// code for IE6, IE5
 		 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

 			 }
			xmlhttp.onreadystatechange=function()
  			{

			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("top").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}

