<!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
MF AUMNAVs
</title>
<style type="text/css">
	A:link { TEXT-DECORATION: none; }
	A:active { TEXT-DECORATION: none; }
	A:visited { TEXT-DECORATION: none; }
.table
{
font-size:13px;
font-family:Times New Roman;
border-color: light gray;
}
</style>
<style type="text/css">

A:link { COLOR: black; TEXT-DECORATION: none; }
A:visited { COLOR:black; TEXT-DECORATION: none;  }
A:active { COLOR: black; TEXT-DECORATION:  none;  }
A:hover { COLOR:black; TEXT-DECORATION: none;  }
ul{ list-style-type:none;}

</style>

<link href="/index/css/include.css" rel="stylesheet" type="text/css" />
<link href="/index/css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/index/css/calendar.css"  type="text/css"/>
<script language="JavaScript" src="/index/javascript/calendar_db.js"></script>
<script language="JavaScript" src="/index/javascript/auto-sujestion.js"></script>
</head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE);
$conn=mysql_connect('localhost','root') or die('MySQL Connection Failed! '.mysql_error());
$con=mysql_select_db('load files') or die('Could not able to connect to database! '.mysql_error());
?>

<?php
if (isset($_GET['openclose']))
	{
	$open_close = $_GET['openclose'];
	}
    if(isset($_GET['txtSearch']))
{
    $fund_type = $_GET['txtSearch'];
}
 if(isset($_GET['date']))
{
	$sel_date = $_GET['date'];
}
?>
<!--[if lte IE 7]>
<hr width="671" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
 <!-- <hr width="670" style="position:absolute; top:26px;" align="left" color="green">-->
<div id="research1" name="research1" style="position:absolute; width:662px; height:39px; top:37px;">
<div style="position:absolute; top:-10px; left:10px;">
<form action="navs.php?txtSearch=<?php echo $fund_type ;?>&openclose=<?php echo $open_close; ?>&date=<?php echo $sel_date;?>" method="get" name="form1" id="form1">
<table border="0" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
  <tr>
  <td align="center" style="color:green; font-size:13px" valign="top"><b>Fund Type</b></td>
   <td>&nbsp;</td>
            <td>&nbsp;</td>
    <td align="center" style="color:green; font-size:13px" valign="top"><b>Select Option</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    <td  align="center" style="color:green; font-size:13px" valign="top"><b>Date</b></td>
    </tr>
    <tr>
    <td align="left" valign="top" height="28" >

<input size="34"  type="text" id="txtSearch" name="txtSearch" value="<?php echo $fund_type;?>"  onkeyup="doSuggestionBox(this.value);" />
<?php
mysql_connect('localhost','root','') or die('MySQL Connection Failed! '.mysql_error());
mysql_select_db('load files') or die('Could not able to connect to database! '.mysql_error());
$query = "SELECT Symbol FROM tbl_mutual_funds";
?>
<?php
$result = mysql_query($query);
$counter = 0;
echo("<script type='text/javascript'>");
echo("this.nameArray = new Array();");
if($result)
{
while($row = mysql_fetch_array($result))
{
echo("this.nameArray[" . $counter . "] = '" . $row['Symbol'] ."';");
$counter += 1;
}
}
echo("</script>");
?>
<div class="suggestions" id="divSuggestions" style=" background-color:#808080; border-bottom: 1px solid #909090; color:white; border-right: 1px solid #909090;  border-top: 1px solid #909090;  border-left: 1px solid #909090;visibility: hidden; width: 235px;  height: auto; position: absolute; top:48px; left:5px;">
</div>
</td>
     <td>&nbsp;</td>
            <td>&nbsp;</td>
    <td align="left" valign="top" height="28" > &nbsp;<SELECT id="openclose" style="font-size:12px; color:gray;" name="openclose">
      <OPTION VALUE="1" <?php if($open_close == 1) echo "Selected"; ?> >Open Ended</OPTION>
      <OPTION VALUE="2" <?php if($open_close == 2) echo "Selected"; ?> >Close Ended</OPTION>

    </SELECT></td>
      <td>&nbsp;</td>
            <td>&nbsp;</td>
        <td align="left" valign="top"><input id="date" value="<?php echo $sel_date;?>" name="date" type="text" size="8" >
          <script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'date'
	});

	</script></td>
	</tr>
     </table></td>

      <table>
       <tr><td>   <div style="position:absolute; top:22px; left:520px; font-color:white;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
 </div>
