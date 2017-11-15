<?php
ini_set('display_errors','Off');
include_once ('db.php');
session_start();
ob_start();
$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Description</title>
<script language="javascript">


//var frm = document.frmLogin;

function validateLogin()
{
 	if(document.frmLogin.UserName.value=='')
	{
		alert('Please enter User Name.');
		document.frmLogin.UserName.focus();
		return false;
	}
	if(document.frmLogin.Password.value=='')
	{
		alert('Please enter Password.');
		document.frmLogin.Password.focus();
		return false;
	}
}


</script>
 <script type="text/javascript" language="javascript">
        function validator()
        {

        if (document.Form.descrp.value == "") {
        alert("Please provide details.");
       return (false);
      }
      //  else (document.Form.descrp.value != "")

      //  {
       // alert('Thank You');
        // window.opener.location.reload();
         // self.close();
    // }

    }

     </script>
     <script type="text/javascript" language="javascript">
        function validators()
        {

        if (document.Form1.descrps.value == "") {
        alert("Please provide details.");
       return (false);
      }
       // else (document.Form1.descrps.value != "")

       // {
       // alert('Thank You');
       // window.opener.location.reload();
        // self.close();
        //}

    }

     </script>
<script language="JavaScript" type="text/javascript">
function login(id)
    {
    //alert(id);
    if(id == "login1")
    {
     document.getElementById("login1").style.display="block";
    }
     }
 </script>
</head>
<?php
if((!($_POST['login'])) && (!($_POST['add'])))
	{
	   if(isset($_POST['adddes']))
	   {
		if(isset($_POST['descrps']))
			{
				   $descrp = $_POST['descrps'];

			}

			$sql="call sp_symbdescrp('".$id."','".$descrp."')";
	    	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
		    $sql_row = mysql_fetch_array($sql_result);

		    if($sql_result)
		    {

?>
<script language="javascript" type="text/javascript">
	alert('Successfully Updated!');
	window.opener.location.reload();
	self.close();
</script>
    <?php
    }
    }
	}
    ?>
<?php
//session_start();
//ob_start();
if(isset($_POST['login']))
{

//foreach($_POST as $k=>$v)echo $k.'='.$v.'<br>';
 	//include_once 'db.php';
    $chk=0;
	$login_id=trim($_POST['UserName']);
	$pass=$_POST['Password'];
	$sql="SELECT * FROM Users WHERE Userid='".$login_id."' AND Pwd='".$pass."' LIMIT 1";
	$res=mysql_query($sql);
	if($res && mysql_num_rows($res)>0)
	{
		$row=mysql_fetch_assoc($res);
		$_SESSION['UserID']=$row['Userid'];
        $chk=1;


          echo "<form name=\"Form1\" id=\"Form1\" method=\"post\">";
          echo "<table frame=\"box\" width=\"100%\" align=\"center\">";
          echo "<tr>";
          echo "<td bgcolor=\"#C7D8DC\"  align=\"center\" style=\"color:#800000; font-size:14px;\"><b>Description</b> </td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td align=\"center\">";
          echo "<textarea name=\"descrps\"  id=\"descrps\" style=\"width:440px; height:120px;\">";
          echo $_SESSION['desc'];
          echo "</textarea>";
          echo "</td>";
          echo "</tr>";
          echo "<tr>";
          //echo "<td></td>";
          echo "<td align=\"center\">";
          echo "<input type=\"submit\" name=\"adddes\" id=\"adddes\" value=\"SUBMIT\" onclick=\"javascript:validators();\"/>";
          echo "</td>";
          echo "</tr>";
          echo "</table>";
          echo "</form>";


		//header("Location:http://localhost/Research/sample.php?id=+15");
		exit;
	}

    else
         {
		    $errMessage="You are not Authenticate User!";
            //echo $errMessage;
       //echo $_SESSION['error'];
	   //header("Location:index.html");

       $_SESSION['error']=$errMessage;

	}
}

?>
<?php
if(!($_POST['add']))
{

			//$error=$_POST['company'];

    		//$sql="call sp_search('".$symbolselected."')";
	$sql="call sp_description('".$id."')";
			$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
			$sql_num=mysql_num_rows($sql_result);

    $sql_row = mysql_fetch_array($sql_result);
    $id=$sql_row['id'];
    $symbol=$sql_row['Symbol'];
    $description=$sql_row['Description'];
    $_SESSION['desc']=$description;
  if(!empty($description))
 {
?>



<table border="0" cellspacing="0" cellpadding="10">
<tr>
<td align="center" style="color:#4F0000; font-size:13px;"><b><?php echo $symbol; ?></b></td>
<td width="77%">&nbsp;</td>
<td><a href="#" id="user" name="user" style="color:#4F0000; text-decoration:none; font-size:13px;" onclick="javascript:login('login1');"><b>UPDATE</b></a></td>
</tr>
</table>
<table frame="box" cellspacing="0" bgcolor="#DBEEF3" cellpadding="10">
<tr >
<td></td>
<td style="width:450px; height:9px;"><font size="2" color="#8080C0"><b><?php echo $description; ?></b></font></td>
</tr>
</table>
 <?php
 }
 }
  ?>


 <div id="login1" style="display:none;  border-width:5px;  position:absolute; top:50px;
        left:180px;" name="login1">
      <!-- <iframe src="u.php"></iframe>-->
<?php //error_reporting (E_ALL ^ E_NOTICE); ?>

	<form id="frmLogin" name="frmLogin" method="post">
	  <table width="190" border="1" height="30" cellspacing="0" cellpadding="0" bgcolor="#DDE1E4" align="left">

        <tr>
        <td>
        <table width="190" border="0" height="30" cellspacing="0" cellpadding="0" bgcolor="#DDE1E4" align="left">
        <tr>
               <td colspan="2" align="center"><font size="2" color="maroone">Login Authenticate User! </td>
        </tr>
        <tr>
          <td colspan="2" align="center" id="error" class="error" ><font size="2" color="red"><?php echo $_SESSION['error']; // $errMessag; ?>&nbsp;</td>
        </tr>

  <tr>
  <td > UserName
  </td>
  <td>
  <input type="text" value="" name="UserName" id="UserName" size="10"/>
  </td>
  </tr>
 <tr>
  <td> Password
  </td>
  <td>
  <input type="password" value="" name="Password" id="Password" size="11"/>
  </td>
</tr>
<tr>
<td colspan="2">
<center> <a>
<input type="submit" value="Login" name="login" id="login" onclick="return validateLogin();"/></center>
</td>
</tr>

</table>

</td>
</tr>
      </table>
      </form>
</div>
 <?php
echo $login_id;
echo $pass;
 ?>


<?php

if(empty($description))
{
?>
<body onload="login('login1');">
<?php
$id=$_GET['id'];
 if(isset($_POST['add']))
	{
		if(isset($_POST['descrp']))
			{
				   $descrp = $_POST['descrp'];

			}

			$sql="call sp_symbdescrp('".$id."','".$descrp."')";
	    	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
		    $sql_row = mysql_fetch_array($sql_result);

	if($sql_result)
	{
?>
<script language="javascript" type="text/javascript">
	alert('Successfully Updated!');
	window.opener.location.reload();
	self.close();
</script>
<?php
}
}
?>

<?php
}
?>
