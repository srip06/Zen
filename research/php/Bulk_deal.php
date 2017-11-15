<!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->
	<div style="position:absolute; top:19px; left:608px; color:green; font-size:13px"><b>Bulk Deal</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
Bulk Deal
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

<script type="text/javascript" language="JavaScript">
function showDateSelected(){
   alert("Date selected is "+document.form1.fromdate.value);
   alert("Date selected is "+document.form1.todate.value);
}
function dateverify()
{
	if (document.form1.fromdate.value > document.form1.todate.value)
	{
		alert("To date should be greater than from date");
		return false;
	}
}



function changeValues(id) {
            //alert(id);

            if(id == '1')
{
        cal1.style.display='none';
  		dt.style.display='block';
		frmdt.style.display='none';
		frmdt1.style.display='none';
}

else if((id == '2') || (id == '3'))

{
        cal1.style.display='block';
  		dt.style.display='none';
		frmdt.style.display='block';
		frmdt1.style.display='block';
 }

}


</script>


  <script type="text/javascript" src="/index/javascript/datetimepicker_css.js"></script>
  <script language="javascript">
 function nsebse(id)
{
//alert(id);
if(id == 'nseblue')
{
document.getElementById('nseblue').style.display="none";
document.getElementById('bseblue').style.display="block";
document.getElementById('bsegreen').style.display="none";
document.getElementById('nsegreen').style.display="block";
}
if(id == 'bseblue')
{
document.getElementById('bseblue').style.display="none";
document.getElementById('bsegreen').style.display="block";
document.getElementById('nseblue').style.display="block";
document.getElementById('nsegreen').style.display="none";
}
}
</script>
  </head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include_once("db.php");

   $exchange=$_GET['id'];

if(isset($_POST['mytimeframe']))
	$timeframeSelected = $_POST['mytimeframe'];
else
	$timeframeSelected = 1;
?>

    <?php
    if(empty($exchange))
	{
	$exchange='nseblue';
	}
	  if($exchange == 'nseblue')
    {
$sql="select Upload_date from tbl_bulk_nse order by Upload_date desc limit 1";
}if($exchange == 'bseblue')
    {
    $sql="select Upload_date from tbl_bulk_bse order by Upload_date desc limit 1";
    }
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
<div id="research1" name="research1" style="position:absolute; width:662px; height:39px; top:37px;">
<div name="refresh" id="refresh">
<form method="post"  name="form1" id="form1" onsubmit="javscript:return dateselect();">
<table border="0" cellspacing="1" cellpadding="3" align="left" style="font-size:13px;">
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
       <tr><td>  <div style="position:absolute; top:5px; font-color:white; left:610px;">
                 <input type="submit" value="GO" style=" font-weight:bold;
 border-style:1px groove #6F9AC5; border-bottom: 4px outset green;  background-color:#83B4EE; color:white;"  onClick="javascript:dateverify();">
</div>
</td></tr>
</table>
 </form>
<p>&nbsp;</p>

<?php
$today = date('Y-m-d');
$sel_time="1";
$sel_fromdate='';
$sel_todate='';
?>

<?php
if(isset($_POST))
{
	
		if (isset($_POST['mytimeframe']))
	{
	$sel_time = $_POST['mytimeframe'];
	}
	if (isset($_POST['fromdate']))
	{
	$sel_fromdate = $_POST['fromdate'];
	}
	if (isset($_POST['todate']))
	{
	$sel_todate = $_POST['todate'];
	}
	if ($sel_fromdate=='')
	{
		$sel_fromdate='';
	}
	if ($sel_todate=='')
	{
		$sel_todate='';
	}
}
?>
<table>
<tr>
<td><div id="dt" style="position:absolute; width:120px; top:-18px; left:260px; color:green; font-size:13px; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $date; ?> </b></div></td>
<td><span id="frmdt" style="position:absolute; width:420px; top:-18px; left:190px; color:green; font-size:13px; display:none;"><b>From Date : <?php echo $sel_fromdate; ?> </span>
<span id="frmdt1" style="position:absolute; width:420px; top:-18px; left:345px; color:green; font-size:13px; display:none;"> To Date :<?php echo $sel_todate; ?> </b></span></td>
</tr>
</table>
 </table>


<?php
$today = date('Y-m-d');
$sel_time="1";
$sel_fromdate=$today;
$sel_todate=$today;

if(isset($_POST))
{
	
  	 $per_page = 10;
	if (isset($_POST['mytimeframe']))
	{
	$sel_time = $_POST['mytimeframe'];
	}
	if (isset($_POST['fromdate']))
	{
	$sel_fromdate = $_POST['fromdate'];
	}
	if (isset($_POST['todate']))
	{
	$sel_todate = $_POST['todate'];
	}
	if ($sel_fromdate=='')
	{
		$sel_fromdate=$today;
	}
	if ($sel_todate=='')
	{
		$sel_todate=$today;
	}
		$sql="call sp_bulk_nse('".$sel_time."','".$sel_fromdate."','".$sel_todate."')";
if($exchange == 'nseblue')
    {
	$sql="call sp_bulk_nse('".$sel_time."','".$sel_fromdate."','".$sel_todate."')";
	}
else if($exchange == 'bseblue')
 {
	$sql="call sp_bulk_bse('".$sel_time."','".$sel_fromdate."','".$sel_todate."')";
	}

                
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
      //  else
       // {
                // if page isn't set, show first set of results
              //  $start = 1;
              //  $end = $per_page;
       // }

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='Bulk_deal.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"Bulk_deal.php?page=$i&id=$exchange\"><strong>Prev |</strong></a>";
        $first = "<a href=\"Bulk_deal.php?page=1\"><strong>First |</strong></a>";
        }
        else {
    $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a href=\"Bulk_deal.php?page=$i&id=$exchange\"><strong>Next |</strong></a>";
     $last = "<a href=\"Bulk_deal.php?page=$total_pages&id=$exchange\"><strong>Last |</strong></a>";
}
else {
    $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";
echo "<tr>";
if($exchange == 'bseblue')
    {
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Client Name</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Buy Sell</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Qty Traded</b></td> ";
 } else {
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Symbol</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Security Name</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Client Name</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Buy Sell</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Qty Traded</b></td> ";
echo "<td bgcolor=\"CDE9FB\" align=\"center\" style=\"font-size:14;\"><b>Trd Price Wght Avg Price</b></td> ";
}
echo "</tr>";


for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }

                // echo out the contents of each row into a table
                echo "<tr>";
             if($exchange == 'nseblue')
    {
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Security_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Client_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Buy_Sell') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Quantity_Traded') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Trd_Price_Wght_Avg_Price') . '</td>';
                } else if($exchange == 'bseblue')
                 {
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Client_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Buy_Sell') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Quantity_Traded') . '</td>';
                                 
                 } else
                 {
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Symbol') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Security_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Client_Name') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Buy_Sell') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Quantity_Traded') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:12px;\">" . mysql_result($result, $i, 'Trd_Price_Wght_Avg_Price') . '</td>';
                }

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
?>
