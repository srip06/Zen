<script language="JavaScript" type="text/javascript">


function link(id)
{ 
	alert(id);
	
	window.open ("/ResearchPro/PortFolio_UpdateWindow.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=770,height=280,left=450,top=300");

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
