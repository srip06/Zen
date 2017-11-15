<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php // content="text/plain; charset=utf-8"
//$exchange=$_GET['id'];
$id=$_GET['id'];
require_once ('C://wamp/www/index/jpgraph/jpgraph.php');
require_once ('C://wamp/www/index/jpgraph/jpgraph_line.php');

$DBhost = "localhost";
$DBuser = "root";
$DBpass = " ";
$DBName = "research";
$table = "graph";

$conn=@mysql_connect($DBhost,$DBuser) or die("Unable to connect to database");
mysql_select_db($DBName,$conn) or die("Unable to select database $DBName");

//$query_ChartRS = "select * from graph";
$query_ChartRS = "SELECT * FROM tbl_daily_trade_details_bse where Id='".$id."'";
$ChartRS = mysql_query($query_ChartRS) or die(mysql_error());


while ($row_ChartRS = mysql_fetch_array($ChartRS)) {
$Open=$row_ChartRS['Open_price'];
$High=$row_ChartRS['High_price'];
$Close=$row_ChartRS['Close_price'];
$Low=$row_ChartRS['Low_price'];
}
$labelx=array('Open','High','Low','Close');
$ydata=array($Open,$High,$Low,$Close);

   // $open='210';
//$labelx=array('Open','High','Low','Close');
//$ydata=array($Open,$High,$Low,$Prev);
//$ydata = array(12,19,3,9,15,10);
//$labelx= array(12,19,3,9,15,10);
// The code to setup a very basic graph
$graph = new Graph(150,100,'auto');
$graph->SetScale('intlin');
$graph->SetMargin(35,20,10,25);
$graph->SetMarginColor('white#F5F5F5');
$graph->SetFrame(true,'gray',1);

//$graph->title->Set('Label background');
//$graph->title->SetFont(FF_ARIAL,FS_BOLD,7);

//$graph->subtitle->SetFont(FF_ARIAL,FS_NORMAL,7);
//$graph->subtitle->SetColor('darkred');
//$graph->subtitle->Set('"LABELBKG_NONE"');

//$graph->SetAxisLabelBackground(LABELBKG_NONE,'orange','red','lightblue','red');

// Use Ariel font
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xgrid->Show();
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xgrid->Show();
$graph->yaxis->SetColor("#004040");
$graph->xaxis->SetColor("#004040");
// Create the plot line
$p1 = new LinePlot($ydata);
//$p1->SetStyle("dashed");
$p1->SetColor('#800000');
//$p1->mark->SetFillColor("#004040");
$p1->mark->SetType(MARK_UTRIANGLE);
//$p1->SetWeight(2);
$graph->xaxis->SetTickLabels($labelx);
//$graph->xaxis->scale->ticks->Set(50,5);
//$graph->yaxis->scale->ticks->Set(100,50);
$graph->Add($p1);
// Output graph
$graph->Stroke();

?>

