<?php error_reporting (E_ALL ^ E_NOTICE); ?>


<?php
include_once("db.php");
$mymarkettype=$_GET['mymarkettype'];
$query="call sp_industry_nse('".$mymarkettype."')";
$result=mysql_query($query);
?>
	<select style="width:135px; font-size:10px;  height:18px; color:gray;" name="industry"  id="industry" onChange="javascript:getSec(this.value);">
	<option>ALL</option>
  <?php while($row=mysql_fetch_array($result))
  {

echo	"<option  value='$row[Industry_id]'  Selected>$row[Industry]</option>";}
echo"</select>";
session_start();
$_session['ind']=$row['Industry'];
echo     $_session['ind'];
 ?>

