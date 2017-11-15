<script language="JavaScript" type="text/javascript">
function nseurl(id)
		{
		window.open("mutualfundsurl.php?id="+id,"_new");
<!--
http://cursors.funutilities.com/?page=4&scat=1021
//	alert(id);
		   var strURL="ipourl.php?id="+id;
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
				document.getElementById("news").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
      	    document.getElementById("news").style.display='block';
      	    -->
     			}

 </script>
<script language="javascript">
function onmouseover(obj)
{
 document.getElementById("news").style.top=obj.offsetTop+98;
 document.getElementById("news").style.left=obj.offsetLeft+10;
 document.getElementById("news").style.display='block';
}
function onmouseout()
{
document.getElementById('news').style.display='none';
}
</script>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php 
 	include "./zamRSS.php";

		$rss = new zamRSS;

		$rss->cache_dir = './temp';
		$rss->cache_time = 1200;

          if ($rs = $rss->get('http://www.moneycontrol.com/rss/mfnews.xml')) {
			if ($rs[image_url] != '') {

				}

			echo "<ul style=\"list-style-image: url(images/cal_forward.gif);\">\n";
			foreach($rs['items'] as $item) {
     echo "\t<li><span onclick=\"nseurl('$item[link]');\" style=\"cursor:hand;\" id=\"$item[link]\"><font style=\"color:#0080C0; text-decoration:none;\">".$item['title']."</font></span><br />"."</li>\n".$item['description'];

                    }

			echo "</ul>\n";
			}
		else {
			echo "Error: It's not possible to reach RSS file...\n";
		}
//echo "<span id=\"news\" class=\"arrowlistmenu\" style=\"top=100px; left=600px; position:absolute; width:400px; border-bottom: 1px solid #909090; color:#330000; border-bottom: 2px solid #909090; background-color:#F5F5F5;  border-top: 2px solid #909090;  border-left: 2px solid #909090;  border-right: 2px solid #909090; height:125px; font-size:9px; font-family:Times New Roman;  display:none;\" >
//</span>";
?> 

