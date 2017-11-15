<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$myFile = "C:/wamp/www/Data Upload Files/Loads Files/NSE/InsertReport.txt";
$DD = date('dmY');
$today = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'C:/wamp/www/Data Upload Files/Web Files/NSE/C_CORPACT_$DD.csv' INTO TABLE tbl_corp_action_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (Symbol, SER, Sec_Desc, Sec_Code, Record_date,BC_start_date, BC_End_Date,
Ex_Date,Sec_NDL_Start_Date,Sec_NDL_End_Date,Sec_Settlement_Type, Sec_Settlement_No, Sec_Corp_Action_desc,ISIN_Code,Active_Cancelled,Upload_date)
SET Id=null, Upload_date='".$today."',
Record_date=STR_TO_DATE(Record_date,'%d-%M-%Y'),
BC_start_date=str_to_date(BC_start_date,'%d-%M-%Y'),
BC_End_Date=STR_TO_DATE(BC_End_Date,'%d-%M-%Y'),
Ex_Date=STR_TO_DATE(Ex_Date,'%d-%M-%Y'),
Sec_NDL_Start_Date=STR_TO_DATE(Sec_NDL_Start_Date,'%d-%M-%Y'),
Sec_NDL_End_Date=STR_TO_DATE(Sec_NDL_End_Date,'%d-%M-%Y')";

$sql_result=mysql_query($query);

if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "Successfully Inserted C_CORPACT_$DD File\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Not Found C_CORPACT_$DD deal File";
fwrite($fh, $stringData);
}
fclose($fh);
?>
</BODY>
</HTML>
