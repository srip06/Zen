<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
 	include "zamRSS.php";

		$rss = new zamRSS;
		$rss->cache_dir = './temp';
		$rss->cache_time = 1200;

 //	if ($rs = $rss->get('http://news.bbc.co.uk/rss/newsonline_world_edition/front_page/rss091.xml'))http://feeds.feedburner.com/BSEIndiaNotices  http://www.bseindia.com/rssxml/Notices/Notices.xml {
         if ($rs = $rss->get('http://twitter.com/statuses/user_timeline/89661873.rss')) {
			if ($rs[image_url] != '') {

    //echo "<a href=\"$rs[image_link]\" target=\"_new\"><img src=\"$rs[image_url]\" alt=\"$rs[image_title]\" vspace=\"1\" border=\"0\" /></a><br />\n";
//				echo "<font style=\"color:#808080;#FF8040;#008000;#800000;#0080C0; font-size:20px;\"><b>Corporate Announcements</b></font>";
				}

			//echo "<big><b><a href=\"$rs[link]\" target=\"_new\">$rs[title]</a></b></big><br />\n";
		//	echo "$rs[description]<br />\n";
			 //echo "<marquee direction=\"up\" style=\"position:relative;  left:-25px;\" scrollamount=\"2\" onMouseOver=\"this.stop();\" onMouseOut=\"this.start();\">";
//			echo "<ul style=\"list-style-image: url(images/cal_forward.gif);\">\n";
			foreach($rs['items'] as $item) {
                 // $test=file_get_contents($item[link]);
                  //echo "<div style=\"top=1px; left=3px; position:absolute; width:230px; padding: 0 15px; 0 8px; border-bottom: 1px solid #909090; color:#330000; border-bottom: 2px solid #909090;  border-top: 2px solid #909090;  border-left: 2px solid #909090;  border-right: 2px solid #909090; height:195px; font-size:9px; font-family:Times New Roman;  display:block; background-color:#F5F5F5;\" id=\"top\">";
                 // echo "$test";
                  // echo "</div>";
				//echo "\t<li><a href=\"$item[link]\" target=\"_new\">".$item['title']."</a><br />".$item['description']."</li>\n";
//     echo "\t<li><span onclick=\"nseurl('$item[link]');\"  id=\"$item[link]\"><font style=\"color:#0080C0; text-decoration:none;\">".$item['title']."</font></span><br />"."</li>\n";//.$item['description']
  echo $item['title']."<br />";

                    }

		//	echo "</ul>\n";
			}
		else {
			echo "Error: It's not possible to reach RSS file...\n";
		//	echo "</marquee>";
		}
?>

