<?php error_reporting (E_ALL ^ E_NOTICE);
ini_set( 'memory_limit', '1000M' );
?>
<?php

//echo "task sheduled";

backup_tables('localhost','root','','research');

/* backup the db OR just a table */

function backup_tables($host,$user,$pass,$name,$tables = '
 low_high_temp,
 low_high_temp_nse,
 master_tbl_bse,
 master_tbl_nse,
 tbl_auction_nse,
 tbl_bank_nifty,
 tbl_bc_rd_bse,
 tbl_block_bse,
 tbl_block_nse,
 tbl_board_meetings_bse,
 tbl_board_meetings_nse,
 tbl_bonus_issue,
 tbl_bse_100,
 tbl_bse_200,
 tbl_bse_500,
 tbl_bse_announcements,
 tbl_bse_a_group,
 tbl_bse_b_group,
 tbl_bse_f_group,
 tbl_bse_gross_delv_position,
 tbl_bse_ipo,
 tbl_bse_it,
 tbl_bse_midcap,
 tbl_bse_mkttype,
 tbl_bse_power,
 tbl_bse_sensex,
 tbl_bse_sensex_group,
 tbl_bse_smlcap,
 tbl_bse_s_group,
 tbl_bse_ts_group,
 tbl_bse_t_group,
 tbl_bse_z_group,
 tbl_bulk_bse,
 tbl_bulk_bse1,
 tbl_bulk_nse,
 tbl_change_of_name,
 tbl_closeprice_high_low_bse,
 tbl_closeprice_high_low_nse,
 tbl_cnx_100,
 tbl_cnx_it,
 tbl_cnx_midcap,
 tbl_cnx_nifty_junior,
 tbl_corp_action_nse,
 tbl_daily_trade_details,
 tbl_delisted_companies,
 tbl_demate_auction_bse,
 tbl_dividend_details,
 tbl_equity_bse,
 tbl_equity_nse,
 tbl_face_value_nse,
 tbl_fao_margin_status,
 tbl_fao_secban_nse,
 tbl_holidays,
 tbl_indexes,
 tbl_indices_cal_temp_nse1,
 tbl_indices_cal_temp_nse2,
 tbl_industry,
 tbl_industry_bse,
 tbl_industry_nse,
 tbl_nifty_midcap_50,
 tbl_nse_announcements,
 tbl_nse_delv_position,
 tbl_nse_mkttype,
 tbl_port_folio,
 tbl_promoter_listed_co,
 tbl_right_issue,
 tbl_sensex,
 tbl_sensex_nse,
 tbl_split_face_value,
 tbl_sp_cnx_500,
 tbl_sp_cnx_nifty,
 tbl_stock_code_details,
 tbl_stock_code_details_test,
 tbl_users,
 test,
 testdate,
 users,
 week_52_high_temp,
 week_52_low_temp')
{
// tbl_daily_trade_details_bse
// tbl_daily_trade_details_bse1
// tbl_daily_trade_details_nse
// tbl_daily_trade_details_nse1

$date=date('d-m-Y');
//echo $date;

	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);

	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);

		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = addslashes($row[$j]);
					//$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	//save file
	//$handle = fopen("D:/Data Upload Files/Data Base Backup/$date".time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	$handle = fopen("C:/wamp/www/index/Data Upload Files/Data Base Backup/$date.sql","w+");
	fwrite($handle,$return);
	fclose($handle);
}
?>
