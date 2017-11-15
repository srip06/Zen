<html>
<head>
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
</head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
 <?php
 //$exchange=$_GET['id'];
 $id=$_GET['td'];
 $link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('research');
$sql="SELECT id,SC_NAME as 'Symbol',Open_Price,High_price,Low_price,Close_price,round(((Close_price-Prev_close)*100)/Prev_close,2) as 'per',No_of_shrs as 'TotalTrade',round(Close_price,2) as 'LTP' FROM tbl_daily_trade_details_bse where Upload_date='2011-02-02' and id='".$id."' order by round(((Close_price-Prev_close)*100)/Prev_close,2)";
 	$result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($result);

	while( $sql_row=mysql_fetch_array($result) ) {

	$id=$sql_row["id"];
	$Symbol=$sql_row["Symbol"];
	$Open_Price = $sql_row['Open_Price'];
	$High_price=$sql_row["High_price"];
	$Low_price=$sql_row["Low_price"];
    $LTP=$sql_row["LTP"];
	$Close_price=$sql_row["Close_price"];
	$Per_Change=$sql_row["per"];
    $TotalTrade=$sql_row["TotalTrade"];
    echo "<hr style=\"width:156px; position:absolute;  left:0px; top:15px;\"></hr>";
//echo "<table border=\"1\" style=\"font-size:9px; font-family:arial; font-weight:bold;\"><tr><td>Symbol</td><td>Per Change</td><td>Open Price</td><td>High Price</td><td>Low Price</td><td>Prev Close</td></tr>";
//echo "<tr><td>".$Symbol."</td><td>".$Per_Change."%"."</td><td>".$Open_Price."</td><td>".$High_price."</td><td>".$Low_price."</td><td>".$Prev_close."</td></tr><table>";//"<br \>".$LTP."<br \>".$TotalTrade.
//echo "<div  style=\"font-size:9px; font-family:arial; font-weight:bold;\"></td><td>Per Change</td><td>Open Price</td><td>High Price</td><td>Low Price</td><td>Prev Close</td></tr>";
//echo "<span>Symbol:".$Symbol."<br />Per Change:".$Per_Change."%<br />Open_Price:".$Open_Price."<br />Prev Close".$Prev_close."<br />High Price".$High_price."<br />Low Price".$Low_price."<br />TotalTrade:".$TotalTrade."<br />LTP:".$LTP."</span>";
//."</td><td>".$High_price."</td><td>".$Low_price."</td><td>".$Prev_close."</td></tr><table>";//"<br \>".$LTP."<br \>".$TotalTrade.
       echo "<table border=\"0\"  width=\"100%\">";
echo "<tr style=\"font-size:10\">
<td name=\"idp\" id=\"idp\" style=\"cursor:hand;\" onmouseover=\"javascript:price();\">PRICE</td>
<td align=\"center\">$Symbol</td>
<td align=\"right\" name=\"idg\" id=\"idg\" style=\"cursor:hand;\" onmouseover=\"javascript:graph();\">GRAPH</td></tr>";
echo "</table>";
echo "<table align=\"center\" style=\"display:block;\" id=\"price\" border=\"0\" width=\"70%\">";
echo "<tr style=\"font-size:10\"><td>Per Change</td><td>:&nbsp; &nbsp; </td><td>$Per_Change</td></tr>";
echo "<tr style=\"font-size:10\"><td>Open Price</td><td>:&nbsp; &nbsp; </td><td>$Open_Price</td></tr>";
echo "<tr style=\"font-size:10\"><td>Close Price</td><td>:&nbsp; &nbsp; </td><td>$Close_price</td></tr>";
echo "<tr style=\"font-size:10\"><td>High Price</td><td>:&nbsp; &nbsp; </td><td>$High_price</td></tr>";
echo "<tr style=\"font-size:10\"><td>Low Price</td><td>:&nbsp; &nbsp; </td><td>$Low_price</td></tr>";
echo "<tr style=\"font-size:10\"><td>TotalTrade</td><td>:&nbsp; &nbsp; </td><td>$TotalTrade</td></tr>";
echo "<tr style=\"font-size:10\"><td>LTP</td><td>:&nbsp; &nbsp; </td><td>$LTP</td></tr>";
echo "</table>";
echo "<table align=\"center\" id=\"graph\" style=\"display:none;\"  border=\"0\" width=\"70%\">";
echo "<tr><td>";
echo "<img  src=\"/index/graph/linegraphbse.php?id=$id\" /> ";
echo "</tr></tr></table>";
        }
?>
</body>
 </html>
