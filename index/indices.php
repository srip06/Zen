 <?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
Indices
</title>
</head>
<body><div style="width:373px; position:absolute; top:0px; left:2px;"><div style="width:120px; font-size:10px; color:#004080; font-size:13px;">Indices</div>
    <?php
    Include_once("db.php");
if(empty($exchange))
{
	$exchange='nseblue';
}
 if($exchange == 'nseblue')
{
$sql="select Upload_date from tbl_auction_nse order by Upload_date desc limit 1";
}     if($exchange == 'bseblue')
{
$sql="select Upload_date from tbl_demate_auction_bse order by Upload_date desc limit 1";
}
$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
$row = mysql_fetch_assoc($sql_result);
//$sql_num=mysql_num_rows();
$date=$row["Upload_date"];
//echo $date;
?>

<!--<br /><hr width="670" align="left" color="green">-->
<div id="dt" style="position:absolute; width:120px; font-size:10px; top:0px; left:270px; color:#004080; display:block;"><b> Date : &nbsp;&nbsp; <?php echo $date; ?> </b></div>
 <?php
$per_page =10;
	$sql="call sp_indices_nse()";
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
    // display pagination

              for ($i = 1; $i <= $total_pages; $i++)
        {
                 //echo "<a href='Demat_Auction.php?page=$i'>$i</a> ";
        }

                if($show_page > 1)
        {
        $i = $show_page - 1;
        $prev = "<a href=\"indices.php?page=$i&id=$exchange\"><strong>Prev |</strong></a>";
        $first = "<a href=\"indices.php?page=1\"><strong>First |</strong></a>";
        }
        else {
     $prev  = '<strong><font color="gray">Prev |</font></strong>';
     $first = '<strong><font color="gray">First |</font></strong>';
}

if ($show_page < $total_pages) {
     $i = $show_page + 1;
     $next = "<a href=\"indices.php?page=$i&id=$exchange\"><strong>Next |</strong></a>";
     $last = "<a href=\"indices.php?page=$total_pages&id=$exchange\"><strong>Last |</strong></a>";
}
else {
    $next = '<strong><font color="gray">Next |</font></strong>';
     $last = '<strong><font color="gray">Last |</font></strong>';

}

echo "<table  name=\"results\" frame=\"\" id=\"results\" cellpadding=\"0\" cellspacing=\"0\" width =\"100%\" height=\"10%\">";
echo "<tr bgcolor=\"#C7D8DC\" style=\"color:#800000;\">";

echo "<td align=\"left\" style=\"font-size:11px; font-family:Times New Roman;\"><b>Industry</b></td> ";
echo "<td align=\"left\" style=\"font-size:11px; font-family:Times New Roman;\"><b>Prev Indice</b></td> ";
echo "<td align=\"left\" style=\"font-size:11px; font-family:Times New Roman;\"><b>Close Indice</b></td> ";
echo "<td align=\"left\" style=\"font-size:11px; font-family:Times New Roman;\"><b>Per Change</b></td> ";
echo "</tr>";


for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
                 // echo out the contents of each row into a table
                echo "<tr>";
                echo "<td  align=\"left\" style=\"color:#004040; font-size:12px; border-bottom: 1px solid #D0D0D0; font-family:Times New Roman;\">" . mysql_result($result, $i, 'Industry') . '</td>';
                echo "<td  align=\"left\" style=\"color:#004040; font-size:10px; border-bottom: 1px solid #D0D0D0; font-family:Times New Roman;\">" . mysql_result($result, $i, 'Prev_Indice') . '</td>';
                echo "<td  align=\"left\" style=\"color:#004040; font-size:10px; border-bottom: 1px solid #D0D0D0; font-family:Times New Roman;\">" . mysql_result($result, $i, 'Close_Indice') . '</td>';
                echo "<td  align=\"left\" style=\"color:#004040; font-size:10px; border-bottom: 1px solid #D0D0D0; font-family:Times New Roman;\">" . mysql_result($result, $i, 'Per_Change') . '%</td>';
echo "</tr>";                        }
         echo "</table>";
 if(empty($show_page))
      {
      $show_page=1;
      }

  //echo "</p>";
       echo "<div class=\"pagingDiv\" style=\"font-size:10px;\">
      <span class=\"pNo\" >$first</span>
      <span class=\"pNo\">$prev</span>
      <span class=\"pNo\">$next</span>
      <span class=\"pNo\">$last</span>
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
      //http://hyderabad.sliceindia.com/v/Programmer-Needed---CMS---PHP-a-Must---25-000-Base---Home-Based/1294320316
?>
</div>
