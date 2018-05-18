<?php
  if(isset($_GET["idTL"]))
  {
	  $idTL=$_GET["idTL"];
	  settype($idTL,"int");
  }
  else $idTL=1;
  if(isset($_GET["trang"]))
  {
	  $trang=$_GET["trang"];
	  settype($trang,"int");
  }
  else $trang=0;
   $sotintrongmottrang=10;
   $tongsotin=tongsotin($idTL);
   $sotrang=mysql_num_rows($tongsotin)/$sotintrongmottrang;
   $sotrang=$sotrang-1;
   $hienthitintrongtrang=tongsotintrongloai($idTL,$trang,$sotintrongmottrang);
   while($rowhienthitintrongtrang=mysql_fetch_array($hienthitintrongtrang))
   {
   ?>    
   <div id="mottin">
    <img src="upload/hinh/<?php echo $rowhienthitintrongtrang["urlhinh"]?>" id="anhmottin">
<a href="index.php?p=chitiettin&idTin=<?php echo $rowhienthitintrongtrang["idTin"]?>"><?php echo $rowhienthitintrongtrang["tieude"]?></a>
    <p style="color:#666";><?php echo $rowhienthitintrongtrang["tomtat"]?></p>
   </div>
   <div id="clear"></div>
 <?php
   }
  ?>
  <?php
   for($i=1;$i<=$sotrang;$i++)
   {
	   ?>
       <a href="index.php?p=tintrongloai&idTL=$idTL&trang=$i" class="ovuong"><?php echo $i?></a>
	<?php   
   }
   ?>