<style type="text/css">
.ann01
{
color:#0080C0;
}
.anndt02
{
display:none;
}
</style>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
$url='http://www.bseindia.com/stockinfo/ann.aspx';
$xml = file_get_contents($url);
$str=$xml;
$annou_start=strpos($str, '<span id="lblann">');
$annou_end=strpos($str, '</table></span>') ;
$annou_len = $annou_end - $annou_start;
$table = substr($str, $annou_start, $annou_len);
$content=preg_replace("/<img[^>]+\>/i", " ", $table);
$content1=preg_replace("/<a[^>]+\>/i", "", $content);
echo "<marquee direction=\"up\" scrollamount=\"2\" onMouseOver=\"this.stop();\" onMouseOut=\"this.start();\">".$content1."</marquee>";
?>
