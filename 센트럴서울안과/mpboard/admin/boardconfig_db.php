<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}




$SQL = "show table status like 'amboard_config'";
$result = mysql_query($SQL,$connect);
$row = mysql_fetch_row($result);

if($code_tmp) {
	if($code_tmp == "B") $code = $code_tmp.$row[9];
	else $code = $code_tmp;
} else $code = "B".$row[9];
if(!$gtable) $gtable = $group;

$mem_point_dstate = $mem_point_dstate + $memw_point_dstate;
$mem_point_vstate = $mem_point_vstate + $memw_point_vstate;
$mem_cpoint_dstate = $mem_cpoint_dstate + $memw_cpoint_dstate;
$mem_cpoint_vstate = $mem_cpoint_vstate + $memw_cpoint_vstate;
/*게시판 관리자별 관리 권한 추가 */
$manage_id = str_replace(" ","",$manage_id);
/*게시판 관리자별 관리 권한 추가 */

if($kind == "diary"){ // 방식이 일정관리 라면

	$code_sql = "SELECT * FROM amboard_config where no = '$no'";
	$code_result = mysql_query($code_sql,$connect);
	$code_row = mysql_fetch_array($code_result);
	$dbobj = new dbUtil($connect);
	$dbobj->setTable("amboard_diary_config");
	$dbobj->addfield("gtable",$gtable);
	$dbobj->addfield("gcode",$group);
if($m2 == "configinsertdb") $dbobj->addfield("code",$code);
	$dbobj->addfield("group_type",$group_type);
	$dbobj->addfield("group_list",$group_list);
	$dbobj->addfield("popup",$popup);
	$dbobj->addfield("birth",$birth);
	$dbobj->addfield("popup_time",$popup_time);
	if($m2 == "configinsertdb") $dbobj->insert();
	if($m2 == "configupdatedb") $dbobj->update("code='$code_row[code]'");


}

$dbobj = new dbUtil($connect);
$dbobj->setTable("amboard_config");

$dbobj->addfield("gtable",$gtable);
$dbobj->addfield("gcode",$group);
if($m2 == "configinsertdb") $dbobj->addfield("code",$code);
$dbobj->addfield("kind",$kind);
$dbobj->addfield("title",$title);
$dbobj->addfield("name",$name);
$dbobj->addfield("skin",$skin);
$dbobj->addfield("list_num",$list_num);
$dbobj->addfield("page_num",$page_num);
$dbobj->addfield("new_icon",$new_icon);
$dbobj->addfield("new_color",$new_color);
$dbobj->addfield("new_time",$new_time);
$dbobj->addfield("cool_icon",$cool_icon);
$dbobj->addfield("cool_color",$cool_color);
$dbobj->addfield("cool_count",$cool_count);
$dbobj->addfield("upload_listview",$upload_listview);
$dbobj->addfield("upload_state",$upload_state);
$dbobj->addfield("upload_add",$upload_add);
$dbobj->addfield("upload_num",$upload_num);
$dbobj->addfield("upload_com",$upload_com);
$dbobj->addfield("upload_size",$upload_size);
$dbobj->addfield("upload_bwsize",$upload_bwsize);
$dbobj->addfield("upload_btsize",$upload_btsize);
$dbobj->addfield("cut_width",$cut_width);
$dbobj->addfield("category",$category);
$dbobj->addfield("comment",$comment);
$dbobj->addfield("point",$point);
$dbobj->addfield("point_listview",$point_listview);
$dbobj->addfield("mem_regpoint",$mem_regpoint);
$dbobj->addfield("mem_downpoint",$mem_downpoint);
$dbobj->addfield("mem_viewpoint",$mem_viewpoint);
$dbobj->addfield("mem_point_rstate",$mem_point_rstate);
$dbobj->addfield("mem_point_dstate",$mem_point_dstate);
$dbobj->addfield("mem_point_vstate",$mem_point_vstate);
$dbobj->addfield("mem_cpoint_rstate",$mem_cpoint_rstate);
$dbobj->addfield("mem_cpoint_dstate",$mem_cpoint_dstate);
$dbobj->addfield("mem_cpoint_vstate",$mem_cpoint_vstate);
$dbobj->addfield("img_view",$img_view);
$dbobj->addfield("rssopen",$rssopen);
$dbobj->addfield("rsscount",$rsscount);
$dbobj->addfield("editmode",$editmode);
$dbobj->addfield("editpicup",$editpicup);
$dbobj->addfield("editpicmanage",$editpicmanage);
$dbobj->addfield("vstate",$vstate);
$dbobj->addfield("page_top_file",$page_top_file);
$dbobj->addfield("page_top_db",$page_top_db);
$dbobj->addfield("page_bottom_file",$page_bottom_file);
$dbobj->addfield("page_bottom_db",$page_bottom_db);
$dbobj->addfield("manage_auth",$manage_auth); // MEDIPIX 게시판관리권한 설정 (08.04.14)
$dbobj->addfield("write_auth",$write_auth);
$dbobj->addfield("rewrite_auth",$rewrite_auth);
$dbobj->addfield("view_auth",$view_auth);
$dbobj->addfield("comment_auth",$comment_auth);
$dbobj->addfield("point_auth",$point_auth);
$dbobj->addfield("upload_auth",$upload_auth);
$dbobj->addfield("run",$run);
$dbobj->addfield("sms_use",$sms_use);
//MEDIPIX 게시판 리스트항목 추가 (08.04.16)
$dbobj->addfield("list_no",$list_no);
$dbobj->addfield("list_title",$list_title);
$dbobj->addfield("list_writer",$list_writer);
$dbobj->addfield("list_date",$list_date);
$dbobj->addfield("list_recom",$list_recom);
$dbobj->addfield("list_hit",$list_hit);
$dbobj->addfield("list_open",$list_open);
$dbobj->addfield("list_stay",$list_stay);
//MEDIPIX 리스트용 내용글 자르기 추가 (08.04.21)
$dbobj->addfield("contents_cut_width",$contents_cut_width);
//MEDIPIX 리스트용 내용글 자르기 추가 (08.04.21)
$dbobj->addfield("download_state",$download_state);
//MEDIPIX 공개/비공개설정  추가 (08.04.21)
$dbobj->addfield("secret_type",$secret_type);
//--------------------------------------------------//
// MEDIPIX 분류 설정 추가 (08.05.09)
$dbobj->addfield("cate_num",$cate_num);
$dbobj->addfield("cate1_name",$cate1_name);
$dbobj->addfield("cate1_item",$cate1_item);
$dbobj->addfield("cate2_name",$cate2_name);
$dbobj->addfield("cate2_item",$cate2_item);
$dbobj->addfield("cate3_name",$cate3_name);
$dbobj->addfield("cate3_item",$cate3_item);
// MEDIPIX 분류 설정 추가 (08.05.09)
// MEDIPIX 문의방식 멘트 추가 (08.05.19)
$dbobj->addfield("inquire_ment",$inquire_ment);
// MEDIPIX 문의방식 멘트 추가 (08.05.19)

