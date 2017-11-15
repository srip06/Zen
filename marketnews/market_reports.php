<script language="JavaScript" type="text/javascript">
function nseurl(id)
		{
		window.open("globalmrkurl.php?id="+id,"_new");
		}
		</script>
<script language="javascript">
function onmouseover(obj)
{
 document.getElementById("news").style.top=obj.offsetTop+98;
 document.getElementById("news").style.left=obj.offsetLeft+10;
 document.getElementById("news").style.display='block';
}
function onmouseout()
{
document.getElementById('news').style.display='none';
}
</script>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php 
 	include "./zamRSS.php";

		$rss = new zamRSS;

		$rss->cache_dir = './temp';
		$rss->cache_time = 1200;

          if ($rs = $rss->get('http://www.moneycontrol.com/rss/marketreports.xml')) {
			if ($rs[image_url] != '') {

				}

   			foreach($rs['items'] as $item) {
     echo "\t<li><span onclick=\"nseurl('$item[link]');\" style=\"cursor:hand;\" id=\"$item[link]\"><font style=\"color:#0080C0; text-decoration:none;\">".$item['title']."</font></span><br />"."</li>\n".$item['description'];

                    }

			echo "</ul>\n";
			}
		else {
			echo "Error: It's not possible to reach RSS file...\n";
		}
?>

