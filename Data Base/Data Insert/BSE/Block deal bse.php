<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/BSE/InsertReport.txt";
$today = date('d-m-Y');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Loads Files/BSE/block$today.csv' INTO TABLE tbl_block_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Script_Code,Company,Client_Name,
Deal_Type,Quantity,Trade_Price,Upload_date) SET id=null, Upload_date='".$today1."'";
$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted  block$today File\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found block$today File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
