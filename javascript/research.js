function getindustry(mymarkettype)
		{
		 // alert(mymarkettype);
		   var strURL="findindustrynse.php?mymarkettype="+mymarkettype;
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
				document.getElementById("inddiv").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}


function getindustrybse(mymarkettype)
		{
		  //alert(mymarkettype);
		   var strURL="findindustrybse.php?mymarkettype="+mymarkettype;
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
				document.getElementById("inddiv").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}



            //fuunction for table link
function popup(url)
{
 var width  = 500;
 var height = 250;
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
 params += ', titlebar=0';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}


function bse(id)

{
 //alert(id);
	window.open ("/index/marquee/marqueelink.php?id="+id,"mywindow","menubar=no,toolbar=no,location=no,resizable=no,directories=no,titlebar=0,status=no,scrollbars=no,width=522,height=145,left=450,top=300");

}

function nse(id)

{
	//alert(id);
	window.open ("/index/marquee/tablelink.php?id="+id,"mywindow","menubar=no,toolbar=no,location=no,resizable=no,directories=no,titlebar=0,status=no,scrollbars=no,width=540,height=150,left=450,top=300");
}

// function to dispaly date for time frame
function datedisplay()
{
	if(document.getElementById('mytimeframe').value = 1)
	{
		document.getElementById('frmdt').style.display = "block";
		document.getElementById('todt').style.display = "none";
	}
}



// function to dispaly Industry and Sector

function getSec(industry)
		{
		//alert(industry);
		   var strURL="findsector.php?industry="+industry;
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
				document.getElementById("secdiv").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}


			function showDateSelected(){
   alert("Date selected is "+document.form1.fromdate.value);
   alert("Date selected is "+document.form1.todate.value);
}
function dateverify()
{
	if (document.form1.fromdate.value > document.form1.todate.value)
	{
		alert("To date should be greater than from date");
		return false;
	}
}

function changeValues(id) {
            //alert(id);

            if(id == '1')
{
        cal1.style.display='none';
  		dt.style.display='block';
		frmdt.style.display='none';
		frmdt1.style.display='none';
  }

else if((id == '2') || (id == '3'))

{
        cal1.style.display='block';
  		dt.style.display='none';
		frmdt.style.display='block';
		frmdt1.style.display='block';
 }

}
