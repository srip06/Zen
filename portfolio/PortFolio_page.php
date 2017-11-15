<?php
session_start();
ob_start();
ini_set('display_errors','Off');
include_once ('db.php');
$exchange=$_GET['id'];
?>
 <!--[if gte IE 6]>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<![endif]-->
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portfolio</title>
<link rel="stylesheet" href="/index/javascript/calendar.css"/>
<script language="JavaScript" src="/index/javascript/calendar_db.js"></script>
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
 <script language="JavaScript" type="text/javascript" src='/index/javascript/datetimepicker_css.js' > </script>

<style type="text/css">
.table
{
font-size:13px;
font-family:Times New Roman;
border-color: light gray;
}

</style>
<script language="JavaScript" type="text/javascript">
function link()
{
	var chks = document.getElementsByName('checkbox[]');
	var hasChecked = false;
	var chkvalue ='';
	for (var i = 0; i < chks.length; i++)
			{
				if (chks[i].checked)
				{
			 if(hasChecked = true)
                {
				 chkvalue =chks[i].value;
                window.open ("portFolio_UpdateWindow.php?id="+chkvalue,"mywindow","location=1,status=1,scrollbars=1,width=600,height=200,left=450,top=300");
                }
				break;
				}
			}
}

function searchsym()
{
	valid = true;

	if(document.form1.symbol.value == "")
		{
			alert("Enter Symbol");
			return false;
		}

	else if(document.form1.symbol.value.length < 3)

		 {
			 alert("Enter Min 3 Characters");
			 return false;
		 }

		 return valid;
}

</script>

<script language="JavaScript" type="text/javascript">

function add()
{
	valid = true;

	if(document.form1.quantity.value == "")
		{
			alert("Enter Quantity");
			return false;
		}

	if(document.form1.buyPrice.value == "")

		 {
			 alert("Enter Buy Price");
			 return false;
		 }

	if(document.form1.date.value == "")

		 {
			 alert("Enter Date");
			 return false;
		 }

	return valid;
}

</script>
<script language="JavaScript" type="text/javascript">

