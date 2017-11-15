<?php error_reporting (E_ALL ^ E_NOTICE); ?>


<?php $mymarkettype=($_GET['mymarkettype']);
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('research');
$query=$sql="call sp_industry_bse('".$mymarkettype."')";
$result=mysql_query($query);
?>
	<select style="width:135px; font-size:10px; height:18px; color:gray;" name="industry"  id="industry" onChange="javascript:getSec(this.value);">
	<option>ALL</option>
  <?php while($row=mysql_fetch_array($result)) 
  {
       $id=$row['Industry_id'];
       $industry=$row['Industry'];
  ?>  
	<option value="<?php echo $id; ?>" <?php if($industrySelected == $row['Industry']) echo "Selected";?> > <?php echo $industry; ?>
	
     <?php  
     }
          ?>
       </option>
</select>
