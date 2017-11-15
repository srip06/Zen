<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/BSE/InsertReport.txt";
include_once("db1.php");
$string='SCBSEALL';
$dd = date('dm');
$today = date('Y-m-d');

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/BSE/$string$dd.txt' INTO TABLE tbl_bse_gross_delv_position
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy, SCRIP_CODE, DELIVERY_QTY, DELIVERY_VAL,
DAYS_VOLUME, DAYS_TURNOVER, DELV_PER) SET Id=null, Upload_date='".$today."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted $string$dd file\n";
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
