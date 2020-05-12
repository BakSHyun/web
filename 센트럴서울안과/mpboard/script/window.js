///////////////////////////////////////////////////////////////////////////////////////
//	팝업 관련 함수
///////////////////////////////////////////////////////////////////////////////////////

// 공지 팝업창을 띄운다.
function popup(htmlvalue,names, width, Height,top,left, scrollbar,resizable) { 
	if(scrollbar == "") scrollbar='yes';
	if(resizable == "") resizable='yes';
	if(scrollbar == "1") scrollbar='yes';
	if(resizable == "1") resizable='yes';
	if(scrollbar == "0") scrollbar='no';
	if(resizable == "0") resizable='no';
	if(scrollbar == "true") scrollbar='yes';
	if(resizable == "true") resizable='yes';
	if(scrollbar == "false") scrollbar='no';
	if(resizable == "false") resizable='no';
	if(top == "") top='0';
	if(left == "") left='0';
	window.open (htmlvalue, names, "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars="+ scrollbar+", resizable="+resizable+", copyhistory=no, width=" + width + ", height=" + Height+ ",top=" + top +",left="+ left);
}


// 새창을 띄우고 자신은 닫힌다.
function open_close(gourl) {
	window.open (gourl, "_blank");
	window.close();
}


//새창띄우기  
function newopen(URL, target, w, h, s) {  
    if(s) s = 'yes';  
    else s = 'no';  
    var its = window.open(url,target,'width='+w+',height='+h+',top=0,left=0,scrollbars='+s);  
    its.focus();  
}  


///////////////////////////////////////////////////////////////////////////////////////
//	이동 관련 함수
///////////////////////////////////////////////////////////////////////////////////////


// 자신은 닫히고 자신을 열은 페이지는 이동시킨다.
function close_move(gourl) {
	opener.window.location=gourl;
	window.close();
}


// 사이트를 이동시 이동여부를 체크하고 이동시켜준다.
function gourl(gURL,message) {
	
	if(message != "") {
		if(confirm(message)) {
			location.href=gURL;
			return;
		} else {
			return;
		}
	}
	
	document.location=gURL;
}


/**
 * 페이지 이동을 합니다.
 * @param		delay		페이지 이동 지연 시간 (milliseconds)
 */
function movepage(str,delay)
{
	if (delay==null) 
		window.location.href=str;
	else 
		window.setInterval("window.location.href='"+str+"'",delay);
}


/**
 * 현재 페이지 새로 고침
 */
function reloadpage(delay)
{
if (delay==null) 
		window.location.reload();
	else 
		window.setInterval("window.location.reload()",delay);
}



///////////////////////////////////////////////////////////////////////////////////////
//	브라우저 관련 함수
///////////////////////////////////////////////////////////////////////////////////////

/**
 * 브라우저의 버전을 체크합니다.
 */
function browserinfo()
{
	var tempDocument = window.document;

	if (tempDocument.all && tempDocument.getElementById) // 인터넷 익스플로러 5.x
	{ 
		return 1;
	}
	else if (tempDocument.all && !tempDocument.getElementById) // 인터넷 익스플로러 4.x
	{ 
		return 2;
	}
	else if (tempDocument.getElementById && !tempDocument.all) // 넷스케이프 6
	{ 
		return 3;
	}
	else if (tempDocument.layers) // 넷스케이프 4.x
	{	 
		return 4;
	}
}


/**
 * 브라우저의 시작페이지 변경창을 띄웁니다. (IE전용)
 */
function SetHomePage(url) 
{
	window.document.write("<SPAN ID='objHomePage' STYLE='behavior:url(#default#homepage); display:none;' >s</SPAN>");
	window.document.all.objHomePage.setHomePage(url);
}

/**
 * 브라우저의 즐겨찾기 추가창을 띄웁니다. (IE전용)
 */
function AddFavorite(url, homename) 
{
	window.external.AddFavorite(url, homename);
}


/**
 * 브라우저의 제목표시줄을 설정합니다.
 */
function SetWindowTitle(str) 
{
	document.title = str;
}

/**
 * 브라우저의 제목표시줄의 문자열을 반환합니다.
 */
function GetWindowTitle() 
{
	return document.title;
}

/**
 * 브라우저의 상태표시줄을 설정합니다.
 */
function SetStatusTitle(str) 
{
	window.status = str;
}

/**
 * 브라우저의 상태표시줄의 문자열을 반환합니다.
 */
function GetStatusTitle() 
{
	return window.status;
}





///////////////////////////////////////////////////////////////////////////////////////
//	기타 함수
///////////////////////////////////////////////////////////////////////////////////////

/**
 * 윈도우가 열려있는지 체크합니다.
 */
function isWindow(win)
{
	if (!win.closed) return true;
	else return false;
}


/**
 * 모니터 해상도를 구합니다.
 */
function GetWindowResolution() 
{
	if (window.screen)
	{
		var returnArray = new Array(2);
		returnArray[0] = window.screen.width;
		returnArray[1] = window.screen.height;
		return returnArray;
	}
	else return false;
}

/**
 * 아이프래임 자동 높이조정
 * 예) <iframe src="어쩌구" onload="iframe_autoresize(this)">
 */
function iframe_autoresize(arg) {
	arg.width = eval(arg.name+".document.body.scrollWidth");
    arg.height = eval(arg.name+".document.body.scrollHeight");
}
