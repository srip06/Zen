<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
include_once("db.php");
   $exchange=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<div style="position:absolute; top:19px; left:100px; color:green; font-size:12px"><b>Most Active Securities</b></div>

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
border-color: #3EC0FF;
}

</style>
<link href="include.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="calendar.css"/>
 <script language="JavaScript" src="calendar_db.js"></script>

  <script type="text/javascript" src="datetimepicker_css.js"></script>
  <script language="javascript">

  function Pager(tableName, itemsPerPage) {
    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;

    this.showRecords = function(from, to) {
        var rows = document.getElementById(tableName).rows;
        // i starts from 1 to skip table header row
        for (var i = 1; i < rows.length; i++) {
            if (i < from || i > to)
                rows[i].style.display = 'none';
            else
                rows[i].style.display = '';
        }
    }

    this.showPage = function(pageNumber) {
    	if (! this.inited) {
    		alert("not inited");
    		return;
    	}

        var oldPageAnchor = document.getElementById('pg'+this.currentPage);
        oldPageAnchor.className = 'pg-normal';

        this.currentPage = pageNumber;
        var newPageAnchor = document.getElementById('pg'+this.currentPage);
        newPageAnchor.className = 'pg-selected';

        var from = (pageNumber - 1) * itemsPerPage + 1;
        var to = from + itemsPerPage - 1;
        this.showRecords(from, to);
    }

    this.prev = function() {
        if (this.currentPage > 1)
            this.showPage(this.currentPage - 1);
    }

    this.next = function() {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
        }
    }

    this.init = function() {
        var rows = document.getElementById(tableName).rows;
        var records = (rows.length - 1);
        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    }

    this.showPageNav = function(pagerName, positionId) {
    	if (! this.inited) {
    		alert("not inited");
    		return;
    	}
    	var element = document.getElementById(positionId);

    	var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal">  </span>';
        	for (var page = 1; page <= this.pages; page++)
            pagerHtml += '<span style="display:none;" id="pg'  + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span>';
        pagerHtml += '<span onclick="'+pagerName+'.next();" class="pg-normal"> </span>';

        element.innerHTML = pagerHtml;
    }
}



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
<br /><hr width="210" align="left" color="green">

  <?php
$today = date('Y-m-d');
$sel_per="1";
$sel_martype="1";
$sel_industry="0";
$sel_sector="ALL";
$sel_time="1";
$sel_fromdate=$today;
$sel_todate=$today;

if(isset($_POST))
{
	if (isset($_POST['mypercentage']))
	{
	$sel_per = $_POST['mypercentage'];
	}
	if (isset($_POST['mymarkettype']))
	{
	$sel_martype = $_POST['mymarkettype'];
	}
	if(isset($_POST['industry']))
	{
	$sel_industry = $_POST['industry'];
	}
	if(isset($_POST['sector']))
	{
	$sel_sector = $_POST['sector'];
	}
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
    $myMessage='';
    	$sql="call sp_mostactivesecurities_nse('".$exchange."','".$sel_martype."','".$sel_industry."','".$sel_sector."','".$sel_time."',
	'".$sel_fromdate."','".$sel_todate."')";
 if($exchange == 'nseblue')
    {
	$sql="call sp_mostactivesecurities_nse('".$exchange."','".$sel_martype."','".$sel_industry."','".$sel_sector."','".$sel_time."',
	'".$sel_fromdate."','".$sel_todate."')";
	}
else if($exchange == 'bseblue')
 {
 $sql="call sp_mostactivesecurities_bse('".$exchange."','".$sel_martype."','".$sel_industry."','".$sel_sector."','".$sel_time."',
'".$sel_fromdate."','".$sel_todate."')";
     }
	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
	$total_results=mysql_num_rows($sql_result);
echo "<table  name=\"results\" border=\"0\" id=\"results\"  cellpadding=\"2\" cellspacing=\"0\" style=\"width:210px;\">";
echo "<tr bgcolor=\"#C7D8DC\" style=\"color:#800000;\">";
echo "<th align=\"left\" style=\"font-size:11px;\">Symbol</th> ";
echo "<th align=\"left\" style=\"font-size:11px;\">TTQ</th> ";
echo "<th align=\"left\" style=\"font-size:10px;\">Traded Value</th> ";
echo "</tr>";
 while($sql_row=mysql_fetch_array($sql_result)) {
	$Symbol=$sql_row["Symbol"];
	$id=$sql_row["id"];
	$TotalTrade=$sql_row["TotalTrade"];
	$Value=$sql_row["Value"];

                echo "<tr>";
                echo "<td  align=\"left\" style=\"color:#004040; font-size:9px;\">".$Symbol.'<hr></td>';
                echo "<td  align=\"left\" style=\"color:#004040; font-size:9px;\">".$TotalTrade.'<hr></td>';
                echo "<td  align=\"left\" style=\"color:#004040; font-size:9px;\">".$Value.'<hr></td>';
                echo "</tr>";


        }

                }
                echo "</table>";
                echo "<font size=\"2\" color=\"#3F1F1F\">TTQ : Total Trade Quantity</font>";
echo "<div id=\"pageNavPosition\">";
?>

<script language="javascript">

        var pager = new Pager('results',5);
        pager.init();
        pager.showPageNav('pager', 'pageNavPosition');
        pager.showPage(1);
  </script>

