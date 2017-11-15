<?php
include_once("db1.php");
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$date=date('d-M-y');
echo $date;
$url=file_get_contents('D:/Data Upload Files/Web Files/NSE/block deal.csv');
if(strpos($url, $date))
{
$today = date('Y-m-d');

$query="LOAD DATA local INFILE 'C:/wamp/www/wamp/www/Data Upload Files/Web Files/NSE/block deal.csv' INTO TABLE tbl_block_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Symbol,Security_Name,Client_Name,Buy_Sell,
Quantity_Traded,Trd_Price_Wght_Avg_Price,Upload_date) SET id=null, Upload_date='".$today."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted block deal$date\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found block deal$date File";
fwrite($fh, $stringData);
}
}else
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found block deal$date File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
