<?php error_reporting (E_ALL ^ E_NOTICE);
session_start();
$exchange=$_GET['id']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Symbol</title>

<script language="JavaScript" type="text/javascript">

 function searchsym()
{
	valid = true;

	if(document.form1.txtSearch.value == "")
		{
			alert("Enter Symbol");
			return false;
		}

	else if(document.form1.txtSearch.value.length < 3)

		 {
			 alert("Enter Min 3 Characters");
			 return false;
		 }

		 return valid;
}


function link(id)

{
	//alert(id);
window.open("description.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=500,height=200,left=450,top=300");
}

  function link1(id)

{
	//alert(id);
	window.open("enterdescr.php?id="+id,"mywindow","location=no',resizable=no,status=no,scrollbars=1,toolbar=no,width=500,height=200,left=450,top=300");
}

function popup(url) 
{
 var width  = 500;
 var height = 200;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
</script>
<script language="text/javascript">
function symbol()
{
//alert('id');
}

</script>
<script type="text/javascript">
            var nameArray = null;
        </script>
        
         <script type="text/javascript">
            function doSuggestionBox(text) { // function that takes the text box's inputted text as an argument
                var input = text; // store inputed text as variable for later manipulation
                // determine whether to display suggestion box or not
                if (input == "") {
                    document.getElementById('divSuggestions').style.visibility = 'hidden'; // hides the suggestion box
                } else {
                    document.getElementById('divSuggestions').style.visibility = 'visible'; // shows the suggestion box
                    doSuggestions(text);
                }
            }
            function outClick() {
                document.getElementById('divSuggestions').style.visibility = 'hidden';
            }
            function doSelection(text) {
                var selection = text;
                document.getElementById('divSuggestions').style.visibility = 'hidden'; // hides the suggestion box
                document.getElementById("txtSearch").value = selection;
            }

            function changeBG(obj) {
                element = document.getElementById(obj);
                oldColor = element.style.backgroundColor;
                if (oldColor == "purple" || oldColor == "") {
                     element.style.cursor = "pointer";
                }
            }
            function doSuggestions(text) {
                var input = text;
                var inputLength = input.toString().length;
                var code = "";
                var counter = 0;
                while(counter < this.nameArray.length) {
                    var x = this.nameArray[counter]; // avoids retyping this code a bunch of times
                    if(x.substr(0, inputLength).toLowerCase() == input.toLowerCase()) {
                        code += "<div id='" + x + "'onmouseover='changeBG(this.id);' onMouseOut='changeBG(this.id);' onclick='doSelection(this.innerHTML)'>" + x + "</div>";
                    }
                    counter += 1;
                }
                if(code == "") {
                    outClick();
                }
                document.getElementById('divSuggestions').innerHTML = code;
                document.getElementById('divSuggestions').style.overflow='auto';
            }
        </script>


</head>
<body>
<form name="form1" method="post">
<p><table border="0">
		<tr>
 			 <td><label name="symbol" onmoseover="javascript:symbol();"><b>Symbol&nbsp;</label></td>
			 <td bgcolor="#065D88"><input style="border-color:#48819F; width:90px; font-size:12px; font-family:Times New Roman;" type="text" id="txtSearch" name="txtSearch" value=""  onkeyup="doSuggestionBox(this.value);" />
     <?php
    include_once('db.php');
 $query = "SELECT distinct Symbol FROM tbl_daily_trade_details  ORDER BY Symbol ASC";
        $result = mysql_query($query);
        $counter = 0;
        echo("<script type='text/javascript'>");
        echo("this.nameArray = new Array();");
        if($result) {
            while($row = mysql_fetch_array($result)) {
                echo("this.nameArray[" . $counter . "] = '" . $row['Symbol'] ."';");
                $counter += 1;
            }
        }
        echo("</script>");
        ?>
<input type="submit" name="search" id="search" value=">>" style=" width:30px; height:18px; background-color:#065D88; border:3px; cursor:hand; border-color:rgb(127,173,189); color:white;rgb(127,173,189);" onclick="javascript:return searchsym(); return empty();" ></td>
</tr>
<div class="suggestions" id="divSuggestions" style="visibility: hidden; border: gray 1px solid; width: 35%; background-color:#F7F9FB; font-size:12px; font-family:Times New Roman; height: 128px; position: absolute; top:42px; left:67px;">
</div>
  </table>
 </form>

<?php

if(isset($_POST))
{
if(isset($_POST['txtSearch']))
{
	$symbolselected = $_POST['txtSearch'];
}
if(empty($exchange))
 {
 $exchange='nseblue';
 }
          if($exchange == 'nseblue')
{
     		$sql="call sp_search('".$symbolselected."')";
}
        if($exchange == 'bseblue')
{
     		$sql="call sp_search_bse('".$symbolselected."')";
}


	$sql_result=mysql_query($sql) or exit("Sql Error".mysql_error());
			$sql_num=mysql_num_rows($sql_result);
    $sql_row = mysql_fetch_array($sql_result);
    $id=$sql_row['id'];
    $symbol=$sql_row['Symbol'];
    echo "<table style=\"color:#3184BD; font-size:12px; font-family:Times New Roman;\" border=\"0\" cellspacing=\"0\" width=\"100%\" cellpadding=\"6\">";

    echo "<tr>";
    echo "<td  align=\"left\" id=\"id\" name=\"id\"> <a style=\"text-decoration: none; color:#3184BD; font-size:12px; font-family:Times New Roman;\" href=\"#\" name=\"id\" id=\"id\"  onclick=\"javascript:link1($id);\"><img style=\"border:none;\" src=\"/index/images/linkicon.jpg\">&nbsp;<b>".$sql_row['Symbol']."</b></a>"."</td>";

    echo "</tr>";
    echo "<tr bgcolor=\"#DBEEF3\">";
	echo "<th align=\"left\" style=\"width:270px;\"> Stock Name: </th>";
	echo "<td align=\"left\" style=\"width:270px;\">".$sql_row['Symbol']."</td>";

	echo "<th align=\"left\" style=\"width:270px;\"> Volume: </th>";
	echo "<td  align=\"left\" style=\"width:270px;\">".$sql_row['Qty_traded']."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<th align=\"left\" style=\"width:270px;\"> Open_Price: </th>";
	echo "<td align=\"left\" style=\"width:270px;\">".$sql_row['Open_price']."</td>";

	echo "<th align=\"left\" style=\"width:270px;\"> Close_Price: </th>";
	echo "<td align=\"left\" style=\"width:270px;\">".$sql_row['Close_price']."</td>";
	echo "</tr>";

    echo "<tr  bgcolor=\"#DBEEF3\">";

	echo "<th align=\"left\" style=\"width:270px;\"> High_Price: </th>";
	echo "<td  align=\"left\" style=\"width:270px;\">".$sql_row["High_price"]."</td>";

	echo "<th align=\"left\" style=\"width:270px;\"> Low_Price: </th>";
	echo "<td  align=\"left\" style=\"width:270px;\">".$sql_row["Low_price"]."</td>";

    echo "</tr>";
    if($exchange == 'nseblue')
{
	echo "<tr>";

	echo "<th align=\"left\" style=\"width:270px;\"> 52weekPrice_High: </th>";
	echo "<td  align=\"left\" style=\"width:270px;\">".$sql_row["High_week_52"]."</td>";

	echo "<th align=\"left\" style=\"width:270px;\"> 52weekPrice_Low: </th>";
	echo "<td  align=\"left\" style=\"width:270px;\">".$sql_row["Low_week_52"]."</td>";

	echo "</tr>";
}

	echo "</table>";
	$descrp=$sql_row['Description'];
    echo "<table border=\"0\" width=\"50%\" bgcolor=\"#DBEEF3\" style=\"color:#3184BD;\"  name=\"result\" id=\"result\">";
    echo "<tr>";
    echo "<th valign=\"top\" style=\"font-size:12px; font-family:Times New Roman; font-weight:bold;\"> Description: </th>";
    echo "<td width=\"20\"></td>";
    echo "<td><div style=\"width:284px; height:45px; overflow:hidden; text-overflow:ellipsis; font-size:12px; font-family:Times New Roman; font-weight:bold;\">".$descrp."</div></td>";
    echo "</tr>";
    echo "</table>";
    $length=strlen($descrp);
}
//echo $length;
    if($length>100)
    {
    echo "<table align=\"right\">";
    echo "<tr>";
    echo "<td><a href=\"#\" style=\"position:relative; top:-23px; left:-2px; text-decoration: none;\" onclick=\"link($id);\">...</a></div></td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";

    }

    if(empty($sql_row))
{
echo "
<script type=\"text/javascript\">
function empty()
{
alert('Symbol Does Not Exist!');
}

</script>";
}
?>
</body>
</html>