function validate()
	{
	var chks = document.getElementsByName('checkbox[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
			{
				if (chks[i].checked)
				{
				hasChecked = true;
				break;
				}
			}
			if (hasChecked == false)
			{
			alert("Please select at least one.");
			return false;
			}
	return true;
	}

function validate1()
	{



	var chks = document.getElementsByName('checkbox[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
			{
				if (chks[i].checked)
				{
				hasChecked = true;
				break;
				}
			}
			if (hasChecked == false)
			{
			alert("Please select at least one.");
			return false;
			}
	return true;

	}

/*
function deletebt()
{
	valid = true;
      if(document.form1.checkbox.checked = "Null")
	   {
		  alert("No CheckBox Selected");
		  return false;
	   }
	   else
	   {
		   alert("Row Deleted");
		   return false;
	   }
	  return valid;
}
//document.getElementById('buyPrice') == ""
		//  )
	      //   {
		      // var abc = document.getElementById('qty');
			//	document.write(abc);
			//	document.forms['form1'].element['visi'] = abc;
			//return false;
			    //}
*/
	function SingleSelect(regex,current)
 		{
			 re = new RegExp(regex);

			 for(i = 0; i < document.form1.elements.length; i++)
			 {

			 elm = document.form1.elements[i];

			 if (elm.type == 'checkbox')
				 {
					if (re.test(elm.name))
					{
					 elm.checked = false;
					}
				}
		 	}

 			current.checked = true;
		}


</script>
</head>
<?php

if(isset($_POST['search']))
	{
		if(isset($_POST['symbol']))
			{
				   $symbol = $_POST['symbol'];

			}
				$sql="call sp_search_portfolio_nse('".$symbol."')";
  			if($exchange == 'nseblue')
{
			$sql="call sp_search_portfolio_nse('".$symbol."')";
}
        else if($exchange == 'bseblue')
             {
              $sql="call sp_search_portfolio_bse('".$symbol."')";
              }

	    	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
		    $sql_row = mysql_fetch_array($sql_result);
	}
			/* if(isset($_POST['exchange']))
					$exchange = $_POST['exchange'];
					else
					$exchange='NSE';*/

?>

<body>
<form name="form1" method="post">
<p> <table frame="box" width="100%" style="color:#1B68AE; font-weight:bold; border-right:2px solid; border-bottom:3px solid; border-left:1px solid; border-top:1px solid;" cellpadding="4" cellspacing="0">
		<tr>
            <td colspan="3">
                <b>Symbol:</b> &nbsp;&nbsp;
                <input type="text"  name="symbol" id="visi" size="10"></input>
             &nbsp;&nbsp;<input type="submit" style="font-weight:bold; border-color:#1A67AD; cursor:hand;  background-color:#718CC1; color:white;" value="Search" name="search" onclick="javascript:return searchsym();"></input>
            </td>
            </tr>

  <tr>
  <td>&nbsp;<td>
  </tr>

        <tr style="color:#1B68AE; font-weight:bold;">
             <!--<td align="center"><b>Exchange</b></td>-->
             <td align="center">Stock</td>
             <td align="center">Quantity</td>
             <td align="center">Buy Price</td>
		     <td align="right">Date</td>
  		</tr>

        <tr>
        <!-- <td><SELECT NAME="exchange">
      			 <OPTION VALUE="NSE" <?php //if($exchange == 'nse') echo "Selected"; ?> >NSE</OPTION>
      			 <OPTION VALUE="BSE" <?php //if($exchange == 'bse') echo "Selected"; ?> >BSE</OPTION>
    			 </SELECT>
              </td>  -->

                          <td align="center">
            <?php
			  if (!empty($sql_row))
			  {
?>
			 <input type="text" id="stock" name="stock" size="16" value="<?php echo $sql_row['Symbol']; ?>"></input></td>
			 <?php
			  }
              else
              {
			   echo "<input type=\"text\" id=\"stock\" name=\"stock\" size=\"16\" value=\"\" >" ."</input>"."</td>";
			   }
			 ?>

             </td>
              <td  align="center">
                    <input type="text"  name="quantity" id="quantity" size="10"></input>
              </td>
              <td align="center">
                    <input type="text"  name="buyPrice" id="buyPrice" size="10"></input>
              </td>
              <td align="center" id="cal1" style="display:block;  position:absolute; left:490px; top:103px;">
                    <input id="date" name="date" type="text" size="10" ></input>
                            <script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'date'
	});
	</script>
              </td>
              <td width="10%">&nbsp;</td>
              <td width="10%">&nbsp;</td>
              <td width="10%">&nbsp;</td>
              <td width="10%">&nbsp;</td>
         <tr>
             <td colspan="9"><center>
                    <input  type="submit" value="Add" name="add" id="add" onclick="javascript:return add();"></input>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="Reset" value="Reset"></input></center></td>
         </tr>
                <tr align="right">
<td colspan="10"> <input  style="background-color:green;  border:0px; color:white; cursor:hand;" name="delete" type="submit" id="delete" value="Delete" onClick="javascript:delete();"> </input>
<input style="background-color:#0087CB; color:white; border:0px; cursor:hand;" name="update" type="button" id="update" value="Modify" onclick="javascript:link(); validate();"> </input></td>
</tr>
  </tr>
  </table>

<br />

	<?php
		if(isset($_POST['add']))
	 	    {

			 {

     if(isset($_SESSION['UserID']));
       				$user = $_SESSION['UserID'];

                       if(empty($exchange))
                       {
                       $exchange = 'nseblue';
                       }

 			  if(isset($_POST['stock']))
			   		$stock = $_POST['stock'];


			  if(isset($_POST['quantity']))
			 		$quantity = $_POST['quantity'];


			  if(isset($_POST['buyPrice']))
					$buyprice = $_POST['buyPrice'];

			  if(isset($_POST['date']))
					$date = $_POST['date'];
			 }
 			$sql1="call sp_portfolio_insert('".$user."','".$exchange."','".$stock."','".$quantity."','".$buyprice."','".$date."')";
	    	$result1=mysql_query($sql1) or exit("Sql Error".mysql_error());
		   //$sql_row1 = mysql_fetch_array($sql_result1);
			}

	?>



<?php

  // Check if delete button active, start this
if (isset($_POST['delete'])  && !empty($_POST['checkbox']))
	 {

        foreach($_POST['checkbox'] as $id)
		{
include_once 'db.php';
		$sql3 = "DELETE FROM tbl_port_folio WHERE id='".$id."' ";
		$result3 = mysql_query($sql3);
		}
  	}
