<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/BSE/UploadReport.txt";
$string='eq';
$string1='_csv';
$dd = date('dmy');

$url  = "http://www.bseindia.com/bhavcopy/$string$dd$string1.zip";
$path = "C:/wamp/www/Data Upload Files/Web Files/BSE/$string$dd$string1.zip";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);

    curl_close($ch);

    file_put_contents($path, $data);
?>
<?php
$zip = zip_open("C:/wamp/www/Data Upload Files/Web Files/BSE/$string$dd$string1.zip");
if ($zip) {
  while ($zip_entry = zip_read($zip)) {
    $fp = fopen("C:/wamp/www/Data Upload Files/Web Files/BSE/".zip_entry_name($zip_entry), "a");
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
$stringData = "Successfully Unziped $string$dd$string1.zip file \n";
fwrite($fh, $stringData);
}
else
if(!($fp))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't open $string$dd$string1.zip file \n";
fwrite($fh, $stringData);
}
fclose($fh);

?>
