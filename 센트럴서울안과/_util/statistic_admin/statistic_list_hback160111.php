<script language="javascript">

function allCheck(cform){
	var objCheck;
	objCheck = document.getElementsByName("delno[]");
	if(cform.allch.checked){
		if(objCheck.length){
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = 'on';
		}
	}else{
		if(objCheck.length){
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = '';
		}
	}
}


//선택한것 삭제
function quedel(cform){
	var objCheck, chkVal;
	var objCheck = document.getElementsByName("delno[]");

	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}
	if(chkVal) {
		if(confirm("선택항목을 삭제하시겠습니까?")){
			cform.emode.value = 'eventlistdel';
			return true;
		}
		else {
			return false;
		}
	}else{
		alert("삭제하실 항목을 선택해 주세요");
		return false;
	}

}

//게시판 내용 복사
function checkCopy(cform) {
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 복사하시겠습니까?")){
			//alert ('복사합니다!');
			cform.emode.value = 'copy';
			cform.submit();
		}else {
			return false;
		}
	}else{
		alert("복사할 게시물을 선택하세요");
		return false;
	}
}
//게시판 내용 복사 종료

//게시판 내용 이동
function checkChange(cform) {
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	alert ('이동합니다!');
	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 이동하시겠습니까? 이동하신 게시물은 현재 게시판에서 사라집니다!!!")){
			cform.emode.value = 'change';
			cform.submit();
		}else{
			return false;
		}
	}else{
		alert("이동할 게시물을 선택하세요");
		return false;
	}

}


</script>

<?
//$search_para = "search_code=$search_code";
$res = mysql_query("select no,cname from amboard_basic_category where code='$code' order by ino asc");
while($row_cat = mysql_fetch_array($res)) {
	$cat_no = $row_cat[no];
	$categoryArray[$cat_no] = $row_cat[cname];
}
if(is_array($search_etc3)) $implode_etc3 = implode("/", $search_etc3);
if(is_array($search_etc7)) $implode_etc7 = implode("/", $search_etc7);
$search_para = "search_etc4=$search_etc4&search_cate2=$search_cate2&search_key=$search_key&search_value=$search_value&implode_etc3=$implode_etc3&implode_etc7=$implode_etc7&search_call=$search_call&search_admin=$search_admin&search_referer=$search_referer&search_date1=$search_date1&search_date2=$search_date2";
if($implode_etc3 != "") $search_etc3 = explode("/", $implode_etc3);
if($implode_etc7 != "") $search_etc7 = explode("/", $implode_etc7);
if(!$orderby) $orderby = "wdate";


?>

<div id='admin_sub_wrap'>

	<h2>접속 리스트</h2>

	<form name="formsearch" method="post" action="<?=$PHP_SELF?>">
	<div id='reserve_search_wrap2'>
	<ul class='reserve_search_wrap2'>
		<li class='reserve_search_wrap2_li'>
			<select name="search_referer" class="select1">
				<option value="">참조 사이트</option>
				<option value="네이버" <? if($search_n == "네이버") { echo "selected"; } ?>>네이버</option>
				<option value="다음" <? if($search_n == "다음") { echo "selected"; } ?>>다음</option>
				<option value="구글" <? if($search_n == "구글") { echo "selected"; } ?>>구글</option>
				<option value="직접유입" <? if($search_n == "직접유입") { echo "selected"; } ?>>직접유입</option>
				<option value="기타" <? if($search_n == "기타") { echo "selected"; } ?>>기타</option>
			</select>
		</li>
		<li class='reserve_search_wrap2_li'>
			<select name="search_referer" class="select1">
				<option value="">플랫폼</option>
				<option value="desktop" <? if($search_de == "desktop") { echo "selected"; } ?>>데스크탑</option>
				<option value="mobile" <? if($search_de == "mobile") { echo "selected"; } ?>>모바일</option>
			</select>
		</li>
		<li class='reserve_search_wrap2_li'>
			<span id="cover_search_rkw" class="basic_color" style="position:absolute;padding:3px 0 0 3px;font-family:Verdana,Thahoma;font-size:9pt;color:#999" onclick="this.style.display = 'none'; document.formsearch.search_rkw.focus()"><? if(!$search_rkw) { ?>참조 키워드<? } ?></span>
			<input type="text" name="search_rkw" value="<?=$search_rkw?>" size="30" class="text1" onfocus="cover_search_rkw.style.display = 'none'">
		</li>
		<li class='reserve_search_wrap2_li'>
			<span id="cover_search_kw" class="basic_color" style="position:absolute;padding:3px 0 0 3px;font-family:Verdana,Thahoma;font-size:9pt;color:#999" onclick="this.style.display = 'none'; document.formsearch.search_kw.focus()"><? if(!$search_kw) { ?>키워드<? } ?></span>
			<input type="text" name="search_kw" value="<?=$search_kw?>" size="30" class="text1" onfocus="cover_search_kw.style.display = 'none'">
		</li>
		<li class='reserve_search_wrap2_li'>
			<span id="cover_search_kw2" class="basic_color" style="position:absolute;padding:3px 0 0 3px;font-family:Verdana,Thahoma;font-size:9pt;color:#999" onclick="this.style.display = 'none'; document.formsearch.search_kw2.focus()"><? if(!$search_kw2) { ?>입찰 키워드<? } ?></span>
			<input type="text" name="search_kw2" value="<?=$search_kw2?>" size="30" class="text1" onfocus="cover_search_kw2.style.display = 'none'">
		</li>
		<li class='reserve_search_wrap2_li'><input type='image' src='/admin/img/comm/search_btn.gif' alt='검색'></li>
	</ul>
	</div>


