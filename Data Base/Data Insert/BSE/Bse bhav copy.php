<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/BSE/InsertReport.txt";
$string='eq';
$dd = date('dmy');
$today = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/BSE/$string$dd.csv' INTO TABLE tbl_daily_trade_details_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (SC_CODE, SC_NAME, SC_GROUP, SC_TYPE,
Open_price, High_price, Low_price, Close_price, Last_price, Prev_Close, No_Trades, No_of_shrs, Net_turnover,
TDCLOINDI, Upload_date) SET Id=null, Upload_date='".$today."'";
$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted Successfully $string$dd File\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found $string$dd File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