<p>&nbsp;</p>

<table>
<tr>
<!--<td><div id="dt" style="position:absolute; width:120px; top:-18px; left:260px; color:green; font-size:13px; display:block;"><b> Date : &nbsp;&nbsp; <?php //echo $date; ?> </b></div></td>-->
</tr>
</table>
</table>
<?php
$sql1="SELECT * FROM tbl_amu_navs order by issue_Date desc limit 1";
$sql_result1=mysql_query($sql1) or exit("Sql Error".mysql_error());
$row1 = mysql_fetch_assoc($sql_result1);
$date=$row1["issue_Date"];

$open_close=1;
$sel_date=$date;
$fund_type='';

    if(isset($_GET['txtSearch']))
{
    $fund_type = $_GET['txtSearch'];
}
   if (isset($_GET['openclose']))
{
	$open_close = $_GET['openclose'];
}
	
  if(isset($_GET['date']))
  {
  $sel_date = $_GET['date'];
  }
  $per_page = 10;

   	$sql="CALL sp_mf_navs('".$fund_type."','".$open_close."','".$sel_date."')";
  	$result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($result);
	$total_pages = ceil($total_results / $per_page);
     if(!empty($total_results))
     {
 if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
        $show_page = $_GET['page'];
        }
        else { $show_page=1; };

               // make sure the $show_page value is valid
                if ($show_page > 0 && $show_page <= $total_pages)
                {
                        $start = ($show_page -1) * $per_page;
                        $end = $start + $per_page;
                }
                else
                {

                        $start = 1;
                        $end = $per_page;
                }

              for ($i = 1; $i <= $total_pages; $i++)
        {

        }

        if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"navs.php?page=$i&txtSearch=$fund_type&openclose=$open_close&date=$sel_date\"><strong>Prev |</strong></a>";
        $first = "<a href=\"navs.php?page=1&txtSearch=$fund_type&openclose=$open_close&date=$sel_date\"><strong>First |</strong></a>";
        }
else
{
     $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages)
{
     $i = $show_page + 1;
     $next = "<a href=\"navs.php?page=$i&txtSearch=$fund_type&openclose=$open_close&date=$sel_date\"><strong>Next |</strong></a>";
     $last = "<a href=\"navs.php?page=$total_pages&txtSearch=$fund_type&openclose=$open_close&date=$sel_date\"><strong>Last |</strong></a>";
}
else
{
     $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";
echo "<tr>";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14px;\"><b>Scheme Code</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14px;\"><b>Scheme Name</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14px;\"><b>Net Asset Value</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14px;\"><b>Repurchase Price</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14px;\"><b>Sale Price</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" width=\"15%\"style=\"font-size:14;\"><b>Date</b></td> ";
echo "</tr>";
for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }

                // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'Scheme_Code') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'Scheme_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'Net_Asset_Value') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'Repurchase_Price') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'Sale_Price') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040;font-size:12px;\">" . mysql_result($result, $i, 'issue_Date') . '</td>';
                echo "</tr>";
        }
         echo "</table><br>";
         if(empty($show_page))
      {
      $show_page=1;
      }
   echo "</p>";
       echo "<div class=\"pagingDiv\">
      <span class=\"pNo\">$first</span>
      <span class=\"pNo\">$prev</span>
      <span class=\"pNo\">$next</span>
      <span class=\"pNo\">$last</span>
      <span style=\"position:absolute; left:550px;\"  class=\"pNo\">$show_page&nbsp;&nbsp;of&nbsp;&nbsp;$total_pages&nbsp;&nbsp;page</span>
      </div>";
       }
      if(empty($total_results))
      {
        echo "<table align=\"center\">";
        echo "<tr>";
        echo "<td><font color=\"red\"><b> NO RECORDS </b></font> </td>";
        echo "</tr>";
        echo "</table>";
       }
?>
