
<?php
if(isset($_POST["btnbinhluan"]))
{
	$tieude=$_POST["txttieude"];
	$noidung=$_POST["txtnoidung"];
	if($tieude==""||$noidung=="")
	{
		
	}
	else
	{
		@$addthoaluan=mysql_query("INSERT INTO
		 thoaluan(
		 iduser,
		 solanxem,
		 soluottraloi,
		 noidung,
		 tieude
		 )
		 VALUE
		 (
		 '{$_SESSION[iduser]}',
		 '0',
		 '0',
		 '{$noidung}',
		 '{$tieude}'
		 )
		 ");
		 
	}
}
if(isset($_POST["btnbinhluantoan"]))
{
	$tieude=$_POST["txttieude"];
	$noidung=$_POST["txtnoidung"];
	if($tieude==""||$noidung=="")
	{
		
	}
	else
	{
		@$chiri=mysql_query("INSERT INTO
		 thoaluanchuyende(
		 monchuyende,
		 iduser,
		 luotthoaluan,
		 noidung,
		 tieude
		 )
		 VALUE
		 (
		 'toan',
		 '{$_SESSION[iduser]}',
		 '0',
		 '{$noidung}',
		 '{$tieude}'
		 )
		 ");
		 
	}
}
?>

<div class="diendan">
  <div id="thoaluan">
  <p>Thảo Luận </p>
  
  <?php
  if(isset($_SESSION['iduser']))
  {
	  ?>
      <a href="index.php?p=taobaiviet">Tạo bài viết mới</a>
<?php	  
  }
  else
  {
	?>
     <p>Bạn vui lòng đăng nhập hoặc đăng kí thành viên để tạo bài viết và binh luận</p>
    <?php  
  }
  ?>
  </div>
  <?php
  $sotin=10;
  if(isset($_GET["trang"]))
  {
	  $trang=$_GET["trang"];
	  settype($trang,"int");
  }
  else
  {
	  $trang=0;
  }
  $u=laytoanthoaluan();
  if(mysql_num_rows($u)>=1)
  {
	  ?>
	  <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#0F0;">
       <tr>
         <td width="70%">Tiêu đề thảo luận.</td>
         <td width="15%">
         lượt thảo luận
         </td>
         <td width="15%">
         người gởi.
         </td>
       </tr>
  </table>
  <?php
    
	$thuchien=laytindiendan($trang,$sotin);  
	  while($tungdongmot=mysql_fetch_array($thuchien))
	  {
		  $laidoiten=doisangten($tungdongmot["iduser"]);
		  $chinhthuc=mysql_fetch_array($laidoiten);
  ?>
  <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#666">
       <tr>
         <td width="70%"><a href="index.php?p=tintrongdiendan&idthoaluan=<?php echo $tungdongmot["idthoaluan"]?>"><?php echo $tungdongmot["tieude"]?> </a></td>
         <td width="15%">
         12.
         </td>
         <td width="15%">
         <?php echo $chinhthuc["username"]?>
         </td>
       </tr>
  </table>
  <?php
	  }
	  $the=$u/$sotin;
	  for($i=1;$i<=$the-1;$i++)
	  {
		  ?>
          <a href="index.php?p=diendan&trang=<?php echo $i?>" id="sonao"><?php echo $i?></a>
		<?php
	  }
  }
  ?>
  </div>
  <div id="chuyendelon">
  <p>Chuyên đề</p>
  <div class="chuyende">
    <p>Toán</p>
   <div class="benphai"><?php
  if(isset($_SESSION['iduser']))
  {
	  ?>
      <a href="index.php?p=taochuyendetoan">Tạo chuyên đề mới cho môn toán</a>
<?php	  
  }
  else
  {
	?>
     <p>Bạn vui lòng đăng nhập hay đăng kí thành viên để tạo chuyên đề và thảo luận</p>
    <?php  
  }
  ?>
  </div>
  </div>
   <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#0F6;margin-top:5px;";>
       <tr>
         <td width="70%">Chủ đề thảo luận.</td>
         <td width="15%">
         lượt thảo luận.
         </td>
         <td width="15%">
         người gửi.
         </td>
       </tr>
  </table>
  <?php
     $ten='toan';
     $lu=laythoaluanchuyende($ten);
  if(isset($_GET["trangtoan"]))
  {
	  $trangtoan=$_GET["trangtoan"];
	  settype($trangtoan,"int");
  }
  else
  {
	  $trangtoan=0;
  }
  $otrongkhongduoc= mysql_num_rows($lu);
    
	 if($otrongkhongduoc>=1)
	 {
		 $laythoi=mysql_num_rows($lu);
		 $tieptuclay=laytinchuyende($trangtoan,$sotin,$ten);
		 while($niemtinse=mysql_fetch_array($tieptuclay))
		 {
			 $laidoiten=doisangten($niemtinse['iduser']);
			 $chinhthuc=mysql_fetch_array($laidoiten);
	?>
     <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#666;">
       <tr>
         <td width="70%"><a href="index.php?p=thoaluan&idthoaluan=<?php echo $niemtinse["idthoaluanchuyende"]?>"><?php echo $niemtinse["tieude"]?></a></td>
         <td width="15%">
         12
         </td>
         <td width="15%">
         <?php echo $chinhthuc['username']?>
         </td>
       </tr>
     </table>
  <?php
	 }
	 $the=$laythoi/$sotin;
	  for($i=0;$i<=$the-1;$i++)
	  {
		  ?>
          <a href="index.php?p=diendan&trangtoan=<?php echo $i?>" id="sonao"><?php echo $i?></a>
		<?php
	  }
	 }
	 ?>
  <div class="chuyende">
  <p>Hóa</p>
   <div class="benphai"><?php
  if(isset($_SESSION['iduser']))
  {
	  ?>
      <a href="index.php?p=taochuyende&id=hoa">Tạo chủ đề mới cho môn hóa</a>
<?php	  
  }
  else
  {
	?>
     <p>Bạn vui lòng đăng nhập hay đăng kí thành viên để tạo chủ đề và thảo luận.</p>
    <?php  
  }
  ?>
  </div>
  </div>
   <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#0F0">
       <tr>
         <td width="70%">Chủ đề thảo luận.</td>
         <td width="15%">
         lượt thảo luận
         </td>
         <td width="15%">
         người gửi.
         </td>
       </tr>
  </table>
  <?php
     $ten='hoa';
     $lu=laythoaluanchuyende($ten);
  if(isset($_GET["tranghoa"]))
  {
	  $trangtoan=$_GET["tranghoa"];
	  settype($tranghoa,"int");
  }
  else
  {
	  $tranghoa=0;
  }
	 if(mysql_num_rows($lu)>0)
	 {
		 $laythoi=mysql_num_rows($lu);
		 $tieptuclay=laytinchuyende($tranghoa,$sotin,$ten);
		 while($niemtinse=mysql_fetch_array($tieptuclay))
		 {
			 $laidoiten=doisangten($niemtinse['iduser']);
			 $chinhthuc=mysql_fetch_array($laidoiten);
	?>
     <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#666">
       <tr>
         <td width="70%"><a href="index.php?p=thoaluan&idthoaluan=<?php echo $niemtinse["idthoaluanchuyende"]?>"><?php echo $niemtinse["tieude"]?></a></td>
         <td width="15%">
         12
         </td>
         <td width="15%">
         <?php echo $chinhthuc['username']?>
         </td>
       </tr>
     </table>
  <?php
	 }
	 $the=$laythoi/$sotin;
	  for($i=0;$i<=$the-1;$i++)
	  {
		  ?>
          <a href="index.php?p=diendan&tranghoa=<?php echo $i?>" id="sonao"><?php echo $i?></a>
		<?php
	  }
	 }
	 ?>
  <div class="chuyende">
  <p>Lí</p>
   <div class="benphai"><?php
  if(isset($_SESSION['iduser']))
  {
	  ?>
      <a href="index.php?p=taochuyende&id=li">Tạo chủ đề mới cho môn lí</a>
<?php	  
  }
  else
  {
	?>
     <p>Bạn vui lòng đăng nhập hay đăng kí thành viên để tạo chủ đề và thảo luận.</p>
    <?php  
  }
  ?>
  </div>
  </div>
   <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#0F3;">
       <tr>
         <td width="70%">Chủ đề thảo luận</td>
         <td width="15%">
         lượt thảo luận
         </td>
         <td width="15%">
         người gửi.
         </td>
       </tr>
  </table>
  <?php
     $ten='li';
     $lu=laythoaluanchuyende($ten);
  if(isset($_GET["trangli"]))
  {
	  $trangli=$_GET["trangli"];
	  settype($trangli,"int");
  }
  else
  {
	  $trangli=0;
  }
	 if(mysql_num_rows($lu)>0)
	 {
		 $laythoi=mysql_num_rows($lu);
		 $tieptuclay=laytinchuyende($trangli,$sotin,$ten);
		 while($niemtinse=mysql_fetch_array($tieptuclay))
		 {
			 $laidoiten=doisangten($niemtinse['iduser']);
			 $chinhthuc=mysql_fetch_array($laidoiten);
	?>
     <table width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#666;">
       <tr>
         <td width="70%"><a href="index.php?p=thoaluan&idthoaluan=<?php echo $niemtinse["idthoaluanchuyende"]?>"><?php echo $niemtinse["tieude"]?></a></td>
         <td width="15%">
         12
         </td>
         <td width="15%">
         <?php echo $chinhthuc['username']?>
         </td>
       </tr>
     </table>
  <?php
	 }
	 $the=$laythoi/$sotin;
	  for($i=0;$i<=$the-1;$i++)
	  {
		  ?>
          <a href="index.php?p=diendan&trangli=<?php echo $i?>" id="sonao"><?php echo $i?></a>
		<?php
	  }
	 }
	 ?>

</div>