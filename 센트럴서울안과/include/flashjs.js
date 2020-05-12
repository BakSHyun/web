
//##### Flash를 페이지에 넣을때
// 사용예제
// FlashLoad("swfUrl","swfW","swfH","bg","wmode","code","id")
// swfUrl = 플래시가 들어있는 경로(상태 또는 절대경로)
// swfW = 가로길이(100% 또는 고정크기)
// swfH = 세로길이(100% 또는 고정크기)
// bg = 배경색
// wmode = 투명여부 (투명을 사용할 경우 "1"을 입력해 주고 그렇지 않을 경우 빈값을 주면 됨.)
// code = 플래시내 함수를 사용할때 이곳에 넣어 줍니다
// id = 아이디값을 넣어줍니다(주로 플래시의 이름을 넣어 줌.
function showFlash(swfUrl,swfW,swfH,bg,wmode,code,id){
{
	document.writeln(getFlash(swfUrl,swfW,swfH,bg,wmode,code,id));
}

function getFlash(swfUrl,swfW,swfH,bg,wmode,code,id)
{
	var result = "";
	if(id==''||id===undefined){idStr='id=House'}else{idStr='id='+id}
	if(wmode){
		wmodeStr1='<param name="wmode" value="transparent" />'
		wmodeStr2='wmode=transparent'
	} else {
		wmodeStr1='<param name="wmode" value="opaque" />';
		wmodeStr2='wmode=opaque';
	}
	result += ('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" '+idStr+' width='+swfW+' height='+swfH+'>')
	result += ('<param name="movie" value="'+swfUrl+'" />')
	result += ('<param name="menu" value="false" />')
	result += ('<param name="allowScriptAccess" value="always" />')
	result += ('<param name="quality" value="best" />')
	result += ('<param name="flashVars" value="'+code+'" />')
	result += (wmodeStr1)
	result += ('<embed src="'+swfUrl+'" width='+swfW+' height='+swfH+' '+idStr+' '+wmodeStr2+' menu=false allowScriptAccess=always quality=best type="application/x-shockwave-flash" pluginspage="https://www.macromedia.com/go/getflashplayer" />')
	result += ('</object>')

	return result;
}

}