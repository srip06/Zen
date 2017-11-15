 <?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<div style="position:absolute; top:15px; left:288px; color:green; font-size:16px"><b>Book Closure</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
Book Closure
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
<script type="text/javascript" language="javascript">


 //fuunction for table link
function popup(url)
{
 var width  = 500;
 var height = 250;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 params += ', titlebar=0';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}

// function to dispaly date for time frame
function datedisplay()
{
	if(document.getElementById('mytimeframe').value = 1)
	{
		document.getElementById('frmdt').style.display = "block";
		document.getElementById('todt').style.display = "none";
	}
}






// function to dispaly calender
</script>
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
  }

else if((id == '2') || (id == '3'))

{
        cal1.style.display='block';
  		dt.style.display='none';
		frmdt.style.display='block';
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
    <?php
    include_once('db.php');
$sql="select Upload_date from tbl_corp_action_nse order by Upload_date desc limit 1";
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
$date=$row["Upload_date"];
echo "<div style=\"position:absolute; top:-18px; left:268px; color:green; font-size:13px;\">";
echo $date;
echo "</div>";
?>
<!--[if lte IE 7]>
<hr width="704" style="position:absolute; top:34px;" align="left" color="green">
  <![endif]-->
    <!--[if gte IE 8]>
  <hr width="703" style="position:absolute; top:26px;" align="left" color="green">
    <![endif]-->
<!--<div id="research1" name="research1" style="position:absolute; height:40px; top:37px;">-->
<p>&nbsp;</p>
<?php
if(isset($_POST))
{

  	 $per_page = 10;
	$sql="call sp_book_closure_nse()";
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
        //{
                // if page isn't set, show first set of results
          //      $start = 1;
            //    $end = $per_page;
        //}

        // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='corp_action.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"corp_action.php?page=$i\"><strong>Prev |</strong></a>";
        $first = "<a href=\"corp_action.php?page=1\"><strong>First |</strong></a>";
        }
        else {
    $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a href=\"corp_action.php?page=$i\"><strong>Next |</strong></a>";
     $last = "<a href=\"corp_action.php?page=$total_pages\"><strong>Last |</strong></a>";
}
else {
     $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';
}
	
echo "<table  name=\"results\" frame=\"border\" id=\"results\" class=\"table\" cellpadding=\"1\" cellspacing=\"3\" width =\"100%\" >";
echo "<tr>";
echo "<td bgcolor=\"CDE9FB\" width=\"10%\" align=\"center\" style=\"font-size:11;\"><b>CompanyName</b></td> ";
echo "<td bgcolor=\"CDE9FB\" width=\"14%\" align=\"center\" style=\"font-size:14;\"><b>Start Date</b></td> ";
echo "<td bgcolor=\"CDE9FB\" width=\"14%\" align=\"center\" style=\"font-size:14;\"><b>End Date</b></td> ";
echo "<td bgcolor=\"CDE9FB\" width=\"14%\" align=\"center\" style=\"font-size:14;\"><b>Ex_Date</b></td> ";
echo "<td bgcolor=\"CDE9FB\" width=\"48%\" align=\"center\" style=\"font-size:11;\"><b>Purpose</b></td> ";
echo "</tr>";


for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }

                // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Sec_Desc') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'BC_start_date') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'BC_End_Date') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040\">" . mysql_result($result, $i, 'Ex_Date') . '</td>';
                echo "<td  bgcolor=\"F8F8F8\" align=\"left\" style=\"color:#004040; font-size:11px;\">" . mysql_result($result, $i, 'Sec_Corp_Action_desc') . '</td>';
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
