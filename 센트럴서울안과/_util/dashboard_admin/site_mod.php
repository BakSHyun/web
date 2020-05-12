<?
	$adm_sql=mysql_fetch_array(mysql_query("select * from admin_config"));
?>

<div id='admin_sub_wrap'>
	<h2>사이트 관리</h2>

	<form name="bcform" method="post" action="<?=$PHP_SELF?>">
	<input type='hidden' name='m1' value='site_mod_db'>
	<input type='hidden' name='m2' value='site_mod_db'>
	<h4>기본정보</h4>
	<table class='admin_table_type2' summary='사이트 관리 - 기본정보'>
		<caption>기본정보</caption>
		<colgroup>
			<col style="width:140px;" />
			<col style="width:*;" />
			<col style="width:140px;" />
			<col style="width:*;" />
		</colgroup>
		<tbody>
			<tr>
				<th>관리자 연락처</th>
				<td><input name="adm_phone" type="text" class="text1" value="<?=$adm_sql[adm_phone]?>"></td>
				<th>관리자 이메일</th>
				<td><input name="adm_email" type="text" class="text1" value="<?=$adm_sql[adm_email]?>"></td>
			</tr>
		</tbody>
	</table>

	<h4>문자관리 - 통큰아이 바로가기 <a href='http://www.tongkni.co.kr/' title='통큰아이 바로가기' target="_new"><i class="fa fa-external-link"></i></a></h4>
	<table class='admin_table_type2' summary='사이트 관리 - 문자관리'>
		<caption>문자관리</caption>
		<colgroup>
			<col style="width:140px;" />
			<col style="width:*;" />
			<col style="width:140px;" />
			<col style="width:*;" />
		</colgroup>
		<tbody>
			<tr>
				<th>SMS 계정 ID</th>
				<td><input name="adm_sms_id" type="text" class="text1" value="<?=$adm_sql[adm_sms_id]?>"></td>
				<th>SMS 계정 PW</th>
				<td><input name="adm_sms_pw" type="text" class="text1" value="<?=$adm_sql[adm_sms_pw]?>"></td>
			</tr>
		</tbody>
	</table>

	<h4>IP 블락</h4>
	<table class='admin_table_type2' summary='사이트 관리 - IP 블락'>
		<caption>IP 블락</caption>
		<colgroup>
			<col style="width:140px;" />
			<col style="width:*;" />
		</colgroup>
		<tbody>
			<tr>
				<th>블럭 IP 목록</th>
				<td>
					<textarea class='area1' name='adm_ip_block'><?=$adm_sql[adm_ip_block]?></textarea>
					<strong>ex) 192.168.0.1<span class='red'>|</span>192.168.0.2 ( "<span class='red'>|</span>" 를 구분자로 사용합니다.)</strong>
				</td>
			</tr>
		</tbody>
	</table>

	<h4>기본 메타태그</h4>
	<table class='admin_table_type2' summary='사이트 관리 - 메타태그'>
		<caption>메타태그</caption>
		<colgroup>
			<col style="width:140px;" />
			<col style="width:*;" />
		</colgroup>
		<tbody>
			<tr>
				<th>subject</th>
				<td><input name="adm_meta_subject" type="text" class="text6" value="<?=$adm_sql[adm_meta_subject]?>"></td>
			</tr>
			<tr>
				<th>title</th>
				<td><input name="adm_meta_title" type="text" class="text6" value="<?=$adm_sql[adm_meta_title]?>"></td>
			</tr>
			<tr>
				<th>keywords</th>
				<td><input name="adm_meta_keywords" type="text" class="text6" value="<?=$adm_sql[adm_meta_keywords]?>"></td>
			</tr>
			<tr>
				<th>description</th>
				<td><textarea class='area1' name='adm_meta_description'><?=$adm_sql[adm_meta_description]?></textarea></td>
			</tr>
			<tr>
				<th>Copyright</th>
				<td><input name="adm_meta_Copyright" type="text" class="text6" value="<?=$adm_sql[adm_meta_Copyright]?>"></td>
			</tr>
		</tbody>
	</table>
	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="<?=$PHP_SELF?>?group=<?=$group?>&asumode=<?=$asumode?>&asbmode=list">취 소</a></div></li>
		<li><input type='image' src='./img/comm/admin_mod_btn.gif' alt='수정'></li>
	</ul>
	</form>

</div>
