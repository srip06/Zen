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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<div style="position:absolute; top:19px; left:100px; color:green; font-size:11px"><b>Most Active Securities
</b></div>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<link href="include.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="calendar.css"/>
<script language="JavaScript" src="calendar_db.js"></script>

</head>
<body>
<hr width="210" style="position:absolute; top:36px;  cursor:text;" align="left" color="green">

<link href="/index/css/css.css" rel="stylesheet" type="text/css" />
<BODY>
<a id="bsegreen" name="bsegreen"  style="position:absolute; top:16px;  cursor:text;">
</a>
<a  href="activescripts.php?id=bseblue" id="bseblue" name="bseblue" style="position:absolute; top:16px;  cursor:hand;" target="activeindex" onclick="javascript:research('bseblue');">
</a>
<a  href="activescripts.php?id=nseblue" id="nseblue" name="nseblue" style="position:absolute; top:16px;  left:54px; cursor:hand;" target="activeindex" onclick="javascript:research('nseblue');">
</a>
<a id="nsegreen" name="nsegreen" style="position:absolute; top:16px; left:54px;  cursor:text;">
</a>
</body>
</html>
