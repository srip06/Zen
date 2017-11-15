<?php
		if(isset($_POST['add']))
	 	    {

			 {

    		  if(isset($_POST['usrid']))
			   		$usrid = $_POST['usrid'];

              if(isset($_POST['fname']))
			   		$fname = $_POST['fname'];

              if(isset($_POST['mname']))
			   		$mname = $_POST['mname'];

              if(isset($_POST['lname']))
			   		$lname = $_POST['lname'];

			  if(isset($_POST['pwd']))
			 		$pwd = $_POST['pwd'];

			  if(isset($_POST['mail']))
					$mail = $_POST['mail'];
			 }
		include_once 'db.php';
			$sql1="call sp_user_insert('".$usrid ."','".$fname."','".$mname."','".$lname."','".$pwd."','".$mail."')";
	    	$result1=mysql_query($sql1) or exit("Sql Error".mysql_error());
		   //$sql_row1 = mysql_fetch_array($sql_result1);
			}

	?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<script language="javascript">
function echeck(str) {

var at="@"
var dot="."
var lat=str.indexOf(at)
var lstr=str.length
var ldot=str.indexOf(dot)
if (str.indexOf(at)==-1){
alert("Invalid E-mail ID")
return false
}

if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
alert("Invalid E-mail ID")
return false
}

if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
alert("Invalid E-mail ID")
return false
}

if (str.indexOf(at,(lat+1))!=-1){
alert("Invalid E-mail ID")
return false
}

if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
alert("Invalid E-mail ID")
return false
}

if (str.indexOf(dot,(lat+2))==-1){
alert("Invalid E-mail ID")
return false
}

if (str.indexOf(" ")!=-1){
alert("Invalid E-mail ID")
return false
}

return true
}

function ValidateForm(){
var emailID=document.form.mail

if ((emailID.value==null)||(emailID.value=="")){
alert("Please Enter your Email ID")
emailID.focus()
return false
}
if (echeck(emailID.value)==false){
emailID.value=""
emailID.focus()
return false
}
return true
}
</script>
<script type="text/javascript">
function NewUser()
	{
		if (document.getElementById('usrid').value == "")
		{
			alert("UserName cannot be empty");
			document.getElementById('usrid').focus();
            document.getElementById('usrid').select();
			return false
		}
		if (document.getElementById('fname').value == "")
		{
			alert("First Name cannot be empty");
			document.getElementById('fname').focus();
			document.getElementById('fname').select();
			return false
		}
		if (document.getElementById('mname').value == "")
		{
			alert("Middle Name cannot be empty");
			document.getElementById('mname').focus();
			document.getElementById('mname').select();
			return false
		}
		if (document.getElementById('lname').value == "")
		{
			alert("Last Name cannot be empty");
			document.getElementById('lname').focus();
			document.getElementById('lname').select();
			return false
		}
		if (document.getElementById('pwd').value == "")
		{
			alert("Password cannot be empty");
			document.getElementById('pwd').focus();
			document.getElementById('pwd').select();
			return false
		}
		if (document.getElementById('rpwd').value == "")
		{
			alert("Varify password cannot be empty");
			document.getElementById('rpwd').focus();
			document.getElementById('rpwd').select();
			return false
		}
		else if (document.getElementById('pwd').value != document.getElementById('rpwd').value)
		{
			alert("Password & Confirm Password Should be same");
			document.getElementById('rpwd').focus();
			document.getElementById('rpwd').select();
			return false
		}
	if (document.getElementById('mail').value == "")
		{
        alert("Enter Email Id");
        document.getElementById('mail').focus();
        document.getElementById('mail').select();
     return false;
   	     }
	}

</script>
</HEAD>
<BODY bgcolor="#EFEFEF">
 <!--[if gte IE 6]>
<div style="width: 558px; height:10px; background-color:#305C89">
</div>
<div style="width: 558px; height:10px; background-color:#295076">  </div>
<span style="position: absolute; top:21px; left:20px; color:#FFFFFF; Font-size:20px; Font-weight:bold; ">
Create Account</span>
<div style="width: 558px; height:25px; background-color:#D7DFE6">
<span style="position: absolute; top:55px; left:20px; color:#3C3C7D; Font-size:17px; Font-weight:bold; ">
Enter your details
</span>
</div>
<![endif]-->
<!--[if !IE]>--><div style="width: 558px; height:17px; background-color:#305C89">
</div>
<div style="width: 558px; height:17px; background-color:#295076">  </div>
<span style="position: absolute; top:15px; left:16px; color:#FFFFFF; Font-size:20px; Font-weight:bold; ">
Create Account</span>
<div style="width: 558px; height:25px; background-color:#D7DFE6">
<span style="position: absolute; top:44px; left:16px; color:#3C3C7D; Font-size:17px; Font-weight:bold; ">
Enter your details
</span>
</div>
<!--<![endif]-->
  <form name="form" method="post" onSubmit="return ValidateForm()">
           <table width="100%" style="font-family:Times New Roman;" border="0" cellspacing="5">

<tr>
  <td>* User Name </td>
  <td><input type="text"  name="usrid" id="usrid"></td>
</tr>

<tr>
  <td>* First Name </td>
  <td> <input type="text"  name="fname" id="fname"></td>
</tr>

<tr>
  <td>&nbsp;&nbsp; Middle Name </td>
  <td> <input type="text"  name="mname" id="mname"></td>
</tr>

<tr>
  <td>* Last Name </td>
  <td> <input type="text"  name="lname" id="lname"></td>
</tr>

<tr>
  <td>* Password </td>
  <td><input type="password" name="pwd" id="pwd"></td>
</tr>

<tr>
  <td>&nbsp;&nbsp; Verify Password </td>
  <td> <input type="password" value="" name="rpwd" id="rpwd"></td>
</tr>

<tr>
  <td>* Enter MailID </td>
  <td> <input type="text"  name="mail" id="mail"></td>
</tr>
</table>
<br />
<div style="width: 558px; height:55px; background-color:#D7DFE6">
 <!--[if gte IE 6]> <input style="position: absolute; top:355px; left:180px; border-left:#295076; border-right:#295076; border-bottom:#295076; border-top:#295076; background-color:#295076; height:23px; width:120px; color:#FFFFFF; Font-size:12px; Font-weight:bold;" type='submit' name="add" id="add"   onclick="return NewUser();" value='Create User' />
<span style="position: absolute; top:357px; left:305px;">or </span>
<input type="reset"  class='cancel' value="Reset" style="position: absolute; top:357px; left:330px;  height:20px; color:#800000; Font-size:12px; Font-weight:bold;">
<![endif]-->
<!--[if !IE]>-->
<input style="position: absolute; top:310px; left:180px; border-left:#295076; border-right:#295076; border-bottom:#295076; border-top:#295076; background-color:#295076; height:23px; width:120px; color:#FFFFFF; Font-size:12px; Font-weight:bold;" type='submit' name="add" id="add"   onclick="return NewUser();" value='Create User' />
<span style="position: absolute; top:313px; left:305px;">or </span>
<input type="reset"  value="Reset" style="position: absolute; top:313px; left:330px; height:20px; color:#800000; Font-size:12px; Font-weight:bold;">
<!--<![endif]-->
</div>
</form>

</BODY>
</HTML>


