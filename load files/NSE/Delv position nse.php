<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$today = date('d-m-Y');
$today1 = date('Y-m-d');

include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/NSE/Stock Delivery/MAR2011/$today.txt' INTO TABLE tbl_nse_delv_position
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 4 LINES (Record_Type, Sr_No, Name_of_Security, SER,Qty_Traded,
Deliverable_Qty, per_Delv_Qty_to_Trd_Qty,Upload_date) SET Id=null, Upload_date='".$today1."'";

$sql_result=mysql_query($query);
$myFile = "error.txt";
if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "File Inserted Successfully $string$today\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Sql Error".mysql_error();
fwrite($fh, $stringData);
}
fclose($fh);
?>
</BODY>
</HTML>
