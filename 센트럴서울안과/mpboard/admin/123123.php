<script>
  function login_chk(){
  var frm = document.login_frm;
  if( frm.mb_id.value == "" ){
    alert("���̵� �Է��� �ּ���");
    return false;
  }else{
    return true;
  }
  }
</script>

<form name="login_frm" method="post" action="action.php" onSubmit="return login_chk()" enctype="multipart/form-data">
 <input type="text" name="mb_id" />
<input type="submit" value="�α���">
</form>