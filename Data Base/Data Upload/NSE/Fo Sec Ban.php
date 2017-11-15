<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/UploadReport.txt";

$sourceURLOriginal = "http://www.nseindia.com/content/fo/fo_secban.csv";
// Destination folder
$destinationFolder = "C:/wamp/www/Data Upload Files/Web Files/NSE/";
// Destination file name pattern
$destinationFileNameOriginal = "fo secban.csv";
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
$stringData = "Successfully Uploaded fo secban file\n";
fwrite($fh, $stringData);
}
 else
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't Uploaded fo secban file\n";
fwrite($fh, $stringData);
}
fclose($fh);
?>
