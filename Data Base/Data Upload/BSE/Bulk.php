<?php
$url='http://www.bseindia.com/mktlive/market_summ/bulk_deals.asp';
$xml=file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<table cellpadding="2" cellspacing="2" border="0" width="770" style="margin-left: 2px;">');
$annou_end=strpos($str, '<font size="1" face="arial">* B - Buy, S - Sell</font></td>') ;
$annou_len=$annou_end - $annou_start;
$table=substr($str, $annou_start, $annou_len);
echo html_entity_decode($table, ENT_COMPAT, 'UTF-8');
//echo $table;
//print_r($table1=explode(' ',$table));
/*
$fp = fopen('C:/wamp/www/Data Upload Files/Web Files/NSE/bulk.csv', 'w');
fwrite($fp, $table1);
fclose($fp);
*/
?>
<?php
 /*
// Copy input file into output file.
//$inputFile="http://bseindia.com/mktlive/market_summ/bulk_deals.asp";
$outputFile="C:/wamp/www/Data Upload Files/Web Files/BSE/outputFile.csv";
$fi=fopen($inputFile, 'a');
$source='';
while (!feof($fi))
{
$source .=fgets($fi);
}
fclose($fi);
file_put_contents($outputFile,$source);
*/
?>
