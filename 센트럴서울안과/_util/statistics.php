<meta charset='utf-8'/>
<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

	function q_e($qs){ $q=explode('&',$qs); foreach ($q as $i=>$v){ list($k, $v)=explode("=",$v); $q[$k]=e_c($v); unset($q[$i]); } return $q; }
	function e_c($k_e){ $k_e=urldecode($k_e); if(!mb_check_encoding($k_e,'utf-8')){ $k_e=iconv("euc-kr","utf-8",$k_e); } return $k_e; }

	if(!isset($_COOKIE['st_chk'])){

		$u_c=q_e($_SERVER['QUERY_STRING']);
		$sqr = array();
		if(preg_match('/(iPhone|Android|Opera Mini|SymbianOS|Windows CE|BlackBerry|Nokia|SonyEricsson|webOS|PalmOS)/i', $_SERVER['HTTP_USER_AGENT'])) { $sqr[st_de]='mobile'; }else{ $sqr[st_de]='desktop'; }
		if($_SERVER['HTTP_REFERER'] || $u_c){

			$rf = parse_url($_SERVER['HTTP_REFERER']);
			if($u_c[utm_term] || $u_c[NVKWD] || $u_c[DMSKW]){ $sqr[st_kw]=$u_c[utm_term].$u_c[NVKWD].$u_c[DMSKW]; $sqr[st_kw2]=$u_c[utm_term].$u_c[NVADKWD].$u_c[DMKW]; }
			$r_q=q_e($rf[query]); if(!$sqr[st_kw]){ $sqr[st_kw]=$r_q[query].$r_q[p].$r_q[q]; } $sqr[st_r_kw]=$r_q[query].$r_q[p].$r_q[q];
			$sqr[st_ty]=$u_c[NVAR].$u_c[DMCOL].$u_c[src]; $sqr[st_u_ca]=$u_c[utm_campaign]; $sqr[st_u_m]=$u_c[utm_medium]; $sqr[st_u_s]=$u_c[utm_source]; $sqr[st_u_co]=$u_c[utm_content];
			$sqr[st_do]=$rf[host];


			if($sqr[st_do] == "m.search.naver.com"){
				 $sqr[st_n]='네이버모바일';;
			}else if($sqr[st_do] == "m.search.daum.net"){
				 $sqr[st_n]='다음모바일';;
			}else if($sqr[st_do] == "m.search.nate.com"){
				 $sqr[st_n]='다음모바일';;
			}else if($sqr[st_do] == "m.search.zum.com"){
				 $sqr[st_n]='줌모바일';;
			}else if(strpos((string)$sqr[st_do],"naver.com")){
				 $sqr[st_n]='네이버';;
			}else if(strpos((string)$sqr[st_do],"daum.net")){
				 $sqr[st_n]='다음';
			}else if(strpos((string)$sqr[st_do],"nate.com")){
				 $sqr[st_n]='다음';
			}else if(strpos((string)$sqr[st_do],"google.com")){
				 $sqr[st_n]='구글';
			}else if(strpos((string)$sqr[st_do],"google.co.kr")){
				 $sqr[st_n]='구글';
			}else if(strpos((string)$sqr[st_do],"zum.com")){
				 $sqr[st_n]='줌';
			}else if(strpos((string)$sqr[st_do],"yahoo.com")){
				 $sqr[st_n]='야후';
			}else {
				$sqr[st_n]='기타';
			}


		}else{
			$sqr[st_do]='direct'; $sqr[st_n]='직접입력'; $sqr[st_r_kw]='직접입력'; $sqr[st_kw]='직접입력'; $sqr[st_kw2]='직접입력';
		}

		$sqr[st_do] == '' ? $sqr[st_do]='direct' : '' ;
		$sqr[st_n] == '' ? $sqr[st_n]='직접입력' : '' ;
		$sqr[st_r_kw] == '' ? $sqr[st_r_kw]='직접입력' : '' ;
		$sqr[st_kw] == '' ? $sqr[st_kw]='직접입력' : '' ;
		$sqr[st_kw2] == '' ? $sqr[st_kw2]='직접입력' : '' ;
		$sqr[st_ty] == '' ? $sqr[st_ty]='직접입력' : '' ;

		$sqr[st_cnt]=1;
		$sqr[st_agent]= $_SERVER['HTTP_USER_AGENT'];
		$rf2 = parse_url($_SERVER['REQUEST_URI']);
		$_SERVER['HTTP_REFERER'] != '' ? $sqr[st_refer]=$_SERVER['HTTP_REFERER'] : $sqr[st_refer]=$rf2[host] ;
		$sqr[st_url]=$_SERVER['REQUEST_URI'];

		$c_qry1=mysql_query("select count(idx) from statistic_check where st_n='".$sqr[st_n]."' and st_r_kw='".$sqr[st_r_kw]."' and st_kw='".$sqr[st_kw]."' and st_de='".$sqr[st_de]."' and st_url='".$sqr[st_url]."' and st_agent='".$_SERVER['HTTP_USER_AGENT']."' ");
		$c_row1=mysql_fetch_array($c_qry1);

		if($c_row1[0]<1){

			$sqr_i_qry='insert into statistic_check set';
			foreach ($sqr as $key=>$val){
				$sqr_i_qry .= ' '.$key.'="'.$val.'",';
			}
			$sqr_i_qry=substr($sqr_i_qry,0,-1);
			mysql_query($sqr_i_qry);
		} else{
			$pv_sql3=mysql_query("update statistic_check set st_cnt=st_cnt+1 where st_n='".$sqr[st_n]."' and st_r_kw='".$sqr[st_r_kw]."' and st_kw='".$sqr[st_kw]."' and st_de='".$sqr[st_de]."' and st_url='".$sqr[st_url]."' and st_agent='".$_SERVER['HTTP_USER_AGENT']."' ");
		}

		/*쿠키생성*/
		$st_chk_cookie_name='st_chk';
		$st_chk_cookie_value='1';
		setcookie($st_chk_cookie_name,$st_chk_cookie_value,time()+(3600),'/');

	}

	$adm_sql=mysql_fetch_array(mysql_query("select * from admin_config"));

	$adm_ip_block = strpos($adm_sql[adm_ip_block],$_SERVER[REMOTE_ADDR]);
	if($adm_ip_block!==false){
		echo "<script>alert('차단된 아이피 입니다.'); location.replace('http://cyberbureau.police.go.kr');</script>";
	}
?>