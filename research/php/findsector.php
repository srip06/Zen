

<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php $Id=$_GET['industry'];
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('research');
$query="select distinct t.sector from tbl_stock_code_details t where t.Industry_id='".$Id."'";

$result=mysql_query($query);
?>
<select  style="width:135px; font-size:10px;  height:18px; color:gray;" name="sector" id="sector">
<option>ALL</option>
<?php while($row=mysql_fetch_array($result))
{
$sector=$row['sector'];

?>
<option value="<?php echo $sector; ?>" <?php if($sectorSelected == $sector) echo "Selected";?> > <?php echo $sector; ?>
<?php
}

?>
</option>
</select>




