<? require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php"; ?>
<div id='admin_sub_wrap'>
	<h2>사이트정보관리</h2>
	<p class='desc'><strong>사이트정보관리</strong></p>
	<form name="siteinfoform" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="m1" value="sitemanage_ok">
	<table class='admin_table_type2' summary='사이트정보관리 - 기본정보'>
		<caption>사이트정보관리</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>사이트타이틀</th>
				<td><input name="title" type="text" class="text1" id="title" value="<?=$SITE_INFO[title]?>"></td>
				<th>사이트주소</th>
				<td><input name="url" type="text" class="text1" id="url" value="<?=$SITE_INFO[url]?>"></td>
			</tr>
			<tr>
				<th>관리자</th>
				<td><input name="name" type="text" class="text1" id="name" value="<?=$SITE_INFO[name]?>"></td>
				<th>이메일</th>
				<td><input name="email" type="text" class="text1" id="email" value="<?=$SITE_INFO[email]?>"></td>
			</tr>
			<tr>
				<th>전화번호</th>
				<td><input name="phone" type="text" class="text1" id="phone" value="<?=$SITE_INFO[phone]?>"></td>
				<th>핸드폰번호</th>
				<td><input name="hphone" type="text" class="text1" id="hphone" value="<?=$SITE_INFO[hphone]?>"></td>
			</tr>
		</tbody>
	</table>

	<p class='desc'><strong>SMS</strong></p>
	<table class='admin_table_type2' summary='사이트정보관리 - SMS'>
		<caption>SMS</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
			<tr>
				<th>아이디</th>
				<td><input name="sms_id" type="text" class="text1" id="sms_id" value="<?=$SITE_INFO[sms_id]?>"></td>
				<th>비밀번호</th>
				<td><input name="sms_pwd" type="text" class="text1" id="sms_pwd" value="<?=$SITE_INFO[sms_pwd]?>"></td>
			</tr>
		</tbody>
	</table>

	<p class='desc'><strong>로거</strong> - <a href='http://logger.co.kr/login/loginPs.tsp?cusId=<?=$SITE_INFO[logger_id]?>&password=<?=$SITE_INFO[logger_pwd]?>'>접속</a></p>
	<table class='admin_table_type2' summary='사이트정보관리 - 로거'>
		<caption>로거</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
			<tr>
				<th>아이디</th>
				<td><input name="logger_id" type="text" class="text1" id="logger_id" value="<?=$SITE_INFO[logger_id]?>"></td>
				<th>비밀번호</th>
				<td><input name="logger_pwd" type="text" class="text1" id="logger_pwd" value="<?=$SITE_INFO[logger_pwd]?>"></td>
			</tr>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
	</ul>

	</form>
</div>          
