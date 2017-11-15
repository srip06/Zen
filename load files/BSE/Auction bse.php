<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$today = date('d-m-Y');
$today1 = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/BSE/Demat auction/$today.csv' INTO TABLE tbl_demate_auction_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 7 LINES (SC_CODE,Symbol,Quantity, Upload_date) SET Id=null,
Upload_date='".$today1."'";

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
