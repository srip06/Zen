<style type="css/text">
.FL MR10 brd1 img
{
display:none;
}
</style>
<?php
$url=$_GET['id'];
$xml = file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<!--INFOLINKS_ON-->');
$annou_end=strpos($str,'<!--INFOLINKS_OFF-->') ;
$annou_len = $annou_end - $annou_start;
if($annou_end !== false)
{
$table = substr($str, $annou_start, $annou_len);
$content=preg_replace("/<a[^>]+\>/i", "", $table);
echo $content;
//echo 'Disclaimer';
}
?>
