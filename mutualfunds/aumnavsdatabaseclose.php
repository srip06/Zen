<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/InsertReport.txt";
$string='cm';
$string1='bhav';
$dd = date('d');
$month=date('M');
$yy=date('Y');
$mm=strtoupper($month);
$today = date('Y-m-d');
//include_once("db1.php");

$conn=mysql_connect('localhost','root') or die('MySQL Connection Failed! '.mysql_error());
$con=mysql_select_db('load files') or die('Could not able to connect to database! '.mysql_error());


$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/AUMNAVsclose.txt' INTO TABLE tbl_amu_navs_close
FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n' IGNORE 4 LINES (Scheme_Code, Scheme_Name, Net_Asset_Value, Repurchase_Price, Sale_Price, Date, Upload_date)SET Id=null, Upload_date='".$today."'";
$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted AUMNAVs.txt file\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found AUMNAVs.txt File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
