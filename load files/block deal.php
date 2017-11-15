<?php
include_once("db.php");
$myFile = "error.txt";
$date=date('d-M-y');
$url=file_get_contents('C:/wamp/www/ftp/FOLDER/23-03-2011.csv');
if(strpos($url, $date))
{
$today = date('d-m-Y');
$today1 = date('Y-m-d');

$query="LOAD DATA local INFILE 'C:/wamp/www/ftp/FOLDER/$today.csv' INTO TABLE tbl_block_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (@dummy,Symbol,Security_Name,Client_Name,Buy_Sell,
Quantity_Traded,Trd_Price_Wght_Avg_Price,Upload_date) SET id=null, Upload_date='".$today1."'";

$sql_result=mysql_query($query);

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
$stringData =  "Sql Error\n".mysql_error();
fwrite($fh, $stringData);
}
}else
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "File Not Found \n";
fwrite($fh, $stringData);
}
fclose($fh);
?>
