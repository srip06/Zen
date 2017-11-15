 <!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->
	<div style="position:absolute; top:19px; left:588px; color:green; font-size:13px"><b>Week52Low</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
ActiveScripts
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
<script language="JavaScript" src="/index/javascript/research.js"></script>
  </head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE);
include_once("db.php");
$exchange=$_GET['id'];


if(isset($_GET['mymarkettype']))
	$marketSelected = $_GET['mymarkettype'];
else
    $marketSelected=1;

if(isset($_GET['industry']))
	$industry = $_GET['industry'];

if(isset($_GET['sector']))
     $sector = $_GET['sector'];


$ind="SELECT distinct Industry FROM tbl_stock_code_details where Industry_id='".$industry."'";
$ind_result=mysql_query($ind) or exit("Sql Error".mysql_error());
$ind_row = mysql_fetch_assoc($ind_result);
$industryname=$ind_row["Industry"];
if(empty($industryname))
{
$industryname="ALL";
}
if(empty($sector))
{
$sector="ALL";
}
?>

    <?php
	if(empty($exchange))
	{
	$exchange='nseblue';
	}

$sql="select Upload_date from tbl_daily_trade_details order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
//$sql_num=mysql_num_rows();
$date=$row["Upload_date"];
//echo $date;
?>
  <!--[if lte IE 7]>
<hr width="661" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
    <!--[if gte IE 8]>
<hr width="660" style="position:absolute; top:26px;" align="left" color="green">
  <![endif]-->
<div id="research1" name="research1" style="position:absolute; height:39px; width:662px; top:37px;">
<form action="week52low.php?id=<?php echo $exchange; ?>&mymarkettype=<?php echo $sel_martype; ?>&industry=<?php echo $sel_industry; ?>&sector=<?php echo $sel_sector; ?>" method="get"  name="form1" id="form1">
<table border="0" cellspacing="1" cellpadding="4" align="left" style="font-size:13px;">
  <tr>
    <td align="center" ><b>Market Type</b></td>
     <td>  <span id="marketdiv">
         <select style="width:135px; font-size:10px; height:18px; color:gray;" name="mymarkettype" id="mymarkettype" onChange="getindustry(this.value);">
<?php
$query="select ID,Market_type from tbl_nse_mkttype";
$result=mysql_query($query);

while($row=mysql_fetch_array($result))
  {
           $id=$row['ID'];
    $markettype=$row['Market_type'];

  ?>

	<option value="<?php echo $id; ?>" <?php if($marketSelected == $id) echo "Selected"; ?>> <?php echo $markettype; ?>
              <?php
               }
              ?>

              </option>


               </select>
</td>
    <td align="center"><b>Industry </b></td>
     <td align="right">  <span id="inddiv">
       <a href="#" onmouseover="javascript:getindustry(<?php echo $marketSelected; ?>);">
    <select style="width:135px; font-size:10px;  height:18px; color:gray;" name="industry" id="industry" onChange="javascript:getSec(this.value);">
        <OPTION VALUE="<?php echo $industry;?>"><?php echo $industryname;?></OPTION>
    </select></a>
           </td>
       <td><b>Sector</b></td>
        <td align="right">  <span id="secdiv">
        <a href="#" onmouseover="javascript:getSec(<?php echo $industry; ?>);">
      <select style="width:135px;  height:18px; font-size:10px; color:gray;" name="sector" id="sector">
	       <OPTION VALUE="<?php echo $sel_sector;?>" selected><?php echo $sector; ?></OPTION>
        </select></a>
    </td>
  </tr>
  <tr>
  </tr>

   </table>
<br />
         </table></td>

      <table>
       <tr><td>  <div style="position:absolute; top:6px; font-color:white; left:610px;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
<br />

<table>
<tr>
<td><div id="dt" style="position:absolute; top:-18px; left:268px; color:green; font-size:13px; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $date; ?> </b></div></td>
</tr>
</table>
 </table>

  <?php
$sel_martype="1";
$sel_industry="0";
$sel_sector="ALL";
if(isset($_GET))
{
    	 $per_page = 20;
 	if (isset($_GET['mymarkettype']))
	{
	$sel_martype = $_GET['mymarkettype'];
	}
	if(isset($_GET['industry']))
	{
	$sel_industry = $_GET['industry'];
	}
	if(isset($_GET['sector']))
	{
	$sel_sector = $_GET['sector'];
	}

 $sql="call sp_52_week_low('".$exchange."','".$sel_martype."','".$sel_industry."','".$sel_sector."')";
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
      //  else
      //  {
                // if page isn't set, show first set of results
               // $start = 1;
               // $end = $per_page;
      //  }

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='week52high.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;

    $prev = "<a href=\"week52low.php?page=$i&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector\"><strong>Prev |</strong></a>";
    $first = "<a href=\"week52low.php?page=1&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector\"><strong>First |</strong></a>";
        }
        else {
     $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
$next = "<a href=\"week52low.php?page=$i&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector\"><strong>Next |</strong></a>";
$last = "<a href=\"week52low.php?page=$total_pages&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector\"><strong>Last |</strong></a>";
}
else {
      $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";

echo "<tr>";
echo "<td bgcolor=\"CDE9FB\" align=\"center\"  style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"left\"  style=\"font-size:14;\"><b>Total Trade Quantity</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"left\"  style=\"font-size:14;\"><b>Traded Value(Rs.lakhs)</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\"  style=\"font-size:14;\"><b>LTP<b></td> " ;
echo "<td bgcolor=\"CDE9FB\" align=\"center\"  style=\"font-size:14;\"><b>Prev Close</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Low 52 Week</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\"  style=\"font-size:14;\"><b>% Change</b></td> ";
echo "</tr>";
	for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
                //$nseid=mysql_result($result, $i, 'id');
                // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td id=\"id\" name=\"id\" bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'TotalTrade') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Value') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'LTP') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Prev_Close') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Low_week_52') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Per_Change') . '</td>';
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
