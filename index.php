<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
.table
{
font-size:13px;
font-family:Times New Roman;
border-color: light gray;
}
</style>
<style type="text/css">
<!--
A:link { COLOR: white; TEXT-DECORATION: none; font-weight: bold }
A:visited { COLOR:white; TEXT-DECORATION: none; font-weight: bold }
A:active { COLOR: black; TEXT-DECORATION:  underline;  font-weight: bold }
A:hover { COLOR:light green; TEXT-DECORATION: none; font-weight: none }
-->
</style>
<script type="text/javascript">
spe=500;
na=document.all.tags("blink");
swi=1;
bringBackBlinky();

function bringBackBlinky() {

if (swi == 1) {
sho="visible";
swi=0;
}
else {
sho="hidden";
swi=1;
}

for(i=0;i<na.length;i++) {
na[i].style.visibility=sho;
}

setTimeout("bringBackBlinky()", spe);
}
</script>
<script language="JavaScript" src="javascript/index.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zen Money</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
   <body bgcolor="#EFEFEF">

    	<div id="outline">
	  <!-- <a href="http://www.zenmoney.com" target="_new"> <div id="logo"></a>-->
     <div style="height:10px"></div>

                   <table border="0" width="100%">

                   <tr>
                       <td><!--<a href="http://www.zenmoney.com" target="_new">--><div id="logo"></div><!-- </a>--> </td>
                       <td align="right" valign="top">
<a id="trdonline"  href="https://trade.zenmoney.com/" target="_new"><font size="2" color="green">Trade Online |</font></a><a id="" href="http://www.zenmoney.com/Clientlogin.aspx" target="_new"><font color="green" size="2"> Client login</font></a><br />
                           <a href="#" onclick="user('user');" id="hover" onmouseover="document.getElementById('hover').style.color='red';" id="userlogin"><font color="green" size="2"><b>User Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;</a></font>
                           <a href="#" onclick="popup('/index/register/register.php');document.getElementById('user').style.display = 'none';"  id="rgstruser"><font color="green" size="2">Register&nbsp;&nbsp;&nbsp;&nbsp;</font></a>
                       </td>
                   </tr>
                   </table>

<div style="position:absolute; top:145px; display:none; color:#800080;#800000; left:222px;">
                 <b> <font size="2">EOD <script type= "text/javascript">
	                 var today = new Date();
	                 var dd = today.getDate();
	                 var mm = today.getMonth();
	                 var yyyy = today.getFullYear();

	                 var mmarr = new Array("1","2","3","4","5","6","7","8","9","10","11","12");
	                 var mom = mmarr[mm];
                     var strdate = dd+"-"+mom+"-"+yyyy;
	                  document.write(strdate);
                     </script></font> </b>
</div>

<!--[if lte IE 7]>
<div id="rightdiv" style="position:absolute; top:114px; left:880px;"></div>
<div id="spannse" style="position:absolute; top:114px; left:220px;"></div>
<![endif]-->

<!--[if gte IE 8]>
<div id="rightdiv" style="position:absolute; top:107px; left:880px;"></div>
<div id="spannse" style="position:absolute; top:107px; left:217px;"></div>
<![endif]-->


<!--[if ! IE]>
<div id="rightdiv" style="position:absolute; top:107px; left:880px;"></div>
<div id="spannse" style="position:absolute; top:107px; left:217px;"></div>
<![endif]-->


<div>
<iframe src="/index/marquee/marquee_nse.php"  width="680" height="25" frameborder="0" name="marquee" marginheight="0" marginwidth="0">
</iframe>
</div>
 <div style="position:absolute; top:97px; left:912px;">
<blink><span onclick="ipo();" style="cursor:hand;"><img src="\index\images\sym1.jpg"></span></blink>
  </div>
<!--  <div style="position:absolute; top:97px; left:912px;">
<blink><a href="ipo rss.php" target="_new"><img src="\index\images\sym1.jpg"></a></blink>
</div>-->


   <div style="height:5px; " ></div>

  <!--[if lte IE 7]>
  <div id="bseright" style="position:absolute; top:144px; left:1026px;"></div>
  <div id="spanbse" style="position:absolute; top:144px; left:319px;"></div>
  <![endif]-->
  
  <!--[if gte IE 8]>
  <div id="bseright" style="position:absolute; top:137px; left:1026px;"></div>
  <div id="spanbse" style="position:absolute; top:137px; left:319px;"></div>
  <![endif]-->

<div>
   <iframe src="/index/marquee/marquee_bse.php"  width="680" height="25" frameborder="0" align="right" name="marquee" marginheight="0" marginwidth="0"></iframe>
   </div>
<hr width="828"  style="position:absolute; top:160px;"  align="left" color="green">
<br />
<br />
<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once './dbconnection/db.php';

