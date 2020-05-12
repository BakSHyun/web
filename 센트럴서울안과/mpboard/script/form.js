
///////////////////////////////////////////
//
//	FORM Object Check Function
//
///////////////////////////////////////////

/*
 TextField 의 값이 있는지 없는지 검사하여 메세지를 뿌려준다.
 return 값이 true 일때는 값이 없을 경우 이며,
 return 값이 false 일때는 값이 있을 경우 이다.
*/
function TextField_check(item, message_value) {
	
	var strMemo = item.value;
	var resultMemo = strMemo.split(" ");
	
	if (!item.value || (strMemo.length + 1 == resultMemo.length)) {
		alert(message_value);
		item.focus();
		return true;	// 값이 없을 경우
	}
	return false;		// 값이 있을 경우
}

/*
 Select 풀다운 박스를 선택 했는지 검사하여 메세지를 뿌려준다.
 return 값이 true 일때 선택 되지 않은 경우 이며,
 return 값이 false 일때는 선택되었을 경우 이다.
 
*/
function Select_check(item, message_value) {
	if (item.selectedIndex == 0) {
		alert(message_value);
		item.focus();
		return true;	// 선택을 하지 않았을 경우
	}
	return false;		// 선택을 하였을 경우
	
}


/*
 CheckBox 와 Radio 의 체크를 검사한다.
 return 값이 true 이면 아무것도 선택되지 않은 것이며,
 return 값이 flase 이면 하나이상이 선택된 경우 이다.
*/
function Checkbox_Radio_check(item,message_value)
{
	var i, flag=true;
	for (i=0; i<item.length; i++) {
		if (item[i].checked == true) {
			flag = false;
		}
	}
	if (flag) {
		alert(message_value);
		item[0].focus();
		return true;
	} else {
		return false;
	}
}




/**************************************  
* 기능: 공통 라이브러리  
* 작성일: 2002-07-04  
* 작성자: 거친마루  
* 수정: 하근호  
* 2차수정 : 트론™  
* 2차수정일 : 2002-09-09 
* 3차수정 : 이동철 
* 3차수정일 : 2002-12-24 
* 4차수정 : 김경호 
* 4차수정일 : 2002-12-30 
*************************************** 
* 꼭 FORM에 name을 정의해 준다!! 
* <FORM name="form1" onSubmit="return chkForm(this)"> 
* input tag에 대한 설명  
* <input  
*    type="text" //체크할 형식  
*    name="id" //넘어갈이름  
*    hname="아이디" //경고창에 나타낼 문자열  
*    oname="아이디" // 정규식체크후 경고창에 나타낼 문자열, option 이 있는 곳에만 선언 
*    option="regId" //어떤 정규식으로 처리할지 선언  
*    required //꼭 체크를 원하는 항목에 설정  
* >  
***************************************/ 

function chkForm(f) 
{  
    var i,currEl,varcheck;
    var checkcurrE;
    var jumincheck,jumincurrE;
     
    

    for(i = 0; i < f.elements.length; i++){  
        currEl = f.elements[i];  
        //필수 항목을 체크한다.   
        if (currEl.getAttribute("required") != null) {  
        	
            if(currEl.type == "TEXT" || currEl.type == "text" ||  
               currEl.tagName == "SELECT" || currEl.tagName == "select" ||  
               currEl.tagName == "TEXTAREA" || currEl.tagName == "textarea"){  
                if(!chkText(currEl,currEl.hname)) return false;  

            } else if(currEl.type == "PASSWORD" || currEl.type == "password"){  
                if(!chkText(currEl,currEl.hname)) return false;  

            } else if(currEl.type == "CHECKBOX" || currEl.type == "checkbox"){  
                if(!chkCheckbox(f, currEl,currEl.hname)) return false;  

            } else if(currEl.type == "RADIO" || currEl.type == "radio"){  
                if(!chkRadio(f, currEl,currEl.hname)) return false;  

            } 
            
        } 
        
        
        // 입력 페턴을 체크한다. 
        if(currEl.getAttribute("option") != null && currEl.value.length > 0){        	
            if(!chkPatten(currEl,currEl.option,currEl.oname)) return false;  
        }
        if(currEl.getAttribute("notdaum") != null && currEl.value.length > 0){        	
            if(!chkDaum(currEl,currEl.value)) return false;  
        }
        if(currEl.getAttribute("equal") != null && currEl.value.length > 0){
            	if(varcheck!=null){
            		//alert(varcheck);  
            		//alert(currEl.value);  
            		if(!chkEqual(currEl,checkcurrE,currEl.value,varcheck,currEl.checkname)) return false;
            		 
            		             		 
            	}else{
            		checkcurrE =currEl;     		
        		varcheck=currEl.value;
        		
        	}
        }
        if(currEl.getAttribute("jumin") != null && currEl.value.length > 0){
            	if(jumincheck!=null){
            		//alert(varcheck);  
            		//alert(currEl.value);  
            		if(!isValidResno(jumincurrE,currEl)) return false;
            		 
            		             		 
            	}else{
            		jumincurrE =currEl;     		
        		jumincheck=currEl.value;
        		
        	}
        }                        
    } 
    
    
}
function chkDaum(filed,mail_value) { 
	var mail = mail_value; 
	mail = mail.toLowerCase(); 
	var mail_array = mail.split("@"); 
	if(mail_array[1] == 'hanmail.net' || mail_array[1] == 'daum.net') { 
		alert("죄송합니다.한메일은 안됩니다. 다른 E-mail을 적어주시기 바랍니다."); 
		filed.value="";
		filed.focus();
		return false;  
	}else{  
	    return true;
	} 

}
 
 function chkEqual(field,field2,value1,value2,name)
{
	 if(value1 != value2){  
	        alert(name); 
	        field.value = "";
	        field2.value = "";
	        field2.focus();  	        
	        return false;  
	    }else{  
	    return true;
	    varcheck="";  
	}  

} 



