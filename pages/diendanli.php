<style type="text/css">
#txttieude3
{
	width:93%;
	border:1px solid #0F3;
	
}
#txtnoidung
{
	width:93%;
	border:1px solid #0F3;
	margin-top:5px;
}
#tieudechinh
{
	color:#0F0;
	text-align:center;
}
#btnbinhluan
{
	margin-top:5px;
	float:right;
	margin-right:22px;
}
</style>
<?php
if(isset($_SESSION["iduser"]))
{
?>
<h3 id="tieudechinh">Chào Mừng bạn tới diễn đàn Lí ở hocladau.vn</h3>
<p style="color:#8c9d9d">Ở đâu bạn sẽ được trao đổi và giải đáp mọi thắc mắc về Lí trong đề thi đại học.</p>
<form name="form1" method="post" action="index.php?p=diendan">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
    <tr>
      <td style="color:#F00">Tieu de :</td>
       <td>
       <textarea name="txttieude" id="txttieude3" cols="45" rows="2"></textarea></td>
    </tr>
    <tr>
      <td style="color:#F00">Noi dung :</td>
      <td>
      <textarea name="txtnoidung" id="txtnoidung" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td ></td>
      <td>
      <input name="btnbinhluanli" type="submit" id="btnbinhluan" value="Gởi"></td>
    </tr>
  </table>
</form>
<?php
}
?>