</form>

	<form name="cform"  method="post" action="<?=$PHP_SELF?>" onsubmit="return quedel(this)">
	<table class='admin_table_type1' summary='관리자 게시판 리스트입니다.'>
		<caption>관리자 게시판 리스트</caption>
		<colgroup>
			<col style="width:50px;" />
			<col style="width:120px;" />
			<col style="width:*;" />
			<col style="width:*;" />
			<col style="width:*;" />
			<col style="width:*;" />
			<col style="width:60px;" />
			<col style="width:60px;" />
		</colgroup>
		<thead>
			<tr>
				<th><input type="checkbox" name="allch" value="1" onClick="allCheck(cform);"></th>
				<th>링크</th>
				<th>Refer(참조) 키워드</th>
				<th>키워드</th>
				<th>입찰키워드</th>
				<th>타입</th>
				<th>플랫폼</th>
				<th>유입수</th>
			</tr>
		</thead>
		<tbody>
		<?
		$where = "where idx != '' ";



			if($search_rkw) $where .= "and st_r_kw like '%$search_rkw%' ";
			if($search_kw) $where .= "and st_kw like '%$search_kw%' ";
			if($search_kw2) $where .= "and st_kw2 like '%$search_kw2%' ";

			if($search_n) $where .= "and st_n like '%$search_n%' ";
			if($search_de) $where .= "and st_de like '%$search_de%' ";
			if($search_value) $where .= "and $search_key like '%$search_value%' ";
			$query = "select count(*) counter from statistic_check $where";
			$bcounter = mysql_fetch_array(mysql_query($query,$connect));
			$totalcount = $bcounter[counter];

			$pageobj = new pageing($sno);
			$pageobj->linkclass = "a";
			$pageobj->totalcount = $totalcount;
			$pageobj->listnum = 10;
			$pageobj->pagenum = 10;
			$pageobj->addpara = "group=$group&code=$code&asumode=$asumode&emode=$emode&etype=$etype&$search_para";
			$PAGEING = $pageobj->setPage();

			if($sno == 0) {
				$page = 0;
				$sno = 0;
			}
			else $page = ($sno / $pageobj->listnum);

			$query = "select * from statistic_check $where order by idx desc limit $sno, ".$pageobj->listnum." ";
			$result = mysql_query($query,$connect);
			while($row=mysql_fetch_array($result)) {
				$row[st_de] == 'desktop' ? $row[st_de]= '<i  class="fa fa-desktop"></i>' : $row[st_de]= '<i  class="fa fa-tablet"></i>' ;

				$naver_ty='<img src="/_util/statistic_admin/img/naver_icon.png" alt="네이버" title="네이버"> ';
				$daum_ty='<img src="/_util/statistic_admin/img/daum_icon.png" alt="다음" title="다음"> ';
				$google_ty='<img src="/_util/statistic_admin/img/google_icon.png" alt="구글" title="구글"> ';
				switch($row[st_ty]){
					case 'PL' :
						$row[st_ty]=$naver_ty.'[PL] 파워링크'; break;
					case 'PSLK' :
						$row[st_ty]=$naver_ty.'[PSLK] 플러스링크'; break;
					case 'BZ' :
						$row[st_ty]=$naver_ty.'[BZ] 비즈사이트'; break;
					case 'CA' :
						$row[st_ty]=$naver_ty.'[CA] 지식인광고'; break;
					case 'BG' :
						$row[st_ty]=$naver_ty.'[BG] 블로그광고'; break;
					case 'TS' :
						$row[st_ty]=$naver_ty.'[TS] 검색탭광고'; break;

					case 'PM' :
						$row[st_ty]=$daum_ty.'[PM] PC 검색 네트워크'; break;
					case 'AM' :
						$row[st_ty]=$daum_ty.'[AM] PC 컨텐츠 네트워크'; break;
					case 'DWCM' :
						$row[st_ty]=$daum_ty.'[DWCM] PC컨텐츠'; break;
					case 'MOBILESA' :
						$row[st_ty]=$daum_ty.'[MOBILESA] 모바일 검색 네트워크'; break;
					case 'MOBILEDA' :
						$row[st_ty]=$daum_ty.'[MOBILEDA] 모바일 컨텐츠 네트워크 Ad@m '; break;

					case 'adwords' :
						$row[st_ty]=$google_ty.'adwords'; break;
					case 'google' :
						$row[st_ty]=$google_ty.'google'; break;
				}
			?>
			<tr>
				<td><input type="checkbox" name="delno[]" value="<?=$row[no]?>"></td>
				<td><i  class="fa fa-link"></i> <a href='#' title='<?=$row[st_refer]?>'>참조</a> <i  class="fa fa-link"></i> <a href='#' title='<?=$row[st_url]?>'>도착</a></td>
				<td><?=$row[st_r_kw]?></td>
				<td><?=$row[st_kw]?></td>
				<td><?=$row[st_kw2]?></td>
				<td><?=$row[st_ty]?></td>
				<td><?=$row[st_de]?></td>
				<td><?=$row[st_cnt]?></td>
			</tr>
		  <?
			$totalcount--;
		  }
		  ?>
		</tbody>
	</table>

	</form>

<ul class='bbs_paging2'>
	<li><?=$PAGEING[start]?></li>
	<li><?=$PAGEING[pregroup]?></li>
	<li><?=$PAGEING[nextgroup]?></li>
	<li><?=$PAGEING[end]?></li>
</ul>

<ul class='bbs_paging'>
	<?=$PAGEING[page]?>
</ul>

</div>