session_start();
ob_start();
if($_POST['login'])
{
//foreach($_POST as $k=>$v)echo $k.'='.$v.'<br>';
    $chk=0;
	$login_id=trim($_POST['UserName']);
	$pass=$_POST['Password'];
	$sql="SELECT * FROM tbl_users WHERE Userid='".$login_id."' AND Pwd='".$pass."' LIMIT 1";
	$res=mysql_query($sql);
	if(mysql_num_rows($res))
	{
		$row=mysql_fetch_assoc($res);
		$_SESSION['UserID']=$row['Userid'];
        $chk=1;
		header("Location:home.php");
		exit;
	}

    else
         {
		    $errMessage="Invalid User ID or Password!";
            $_SESSION['error']=$errMessage;

	}
}

   	if(isset($_SESSION['UserID']) && ($chk=1))
{
	header("Location:home.php");
	exit;
}
?>

 <div id="user" style="display:none;" >
  	<form id="form1" name="form1" method="post" onsubmit="return validateLogin();">
    <table>

          <tr>
            <td>
               <table width="239" style="" cellspacing="0" cellpadding="3"  >

                <tr>
                    <td colspan="3" align="center" id="error" class="error" style="font-size:12px; color: white;" >&nbsp;&nbsp;<?php  $errMessag=$_SESSION['error'];
               echo $errMessag;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                   <td style="font-size:13px;" > &nbsp;&nbsp; UserName </td>
                    <td> <input type="text" style="height:20px; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; width:100px;" value="" name="UserName" id="UserName"/>  </td>
                </tr>

                <tr>
                   <td style="font-size:13px;">&nbsp;&nbsp;  Password </td>
                    <td><input type="password" value="" name="Password" id="Password" style="height:20px; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; width:100px;" /> </td>
                </tr>
                                    <td colspan="2">

<center>&nbsp;&nbsp;&nbsp;&nbsp;<input style="background-color:#0592C7; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; cursor:hand; color:white;" type="submit" value="Login" name="login" id="login"/>or
<a href="#" onClick="document.getElementById('user').style.display = 'none';" style="font-size:12px; color:brown"> Cancel </a></center>
                    </td>
                    </tr>
    </table>

         </table>
    </form>
              </div>
<?php
   if(!empty($errMessag))
    {
?>
    <div id="user" style="display:block;" >
    <form id="form1" name="form1" method="post" onsubmit="return validateLogin();">
    <table>

          <tr>
            <td>
               <table width="239" style="" cellspacing="0" cellpadding="3"  >

                <tr>
                    <td colspan="3" align="center" id="error" class="error" style="font-size:12px; color: white;" >&nbsp;&nbsp;<?php  $errMessag=$_SESSION['error'];
               echo $errMessag;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                   <td style="font-size:13px;" > &nbsp;&nbsp; UserName </td>
                    <td> <input type="text" style="height:20px; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; width:100px;" value="" name="UserName" id="UserName"/>  </td>
                </tr>

                <tr>
                   <td style="font-size:13px;">&nbsp;&nbsp;  Password </td>
                    <td><input type="password" value="" name="Password" id="Password" style="height:20px; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; width:100px;" /> </td>
                </tr>
                                    <td colspan="2">

<center>&nbsp;&nbsp;&nbsp;&nbsp;<input style="background-color:#0592C7; border-top:1px solid #15BAF9; border-left:1px solid #15BAF9;  border-right:1px solid #15BAF9; border-bottom:1px solid #15BAF9; cursor:hand; color:white;" type="submit" value="Login" name="login" id="login"/>or
<a href="#" onClick="document.getElementById('user').style.display = 'none';" style="font-size:12px; color:brown"> Cancel </a></center>
                    </td>
                    </tr>
    </table>

         </table>
    </form>
    </div>
   <?php
   }
   ?>
<?php
if(isset($_POST['mystockexchange']))
	$mystockexchange = $_POST['mystockexchange'];
else
	$mystockexchange = 1;

if(isset($_POST['industry']))
	$industrySelected = $_POST['industry'];
	else
	$industrySelected=0;
?>
<table border="0">
<tr>
<td valign="top"><iframe src="/index/graph/sensex_graph.php" width="220" height="220" frameborder="0" name="marquee" scrolling="no" marginheight="0" marginwidth="0" /></td>
<td valign="top"><iframe src="/index/index/indices.php" width="373"  scrolling="no" height="220" frameborder="0" /></td>
<td valign="top"><iframe src="/index/index/active.html" scrolling="no" width="220" height="220" frameborder="0" name="activescripts" marginheight="0" marginwidth="0" /></td>
</tr>
<tr>
<td>
<table border="0">
<tr>
<td valign="top"><iframe src="/index/marketnews/global_markts_rss.php"  frameborder="0"  scrolling="no" name="symbol" width="372" height="250"/ ></td>
<td valign="top"><iframe src="/index/index/top6gainerslosers.html"   frameborder="0"  scrolling="no" name="top6nb" width="451" height="250" /></td>
</tr>
</table>
</td>
</tr>
</table>
<iframe src="/index/index/symbol.php" style="position:absolute; left:219px; top:575px;" frameborder="0"  scrolling="no" name="symbol" width="372" height="240"/ >
<iframe src="/index/index/Corp_ans.html" ALLOWTRANSPARENCY="true" style="background-color:transparent; position:absolute; left:590px; top:620px;" frameborder="0"  scrolling="no" name="top5" width="340" height="190"/>
<iframe src="/index/index/footer.html" ALLOWTRANSPARENCY="true" style="background-color:transparent; position:absolute; top:800px; left:217px;" frameborder="0"  scrolling="no" name="top5" width="832" height="60"/>
<iframe src="/index/index/f & O secban.php" ALLOWTRANSPARENCY="true" style="background-color:transparent; position:absolute; top:360px; left:217px;" scrolling="no" width="235" height="35" frameborder="0"  name="f&o secban" marginheight="0" marginwidth="0" />
