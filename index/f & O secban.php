
<?php error_reporting (E_ALL ^ E_NOTICE);
include_once('db.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--	<div style="position:absolute; top:10px; left:3px; color:green; font-size:13px"><b>F&O Secban scrips <?php /*$sql="select Upload_date from tbl_fao_secban_nse order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
//$sql_num=mysql_num_rows();
$date=$row["Upload_date"];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$date;*/?></b></div>
    -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
F&O Secban Scrips
</title>

<link href="include.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="calendar.css"/>
<script language="JavaScript" src="calendar_db.js"></script>
<script type="text/javascript" src="datetimepicker_css.js"></script>
</head>
<body>
<!--<br /><hr width="210" align="left" color="green">-->
<!--<div id="research1" name="research1" style="position:absolute; height:40px; top:37px;">-->

<?php
if(isset($_POST))
{
	$sql="call sp_fao_secban_nse()";
 $sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($sql_result);

echo "<p></p>";
        while($sql_row=mysql_fetch_array($sql_result)) {
	$Symbol=$sql_row["Symbol"];
	$date=$sql_row["Upload_date"];
	if(!empty($total_results))
      {
                echo "&nbsp;&nbsp;<span  align=\"left\" style=\"color:#004040; font-size:9px;\">".$Symbol."&nbsp;&nbsp;|".'&nbsp;&nbsp;</span>';
      }
        }
        }
         echo "<div align=\"left\" style=\"position:absolute; top:-0px; left:0px; color:#800000; background-color:#C7D8DC; width:222px; font-size:13px;\"><b>&nbsp; F&O Secban scrips &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ". $date."</b></div> ";
         echo "</table><br>";
         if(empty($total_results))
      {
        echo "<table align=\"center\">";
        echo "<tr>";
        echo "<td><font color=\"red\" style=\"font-size:9px;\"><b> NO RECORDS </b></font> </td>";
        echo "</tr>";
        echo "</table>";
      }

?>
