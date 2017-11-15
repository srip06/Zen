//function for paging
function Pager(tableName, itemsPerPage) {
    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;
    
    this.showRecords = function(from, to) {
        var rows = document.getElementById(tableName).rows;
              // i starts from 1 to skip table header row
        for (var i = 1; i < rows.length; i++) {
            if (i < from || i > to)  
                rows[i].style.visibility = 'hidden';
            else
                rows[i].style.visibility = 'visible';
        }
    }
    
    this.showPage = function(pageNumber) {
    	if (! this.inited) {
    		alert("not inited");
    		return;
    	}

        var oldPageAnchor = document.getElementById('pg'+this.currentPage);
        oldPageAnchor.className = 'pg-normal';
        
        this.currentPage = pageNumber;
        var newPageAnchor = document.getElementById('pg'+this.currentPage);
        newPageAnchor.className = 'pg-selected';
        
        var from = (pageNumber - 1) * itemsPerPage + 1;
        var to = from + itemsPerPage - 1;
        this.showRecords(from, to);
    }   
    
    this.prev = function() {
        if (this.currentPage > 1)
            this.showPage(this.currentPage - 1);
    }
    
    this.next = function() {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
        }
    }                        
    
    this.init = function() {
        var rows = document.getElementById(tableName).rows;
        var records = (rows.length - 1); 
        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    }

    this.showPageNav = function(pagerName, positionId) {
    	if (! this.inited) {
    		alert("not inited");
    		return;
    	}

    	var element = document.getElementById(positionId);
    	
    	var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal"> Prev </span>';
    	for (var page = 1; page <= this.pages; page++)
        pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span>|';
        pagerHtml += '<span onclick="'+pagerName+'.next();" class="pg-normal"> Next </span>';
        element.innerHTML = pagerHtml;
        }
}



//function for feezing
  var myRow=1;
  var myCol=1;
  var myTable;
  var noRows;
  var myCells,ID;



function setUp(){
	if(!myTable){myTable=document.getElementById("results");}
 	myCells = myTable.rows[0].cells.length;
	noRows=myTable.rows.length;

	for( var x = 0; x < myTable.rows[0].cells.length; x++ ) {
		colWdth=myTable.rows[0].cells[x].offsetWidth;
		myTable.rows[0].cells[x].setAttribute("width",colWdth-4);

	}
}


function right(up){
	if(up){window.clearTimeout(ID);return;}
	if(!myTable){setUp();}

	if(myCol<(myCells)){
		for( var x = 0; x < noRows; x++ ) {
			myTable.rows[x].cells[myCol].style.display="";
		}
		if(myCol >1){myCol--;}

		ID = window.setTimeout('right()',100);
	}
}

function left(up){
	if(up){window.clearTimeout(ID);return;}
	if(!myTable){setUp();}

	if(myCol<(myCells-1)){
		for( var x = 0; x < noRows; x++ ) {
			myTable.rows[x].cells[myCol].style.display="none";
		}
		myCol++
		ID = window.setTimeout('left()',100);

	}
}

function down(up){
	if(up){window.clearTimeout(ID);return;}
	if(!myTable){setUp();}

	if(myRow<(noRows-1)){
			myTable.rows[myRow].style.display="none";
			myRow++	;

			ID = window.setTimeout('down()',100);
	}
}

function upp(up){
	if(up){window.clearTimeout(ID);return;}
	if(!myTable){setUp();}

	if(myRow<=noRows){
		myTable.rows[myRow].style.display="";
		if(myRow >1){myRow--;}
		ID = window.setTimeout('upp()',100);
	}
}



//fuunction for table link  
function popup(url) 
{
 var width  = 500;
 var height = 250;
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
 params += ', titlebar=0';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}

// function to dispaly date for time frame
function datedisplay()
{
	if(document.getElementById('mytimeframe').value = 1)
	{
		document.getElementById('frmdt').style.display = "block";
		document.getElementById('todt').style.display = "none";
	}
}



// function to dispaly Industry and Sector

