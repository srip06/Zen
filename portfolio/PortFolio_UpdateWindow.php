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
<title>Portfolio</title>
<link rel="stylesheet" href="calendar.css"/>
<script language="JavaScript" src="calendar_db.js"></script>
<script language="JavaScript" type="text/javascript">
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
			include_once 'db.php';
			$sql="call sp_search_portfolio('".$symbol."')";
	    	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
		    $sql_row = mysql_fetch_array($sql_result);
	}
			 if(isset($_POST['exchange']))
					$exchange = $_POST['exchange'];
					else
					$exchange='NSE';

?>

<body>
<form name="form1" method="post">
<p> <table border="0" cellpadding="6" cellspacing="0">
		<tr>
            <td colspan="3">
                <b>Symbol:</b> &nbsp;&nbsp;
                <input type="text"  name="symbol" id="visi" size="10"></input>
             &nbsp;&nbsp;
                <input type="submit" value="Search" name="search" onclick="javascript:return searchsym();"></input>
            </td>
           
        </tr>

	
<?php
 
if(!empty($_POST['checkbox']))
{

		?>
        <tr>
             <!--<td align="center"><b>Exchange</b></td>-->
             <td align="center"><b>Stock</b></td>
             <td align="center"><b>Quantity</b></td>
             <td align="center"><b>Buy Price</b></td>
		     <td align="center"><b>Date</b></td>
  		</tr>
         
        <tr>

              <td>
            <?php
			  if (!empty($sql_row))
			  {
				 
			 echo "<input type=\"text\" id=\"stock\" name=\"stock\" size=\"10\" value=".$sql_row['Symbol']." >" ."</input>"."</td>";
			 
			  }
			  else
			   echo "<input type=\"text\" id=\"stock\" name=\"stock\" size=\"10\" value=\"\" >" ."</input>"."</td>";
			 ?> 
               
             </td>
              <td>
                    <input type="text"  name="quantity" id="quantity" size="10"></input>  
              </td>
              <td>
                    <input type="text"  name="buyPrice" id="buyPrice" size="10"></input>   
              </td>
              <td id="cal1" style="display:block">
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
               <!--<td><SELECT NAME="exchange" style="display:none;">
      			 <OPTION VALUE="NSE" <?php if($exchange == 'NSE') echo "Selected"; ?> >NSE</OPTION>
      			 <OPTION VALUE="BSE" <?php if($exchange == 'BSE') echo "Selected"; ?> >BSE</OPTION>
    			 </SELECT>
              </td>-->
			  <?php
}

	 elseif(empty($_POST['checkbox']))
{

//echo $id;
if(isset($_POST))
{
			
			 include_once 'db.php';
			$sql6="select Stock_exchange,Symbol,Quantity,Buy_price,Date from tbl_port_folio where id = '".$id."'";
			$sql_result6=mysql_query($sql6) or exit("Sql Error".mysql_error());
			$sql_num6=mysql_num_rows($sql_result6);
          
	  $sql_row6 = mysql_fetch_array($sql_result6);
		{
		?>


<table border="0" cellpadding="6" cellspacing="0">
	        <tr>
           
           <?php //echo $sql_row['Stock_exchange']; if($exchange == 'nse') echo "Selected";?> 
           
        </tr>
        <tr>
             <!--<td align="center"><b>Exchange</b></td>-->
             <td align="center"><b>Stock</b></td>
             <td align="center"><b>Quantity</b></td>
             <td align="center"><b>Buy Price</b></td>
		    <td align="center"><b>Date</b></td>
  		</tr>
         
        <tr>

              <td>
            <?php 
			  
			 echo "<input type=\"text\" id=\"stock\" name=\"stock\" size=\"10\" value=".$sql_row6['Symbol']." >" ."</input>"."</td>";
				?>
               
             </td> 
              <td>
                    <input type="text"  name="quantity" id="quantity" size="10" value="<?php echo $sql_row6['Quantity']; ?> "></input>  
              </td>
              <td>
                    <input type="text"  name="buyPrice" id="buyPrice" size="10" value="<?php echo $sql_row6['Buy_price']; ?>"></input>   
              </td>
              <td id="cal1" style="display:block">
                    <input id="date" name="date" type="text" size="10" value="<?php echo $sql_row6['Date']; ?>" ></input>
              <script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form1',
		// input name
		'controlname': 'date'
	});
	</script>
              </td>  
   <td><SELECT style="display:none;" NAME="exchange">
      			 <OPTION VALUE="<?php echo $sql_row6['Stock_exchange']; ?>" ><?php echo $sql_row6['Stock_exchange']; ?></OPTION>

    			 </SELECT>
              </td>
  <tr align="center"><td>
  <td colspan="4">
<input name="update" type="submit" id="update" value="Update" > </input></td>
</tr>
</table>  
<?php
}
}
}
?>    
         </tr>
  </table>
  

