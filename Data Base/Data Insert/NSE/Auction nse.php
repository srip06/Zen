<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$string='AUBA';
$today = date('d-m-Y');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/NSE/auc.csv' INTO TABLE tbl_auction_nse
FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n' IGNORE 2 LINES (id,Symbol,SER,Quantity, Upload_date) SET Id=null, Upload_date='".$today1."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully  Inserted  auction File\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found auction File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
