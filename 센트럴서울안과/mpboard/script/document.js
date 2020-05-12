
// idvalue="viewmode" 인것들중에 해당 내용만 보여주고 나머지는 보여주지 않는다.
function local_view(localid, idvalue){
	localid.style.display=localid.style.display=='none' ? '' : 'none' 	
	for(i=0; i < document.all.length ;i++) {
		if(localid!=document.all[i] && document.all[i].idvalue == idvalue) document.all[i].style.display=  'none'
	}
}
/* 
* 예제
<table>
<tr id=v_1 style="DISPLAY: none"  idvalue="viewmode">
	<td onClick="local_view(document.all.v_1, 'viewmode')">
	내용1
	</td>
</tr>
<tr id=v_2 style="DISPLAY: none"  idvalue="viewmode">
	<td onClick="local_view(document.all.v_2, 'viewmode')">
	내용2
	</td>
</tr>
<tr id=v_3 style="DISPLAY: none"  idvalue="viewmode">
	<td onClick="local_view(document.all.v_3, 'viewmode')">
	내용3
	</td>
</tr>
</table>
*/

