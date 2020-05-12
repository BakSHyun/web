<?

for($i=0;$i<count($delno);$i++)
{
	$query = "update amboard_basic set del_state='Y' where no = $delno[$i]";
	mysql_query($query,$connect);
}

//$search_para = "search_etc4=$search_etc4&search_clinic=$search_clinic&search_cate1=$search_cate1&search_key=$search_key&search_value=$search_value&implode_etc3=$implode_etc3&search_admin=$search_admin&search_referer=$search_referer&search_y_1=$search_y_1&search_m_1=$search_m_1&search_d_1=$search_d_1&search_y_2=$search_y_2&search_m_2=$search_m_2&search_d_2=$search_d_2";
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&code=$code&m1=$m1&m2=crm_list&$search_para\">";
?>