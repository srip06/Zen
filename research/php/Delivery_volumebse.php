<!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->
<div style="position:absolute; top:19px; left:548px; color:green; font-size:13px"><b>Delivery Volume</b></div>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
Delivery Volume
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

if(isset($_GET['mytimeframe']))

	$timeframeSelected = $_GET['mytimeframe'];
else
	$timeframeSelected = 1;

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
	$exchange='bseblue';
	}
$sql="select Upload_date from tbl_daily_trade_details_bse order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
//$sql_num=mysql_num_rows();
$date=$row["Upload_date"];
//echo $date;
?>
<!--[if lte IE 7]>
<hr width="659" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
    <!--[if gte IE 8]>
  <hr width="658" style="position:absolute; top:26px;" align="left" color="green">
    <![endif]-->
<div id="research1" name="research1" style="position:absolute; width:662px; top:37px;">
<form action="Delivery_volumebse.php?id=<?php echo $exchange; ?>&mymarkettype=<?php echo $sel_martype; ?>&industry=<?php echo $sel_industry; ?>&sector=<?php echo $sel_sector; ?>&mytimeframe=<?php echo $sel_time; ?>&fromdate=<?php echo $sel_fromdate; ?>&todate=<?php echo $sel_todate; ?>" method="get"  name="form1" id="form1" onsubmit="javscript:return dateselect();">
<table border="0" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
  <tr>
    <td align="center" ><b>Market Type</b></td>
     <td>  <span id="marketdiv">
         <select style="width:135px; font-size:10px; height:18px; color:gray;" name="mymarkettype" id="mymarkettype" onChange="getindustrybse(this.value);">
<?php
$query="select ID,Market_type from tbl_bse_mkttype";
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
<table width="" border="0" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
  <tr>
    <td align="left" valign="top"><b>Time Frame</b></td>
    <td align="left" valign="top" height="28" > &nbsp;<SELECT id="mytimeframe" style="font-size:10px; color:gray;" name="mytimeframe" onChange="changeValues(this.value)">
      <OPTION VALUE="1" <?php if($timeframeSelected == 1) echo "Selected"; ?> >Today &#39; s </OPTION>
      <OPTION VALUE="2" <?php if($timeframeSelected == 2) echo "Selected"; ?> >Point to Point</OPTION>

    </SELECT></td>


    <td id="cal1" valign="top" style="display:none;"><table bgcolor="EEEEEE">
        <td align="left" valign="top"><font size="2"><b> From Date </b></font></td>
        <td align="left" valign="top"><input id="fromdate" name="fromdate" type="text" size="9" >
          <script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'fromdate'
	});

	</script>
	<td align="left" valign="top"><font size="2"><b>To Date:</b></font></td>
        <td align="left" valign="top"><input id="todate" name="todate" type="text" size="9"/>
        <script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'todate'
	});

	</script>

         </table></td>

      <table>
       <tr><td>  <div style="position:absolute; top:30px; font-color:white; left:580px;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
<p>&nbsp;</p>

<?php
if (isset($_GET['mytimeframe']))
	{
	$sel_time = $_GET['mytimeframe'];
	}
	if (isset($_GET['fromdate']))
	{
	$sel_fromdate = $_GET['fromdate'];
	}
	if (isset($_GET['todate']))
	{
	$sel_todate = $_GET['todate'];
	}
	?>
<table>
<tr>
<td><div id="dt" style="position:absolute; top:-18px; left:268px; color:green; font-size:13px; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $date; ?> </b></div></td>
<td><span id="frmdt" style="position:absolute; width:420px; top:-18px; left:190px; color:green; font-size:13px; display:none;"><b>From Date : <?php echo $sel_fromdate; ?> </span>
<span id="frmdt1" style="position:absolute; width:420px; top:-18px; left:345px; color:green; font-size:13px; display:none;"> To Date :<?php echo $sel_todate; ?> </b></span></td>
</tr>
</table>
 </table>

  <?php
$today = date('Y-m-d');
$sel_martype="1";
$sel_industry="0";
$sel_sector="ALL";
$sel_time="1";

if(isset($_GET))
{
	 $per_page = 20;
	if (isset($_GET['mymarkettype']))
	{
	$sel_martype = $_GET['mymarkettype'];
	}
	if (isset($_GET['mytimeframe']))
	{
	$sel_time = $_GET['mytimeframe'];
	}
	if (isset($_GET['industry']))
	{
	$sel_industry = $_GET['industry'];
	}
	if (isset($_GET['sector']))
	{
	$sel_sector = $_GET['sector'];
	}
	if (isset($_GET['fromdate']))
	{
	$sel_fromdate = $_GET['fromdate'];
	}
	if (isset($_POST['todate']))
	{
	$sel_todate = $_GET['todate'];
	}
	if ($sel_fromdate=='')
	{
		$sel_fromdate=$today;
	}

	if ($sel_todate=='')	{
		$sel_todate=$today;
	}


   // $myMessage='';

	$sql="call sp_delivery_bse('".$exchange."','".$sel_martype."','".$sel_industry."','".$sel_sector."','".$sel_time."',
	'".$sel_fromdate."','".$sel_todate."')";

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
             //   $start = 1;
             //   $end = $per_page;
       // }

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='Delivery_volume.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"Delivery_volumebse.php?page=$i&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector&mytimeframe=$sel_time&fromdate=$sel_fromdate&todate=$sel_todate\"><strong>Prev |</strong></a>";
        $first = "<a href=\"Delivery_volumebse.php?page=1&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector&mytimeframe=$sel_time&fromdate=$sel_fromdate&todate=$sel_todate\"><strong>First |</strong></a>";
        }
        else {
    $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a href=\"Delivery_volumebse.php?page=$i&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector&mytimeframe=$sel_time&fromdate=$sel_fromdate&todate=$sel_todate\"><strong>Next |</strong></a>";
     $last = "<a href=\"Delivery_volumebse.php?page=$total_pages&id=$exchange&mymarkettype=$sel_martype&industry=$sel_industry&sector=$sel_sector&mytimeframe=$sel_time&fromdate=$sel_fromdate&todate=$sel_todate\"><strong>Last |</strong></a>";
}
else {
    $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";

echo "<tr>";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Total Trade Quantity</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Delivery Volume</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>DEl To Trd Vol<b></td> " ;
echo "</tr>";
	for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }

                // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'TotalTrade') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Delivery Volume') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'DEl To Trd Vol') . '</td>';
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
if(($sel_time == 2) || ($sel_time == 3))
     {
     echo "<script language=\"javascript\">
     document.getElementById('cal1').style.display='block';
     document.getElementById('dt').style.display='none';
     document.getElementById('frmdt').style.display='block';
     document.getElementById('frmdt1').style.display='block';
     </script>";
     }

      if(empty($total_results))
      {
        echo "<table align=\"center\">";
        echo "<tr>";
        echo "<td><font color=\"red\"><b> NO RECORDS </b></font> </td>";
        echo "</tr>";
        echo "</table>";
      }
   $_SESSION['indna']= $_POST['industry'];
?>
