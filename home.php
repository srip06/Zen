<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Menu</title>
	<style media="all" type="text/css">@import "menu_style.css";</style>
    <style type="text/css">
	A:link { TEXT-DECORATION: none; }
	A:vited{ TEXT-DECORATION: none; }
	A:active{ TEXT-DECORATION: none; }
	.body
	{
 overflow-hidden: no;
	}
	</style>


<?php
session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Main Page</title>
 <link href="css/css.css" rel="stylesheet" type="text/css" />
 <link href="css/menu_style.css" rel="stylesheet" type="text/css" />
  <link href="css/include.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">

function display(id)
   {
	
			 
	   if(id == "home")
	     {

			 document.getElementById("home").style.display="block";
			 document.getElementById("Services").style.display="none";
			 document.getElementById("Market").style.display="none";
 			 document.getElementById("Research").style.display="none";
			 document.getElementById("Clients").style.display="none";
			 document.getElementById("PortFolio").style.display="none";
			 document.getElementById("contact").style.display="none";
		 }
		else if(id == "Services")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="block";
			   document.getElementById("Market").style.display="none";
			   document.getElementById("Research").style.display="none";
			   document.getElementById("Clients").style.display="none";
			   document.getElementById("PortFolio").style.display="none";
			   document.getElementById("contact").style.display="none";
		   }
		   else if(id == "Market")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="none";
			   document.getElementById("Market").style.display="block";
			   document.getElementById("Research").style.display="none";
			   document.getElementById("Clients").style.display="none";
			   document.getElementById("PortFolio").style.display="none";
			   document.getElementById("contact").style.display="none";
		   }
		   else if(id == "Research")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="none";
			   document.getElementById("Market").style.display="none";
			   document.getElementById("Research").style.display="block";
			   document.getElementById("Clients").style.display="none";
			   document.getElementById("PortFolio").style.display="none";
 			   document.getElementById("contact").style.display="none";
		   }
		   else if(id == "Clients")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="none";
			   document.getElementById("Market").style.display="none";
			   document.getElementById("Research").style.display="none";
			   document.getElementById("Clients").style.display="block";
			   document.getElementById("PortFolio").style.display="none";
			   document.getElementById("contact").style.display="none";
		   }
		    else if(id == "PortFolio")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="none";
			   document.getElementById("Market").style.display="none";
			   document.getElementById("Research").style.display="none";
			   document.getElementById("Clients").style.display="none";
   			   document.getElementById("PortFolio").style.display="block";
			   document.getElementById("contact").style.display="none";
		   }
		   else if(id == "contact")
		   {
			   document.getElementById("home").style.display="none";
			   document.getElementById("Services").style.display="none";
			   document.getElementById("Market").style.display="none";
			   document.getElementById("Research").style.display="none";
			   document.getElementById("Clients").style.display="none";
   			   document.getElementById("PortFolio").style.display="none";
			   document.getElementById("contact").style.display="block";
		   }
   }

   function blinklink()
		{
			if (!document.getElementById('blink').style.color)
				{
					document.getElementById('blink').style.color="green";
				}
			if (document.getElementById('blink').style.color=="blue")
				{
					document.getElementById('blink').style.color="green";
				}
			else
				{
					document.getElementById('blink').style.color="blue";
				}
			if (!document.getElementById('blink1').style.color)
				{
					document.getElementById('blink1').style.color="green";
				}
			if (document.getElementById('blink1').style.color=="blue")
				{
					document.getElementById('blink1').style.color="green";
				}
			else
				{
					document.getElementById('blink1').style.color="blue";
				}
		timer=setTimeout("blinklink()",1);
		}

	function stoptimer()
		{
			clearTimeout(timer);
		}

   </script>
   
</head>

