<? require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/metainfo.php"; ?>
<div id='admin_sub_wrap'>
	<h2>메타태그관리</h2>
	<form name="siteinfoform" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="m1" value="metamanage_ok">
	<table class='admin_table_type2' summary='메타태그관리'>
		<caption>메타태그관리</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:650px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>Description</th>
				<td><input name="description" type="text" class="text3" id="description" value="<?=$description?>"></td>
			</tr>
			<tr>
				<th>Keyword</th>
				<td><input name="keyword" type="text" class="text3" id="keyword" value="<?=$keyword?>"></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input name="author" type="text" class="text3" id="author" value="<?=$author?>"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input name="email" type="text" class="text3" id="email" value="<?=$email?>"></td>
			</tr>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
	</ul>

	</form>
</div>          