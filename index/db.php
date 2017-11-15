<?php
	$conn=mysql_connect('localhost','root','') or die('MySQL Connection Failed! '.mysql_error());
	$con=mysql_select_db('Research') or die('Could not able to connect to database! '.mysql_error());
?>
