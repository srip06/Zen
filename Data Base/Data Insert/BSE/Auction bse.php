<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/BSE/InsertReport.txt";
$today = date('d-m-Y');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Loads Files/BSE/auc$today.csv' INTO TABLE tbl_demate_auction_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 7 LINES (SC_CODE,Symbol,Quantity, Upload_date) SET Id=null,
Upload_date='".$today1."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Inserted Successfully auc$today File \n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found auc$today File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
</BODY>
</HTML>
