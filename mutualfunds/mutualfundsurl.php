<style type="text/css">
.MT25
{
display:none;
}
.PT10 b_14
{
display:none;
}
.CL
{
display:none;
}
</style>
<?php
$url=$_GET['id'];
$xml = file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<P>');
$annou_end=strpos($str, 'For more') ;
$annou_len = $annou_end - $annou_start;
$table = substr($str, $annou_start, $annou_len);
$content=preg_replace("/<a[^>]+\>/i", "", $table);
echo $content;
?>
