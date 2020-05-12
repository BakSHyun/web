// JavaScript Document
//HOME
function home(){window.location.href="../main/main.php"}


//MEMBER
function login(){window.location.href="https://www.cseye.net:8033/08_member/login.php"}
function logout(){window.location.href="/ammember/logout_session.php?return_url=/"}
function join01(){window.location.href="https://www.cseye.net:8033/08_member/join.php"}
function join02(){window.location.href="https://www.cseye.net:8033/08_member/join.php"}
function idpw(){window.location.href="https://www.cseye.net:8033/08_member/idpw.php"}
function edit(){window.location.href="https://www.cseye.net:8033/08_member/edit.php"}
function sec(){window.location.href="https://www.cseye.net:8033/08_member/sec.php"}
function sitemap(){window.location.href="../08_member/sitemap.php"}
function mail(){window.location.href="mailto:cheilos@cheilos.com"}
function privacy(){window.location.href="../08_member/privacy.php"}

function mail(){window.location.href="mailto:highannowon@hanmail.net"} //

/* 화면 확대 축소 시작 IE 전용 */
var nowZoom = 100; // 현재비율
var maxZoom = 200; // 최대비율(500으로하면 5배 커진다)
var minZoom = 80; // 최소비율

//화면 키운다.
function zoomIn() {
	if (nowZoom < maxZoom) {
		nowZoom += 10; //25%씩 커진다.
	} else {
		return;
	}
	
	document.body.style.zoom = nowZoom + "%";
}

//화면 줄인다.
function zoomOut() {
	if (nowZoom > minZoom) {
		nowZoom -= 10; //25%씩 작아진다.
	} else {
		return;
	}
	
	document.body.style.zoom = nowZoom + "%";
}

function zoomEmty() {
	nowZoom = 100;
	document.body.style.zoom = "100%";
}
/* 화면 확대 축소 끝 */