<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$today = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/NSE/stock delivery.csv' INTO TABLE tbl_nse_delv_position
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 4 LINES (Record_Type, Sr_No, Name_of_Security, SER,Qty_Traded,
Deliverable_Qty, per_Delv_Qty_to_Trd_Qty,Upload_date) SET Id=null, Upload_date='".$today."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted stock delivery\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found stock delivery deal File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
</BODY>
</HTML>
