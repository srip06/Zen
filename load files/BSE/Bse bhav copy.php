<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
//http://localhost/ftp/job.php
$string='EQ';
$today = date('dmy');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/BSE/Bhav copy/MAR2011/$string$today.csv' INTO TABLE tbl_daily_trade_details_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (SC_CODE, SC_NAME, SC_GROUP, SC_TYPE,
Open_price, High_price, Low_price, Close_price, Last_price, Prev_Close, No_Trades, No_of_shrs, Net_turnover,
TDCLOINDI, Upload_date) SET Id=null, Upload_date='".$today1."'";
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
