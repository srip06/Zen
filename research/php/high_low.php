 <!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->
	<div style="position:absolute; top:19px; left:560px; color:green; font-size:13px"><b>Week High & Low</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
Week High & Low
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
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include_once("db.php");
   $exchange=$_GET['id'];
?>

<?php
if(empty($exchange))
{
	$exchange='nseblue';
}
$sql="select Upload_date from tbl_daily_trade_details_nse order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
$date=$row["Upload_date"];
?>
<!--[if lte IE 7]>
<hr width="671" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
  <hr width="670" style="position:absolute; top:26px;" align="left" color="green">
<div id="research1" name="research1" style="position:absolute; width:662px; height:39px; top:37px;">
<form action="high_low.php?id=<?php echo $exchange; ?>&highlow=<?php echo $sel_highlow; ?>" method="get" name="form1" id="form1">
<table border="0" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
  <tr>
    <td align="left" valign="top"><b>High/Low</b></td>
    <td align="left" valign="top" height="28" > &nbsp;<SELECT id="highlow" style="font-size:10px; color:gray;" name="highlow">
      <OPTION VALUE="1" <?php if($highlow == 1) echo "Selected"; ?> >High</OPTION>
      <OPTION VALUE="2" <?php if($highlow == 2) echo "Selected"; ?> >Low</OPTION>

    </SELECT></td>
     </table></td>

      <table>
       <tr><td>   <div style="position:absolute; top:5px; font-color:white; left:610px;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
<p>&nbsp;</p>

<table>
<tr>
<td><div id="dt" style="position:absolute; width:120px; top:-18px; left:260px; color:green; font-size:13px; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $date; ?> </b></div></td>
</tr>
</table>
 </table>


<?php
$sel_highlow=1;
if(isset($_GET))
{
   $per_page = 20;
   
 if (isset($_GET['highlow']))
	{
	$sel_highlow = $_GET['highlow'];
	}
	
	$sql="call sp_close_price_nse2('".$sel_highlow."')";
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
      //  }
        //else
       // {
                // if page isn't set, show first set of results
              //  $start = 1;
              //  $end = $per_page;
       // }

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='Advance_decline.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a onMouseOver=\"window.status=''; return true;\"  href=\"high_low.php?page=$i&id=$exchange&highlow=$sel_highlow\"><strong>Prev |</strong></a>";
        $first = "<a onMouseOver=\"window.status=''; return true;\"  href=\"high_low.php?page=1&id=$exchange&highlow=$sel_highlow\"><strong>First |</strong></a>";
        }
        else {
     $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a onMouseOver=\"window.status=''; return true;\"  href=\"high_low.php?page=$i&id=$exchange&highlow=$sel_highlow\"><strong>Next |</strong></a>";
     $last = "<a onMouseOver=\"window.status=''; return true;\"  href=\"high_low.php?page=$total_pages&id=$exchange&highlow=$sel_highlow\"><strong>Last |</strong></a>";
}
else {
     $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";
echo "<tr>";
 if($sel_highlow == 1)
{
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Week<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Two Week<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Month<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Three Month<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Six Month<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Nine Month<br/>High</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Year<br/>High</b></td> ";
} else if($sel_highlow == 2)
{
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Week<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Two Week<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Month<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Three Month<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Six Month<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Nine Month<br/>Low</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>One Year<br/>Low</b></td> ";
}
echo "</tr>";


for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
                 //$nseid=mysql_result($result, $i, 'id');
                // echo out the contents of each row into a table
                echo "<tr>";
           if($sel_highlow == 1)
           {
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_1_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_2_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_1_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_3_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_6_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_9_high') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_52_high') . '</td>';
                }

          else if($sel_highlow == 2)
           {


                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_1_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_2_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_1_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_3_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_6_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'month_9_low') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'week_52_low') . '</td>';
                }
                  echo "</tr>";
        }
      echo "</table><br>";
 echo "<div class=\"pagingDiv\">
      <span class=\"pNo\" id=\"first\">$first</span>
      <span class=\"pNo\" id=\"prev\">$prev</span>
      <span class=\"pNo\" id=\"next\">$next</span>
      <span class=\"pNo\" id=\"last\">$last</span>
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
