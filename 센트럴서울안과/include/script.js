<!--
var bNetscape4plus = (navigator.appName == "Netscape" && navigator.appVersion.substring(0,1) >= "4");
var bExplorer4plus = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.substring(0,1) >= "4");

function always_pos()
{
        var yMenuFrom, yMenuTo, yButtonFrom, yButtonTo, yOffset, timeoutNextCheck;

        if ( bNetscape4plus ) { // 네츠케이프 용 설정
                yMenuFrom   = document["floater1"].top;
                yMenuTo     = top.pageYOffset + 450;   // 화면 위쪽으로 부터의 위치
        }
        else if ( bExplorer4plus ) {  // 익스플로러 용 설정
                yMenuFrom   = parseInt (floater1.style.top, 10);
                yMenuTo     = (document.body.scrollTop > 570) ? document.body.scrollTop + 20 : 450; // 화면 위쪽으로 부터의 위치
        }

        timeoutNextCheck = 450;

        if ( Math.abs (yButtonFrom - (yMenuTo + 99)) < 6 && yButtonTo < yButtonFrom ) {
                setTimeout ("always_pos()", timeoutNextCheck);
                return;
        }


        if ( yButtonFrom != yButtonTo ) {
                yOffset = Math.ceil( Math.abs( yButtonTo - yButtonFrom ) / 10 );
                if ( yButtonTo < yButtonFrom )
                        yOffset = -yOffset;

                if ( bNetscape4plus )
                        document["divLinkButton"].top += yOffset;
                else if ( bExplorer4plus )
                        divLinkButton.style.top = parseInt (divLinkButton.style.top, 10) + yOffset;

                timeoutNextCheck = 10;
        }
        if ( yMenuFrom != yMenuTo ) {
                yOffset = Math.ceil( Math.abs( yMenuTo - yMenuFrom ) / 20 );
                if ( yMenuTo < yMenuFrom )
                        yOffset = -yOffset;

                if ( bNetscape4plus )
                        document["floater1"].top += yOffset;
                else if ( bExplorer4plus )
                        floater1.style.top = parseInt (floater1.style.top, 10) + yOffset;

                timeoutNextCheck = 10;
        }

        setTimeout ("always_pos()", timeoutNextCheck);
}
function OnLoad()
{
        var y;

        // 프레임 에서 벗어나게 하는 함수입니다. 프레임에 넣으려면 삭제하세요
        if ( top.frames.length )
         //       top.location.href = self.location.href;

        // 페에지 로딩시 포지션
        if ( bNetscape4plus ) {
                document["floater1"].top = top.pageYOffset + 10;  //97;
                document["floater1"].visibility = "visible";
        }
        else if ( bExplorer4plus ) {
                floater1.style.top = document.body.scrollTop + 10;    //97;
                floater1.style.visibility = "visible";
        }

        always_pos();
        return true;
}

//-->

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}



