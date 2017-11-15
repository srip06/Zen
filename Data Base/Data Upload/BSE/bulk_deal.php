<?php
$url='http://www.bseindia.com/mktlive/market_summ/bulk_deals.asp';
$xml=file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<table cellpadding="2" cellspacing="2" border="0" width="770" style="margin-left: 2px;">');
$annou_end=strpos($str, '<font size="1" face="arial">* B - Buy, S - Sell</font></td>') ;
$annou_len=$annou_end - $annou_start;
$table=substr($str, $annou_start, $annou_len);
echo $inputFile;
//$myFile="C:/wamp/www/Data Upload Files/Web Files/BSE/Upload.txt";
//$sourceURLOriginal = "http://localhost/Data%20Base/Data%20Upload/BSE/Bulk.php";
/*
$today = date('d-m-Y');
$sourceURLOriginal = "http://localhost/Data%20Base/Data%20Upload/BSE/Bulk.php";
// Destination folder
$destinationFolder = "C:/wamp/www/Data Upload Files/Web Files/BSE/";
// Destination file name pattern
$destinationFileNameOriginal = "bulk deal.csv";
// Start number
$start = 1;
// End number
$end = 10;

// From start to end
for ($i=$start; $i<=$end; $i++)
{
	// Replace source URL parameter with number
	$sourceURL = str_replace("{x}", $i, $sourceURLOriginal);
	// Destination file name
	$destinationFile = $destinationFolder . "/" .
	str_replace("{x}", $i, $destinationFileNameOriginal);
	// Read from URL, write to file
	file_put_contents($destinationFile,
    file_get_contents($sourceURL)
);
// Output progress
}
if((!empty($destinationFileNameOriginal)))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Uploaded block deal file\n";
fwrite($fh, $stringData);
}
else
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't Uploaded block deal file\n";
fwrite($fh, $stringData);
}
*/
//$fh = fopen($sourceURLOriginal, 'r') or die("can't open file");
//fclose($fh);
?>
