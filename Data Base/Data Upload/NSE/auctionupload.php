<?php
$today = date('m-d-y');
$server="http://localhost/Data%20Base/Data%20Upload/NSE/Auction.php/";
$ser=file_get_contents($server);
$pos = strpos($ser, '04-11-11');
$pos1 = strpos($ser, ')');
$len=$pos1-$pos;
$stringset = substr($ser, $pos, $len);
$pos1 = strpos($stringset, 'AU');
$pos2 = strpos($stringset, '.txt');
$len1=$pos2-$pos1;
$auc = substr($stringset, $pos1, $len1);
echo $auc;

$fp = fopen('C:/wamp/www/Data Upload Files/Web Files/NSE/Upload.txt', 'w');
fwrite($fp, $stringset);
fclose($fp);
?>
<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/Report.txt";
$dd=date('dmY');
$source="C:/wamp/www/Data Upload Files/Web Files/NSE/auc.csv";
$destiny= "/common/Auction/'".$auc."'";
$conn = ftp_connect("203.199.75.110");
ftp_login($conn,"FTPGUEST","FTPGUEST");
ftp_get($conn,$source,"/common/Auction/$auc.txt",FTP_BINARY);
ftp_close($conn);
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
?>
