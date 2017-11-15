 <?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include_once("db.php");
   $exchange=$_GET['id'];

 if(isset($_GET['date']))
          $sel_date=$_GET['date'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<div style="position:absolute; top:15px; left:10px; color:green; font-size:15px"><b>F&O Margin Status</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
F&O Margin Status
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
<link href="/index/css/include.css" rel="stylesheet" type="text/css" />
<link href="/index/css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/index/css/calendar.css"/>
<script language="JavaScript" src="/index/javascript/calendar_db.js"></script>
  </head>
<body>
<?php
$sql="select Upload_date from tbl_fao_margin_status order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
//$sql_num=mysql_num_rows();
$date=$row["Upload_date"];
 if(empty($sel_date))
         $sel_date=$date;
?>
<!--[if lte IE 7]>
<hr width="671" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
    <!--[if gte IE 8]>
  <hr width="670" style="position:absolute; top:26px;" align="left" color="green">
    <![endif]-->
<div id="research1" name="research1" style="position:absolute; width:672px; height:40px; top:37px;">
<div name="refresh" id="refresh">
<form method="get" action="f&o_margin.php?date=<?php echo $sel_date; ?>" name="form1" id="form1">
<table border="0" style="color:#1B68AE; font-weight:bold;" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
  <tr>
<td>Date</td>
        <td><input id="date" name="date" type="text" size="9" ></td>
          <td><script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'date'
	});

	</script></td>
	</tr>
      <table>
       <tr><td>  <div style="position:absolute; top:8px; font-color:white; left:340px;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
<p>&nbsp;</p>

<table>
<tr>
<td><div id="dt" style="position:absolute; width:120px; top:-18px; left:520px; color:green; font-size:14px; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $sel_date; ?> </b></div></td>
</tr>
</table>
 </table>
<?php
if(isset($_GET))
{

  	 $per_page = 20;
    if(isset($_GET['date']))
	{
	$sel_date = $_GET['date'];
	}
   	$sql="call sp_fao_margin_status('".$sel_date."')";

	//$sql="SELECT * FROM tbl_bulk_nse";
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
                        // error - show first set of results
                        $start = 1;
                        $end = $per_page;
                }
       // }
        //else
       // {
                // if page isn't set, show first set of results
              //  $start = 1;
              //  $end = $per_page;
      //  }

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='Advance_decline.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"f&o_margin.php?page=$i&date=$sel_date\"><strong>Prev |</strong></a>";
        $first = "<a href=\"f&o_margin.php?page=1&date=$sel_date\"><strong>First |</strong></a>";
        }
        else {
     $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a href=\"f&o_margin.php?page=$i&date=$sel_date\"><strong>Next |</strong></a>";
     $last = "<a href=\"f&o_margin.php?page=$total_pages&date=$sel_date\"><strong>Last |</strong></a>";
}
else {
     $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
	
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";
echo "<tr>";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>M_Lot</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>M_for DBY_per</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>M_for yesterday_per</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Change per</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Margin per lot</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Prev_close</b></td> ";
echo "</tr>";


for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }

                // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'M_Lot') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'M_for_day_before_yesterday_per') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'M_for_yesterday_per') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Change_per') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Margin_per_lot') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Prev_close') . '</td>';
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
