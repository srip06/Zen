<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include_once("db.php");
$exchange=$_GET['id'];
?>
<div style="position:absolute; top:25px; left:110px; color:green; font-size:13px"><b>Top 5 Gainers & losers</b></div>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
ActiveScripts
</title>
<style type="text/css">
	A:link { TEXT-DECORATION: none; }
	A:active { TEXT-DECORATION: none; }
	A:visited { TEXT-DECORATION: none; }
.table
{
font-size:13px;
font-family:Times New Roman;
border-color: light gray;
}
</style>
<script language="JavaScript" type="text/javascript">
     function graph()
		{
        document.getElementById('graph').style.display='block';
        document.getElementById('price').style.display='none';
        }

        function price()
		{
        document.getElementById('graph').style.display='none';
        document.getElementById('price').style.display='block';
        }
			</script>
<script language="JavaScript" type="text/javascript">
function top(td)
		{
		//alert(td);
		   var strURL="gainerslosers.php?td="+td;
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
 </script>
<script language="JavaScript" type="text/javascript">
function topbse(td)
		{
		//alert(td);
		   var strURL="gainerslosersbse.php?td="+td;
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
</script>
<script language="javascript">
function hidedive()
{
document.getElementById("top").style.display='none';
}
</script>
<script language="javascript">

function lossdiv(obj){
document.getElementById("top").style.top=obj.offsetTop+98;
document.getElementById("top").style.left=obj.offsetLeft+10;
document.getElementById("top").style.display='block';
}

function gaindiv(obj){
document.getElementById("top").style.top=obj.offsetTop+60;
document.getElementById("top").style.left=obj.offsetLeft+10;
document.getElementById("top").style.display='block';
}
</script>
</head>
<body onclick="document.getElementById('top').style.display='none';">
<!--[if gte IE 7]>
 <br /> <hr width="362" align="left" color="green">
	<![endif]-->
<!--[if !IE]>--><!--<br /><hr width="362" align="left"   color="green">--><!--<![endif]-->

<?php
if(empty($exchange))
	{
	$exchange='nseblue';
	}
	  if($exchange == 'nseblue')
    {
    $sql="SELECT id,Symbol,round(((Close_price-Prev_close)*100)/Prev_close,2) as 'per' FROM tbl_daily_trade_details_nse where Upload_date='2011-02-02' order by round(((Close_price-Prev_close)*100)/Prev_close,2) desc limit 5";
    }
    if($exchange == 'bseblue')
    {
    $sql="SELECT id,SC_NAME as 'Symbol',round(((Close_price-Prev_close)*100)/Prev_close,2) as 'per' FROM tbl_daily_trade_details_bse where Upload_date='2011-02-02' order by round(((Close_price-Prev_close)*100)/Prev_close,2) desc limit 5";
    }
 	$result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($result);
echo "<table name=\"results\" border=\"1\" id=\"results\"  class=\"table\" cellpadding=\"0\" cellspacing=\"0\">";

while( $sql_row=mysql_fetch_array($result) ) {
	$id=$sql_row["id"];
	$Symbol=$sql_row["Symbol"];
	$Per_Change=$sql_row["per"];

  if($exchange == 'nseblue')
    {
echo "<td align=\"center\" id=\"td\" name=\"td\" style=\"background-color:#82FF82; font-family:Arial; cursor:hand; height:35px; width:70px; font-size:9px;\" target=\"top6nb\" onmouseover=\"javascript:top($id);gaindiv(this);\">".$Symbol."<br \>".$Per_Change."%"."</td>";
    }
    if($exchange == 'bseblue')
    {
echo "<td align=\"center\" id=\"td\" name=\"td\" style=\"background-color:#82FF82; font-family:arial; cursor:hand; height:35px; width:70px; font-size:9px;\" target=\"top6nb\" onmouseover=\"javascript:topbse($id);gaindiv(this);\">".$Symbol."<br \>".$Per_Change."%"."</td>";
    }
}
echo "</table>";

echo "<table name=\"results\" border=\"1\" id=\"results\"  class=\"table\" cellpadding=\"0\"  cellspacing=\"0\">";
if($exchange == 'nseblue')
    {
  $sql="SELECT id,Symbol,round(((Close_price-Prev_close)*100)/Prev_close,2) as 'per' FROM tbl_daily_trade_details_nse where Upload_date='2011-02-02' order by round(((Close_price-Prev_close)*100)/Prev_close,2) asc limit 5";
  }
  if($exchange == 'bseblue')
    {
  $sql="SELECT id,SC_NAME as 'Symbol',round(((Close_price-Prev_close)*100)/Prev_close,2) as 'per' FROM tbl_daily_trade_details_bse where Upload_date='2011-02-02' order by round(((Close_price-Prev_close)*100)/Prev_close,2) asc limit 3, 5";
  }
 	$result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($result);

	while( $sql_row=mysql_fetch_array($result) ) {
    $id=$sql_row["id"];
	$Symbol=$sql_row["Symbol"];
	$Per_Change=$sql_row["per"];

  if($exchange == 'nseblue')
    {
echo "<td align=\"center\" id=\"td\" name=\"td\" style=\" background-color:#FF5B5B;#FF2B2B; font-family:arial; cursor:hand; height:35px; width:70px; font-size:9px;\"  target=\"top6nb\" onmouseover=\"javascript:top($id);lossdiv(this);\" >".$Symbol."<br \>".$Per_Change."%"."</td>";
    }
    if($exchange == 'bseblue')
    {
echo "<td align=\"center\" id=\"td\" name=\"td\" style=\"background-color:#FF5B5B;#FF2B2B; font-family:arial; cursor:hand; height:35px; width:70px; font-size:9px;\" target=\"top6nb\" onmouseover=\"javascript:topbse($id);lossdiv(this);\" >".$Symbol."<br \>".$Per_Change."%"."</td>";
    }

  }
echo "</table>";
 echo "</table>";
//echo "</div>";
//echo "<div class=\"arrowlistmenu\" style=\"top=0px; left=0px; position:absolute; width:130px; padding: 0 15px; 0 8px; border-bottom: 1px solid #909090; color:#330000; border-bottom: 2px solid #909090;  border-top: 2px solid #909090;  border-left: 2px solid #909090;  border-right: 2px solid #909090; height:95px; font-size:9px; font-family:Times New Roman;  display:none; background-color:#F5F5F5;\" id=\"block\">";
//echo "Graph";
echo "</div>";
echo "<span  class=\"arrowlistmenu\" style=\"top=0px; left=0px; position:absolute; width:160px; border-bottom: 1px solid #909090; color:#330000; border-bottom: 2px solid #909090;  border-top: 2px solid #909090;  border-left: 2px solid #909090;  border-right: 2px solid #909090; height:125px; font-size:9px; font-family:Times New Roman;  display:none; background-color:#F5F5F5;\" id=\"top\">";
echo "</span>";
?>
<?php
/*
echo "<div style=\"position:absolute; left:0px; top:240px;\">";
include_once("Corp_ans.html");
echo "</div>";
*/
?>
