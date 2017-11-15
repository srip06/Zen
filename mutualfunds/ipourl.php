<?php
$url=$_GET['id'];
$xml = file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '</table><P>');
$annou_end=strpos($str, 'Tags');
$annou_end1=strpos($str,'Disclaimer:') ;
$annou_len = $annou_end - $annou_start;
$annou_len1 = $annou_end1 - $annou_start;
if($annou_end !== false)
{
$table = substr($str, $annou_start, $annou_len);
$content=preg_replace("/<a[^>]+\>/i", "", $table);
echo $content;
}
if($annou_end1 !== false)
{
$table = substr($str, $annou_start, $annou_len1);
$content=preg_replace("/<a[^>]+\>/i", "", $table);
echo $content;
}
?>
