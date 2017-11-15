<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/UploadReport.txt";
$string='cm';
$string1='bhav';
$dd = date('d');
$month=date('M');
$yy=date('Y');
$mm=strtoupper($month);

$url  = "http://www.nseindia.com/content/historical/EQUITIES/$yy/$mm/$string$dd$mm$yy$string1.csv.zip";
$path = "C:/wamp/www/Data Upload Files/Web Files/NSE/$string$dd$mm$yy$string1.zip";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);

    curl_close($ch);

    file_put_contents($path, $data);
?>
<?php /*
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/UploadReport.txt";
$string='cm';
$string1='bhav';
$dd = date('d');
$month=date('M');
$yy=date('Y');
$mm=strtoupper($month);
echo $string.$dd.$mm.$yy.$string1;
//$url  = "http://www.nseindia.com/content/historical/EQUITIES/$yy/$mm/$string$dd$mm$yy$string1.csv.zip";
$url="http://www.nseindia.com/content/historical/EQUITIES/2011/JUN/cm22JUN2011bhav.csv.zip";
$path = "C:/wamp/www/Data Upload Files/Web Files/NSE/$string$dd$mm$yy$string1.zip";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);

    curl_close($ch);

    file_put_contents($path, $data); */
?>
<?php

$zip = zip_open("C:/wamp/www/Data Upload Files/Web Files/NSE/$string$dd$mm$yy$string1.zip");
if ($zip) {
  while ($zip_entry = zip_read($zip)) {
    $fp = fopen("C:/wamp/www/Data Upload Files/Web Files/NSE/".zip_entry_name($zip_entry), "a");
    if (zip_entry_open($zip, $zip_entry, "r")) {
      $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
      fwrite($fp,"$buf");
      zip_entry_close($zip_entry);
      fclose($fp);
    }
  }
  zip_close($zip);
}

if($fp)
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Unziped $string$dd$mm$yy$string1.zip file \n";
fwrite($fh, $stringData);
}
else
if(!($fp))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't open $string$dd$mm$yy$string1.zip file \n";
fwrite($fh, $stringData);
}
fclose($fh);

?>