<body bgcolor="F4F4F4" onload="blinklink()" style="overflow-x: hidden" onunload="stoptimer()">
<div id="outlinehome">
<div style="height:10px"></div>
 <!--   <a href="http://www.zenmoney.com" target="_new"> <div id="logo"></a>-->
          <table border="0" width="100%" height="10%">

                   <tr>
                       <td><div id="logo"></div></td>
                       <td align="right" valign="top">
   <a id="trdonline"  href="https://trade.zenmoney.com/" target="_new">&nbsp;<font color="green">Trade Online</font></a>
   |<a id="" href="http://www.zenmoney.com/Clientlogin.aspx" target="_new"><font color="green"> Client login</font></a>
                       </td>
</tr>
<table>
<div  style="position:absolute; top:25px; left:610px;">
  <label style="color:#009; font-size:16px"> Welcome &nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $_SESSION['UserID']; ?></label></td></div>
	   <?php
			include_once './research/php/db.php';
            $sql="SELECT FirstName,MiddleName,LastName FROM tbl_users WHERE  UserID='".$_SESSION['UserID']."' limit 1";
			$res=mysql_query($sql);

	          if(mysql_num_rows($res))
		         {
					$row=mysql_fetch_assoc($res);
					$fname=$row['FirstName'];
					$mname=$row['MiddleName'];
					$lname=$row['LastName'];
				 }
			?>
	<div  style="position:absolute; top:50px; left:590px;">	<label for="User FName" style="color:#009; font-size:18px">
<?php  echo $fname."&nbsp;&nbsp;&nbsp;"; ?>
<?php  echo $mname."&nbsp;&nbsp;&nbsp;" ?>
<?php   echo $lname."&nbsp;&nbsp;&nbsp;"; ?> </div>

<!--[if lte IE 7]>
<div id="rightdiv" style="position:absolute; top:120px; left:640px;"></div>
  <div id="spannse" style="position:absolute; top:120px;left:219px;"> </div>
<![endif]-->
 <!--[if gte IE 8]>
   <div id="rightdiv" style="position:absolute; top:115px; left:640px;"></div>
  <div id="spannse" style="position:absolute; top:115px;left:219px;"> </div>
   <![endif]-->
                     <table border="0" width="90%">
          <tr>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;<iframe src="/index/marquee/marquee_nse.php"  width="425" height="25" frameborder="0"  name="marquee" marginheight="0" marginwidth="0"></iframe>
        </td>
        <!--[if lte IE 7]>
         <div id="bseright" style="position:absolute; top:120px; left:1105px;"></div>
   <div id="spanbse" style="position:absolute; top:120px; left:660px;"> </div>
        <![endif]-->
         <!--[if gte IE 8]>
  <div id="bseright" style="position:absolute; top:115px; left:1105px;"></div>
   <div id="spanbse" style="position:absolute; top:115px; left:660px;"> </div>
          <![endif]-->
        <td>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <iframe  src="/index/marquee/marquee_bse.php" width="425" height="25" frameborder="0" name="marquee" marginheight="0" marginwidth="0"></iframe>
        </td>
        </tr>
