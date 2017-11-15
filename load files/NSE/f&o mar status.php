<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$string='faomargin_status';
$today = date('dmY');
$today1 = date('Y-m-d');

include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/NSE/f&o/MAR2011/$string$today.csv' INTO TABLE tbl_fao_margin_status
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 5 LINES (@dummy,Symbol, M_Lot, M_for_day_before_yesterday_per,
M_for_yesterday_per, Change_per, Margin_per_lot, Prev_close, Upload_date) SET Id=null, Upload_date='".$today1."'";

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
