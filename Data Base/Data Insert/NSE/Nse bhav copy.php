<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$string='cm';
$string1='bhav';
$dd = date('d');
$month=date('M');
$yy=date('Y');
$mm=strtoupper($month);
$today = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/NSE/$string$dd$mm$yy$string1.csv' INTO TABLE tbl_daily_trade_details_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (Symbol, SER, Open_price, High_price,
Low_price, Close_price, Last_price, Prev_close, Qty_traded, Value, Upload_date) SET Id=null, Upload_date='".$today."'";
$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted $string$dd$mm$yy$string1 file\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found $string$dd$mm$yy$string1 File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