</table>
 <div style="position:absolute; top:125px;" class="wrapper1">
 <div class="wrapper">
 	<div class="nav-wrapper">
			<div class="nav-left"></div>
			<div class="nav">
				<ul id="navigation">
                <li>
                 <a href="#" onclick="javascript:display('home');">
							<span class="menu-left"></span>
							<span class="menu-mid">Home</span>
							<span class="menu-right"></span>
						</a>
					</li>
			   		<li class="">
                 <a href="#"  onclick="javascript:display('Services');">
							<span class="menu-left"></span>
							<span class="menu-mid">Services</span>
							<span class="menu-right"></span>
						</a>
	            	   	<div class="sub">
			   				<ul style="text-align:left;">
			   					<li>
         <a href="/index/services/stock_broking.html"  target="servicesdisplay">Stock Broking</a>
								</li>
			   					<li>
         <a href="/index/services/internet_trading.html" target="servicesdisplay">Internet Trading</a>
								</li>
			   					<li>
        <a href="/index/services/mutual_funds.html" target="servicesdisplay">Mutual Funds</a>
								</li>
			   					<li>
        <a href="/index/services/depository_services.html" target="servicesdisplay">Depository Services</a>
								</li>
   					            <li>
     <a href="/index/services/investment_advice.html" target="servicesdisplay">Investment Advice</a>
								</li>
			   					<li>
        <a href="/index/services/comm_broking.html" target="servicesdisplay">Commodities Broking</a>
								</li>
			   					<li>
     <a href="/index/services/pan_application.html" target="servicesdisplay">PAN Application centre</a>
								</li>
			   					<li>
    <a href="/index/services/mutual_fund.html" target="servicesdisplay">Mutual Fund KYC POS</a>
								</li>
							    <li>
    <a href="/index/services/port_management.html" target="servicesdisplay">Portfolio Management</a>
								</li>
			   					<li>
       <a href="/index/services/nri_services.html" target="servicesdisplay">NRI Services</a>
								</li>
			   					<li>
     <a href="/index/services/ipos.html" target="servicesdisplay">IPO's</a>
								</li>
			   					<li>
   <a href="/index/services/tax_saving.html" target="servicesdisplay">Tax Saving Bonds</a>
								</li>
								<li>
     <a href="/index/services/new_pen_system.html" target="servicesdisplay">New Pension System</a>
								</li>
			   					<li>
   <a href="/index/services/Zemo.html" target="servicesdisplay">Zemo</a>
								</li>
          		   				</ul>
			   				<div class="btm-bg"></div>
			   			</div>
					</li>
			   		<li class="">
                 <a href="#" onclick="javascript:display('Market');">
							<span class="menu-left"></span>
							<span class="menu-mid">Market News</span>
							<span class="menu-right"></span>
						</a>
        	   		</li>
        	   		        <li class="">
                 <a href="#" onclick="javascript:display('Research');">
							<span class="menu-left"></span>
							<span class="menu-mid">Research</span>
							<span class="menu-right"></span>
						</a>
	            	   	<div class="sub">
			   				<ul style="text-align:left;">
			   					<li>
<a  href="/index/research/html/gainers.html" target="display">Top Gainers</a>
								</li>
			   					<li>
<a  href="/index/research/html/losers.html" target="display">Top Losers</a>
								</li>
           	<li>
<a  href="/index/research/html/week52high.html" target="display">Week 52 High</a>
								</li>
								<li>
<a href="/index/research/html/week52low.html" class="li" target="display">Week 52 Low</a>
								</li>
                            	<li>
<a  href="/index/research/html/nse.html" target="display">Active Scripts</a>
								</li>
          	                    <li>
<a  href="/index/research/html/valnse.html" target="display">Volume And Price</a>
								</li>
			   					<li>
<a  href="/index/research/html/Bulk_deal.html" target="display">Bulk Deal</a>
								</li>
								<li>
<a  href="/index/research/html/Block_deal.html" target="display">Block Deal</a>
								</li>
                                <li>
<a  href="/index/research/html/Intraday_High_Low.html" target="display">Intraday High Low</a>
								</li>
								<li>
<a  href="/index/research/html/Advance_decline.html" target="display">Advance/Decline</a>
								</li>
			   					<li>
<a  href="/index/research/html/Delivery_volume.html" target="display">Delivery/Volume</a>
								</li>
			   					<li>
<a  href="/index/research/html/Demat_Auction.html" target="display">Demat_Auction</a>
								</li>
                               <li>
<a  href="/index/research/php/corp_action.php" target="display">Book Closure</a>
</li>

<li>
<a  href="/index/research/php/f&o_margin.php" target="display">F&O Margin Status</a>
</li>

