<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";

$today = date('Y-m-d');

include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/NSE/fo secban.csv' INTO TABLE tbl_fao_secban_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Symbol,Upload_date) SET Id=null, Upload_date='".$today."'";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted fo secban\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Not Found fo secban File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
