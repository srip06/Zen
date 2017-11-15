
<html>
<title>
Marquee
</title>
<head> <link href="/index/css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
A:link { COLOR: white; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR:#C9E6ED; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR: white; TEXT-DECORATION: none }
A:hover { COLOR:light green; TEXT-DECORATION: none; font-weight: none }
-->
</style>
</head>
 <body>
<script language="javascript" type="text/javascript">
function link(id)

{
window.open ("tablelink.php?id="+id,
"mywindow","location=no,status=no,scrollbars=no,width=522,height=145,left=450,top=265,menubar=no,,toolbar=no,location=no,directories=no");
document.getElementById('id').style.color="#80FFFF";
}
</script>
<Marquee class="marquee" onMouseOver="this.stop();" onMouseOut="this.start();" scrollamount="3">
<?php
include_once('db.php');
$selectsqw = "call sp_scrolling_nse";
//$selectsqw = " SELECT Symbol FROM tbl_daily_trade_details LIMIT 30";
			$resultqw = mysql_query($selectsqw);		
		$countrowssaqw = mysql_num_rows($resultqw);

if($countrowssaqw > 1)
	{
		while ($resqw = mysql_fetch_array($resultqw))
			{
				$resuqw[] = $resqw;	
			}

		mysql_free_result($resultqw);
		foreach ($resuqw AS $rowqw) 
			{		
				 $img = $rowqw['round(((Close_price - Prev_close)*100)/Prev_close,2)'];
				 if ($img > 0 )
						{
							echo  '<img src="/index/images/up.gif" name="up_arrow" />';
						}
						else if ($img < 0 )
						{
							echo  '<img src="/index/images/dn.gif" name="up_arrow" />';
						}
						else
						{
							echo '<img src="/index/images/updown.gif" name="up_arrow" />';
						}
							$id=$rowqw['Id'];	
					echo "&nbsp;" ."&nbsp;"."<span style=\"cursor:Hand; font-size:14px; font-weight:normal; color:#FFFFFF;\" name=\"id\" id=\"id\" onclick=\"javascript:link($id);\">".$rowqw['Symbol']."&nbsp;" ."&nbsp;".$rowqw['Close_price']."&nbsp;" ."&nbsp;"."&#40;
" . $img."&#37;"."&#41;
"."|"."</span>"."&nbsp;"."&nbsp;"."&nbsp;";

            }

   }

?>
</marquee>
</body>