// MEDIPIX 게시판이용권한에 따른 메세지 설정 (08.06.02) */
$dbobj->addfield("use_auth",$use_auth);
$dbobj->addfield("useauth_ment",$useauth_ment);
$dbobj->addfield("useauth_addr",$useauth_addr);
$dbobj->addfield("useauth_login_ment",$useauth_login_ment);
// MEDIPIX 게시판이용권한에 따른 메세지 설정 (08.06.02) */
// MEDIPIX 게시판작성에 따른 sms발송 설정 (08.07.03) */
$dbobj->addfield("write_confirm_sms_use",$write_confirm_sms_use);
$dbobj->addfield("write_confirm_sms_num",$write_confirm_sms_num);
// MEDIPIX 게시판작성에 따른 sms발송 설정 (08.07.03) */

// MEDIPIX 스팸글 방지기능 사용 설정 (08.11.26) */
$dbobj->addfield("auth_code_board_state",$auth_code_board_state);
$dbobj->addfield("auth_code_comment_state",$auth_code_comment_state);
// MEDIPIX 게시판작성에 따른 sms발송 설정 (08.11.26) */
/*게시판 관리자별 관리 권한 추가 08.11.27 */
$dbobj->addfield("manage_id",$manage_id);
/*게시판 관리자별 관리 권한 추가 08.11.27 */
/*게시판에서 날짜와 조회수를 변경 가능한 설정 추가 (08.12.05) */
$dbobj->addfield("date_edit",$date_edit);
/*게시판에서 날짜와 조회수를 변경 가능한 설정 추가 (08.12.05) */
/*게시판 정렬기능 추가 (08.12.17) */
$dbobj->addfield("sort_check",$sort_check);
$dbobj->addfield("sort_item",$sort_item);
$dbobj->addfield("sort_order",$sort_order);
$dbobj->addfield("manage_team",$manage_team);
$dbobj->addfield("part_gubun",$part_gubun);

/*게시판 정렬기능 추가 (08.12.17) */

/*게시판 신디케이션 연동 추가 (14.02.17) */
$dbobj->addfield("naver_syndi",$naver_syndi);
$dbobj->addfield("naver_syndi_path",$naver_syndi_path);
/*게시판 신디케이션 연동 추가 (14.02.17) */

/*게시판 신디케이션 연동 추가 (15.02.06) */
$dbobj->addfield("specail_board",$specail_board);
/*게시판 신디케이션 연동 추가 (15.02.06) */
if($m2 == "configinsertdb") {
	$dbobj->insert();

	// 게시판 테이블을 새로 생성 하는 것이라면...
	if($gtable != $sgtable) {
		mysql_query($board_table,$connect);
		mysql_query($boardadd_table,$connect);
		mysql_query($boardcategory_table,$connect);
		mysql_query($boardcomment_table,$connect);
		mysql_query($boardfield_table,$connect);
		mysql_query($boardfile_table,$connect);

		$SQL = "select * from amsolution_group where gcode='$group'";
		$result = mysql_query($SQL,$connect);
		$row = mysql_fetch_array($result);
		$gname = $row[gname];

		$SQL="insert into amsolution_group(gcode,gname,gtable) values('$group','$gname','$gtable') ";
		mysql_query($SQL,$connect);
	}
}
if($m2 == "configupdatedb") $dbobj->update("no=$no");

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=list\">";

?>
