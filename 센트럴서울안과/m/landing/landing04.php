<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name='viewport' content='width=640,user-scalable=no, target-densitydpi=device-dpi' />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>:: 센트럴서울안과 모바일랜딩페이지:: </title>
	<style type="text/css">
		*{margin:0;padding:0;overflow-x:hidden;}
		.cnt {width:640px;margin:0 auto;text-align:center; }
		.cnt img{display:block;}
		.councel{width:100%;  position:relative; }
		.councel_cnt{background:url('img/counsel_bg.jpg') no-repeat; width:640px; height:800px;margin:0 auto; position:relative;}
		.councel_cnt input{position:absolute;border:1px solid #9e9e9e;font-size:25px}
		.c_name{width:422px; height:46px;top: 102px;left: 166px;}
		.c_phone1{width:120px; height:46px; top:160px; left: 166px;}
		.c_phone2{width:120px; height:46px; top:160px; left: 317px;}
		.c_phone3{width:120px; height:46px; top:160px; left: 469px;}
		.c_agree{width: 21px;height: 21px;top: 632px;left: 47px;}
		.c_txt{width:175px; height:85px; top:44px; left:910px;position:absolute;}
		.btn01{bottom:34px; right:200px;}
		.c_text{width:422px;height:200px; position:absolute; top:219px; left:166px;border:1px solid #9e9e9e;font-size:25px }
		.c_agreetxt{width: 540px;position: absolute;left: 50px;top: 443px;border: 1px solid #9e9e9e;padding: 10px;box-sizing: border-box;}
	</style>
	<script type="text/javascript" src="/js/jquery-1.12.2.min.js"></script>
<script language="JavaScript">

function checkForm(cf) {
	if(!cf.agreement.checked){
		alert("작성을 위해서 이용자 약관에 동의해 주시기 바랍니다.");
		return false;
	}
	if(cf.name.value=="") {
		alert("이름을 입력하세요");
		cf.name.focus();
		return false;
	}
	if(cf.hphone1.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone1.focus();
		return false;
	}
	if(cf.hphone2.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone2.focus();
		return false;
	}
	if(cf.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone3.focus();
		return false;
	}


	return true;
}
$(document).ready(function(){

	$('.c_phone1').keyup(function(){
	if($(this).val().length == 3){
	$('.c_phone2').focus();
	}
	});
	$('.c_phone2').keyup(function(){
	if($(this).val().length == 4){
	$('.c_phone3').focus();
	}
	});
	$('.c_phone3').keyup(function(){
	if($(this).val().length == 4){
	$('.c_text').focus();
	}
	});
});

function gosite(){

}
</script>
</head>
<body>
<div class="wrapper">
	<div class="cnt">
		<img src="img/landing04_1.jpg" alt="CS 엑스퍼트 라섹">
	</div>
	<div class="councel">
	<form name="form" method="post" action="/inc/proc3_db.php" onSubmit="return checkForm(this);">
		<input type="hidden" name="code" value="landing04 ">
		<input type="hidden" name="cate3" value="CS 엑스퍼트 라섹">
		<input type="hidden" name="position" value="CS 엑스퍼트 라섹">
		<input type="hidden" name="cate1_input" value="MOBILE">
		<input type="hidden" name="cate2_input" value="<?=$nf_kwd?>">
		<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
		<div class="councel_cnt">
			<input type="text" name="name" class="c_name">
			<p class="c_telarea">
				<input type="tel" class="c_phone1" name="hphone1" maxlength='3' />
				<input type="tel" class="c_phone2" name="hphone2" maxlength='4' />
				<input type="tel" class="c_phone3" name="hphone3" maxlength='4' />
			</p>
			<textarea name="contents" id="" class="c_text"></textarea>
			<input type="checkbox" class="c_agree" name="agreement" checked />
			<input type="image" class="btn01" src="img/counsel_btn.jpg" alt="상담신청"/>
			<textarea name="" id="" cols="30" rows="10" class="c_agreetxt">센트럴서울안과는 귀하의 개인정보보호를 매우 중요시하며, 개인정보보호방침을 통하여 귀하께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.


			▶ 개인정보 수집에 대한 동의
			센트럴서울안과는 귀하께 회원가입시 개인정보보호방침 또는 이용약관의 내용을 공지 하며 회원가입버튼을 클릭하면 개인정보 수집에 대해 동의하신 것으로 봅니다.

			▶ 개인정보의 수집목적 및 이용목적
			센트럴서울안과는 다음과 같은 목적을 위하여 개인정보를 수집하고 있습니다.
			- 센트럴서울안과 및 제휴사이트 서비스를 위한 회원 가입 및 이용아이디 발급
			- 서비스의 이행 ( 경품 등 우편물 배송 및 예약에 관한 사항)
			- 장애처리 및 개별 회원에 대한 개인 맞춤서비스
			- 서비스 이용에 대한 통계 수집
			- 기타 새로운 서비스 및 정보 안내

			단, 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보는 수집하지 않습니다. 센트럴서울안과는 상기 범위내에서 보다 풍부한 서비스를 제공하기 위해 이용자의 자의에 의한 추가 정보를 수집합니다.

			▶ 수집하는 개인정보 항목
			회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다.
			- 수집항목 : 이름 , 생년월일 , 성별 , 로그인ID , 비밀번호 , 자택 전화번호 , 자택 주소 , 휴대전화번호 , 이메일 , , 서비스 이용기록 , 접속 로그 , 쿠키 , 접속 IP 정보 , 결제기록
			- 개인정보 수집방법 : 홈페이지(회원가입,게시판,쇼핑몰)

			▶ 쿠키에 의한 개인정보 수집
			센트럴서울안과는 귀하에 대한 정보를 저장하고 수시로 찾아내는 '쿠키(cookie)'를 사용합니다. 쿠키는 웹사이트가 귀하의 컴퓨터 브라우저(넷스케이프, 인터넷 익스플로러 등)로 전송하는 소량의 정보입니다. 귀하께서 웹사이트에 접속을 하면 센트럴서울안과 웹서버는 귀하의 브라우저에 있는 쿠키의 내용을 읽고, 귀하의 추가정보를 귀하의 컴퓨터에서 찾아 접속에 따른 아이디등의 추가 입력 없이 서비스를 제공할 수 있습니다. 쿠키는 귀하의 컴퓨터는 식별하지만 귀하를 개인적으로 식별하지는 않습니다. 또한 귀하는 쿠키에 대한 선택권이 있습니다. 웹브라우저의 옵션을 조정함으로써 모든 쿠키를 다 받아들이거나, 쿠키가 설치될 때 통지를 보내도록 하거나, 아니면 모든 쿠키를 거부할 수 있는 선택권을 가질 수 있습니다.

			▶ 개인정보의 제3자에 대한 제공
			센트럴서울안과는 귀하의 개인정보를 &lt;개인정보의 수집목적 및 이용목적> 에서 고지한 범위내에서 사용하며, 동 범위를 초과하여 이용하거나 타인 또는 타기업·기관에 제공하지 않습니다. 그러나 보다 나은 서비스 제공을 위하여 귀하의 개인정보를 제휴사에게 제공하거나 또는 제휴사와 공유할 수 있습니다. 단, 개인정보를 제공하거나 공유할 경우에는 사전에 귀하께 고지하여 드립니다.

			▶ 개인정보의 열람·정정
			귀하는 언제든지 등록되어 있는 귀하의 개인정보를 열람하거나 정정하실 수 있습니다. 개인정보 열람 및 정정을 하고자 할 경우에는 &lt;회원정보수정> 을 클릭하여 직접 열람 또는 정정하거나, 개인정보관리책임자에게 E-mail로 연락하시면 조치하여 드립니다. 귀하가 개인정보의 오류에 대한 정정을 요청한 경우, 정정을 완료하기 전까지 당해 개인정보를 이용하지 않습니다.

			▶ 개인정보 수집, 이용, 제공에 대한 동의철회
			회원 가입 등을 통해 개인정보의 수집, 이용, 제공에 대해 귀하께서 동의하신 내용을 귀하는 언제든지 철회하실 수 있습니다. 동의철회는 웹사이트 및 개인정보관리책임자에게 E-mail등으로 연락하시면 즉시 개인정보의 삭제 등 필요한 조치를 하겠습니다.

			▶ 개인정보의 보유기간 및 이용기간
			귀하의 개인정보는 다음과 같이 개인정보의 수집목적 또는 제공받은 목적이 달성되면 파기됩니다.
			- 회원 가입정보의 경우, 회원 가입을 탈퇴하거나 회원에서 제명된 때
			- 예약의 경우, 예약에 따른 검진 및 처리가 만료된 때

			위 보유기간에도 불구하고 계속 보유하여야 할 필요가 있을 경우에는 귀하의 동의를 받습니다.

			▶ 개인정보보호를 위한 기술적 대책
			센트럴서울안과는 귀하의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 안전성 확보를 위하여 다음과 같은 기술적 대책을 강구하고 있습니다. 귀하의 개인정보는 비밀번호에 의해 보호되며, 파일 및 전송 데이터를 암호화하거나 파일 잠금기능(Lock)을 사용하여 중요한 데이터는 별도의 보안기능을 통해 보호되고 있습니다. 센트럴서울안과는 회원인증과 관련 암호알고리즘을 이용하여 네트워크 상의 개인정보를 안전하게 전송할 수 있는 인증 및 보안장치를 채택하고 있으며 시스템상 사정에 의해 미시행시 도우미에 의한 의사 확인을 시행하고 있습니다. 해킹 등에 의해 귀하의 개인정보가 유출되는 것을 방지하기 위해, 외부로부터의 침입을 차단하는 장치를 이용하고 있으며, 각 서버마다 침입탐지시스템을 설치하여 24시간 침입을 감시하고 있습니다.

			▶ 의견수렴 및 불만처리
			센트럴서울안과는 개인정보보호와 관련하여 귀하가 의견과 불만을 제기할 수 있는 창구를 개설하고 있습니다. 개인정보와 관련한 불만이 있으신 분은 센트럴서울안과의 개인정보 관리책임자에게 의견을 주시면 접수 즉시 조치하여 처리결과를 통보해 드립니다.

			▶ 14세 미만 어린이들에 대한 보호정책
			센트럴서울안과는 14세 미만 어린이들에 대한 회원미가입 정책과 함께 개인정보를 부모의 동의 없이 제3자와 공유하지 않으며 사용자에 관한 정보를 매매하거나 대여하지 않습니다.


			▶ 개인정보의 파기절차 및 방법
			회사는 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체없이 파기합니다. 파기절차 및 방법은 다음과 같습니다.

			ο 파기절차
			회원님이 회원가입 등을 위해 입력하신 정보는 목적이 달성된 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함)
			내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장된 후 파기되어집니다.
			별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유되어지는 이외의 다른 목적으로 이용되지 않습니다.

			ο 파기방법
			- 전자적 파일형태로 저장된 개인정보는 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제합니다.

			▶ 개인정보 관리책임자
			센트럴서울안과는 개인정보에 대한 의견수렴 및 불만처리의 정책을 담당하는 개인정보정책 담당 관리책임자를 지정하고 있습니다. 본 정책에 대한 불만사항이 있으시다면 아래 연락처로 문의 하시면 친절히 처리하여 드리겠습니다.

			[ 개인정보정책 책임자 ]
			성 명 : 최재완
			소 속 : 센트럴서울안과 / TEL : 02)792-2226
			[ 개인정보정책 담당자 ]

			성 명 : 최재완
			소 속 : 센트럴서울안과 / TEL : 02)792-2226

			[ 시행일 ]
			본 개인정보보호정책은 2011년 11월 24일부터 시행합니다.


			&lt;센트럴서울안과 웹사이트 개인정보취급방침>

			셀플란트병원 는 귀하의 개인정보보호를 매우 중요시하며, 개인정보보호방침을 통하여 귀하께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.



			&lt; 개인정보의 수집목적 및 이용목적 >

			병원은 다음과 같은 목적을 위하여 개인정보를 수집하고 있습니다.

			- 병원 및 제휴사이트 서비스를 위한 회원 가입 및 이용아이디 발급
			- 서비스의 이행 (경품 등 우편물배송 및 예약에 관한 사항)
			- 장애처리 및 개별 회원에 대한 개인 맞춤서비스
			- 서비스 이용에 대한 통계 수집
			- 기타 새로운 서비스 및 정보 안내

			단, 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보는 수집하지 않습니다.
			병원은 상기 범위내에서 보다 풍부한 서비스를 제공하기 위해 이용자의 자의에 의한 추가 정보를 수집합니다.



			&lt; 수집하는 개인정보 항목 >

			회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다.

			- 수집항목 : 이름 , 생년월일 , 성별 , 로그인ID , 비밀번호 , 자택 전화번호 , 자택 주소 , 휴대전화번호 , 이메일 , , 서비스 이용기록 , 접속 로그 , 쿠키 , 접속 IP 정보 , 결제기록
			- 개인정보 수집방법 : 홈페이지(회원가입,게시판,쇼핑몰)



			&lt; 개인정보의 보유기간 및 이용기간 >

			귀하의 개인정보는 다음과 같이 개인정보의 수집목적 또는 제공받은 목적이 달성되면 파기됩니다.

			- 회원 가입정보의 경우, 회원 가입을 탈퇴하거나 회원에서 제명된 때
			- 예약의 경우, 예약에 따른 검진 및 처리가 만료된 때

			위 보유기간에도 불구하고 계속 보유하여야 할 필요가 있을 경우에는 귀하의 동의를 받습니다.

			</textarea>
		</div>
		</form>
	</div>
</div>
</body>
</html>
