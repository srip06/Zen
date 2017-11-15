<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
//http://localhost/ftp/job.php
$today = date('d-m-Y');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/BSE/Bulk deal/$today.csv' INTO TABLE tbl_bulk_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Script_Code,Company,Client_Name,
Deal_Type,Quantity,Trade_Price,Upload_date) SET id=null, Upload_date='".$today1."'";
$sql_result=mysql_query($query);
$myFile = "error.txt";
if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "File Inserted Successfully $today\n";
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