<li>
<a  href="/index/research/html/Price_Shockers.html" target="display">Shockers Price</a>
</li>
<li>
<a  href="/index/research/html/volume_shockers.html" target="display">Shockers Volume</a>
</li>
<li>
<a  href="/index/research/html/volume_shockers.html" target="display">HIgh Low</a>
</li>

          		   				</ul>
			   				<div class="btm-bg"></div>
			   			</div>
					</li>

               		<li class="">
             <a href="#" onclick="javascript:display('Clients');">
							<span class="menu-left"></span>
							<span class="menu-mid">Mutual Fund</span>
							<span class="menu-right"></span>
						</a>

				</li>
			   		<li class="">
      <a href="#" onclick="javascript:display('PortFolio');" >
							<span class="menu-left"></span>
							<span class="menu-mid">My Portfolio</span>
							<span class="menu-right"></span>
						</a>
					</li>
			   		<li class="">
      <a href="#" onclick="javascript:display('contact');" >
							<span class="menu-left"></span>
							<span class="menu-mid">Contact Us</span>
							<span class="menu-right"></span>
						</a>
			   		</li>
			   		<li class="last">
      <a href="/index/logout/logout.php" >
							<span class="menu-left"></span>
							<span class="menu-mid">Log Out</span>
							<span class="menu-right"></span>
						</a>
			   		</li>
			   		<li class="last">

							<span class="menu-left"></span>
							<span class="menu-mid"></span>
							<span class="menu-right"></span>

			   		</li>
                    </ul>
			</div>
			<div class="nav-right"></div>
		</div>
  	<div class="content">
 	<p>&nbsp;</p>

        	<img style="position:absolute; top:66px; left:-3px;" src="images/hrlinegray.jpg" width="910" height="10">
    <div id="home" style="display:block; margin-left:-15px;">
           <iframe src="/index/home/default.html" width="910" frameborder="0" height="660" ></iframe>
	</div>

	<div id="Services" style="display:none; margin-left:-15px;">
		   <iframe src="/index/services/services_page.php" width="910" frameborder="0" height="660" ></iframe>
	</div>

	<div id="Market" style="display:none; margin-left:-15px;">
		   <iframe src="/index/marketnews/market_page.php" width="910" frameborder="0" height="660" ></iframe>
	</div>

	<div id="Research" style="display:none; margin-left:-15px;">
		   <iframe src="/index/research/html/research.html" width="910" frameborder="0" height="660" ></iframe>
	</div>

	<div id="Clients" style="display:none; margin-left:-15px;">
		   <iframe src="/index/mutualfunds/mutual_funds.php" width="910" frameborder="0" height="660" ></iframe>
	</div>

	<div id="PortFolio" style="display:none; margin-left:-15px;">
		   <iframe src="/index/portfolio/portfoliopage.html" width="910" frameborder="0" height="660" scrolling="no" ></iframe>
	</div>

	<div id="contact" style="display:none; margin-left:-15px;">
		   <iframe src="/index/contactus/contactus.php" scrolling="no" width="910" frameborder="0" height="660"></iframe>
	</div>

       	</div>
		<div class="content-bottom"></div>
	</div>
</div>
</div>
<!--
<table border="0" style="position:absolute; top:840px; width:1100px; left:216px;">
<tr>
<td>
<?php
//include_once './index/footer.html';
?>
</td>
</tr>
</table>
-->
<table border="0" style="position:absolute; top:820px; width:914px; left:216px;">
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td  bgcolor="#0458A1" class="footer" >
360 Degrees Investments ,Shop No.2, Plot No 85 & 88, Ground Floor, Sadar Patel Nagar, Kukatpally,Hyderabad-500072.
<br />PhoneNo. 040-42226235,9396666235
<div style="background-color:#0E8728;">
&copy;2006 Zen Securities Ltd. All rights reserved.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Designed & Developed by 360 Degrees Investments.
</div>
</td>
</tr>
</table>
</div>
</body>
</html>
