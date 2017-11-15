<?php

$conn=mysql_connect('localhost','root') or die('MySQL Connection Failed! '.mysql_error());
$con=mysql_select_db('load files') or die('Could not able to connect to database! '.mysql_error());
//http://www.w3schools.com/PHP/php_ref_string.asp

?>

<?php
$today = date('Y-m-d');
$today1 = date('M d Y');
$url='http://localhost/index/Data%20Base/Data%20Upload/BSE/sz.php';
$xml=file_get_contents($url);
$xml=file_get_contents($url);
$time=substr($xml,'0','119');
$onlyconsonants = str_replace('<', '', $time);
$onlyconsonants0 = str_replace('SENSEX_BSE: Current:', '', $onlyconsonants);
$onlyconsonants1 = str_replace('Change:', '', $onlyconsonants0);
$onlyconsonants2 = str_replace('High:', '', $onlyconsonants1);
$onlyconsonants3 = str_replace('Low:', '', $onlyconsonants2);
$onlyconsonants4 = str_replace('-  As on', ',', $onlyconsonants3);
$onlyconsonants5 = str_replace('Hours IST', ' ', $onlyconsonants4);
$onlyconsonants6 = str_replace($today1, ' ', $onlyconsonants5);
echo $onlyconsonants6."<br />";
//$time=substr($Time_Stamp,12);
//echo $time;
/*
$annou_start=strpos($onlyconsonants5, $today);
$len=$annou_start+11;
//echo $len;
$str=chunk_split($onlyconsonants5,$len,",");
echo $str;
*/
//$annou_end=strpos($str, '<font size="1" face="arial">* B - Buy, S - Sell</font></td>') ;
//$annou_len=$annou_end - $annou_start;
//$table=substr($onlyconsonants5,$annou_start);
//echo $table;

$myFile="C:/wamp/www/Data Upload Files/Web Files/BSE/mrktbse.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $onlyconsonants6);

?>

<?php
$File="C:/wamp/www/Data Upload Files/Web Files/BSE/bse.txt";
$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/BSE/mrktbse.txt' INTO TABLE tbl_mkt_bse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '<br />'
(Current,Per_Change,High,Low,Time_Stamp,Upload_date) SET Id=null, Upload_date='".$today."'";
$sql_result=mysql_query($query);
if(!empty($sql_result))
{
$fh = fopen($File, 'a') or die("can't open file");
$stringData = "File Inserted Successfully $today\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($File, 'a') or die("can't open file");
$stringData =  "Sql Error\n".mysql_error();
fwrite($fh, $stringData);
}
fclose($fh);
?>
