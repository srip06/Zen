<?php
/*
//ini_set ('allow_url_fopen', '1');
$url="http://www.nseindia.com/content/equities/MTO.DAT";
$xml=file_get_contents("http://www.nseindia.com/content/equities/MTO.DAT");
$myFile="C:/wamp/www/Data Upload Files/Web Files/NSE/stock delivery.csv";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $xml);
*/
?>

<?php
ini_set ('allow_url_file_get_contents', '1');
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/UploadReport.txt";

$today = date('d-m-Y');
$sourceURLOriginal = "http://www.nseindia.com/content/equities/MTO.DAT";
// Destination folder
$destinationFolder = "C:/wamp/www/Data Upload Files/Web Files/NSE/";
// Destination file name pattern
$destinationFileNameOriginal = "stock delivery.csv";
// Start number
$start = 1;
// End number
$end = 10;

// From start to end
for ($i=$start; $i<=$end; $i++) {
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
$stringData = "Successfully Uploaded stock delivery file\n";
fwrite($fh, $stringData);
 }
 else
 {
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't Uploaded stock delivery file\n";
fwrite($fh, $stringData);
}
fclose($fh);
?>
