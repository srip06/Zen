<html>
<head>
<title>
Tablelink
</title>
</head>
</html>
<?php
$id=$_GET['id'];
//echo $Symbol;
if(isset($_POST))

			{
			include_once 'db.php';
			$sql="call sp_tablelink('".$id."')";
			$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
			$sql_num=mysql_num_rows($sql_result);

echo "<table  border=\"0\" style=\"color:#3184BD; border-left:2 solid #DBEEF3; width=500px; border-right:4 solid #DBEEF3; border-top:2 solid #DBEEF3; border-bottom:4 solid #DBEEF3; font-size:12px;\" width=\50%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";


	  $sql_row = mysql_fetch_array($sql_result);
echo "<tr bgcolor=\"#DBEEF3\">";

    echo "<th align=\"left\"> Stock Name: </th>";
	echo "<td align=\"left\">".$sql_row['Symbol']."</td>";

	echo "<th align=\"left\"> Volume: </th>";
	echo "<td align=\"left\">".$sql_row['Qty_traded']."</td>";
	echo "<td align=\"right\" ROWSPAN=4><img src=\"/index/graph/linegraph.php?id=$id\"></Td>";
	
echo "</tr>";

echo "<tr>";

	echo "<th align=\"left\"> Open_Price: </th>";
	echo "<td align=\"left\">".$sql_row['Open_price']."</td>";

	echo "<th align=\"left\"> Close_Price: </th>";
	echo "<td align=\"left\">".$sql_row['Close_price']."</td>";
	
echo "</tr>";

echo "<tr  bgcolor=\"#DBEEF3\">";

	echo "<th align=\"left\"> High_Price: </th>";
	echo "<td  align=\"left\">".$sql_row["High_price"]."</td>";

	echo "<th align=\"left\"> Low_Price: </th>";
	echo "<td  align=\"left\">".$sql_row["Low_price"]."</td>";

echo "</tr>";
/*  52weekPrice_High ,Low_week_52 not present in nse tbl_daily_trade_details_nse table */
	/*echo "<tr>";*/

	echo "<th align=\"left\"> 52weekPrice_High: </th>";
	echo "<td  align=\"left\">".$sql_row["week_52_high"]."</td>";

	echo "<th align=\"left\"> 52weekPrice_Low: </th>";
	echo "<td  align=\"left\">".$sql_row["week_52_low"]."</td>";
	
echo "</tr>";

echo "</table>";
}
?>