</body>
</html>

	


<?php
if (isset($_POST['update'])  && !empty($_POST['checkbox']))
{ 
$exchange=$_POST['exchange'];
$stock=$_POST['stock'];
//$as=$_POST['as'];
$qty=$_POST['quantity'];
$bprice = $_POST['buyPrice'];
$date=$_POST['date'];

//foreach($checked as $id){
 foreach($_POST['checkbox'] as $id)
 {

//$sql = "UPDATE tbl_port_folio SET Stock_exchange='$exchange[$id]', Symbol='$stock[$id]', Quantity='$qty[$id]',Buy_price='$bprice[$id]',Date='$date[$id]', WHERE id='$id'";
include_once 'db.php';
$sql4 = "UPDATE tbl_port_folio SET Stock_exchange='".$exchange."', Symbol='".$stock."', Quantity='".$qty."',Buy_price='".$bprice."',Date='".$date."' WHERE id='".$id."' ";
//$sql2="call sp_portfolio_select('".$id."' ",'".$exchange."','".$stock."''".$qty."','".$bprice."','".$date."')";


$result4 = mysql_query($sql4) or die(mysql_error());
} 
//if successful redirect to records.php 
if($result4){
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
if(!($_POST['search']))
	 	    {   
        	$user = $_SESSION['UserID'];
// include_once 'db.php';
	$query="select id,UserName, Stock_exchange,Symbol,Quantity,Buy_price,round(Buy_price * Quantity,2) As 'Value' from tbl_port_folio where UserName = '".$user."'";
	//$query="call sp_portfolio_select('".$user."')";
	$database=mysql_query($query)or exit("Sql Error".mysql_error());
	
?>

<table name="results" id="results" border="1" cellpadding="0" cellspacing="0" width ="100%"  bgcolor="#9BBB59" style="display:none;">
<tr>
 <td width="1" bordercolor="#9BBB59"></td>
 <!--<td align="center" width="20%"><b>UserName</b></td> -->
 <td align="center" width="12%"><b>Stock<br>Exchange</b></td>
 <td align="center" width="20%"><b>Symbol</b></td> 
 <td align="center" width="12%"><b>Quantity</b></td> 
 <td align="center" width="12%"><b>Buy_Price</b></td> 
 <td align="center" width="12%"><b>Value</b></td> 
</tr>

<?php
//while($num_row=mysql_fetch_array($database))
  //{
	//$num_row1=mysql_num_rows($database);
$num_row=mysql_fetch_array($database);
	$id=($_GET['id']);
			
	// $id=$num_row['id'];
?>	
	<tr>
    
		<td bgcolor="#A6D2FF"  width="2%">
    	<input name="checkbox[]" type="checkbox" id="checkbox" value="<?php echo  $id; ?>" checked>
   		</td>

    <!--<td  bgcolor="#A6D2FF" align="center" id="stk_exg"><?php echo $num_row['UserName']; ?></td>
	-->
	<td  bgcolor="#A6D2FF" align="center" id="stk"><?php echo $num_row['Stock_exchange']; ?></td>
	<td  bgcolor="#A6D2FF" align="center"><?php echo $num_row['Symbol']; ?></td>
	<td  bgcolor="#A6D2FF" align="center" id="qty"><?php echo $num_row['Quantity']; ?></td>
	<td  bgcolor="#A6D2FF" align="center" id="buypr"><?php echo $num_row['Buy_price']; ?></td>
	<td  bgcolor="#A6D2FF" align="center"><?php echo $num_row['Value']; ?></td>
	<!--<td  bgcolor="#A6D2FF" align="center"><?//php echo $sql_row['Date'];?></td> -->
	</tr>
<?php
}
//}
?>
</table>
</form>
