<!--
var bNetscape4plus = (navigator.appName == "Netscape" && navigator.appVersion.substring(0,1) >= "4");
var bExplorer4plus = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.substring(0,1) >= "4");

function always_pos()
{
        var yMenuFrom, yMenuTo, yButtonFrom, yButtonTo, yOffset, timeoutNextCheck;

        if ( bNetscape4plus ) { // ���������� �� ����
                yMenuFrom   = document["floater1"].top;
                yMenuTo     = top.pageYOffset + 450;   // ȭ�� �������� ������ ��ġ
        }
        else if ( bExplorer4plus ) {  // �ͽ��÷η� �� ����
                yMenuFrom   = parseInt (floater1.style.top, 10);
                yMenuTo     = (document.body.scrollTop > 570) ? document.body.scrollTop + 20 : 450; // ȭ�� �������� ������ ��ġ
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

        // ������ ���� ����� �ϴ� �Լ��Դϴ�. �����ӿ� �������� �����ϼ���
        if ( top.frames.length )
         //       top.location.href = self.location.href;

        // �信�� �ε��� ������
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