function chkPatten(field,patten,name) 
{  
    var regNum =/^[0-9]+$/;  
    var regPhone =/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/;                     // 형식 : 033-1234-5678 
    var regMail =/^[_a-zA-Z0-9-]+@[._a-zA-Z0-9-]+\.[a-zA-Z]+$/;  
    var regDomain =/^[.a-zA-Z0-9-]+.[a-zA-Z]+$/;  
    var regAlpha =/^[a-zA-Z]+$/;  
    var regHost =/^[a-zA-Z-]+$/;  
    var regHangul =/[가-힣]/;  
    var regHangulEng =/[가-힣a-zA-Z]/;  
    var regHangulOnly =/^[가-힣]*$/;  
    var regId = /^[a-zA-Z]{1}[a-zA-Z0-9_-]{4,15}$/;  
    var regId2 =/^[a-z]{1}([0-9a-z_]{3,11})$/;     //영문 소문자, _ ,숫자만 가능,4-12
    var regId3 = /^[a-zA-Z]{1}[a-zA-Z0-9]{3,9}$/;  
    var regDate =/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;                         // 형식 : 2002-08-15     

    patten = eval(patten);  
    if(!patten.test(field.value)){  
        alert(name);  
        field.focus();  
        return false;  
    }  
    return true;  
}  

function chkText(field, name) 
{ 
    fieldvalue = field.value; 
    fieldvalue = fieldvalue.split(" "); 
     
    if(field.value.length + 1 == fieldvalue.length){  
        alert(name);  
        //field.value = ""; 
        field.focus();  
        return false;  
    }  
    return true;  
} 

function chkCheckbox(form, field, name) 
{ 
	alert("hi checkbox !!!");
    /*
    fieldname = eval(form.name+'.'+field.name);
    */
    //if (!fieldname.checked){ 
    if (!form.field.checked){ 
        alert(name);  
        field.focus();
        return false;  
    } 
    
    return true;  
    
} 

function chkRadio(form, field, name) 
{ 
    fieldname = eval(form.name+'.'+field.name); 
    for (i=0;i<fieldname.length;i++) { 
        if (fieldname[i].checked) 
            return true;  
    } 
    alert(name);  
    field.focus();  
    return false;  
}  

