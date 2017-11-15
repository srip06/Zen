<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"my-data.csv\"");
$data=stripcslashes($_REQUEST['csv_text']);
echo $data;
?>