function getindustry(mymarkettype)
		{
		  //alert(mymarkettype);
		   var strURL="/Research/pages/findindustry.php?mymarkettype="+mymarkettype;
		   if (window.XMLHttpRequest)
 			 {// code for IE7+, Firefox, Chrome, Opera, Safari
			 
  			xmlhttp=new XMLHttpRequest();
  			}
			else
 			 {// code for IE6, IE5
 		 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				
 			 }
			xmlhttp.onreadystatechange=function()
  			{
			
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("inddiv").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}



function getSec(Industry)
		{
		   var strURL="/Research/pages/findsector.php?Industry="+Industry;
		   if (window.XMLHttpRequest)
 			 {// code for IE7+, Firefox, Chrome, Opera, Safari
			 
  			xmlhttp=new XMLHttpRequest();
  			}
			else
 			 {// code for IE6, IE5
 		 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				
 			 }
			xmlhttp.onreadystatechange=function()
  			{
			
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("secdiv").innerHTML=xmlhttp.responseText;
				}
			 }
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
			}
	

// function to dispaly calender 

function showDateSelected(){
   alert("Date selected is "+document.form1.fromdate.value);
   alert("Date selected is "+document.form1.todate.value);
}
function dateverify()
{
	if (document.form1.demo1.value > document.form1.demo2.value)
	{
		alert("To date should be greater than from date");
		return false;
	}
}

function changeValues() {
		
	var cal1=document.getElementById("cal1");
	var cal2=document.getElementById("cal2");
	cal1.length=0;
	cal2.length=0;
	
	var mytimeframe = document.getElementById("mytimeframe").value;
	
	if (mytimeframe == '1')
		{
		cal1.style.display='none';
		cal2.style.display='none';
		dt.style.display='block';
		frmdt.style.display='none';
		todt.style.display='none';
		}
	else if((mytimeframe == '2') || (mytimeframe == '3'))
		{
		cal1.style.display='block';
		cal2.style.display='block';
		dt.style.display='none';
		frmdt.style.display='block';
		todt.style.display='block';
		}
       
    
}
// function for MarketType

function changeValues_exchange()
{	
	var mymarkettype = document.getElementById("mymarkettype").value;
    mymarkettype.length = 0;
	var mystockexchange = document.getElementById("mystockexchange");

	if(mystockexchange == 1)
		{
		addOptions(mymarkettype, "ALL", "1", false, false);
		addOptions(mymarkettype, "S&P CNX NIFTY", "2", false, false);
		addOptions(mymarkettype, "CNX NIFTY JUNIOR", "3", false, false);
		addOptions(mymarkettype, "CNX IT", "4", false, false);
		addOptions(mymarkettype, "BANK NIFTY", "5", false, false);
		addOptions(mymarkettype, "CNX 100", "6", false, false);
		addOptions(mymarkettype, "S&P CNX 500", "7", false, false);
		addOptions(mymarkettype, "CNX MIDCAP", "8", false, false);
		addOptions(mymarkettype, "NIFTY MIDCAP 50", "9", false, false);
		} 
        
    else if(mystockexchange == 2)
		{	
		  
        addOptions(mymarkettype, "ALL", "10",false, false);
		addOptions(mymarkettype, "Group_A", "11", false, false);
		addOptions(mymarkettype, "Group_B", "12", false, false);
 	    addOptions(mymarkettype, "Group_F", "13", false, false);
        addOptions(mymarkettype, "Group_S", "14", false, false);
        addOptions(mymarkettype, "Group_T", "15", false, false);
        addOptions(mymarkettype, "Group_TS", "16", false, false);
        addOptions(mymarkettype, "Group_Z", "17", false, false);
        addOptions(mymarkettype, "BSE_100", "18", false, false);
		addOptions(mymarkettype, "BSE_200", "19", false, false);
 	    addOptions(mymarkettype, "BSE_500", "20", false, false);
        addOptions(mymarkettype, "BSE_IPO", "21",false, false);
	    addOptions(mymarkettype, "BSE_MIDCAP", "22", false, false);
        addOptions(mymarkettype, "BSE_POWER", "23", false, false);
        addOptions(mymarkettype, "BSE_SENSEX", "24", false, false);
        addOptions(mymarkettype, "BSE_SMLCAP", "25",false, false);
	    
		}
}



function addOptions(objPopulation, name, value, defaultSelected, selected)
{
   objPopulation.options[objPopulation.length]=new Option(name, value, defaultSelected, selected);
}







function link1(id)

{
	//alert(id);
	window.open ("/Research/pages/tablelink.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=500,height=200,left=450,top=300");
}

function link(id)

{
	//alert("Symbol");
	window.open ("/Research/pages/marqueelink.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=500,height=150,left=450,top=300");
}
