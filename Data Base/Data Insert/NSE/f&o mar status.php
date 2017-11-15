<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$string='faomargin_status';
$today = date('dmY');
$today1 = date('Y-m-d');

include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Loads Files/NSE/$string$today.csv' INTO TABLE tbl_fao_margin_status
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 5 LINES (@dummy,Symbol, M_Lot, M_for_day_before_yesterday_per,
M_for_yesterday_per, Change_per, Margin_per_lot, Prev_close, Upload_date) SET Id=null, Upload_date='".$today1."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully  Inserted  $string$today File\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found $string$today deal File";
fwrite($fh, $stringData);
}
fclose($fh);
?>

