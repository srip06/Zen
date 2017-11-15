<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$string='fo_secban_';
$today = date('dmY');
$today1 = date('Y-m-d');

include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/NSE/f&o sec ban/MAR2011/$string$today.csv' INTO TABLE tbl_fao_secban_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Symbol,Upload_date) SET Id=null, Upload_date='".$today1."'";

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
