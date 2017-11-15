<?php
error_reporting (E_ALL ^ E_NOTICE);
$urlRefresh = "bsegraph.php";
header("Refresh: 60; URL=\"" . $urlRefresh . "\"");
?>
<?php
require_once ('C://wamp/www/index/jpgraph/jpgraph.php');
require_once ('C://wamp/www/index/jpgraph/jpgraph_line.php');
require_once ('C://wamp/www/index/jpgraph/jpgraph_date.php');
$DBhost = "localhost";
$DBuser = "root";
$DBpass = " ";
$DBName = "load files";
$table = "tbl_mkt_bse";
$conn=@mysql_connect($DBhost,$DBuser) or die("Unable to connect to database");
mysql_select_db($DBName,$conn) or die("Unable to select database $DBName");
$query_ChartRS = "SELECT * FROM tbl_mkt_bse order by Time_Stamp asc";
$ChartRS = mysql_query($query_ChartRS) or die(mysql_error());
while ($row_ChartRS = mysql_fetch_array($ChartRS))
{
$x=$row_ChartRS[5];
$ydata[]=$row_ChartRS[1];
$table=substr($x,'0','6');
$labelx[]=$table;
//$labelx[]=$row_ChartRS[5];
}
// The code to setup a very basic graph
$graph = new Graph(1300,300);
//$graph->SetScale('intlin');
$graph->SetScale('datlin');
$graph->SetMargin(30,25,10,32);
$graph->SetMarginColor('white#F5F5F5');
$graph->SetFrame(true,'gray',0);
$graph->xaxis->SetLabelAngle(90);
// Use Ariel font
$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD,7);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xgrid->Show();
// Create the plot line
$p1 = new LinePlot($ydata);
$p1->SetColor('#3BA138');
$p1->SetWeight(1);
$graph->xaxis->SetTickLabels($labelx);
$graph->Add($p1);
//Output graph
$graph->Stroke();
?>
