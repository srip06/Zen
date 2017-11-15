<HTML>
<HEAD>
<TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
$DD = date('dmY');
$today = date('Y-m-d');
include_once("db1.php");

$query="LOAD DATA local INFILE 'D:/NSE/Corp action/C_CORPACT_$DD.csv' INTO TABLE tbl_corp_action_nse
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (Symbol, SER, Sec_Desc, Sec_Code, Record_date,BC_start_date, BC_End_Date,
Ex_Date,Sec_NDL_Start_Date,Sec_NDL_End_Date,Sec_Settlement_Type, Sec_Settlement_No, Sec_Corp_Action_desc,ISIN_Code,Active_Cancelled,Upload_date)
SET Id=null, Upload_date='".$today1."',
Record_date=STR_TO_DATE(Record_date,'%d-%M-%Y'),
BC_start_date=str_to_date(BC_start_date,'%d-%M-%Y'),
BC_End_Date=STR_TO_DATE(BC_End_Date,'%d-%M-%Y'),
Ex_Date=STR_TO_DATE(Ex_Date,'%d-%M-%Y'),
Sec_NDL_Start_Date=STR_TO_DATE(Sec_NDL_Start_Date,'%d-%M-%Y'),
Sec_NDL_End_Date=STR_TO_DATE(Sec_NDL_End_Date,'%d-%M-%Y')";

$sql_result=mysql_query($query);
$myFile = "error.txt";
if(!empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "File Inserted Successfully $string$today\n";
fwrite($fh, $stringData);
}
else
if(empty($sql_result))
{
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData =  "Sql Error".mysql_error();
fwrite($fh, $stringData);
}
fclose($fh);
?>
</BODY>
</HTML>
