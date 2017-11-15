<style type="text/css">
.tablehead
{
display:none;
}
</style>
<?php
$url=$_GET['id'];
$xml = file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<td class=t0 style="text-align:justify">');
$annou_start1=strpos($str, '<td class=tablehead width=200>Short Description</td>');
$annou_end=strpos($str, '</table>') ;
$annou_len = $annou_end - $annou_start;
$annou_len1 = $annou_end - $annou_start1;
if ($annou_start !== false)
{
$table = substr($str, $annou_start, $annou_len);
}
else if ($annou_start1 !== false)
{
$table = substr($str, $annou_start1, $annou_len1);
}
$content=preg_replace("/<a[^>]+\>/i", "", $table);
echo "<b><center><font style=\"color:#800000; font-size:120%;\">Announcement</font></center></b><br />".$content;
?>
