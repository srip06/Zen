<script language="javascript">
 function research(id)
{
//alert(id);
if(id == 'nseblue')
{
document.getElementById('nseblue').style.display="none";
document.getElementById('bseblue').style.display="block";
document.getElementById('bsegreen').style.display="none";
document.getElementById('nsegreen').style.display="block";
}
if(id == 'bseblue')
{
document.getElementById('bseblue').style.display="none";
document.getElementById('bsegreen').style.display="block";
document.getElementById('nseblue').style.display="block";
document.getElementById('nsegreen').style.display="none";
}
}
</script>
<link href="/index/css/css.css" rel="stylesheet" type="text/css" />
<BODY>
<font style=" position:absolute; left:118px; top:0px; color:#808080; font-size:15px;"><b>Corporate Announcements</b></font>
<div>
<a id="bsegreen" name="bsegreen"  style="position:absolute; top:0px; cursor:text;">
</a>
<a  href="bserss.php?id=bseblue" id="bseblue" name="bseblue" style="position:absolute; top:0px;  cursor:hand;" target="rss" onclick="javascript:research('bseblue');">
</a>
<a href="rss.php?id=nseblue" id="nseblue" name="nseblue" style="position:absolute; top:0px;  left:54px; cursor:hand;" target="rss" onclick="javascript:research('nseblue');">
</a>
<a id="nsegreen" name="nsegreen" style="position:absolute; top:0px; left:54px;  cursor:text;">
</a>
</div>
</body>
</html>
