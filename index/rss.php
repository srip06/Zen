uu
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include "./zamRSS.php";

		$rss = new zamRSS;

		$rss->cache_dir = './temp';
		$rss->cache_time = 1200;

	//	if ($rs = $rss->get('http://news.bbc.co.uk/rss/newsonline_world_edition/front_page/rss091.xml'))http://feeds.feedburner.com/BSEIndiaNotices  http://www.bseindia.com/rssxml/Notices/Notices.xml {
         if ($rs = $rss->get('http://feeds.feedburner.com/nseindia/ann')) {
			if ($rs[image_url] != '') {

				//echo "<a href=\"$rs[image_link]\" target=\"_new\"><img src=\"$rs[image_url]\" alt=\"$rs[image_title]\" vspace=\"1\" border=\"0\" /></a><br />\n";
				//echo "<font style=\" position:absolute; left:118px; color:#808080; font-size:15px;\"><b>Corporate Announcements</b></font>";
				}

			//echo "<big><b><a href=\"$rs[link]\" target=\"_new\">$rs[title]</a></b></big><br />\n";
		//	echo "$rs[description]<br />\n";
			 echo "<marquee direction=\"up\" style=\"position:relative; left:-25px;\" scrollamount=\"2\" onMouseOver=\"this.stop();\" onMouseOut=\"this.start();\">";
			echo "<ul style=\"list-style-image: url(images/cal_forward.gif);\">\n";
			foreach($rs['items'] as $item) {
                        //$test=file_get_contents($item[link]);
    				//echo "\t<li><a href=\"$item[link]\" target=\"_new\">".$item['title']."</a><br />".$item['description']."</li>\n";
         echo "\t<li><span onclick=\"nseurl('$item[link]');\"  id=\"$item[link]\" style=\"color:#0080C0; cursor:hand; text-decoration:none;\">".$item['title']."</font></span><br />"."</li>\n";
        				}
			echo "</ul>\n";
			}
		else {
			echo "Error: It's not possible to reach RSS file...\n";
			echo "</marquee>";
		}
?>
 <script language="javascript">

 function nseurl(id)
{
window.open ("url.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=550,height=150,left=450,top=300");
    //window.open("url.php?id="+id,"mywindow","location=1,status=1,scrollbars=1,width=550,height=150,left=450,top=300");
}
</script>
