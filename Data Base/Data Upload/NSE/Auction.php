<?php
$ftp_server = "203.199.75.110";
// set up basic connection
$conn_id = ftp_connect($ftp_server);
// login with username and password
$login_result = ftp_login($conn_id, "FTPGUEST", "FTPGUEST");
// get the file list for
$buff = ftp_rawlist($conn_id, '/common/Auction/');
//var_dump($buff);
//print_r($buff);
$last=end($buff);
//echo $last;
$pos = strpos($last, 'AU');
$pos1 = strpos($last, '.txt');
$len=$pos1-$pos;
$stringset = substr($last, $pos, $len);
echo $stringset;
/*
$ser='C:/wamp/www/Data Upload Files/Web Files/NSE/Upload.csv';
$annou_start=strpos($ser, '04-07-11');
$annou_end=strpos($ser, '.txt') ;
$annou_len = $annou_end - $annou_start;
$table = substr($ser, $annou_start, $annou_len);
echo $table;
*/
?>
<?php
$myFile = "C:/wamp/www/Data Upload Files/Web Files/NSE/Report.txt";
$dd=date('dmY');
$source="C:/wamp/www/Data Upload Files/Web Files/NSE/auc.csv";
$destiny= "/common/Auction/'".$stringset."'";
$conn = ftp_connect("203.199.75.110");
ftp_login($conn,"FTPGUEST","FTPGUEST");
ftp_get($conn,$source,"/common/Auction/$stringset.txt",FTP_BINARY);
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
<?php
/*
$annou_start=strpos($ser, '04-07-11');
$annou_end=strpos($ser, '}') ;
$annou_len = $annou_end - $annou_start;
$table = substr($ser, $annou_start, $annou_len);
echo $table;
*/

/*
foreach($a as $value)
{
echo $value, "<BR>";
}
//http://www.example-code.com/python/python-ftp-list-directory.asp
//http://www.phpbuilder.com/board/archive/index.php/t-10356803.html
$ftp_server = "203.199.75.110";
$conn_id = ftp_connect($ftp_server);
$ftp_user_name = "FTPGUEST";
$ftp_user_pass = "FTPGUEST";
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
$contents = ftp_nlist($conn_id, '/common/Auction/');
for ($i = 0 ; $i < count($contents) ; $i++)
echo "<li>" . substr($contents[$i],1) . "</li>";
ftp_close($conn_id);
*/
/*
$ftp_server = "203.199.75.110";
// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, "FTPGUEST", "FTPGUEST");

// get the file list for /
$rawfiles = ftp_rawlist($conn_id, '/common/Auction/');

foreach ($rawfiles as $rawfile)
{
# parse the raw data to array
if(!empty($rawfile))
{
    $info = preg_split("/[\s]+/", $rawfile, 9);
    $arraypointer[] = array(
        'text'   => $info[8],
        'isDir'  => $info[0]{0} == 'd',
        'size'   => byteconvert($info[4]),
        'chmod'  => chmodnum($info[0]),
        'date'   => strtotime($info[6] . ' ' . $info[5] . ' ' . $info[7]),
        'raw'    => $info
        // the 'children' attribut is automatically added if the folder contains at least one file
);

}
}
// pseudo code check the date
 if($arraypointer['date'] is today)
{
 ftp_fget('file');

}
// close the connection
ftp_close($conn_id);

// output the buffer
var_dump($buff);
*/
?>
<?php
/*
$myFile = "D:/Data Upload Files/Web Files/NSE/UploadReport.txt";
$dd=date('m/d/Y');
//echo $dd;
$conn = ftp_connect("203.199.75.110");
ftp_login($conn,"FTPGUEST","FTPGUEST");
//ftp_size($conn,"/common/Clearing/C_CORPACT_$dd.csv.gz");
ftp_get($conn,"D:/Data Upload Files/Web Files/NSE/auction.csv","/common/Auction/$dd",FTP_BINARY);
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
*/



//echo $buff;
//print_r(array_values($buff));
//print_r(array_keys($buff));
//$values=array_values($buff);
/*print_r($values);

if(array_search('04-07-11 11:01AM 14741 AUBA11064.txt',$buff))
{
echo "found";
}
else
{
echo "not found";
} */
//$buff1=array(1=>"04-07-11");
//print_r(array_intersect($buff,$buff1));
//echo $buffarr;

/*
$pos = strpos($buff, '04-07-11');
$pos1 = strpos($buff, ')');
$len=$pos1-$pos;
$stringset = substr($buff, $pos, $len);
echo $pos."<br />";
echo $pos1."<br />";
echo $stringset;

if(array_search('04-07-11 11:01AM 14741 AUBA11064.txt',$buff))
{
echo "found";
}
else
{
echo "not found";
}
*/
/*
//var_dump($buff);
//print_r($buff);
if(array_values)
{
echo "found";
}
else
{
echo "not found";
}
*/
/*
if()
{
echo "exist";
}
else
{
echo "no";
}
// close the connection
ftp_close($conn_id);
*/
/*
$ftp_server = "203.199.75.110";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, "FTPGUEST", "FTPGUEST");
$contents = ftp_nlist($conn_id, "/common/Auction/");
//print_r($contents);
$local="C:/wamp/www/Data Upload Files/Web Files/NSE/";
foreach ($contents as $value)
{
ftp_get($conn_id,"C:/wamp/www/Data Upload Files/Web Files/NSE/C.csv",$value,FTP_BINARY);
}
*/
?>