?>


<?php
if(!($_POST['search']))
	 	    {
        	$user = $_SESSION['UserID'];
 if(empty($exchange))
 {
 $exchange='nseblue';
 }
	if($exchange == 'nseblue')
{
			$sql="call sp_portfolio_select_nse('".$user."')";
}
        else if($exchange == 'bseblue')
             {
              $sql="call sp_portfolio_select_bse('".$user."')";
                         }
//	$query="select id,UserName, Stock_exchange,Symbol,Quantity,Buy_price,round(Buy_price * Quantity,2) As 'Value' from tbl_port_folio where UserName = '".$user."'";
	//$query="call sp_portfolio_select('".$user."')";

	$database=mysql_query($sql)or exit("Sql Error".mysql_error());

?>
 <script type="text/javascript">
function checkUncheckAll(groupName, checkState)
{
var groupObj = document.forms[0].elements[groupName];
var groupLen = groupObj.length;
for(var groupIdx=0; groupIdx<groupLen; groupIdx++)
{
groupObj[groupIdx].checked = checkState;
}
return;
}
</script>
<table align="right" name="results" id="results" frame="border" class="table" cellpadding="3" cellspacing="3" width ="100%"  style="font-size:13;">
<tr>

 <td bgcolor="CDE9FB">
 <input name="checkAll" style="cursor:hand;" type="checkbox" id="checkAll" value="<?php echo $id; ?>" onclick="javascript:checkUncheckAll('checkbox[]', this.checked)" />
 </td>
 <td bgcolor="CDE9FB" align="center" ><b>Symbol</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Close Price</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Change</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Quantity</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Buy Price</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Day`s Gain</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Day`s Gain %</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Overall Gain</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Overall Gain %</b></td>
 <td bgcolor="CDE9FB" align="center" ><b>Latest Value</b></td>
  <td bgcolor="CDE9FB" align="center" ><b>Buy Date</b></td>
</tr>

<?php
while($num_row=mysql_fetch_array($database))
  {

	     $id=$num_row['id'];
?>
	<tr>

		<td bgcolor="F8F8F8"  width="2%">
    	<input  style="cursor:hand;" name="checkbox[]" type="checkbox" id="checkbox" value="<?php echo $id; ?>" />
   		</td>
    <!--<td  bgcolor="#A6D2FF" align="center" id="stk_exg"><?php //echo $num_row['UserName']; ?></td> -->
	<!--<td  bgcolor="F8F8F8" align="center" id="stk"><?php //echo $num_row['Stock_exchange']; ?></td>-->
	<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Symbol'];?></td>
		<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Close_price'];?></td>
			<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Change'];?></td>
				<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Quantity'];?></td>
					<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Buy_price'];?></td>
	<td  bgcolor="F8F8F8" align="left" id="qty"><?php echo $num_row['Day`s Gain'];?></td>
	<td  bgcolor="F8F8F8" align="left" id="buypr"><?php echo $num_row['Day`s Gain %'];?></td>
	<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Overall Gain'];?></td>
		<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Overall Gain %'];?></td>
	<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['Latest Value'];?></td>
		<td  bgcolor="F8F8F8" align="left"><?php echo $num_row['date'];?></td>
	</tr>

<?php
}
			}


?>
  				</table>
  </form>

</body>
</html>

<!-- Code For Export HTML Table Content To CSV File -->

<script type="text/javascript" src="/index/javascript/jquery-1.3.1.min.js" > </script>
<script type="text/javascript" src="/index/javascript/table2CSV.js" > </script>
<script type="text/javascript" language="javascript">
function getCSVData(){
 var csv_value=$('#results').table2CSV({delivery:'value'});
 $("#csv_text").val(csv_value);
 }
</script>
<form action="export.php" method ="post" >
<input type="hidden" name="csv_text" id="csv_text">
  <!--[if lte IE 7]>
<input type="image" style="position: absolute; top:175px; left:740px;" src="/index/images/save.png" title="Save To CSV File" onclick="getCSVData()"/>
<![endif]-->

  <!--[if gte IE 8]>
<input type="image" style="position: absolute; top:170px; left:740px;" src="/index/images/save.png" title="Save To CSV File" onclick="getCSVData()"/>
  <![endif]-->
</form>









