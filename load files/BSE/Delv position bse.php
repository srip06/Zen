<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
//http://localhost/ftp/job.php
$string='SCBSEALL';
$today = date('dm');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/BSE/Stock delivery/MAR2011/$string$today.txt' INTO TABLE tbl_bse_gross_delv_position
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy, SCRIP_CODE, DELIVERY_QTY, DELIVERY_VAL,
DAYS_VOLUME, DAYS_TURNOVER, DELV_PER) SET Id=null, Upload_date='".$today1."'";

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