/*
//패스워드란과 패스워드 확인 에서 비교 할때는  

<TABLE BORDER="1"> 
<FORM name="form1" METHOD="post" ACTION="" onSubmit="return chkForm(this)"> 
<TR> 
    <TD>체크박스</TD> 
    <TD> 
        <INPUT TYPE="checkbox" NAME="checkbox" VALUE="checkbox" required hname="체크박스를 선택해 주세요."> 
    </TD> 
</TR> 
<TR> 
    <TD>라디오</TD> 
    <TD> 
        <INPUT TYPE="radio" NAME="radiobutton" VALUE="1" required hname="라디오를 선택해 주세요.">1 
        <INPUT TYPE="radio" NAME="radiobutton" VALUE="2">2 
    </TD> 
</TR> 
<TR> 
    <TD>셀렉트</TD> 
    <TD> 
        <SELECT NAME="제품종류"  required hname="셀렉트를 선택해 주세요."> 
            <OPTION VALUE=""></OPTION> 
            <OPTION VALUE="스케이트">스케이트</OPTION> 
            <OPTION VALUE="프레임">프레임</OPTION> 
            <OPTION VALUE="휠">휠</OPTION> 
            <OPTION VALUE="베어링">베어링</OPTION> 
            <OPTION VALUE="보호장구">보호장구</OPTION> 
            <OPTION VALUE="기타">기타</OPTION> 
        </SELECT> 
    </TD> 
</TR> 
<TR> 
    <TD>패스워드</TD> 
    <TD> 
        <INPUT TYPE="password" NAME="비밀번호" SIZE="30" VALUE="" required hname="비밀번호를 넣어주세요."> 
    </TD> 
</TR> 
<TR> 
    <TD>텍스트</TD> 
    <TD> 
        <INPUT TYPE="text" NAME="이름" SIZE="30" VALUE="" required hname="이름을 넣어주세요."> 
    </TD> 
</TR> 
<TR> 
    <TD>이메일</TD> 
    <TD> 
    notdaum은 한메일이나 다음 메일 체크!!
        <INPUT TYPE="text" NAME="이메일" SIZE="30" VALUE="" required notdaum option="regMail" hname="이메일을 넣어주세요." oname="이메일 형식이 올바르지 않습니다." comp="equal1"> 
    </TD> 
</TR> 
 <tr> 
       <td >주민등록번호 체크</td>
       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> //jumin은 주민번호 체크시 두  input box에  jumin를 적는다 
        <td height="22"><input name="주민등록번호"1   required  jumin hname="주민 번호를 넣어주세요." >
                       ㅡ 
      <input name="주민등록번호1" type="text"  required   jumin hname="주민 번호를 넣어주세요." ></td>
 </tr>
 <tr>// equal는 비교해서 같아야 할 경우 두 input box에 적는다!!
                  <td >비밀번호</td>
                  <td><input name="비밀번호" type="password" class="input15" size="10" maxlength="10" required hname="비밀번호을 확인해 주셔요." equal>
                    <font color="#006699">[알파벳/숫자 조합 4자 이상 10이하]</font></td>
                </tr>
                <tr > 
                  <td >비밀번호 확인</td>
                  <td><input name="비밀번호 확인" type="password"  required hname="비밀번호확인란을 확인해 주셔요.."  equal checkname="비밀번호와 확인란에 값이 일치해야 합니다."></td>
                </tr>
<TR> 
    <TD>전화번호</TD> 
    <TD> 
        <INPUT TYPE="text" NAME="집전화" SIZE="30" VALUE="" required option="regPhone" hname="전화번호를 넣어주세요." oname="전화번호 형식이 올바르지 않습니다." comp="equal1"> 
    </TD> 
</TR> 
<TR> 
    <TD>날짜</TD> 
    <TD> 
        <INPUT TYPE="text" NAME="날짜" VALUE="" required option="regDate" hname="날짜를 넣어주세요." oname="날짜형식이 올바르지 안습니다."> 
    </TD> 
</TR> 
<TR> 
    <TD>글</TD> 
    <TD> 
        <TEXTAREA NAME="글" COLS="50" ROWS="5" required hname="남길글을 넣어 주세요."></TEXTAREA> 
    </TD> 
</TR> 
<TR> 
    <TD> </TD> 
    <TD> 
        <INPUT TYPE="submit" NAME="Submit" VALUE="확인"> 
    </TD> 
</TR> 
</FORM> 
</TABLE> 





<TABLE BORDER="1"> 
<FORM name="form2" METHOD="post" ACTION="" onSubmit="return chkForm(this)"> 
<TR> 
    <TD>체크박스</TD> 
    <TD> 
        <INPUT TYPE="checkbox" NAME="checkbox" VALUE="checkbox" required hname="체크박스를 선택해 주세요."> 
    </TD> 
</TR> 
<TR> 
    <TD>라디오</TD> 
    <TD> 
        <INPUT TYPE="radio" NAME="radiobutton" VALUE="1" required hname="라디오를 선택해 주세요.">1 
        <INPUT TYPE="radio" NAME="radiobutton" VALUE="2">2 
    </TD> 
</TR> 
<TR> 
    <TD> </TD> 
    <TD> 
        <INPUT TYPE="submit" NAME="Submit" VALUE="확인"> 
    </TD> 
</TR> 
</FORM> 
</TABLE> 

*/


