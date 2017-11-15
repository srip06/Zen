<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/UploadReport.txt";
$dd=date('dmY');
//echo $dd;
$conn = ftp_connect("203.199.75.110");
ftp_login($conn,"FTPGUEST","FTPGUEST");
//ftp_size($conn,"/common/Clearing/C_CORPACT_$dd.csv.gz");
ftp_get($conn,"C:/wamp/www/Data Upload Files/Web Files/NSE/C_CORPACT_$dd.gz","/common/Clearing/C_CORPACT_$dd.csv.gz",FTP_BINARY);
ftp_close($conn);
//04/06/2011


$handle = fopen("C:/wamp/www/Data Upload Files/Web Files/NSE/C_CORPACT_$dd.csv", "a");
$zh = gzopen("C:/wamp/www/Data Upload Files/Web Files/NSE/C_CORPACT_$dd.gz","r") or die("can't open: $php_errormsg");
while ($line = gzgets($zh,1024))
{
    // $line is the next line of uncompressed data, up to 1024 bytes
    fwrite($handle, $line);
}
gzclose($zh) or die("can't close: $php_errormsg");
fclose($handle);


if($conn)
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "FTP Connected \n";
fwrite($fh, $stringData);
}
else
if(!($conn))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "FTP Could not connect \n";
fwrite($fh, $stringData);
}
fclose($fh);

if($zh)
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Unziped C_CORPACT_$dd.gz file \n";
fwrite($fh, $stringData);
}
else
if(!($zh))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "can't open C_CORPACT_$dd.gz file \n";
fwrite($fh, $stringData);
}
fclose($fh);
?>

