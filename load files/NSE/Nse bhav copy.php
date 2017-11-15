<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$string='cm';
$string1='bhav';
$today = date('dMY');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/NSE/Bhav Copy/MAR2011/$string$today$string1.csv' INTO TABLE tbl_daily_trade_details_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (Symbol, SER, Open_price, High_price,
Low_price, Close_price, Last_price, Prev_close, Qty_traded, Value, Upload_date) SET Id=null, Upload_date='".$today1."'";
$sql_result=mysql_query($query);
$myFile = "error.txt";
if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "File Inserted Successfully $string$today$string1\n";
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
