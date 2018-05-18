
<?php
if(isset($_POST["comfit"]))
	if(isset($_POST["btnok"]))
	{
		$passagain=$_GET["txtpa"];
		$comfitpaagain=$_GET["txtcfpa"];
		if($passagain==""||$comfitpaagain=="")
		{
			
		}
		else if($passagain!=$comfitpaagain)
		{
			
		}
		else
		{
			$pass=md5($passagain);
			$qr="UPDATE user set password=$pass where email=$email";
			mysql_query($qr);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dat lai mat khau</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2">Đặt lại mật khẩu </td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><label for="txtpa"></label>
      <input type="text" name="txtpa" id="txtpa" /></td>
    </tr>
    <tr>
      <td>ComfitPassword:</td>
      <td><label for="txtcfpa"></label>
      <input type="text" name="txtcfpa" id="txtcfpa" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnok" id="btnok" value="OK" /></td>
    </tr>
  </table>
</form>
</body>
</html>