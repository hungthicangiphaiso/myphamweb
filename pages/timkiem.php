<?php
  $tukhoa=$_GET["q"];
  $tin=timkiem($tukhoa);
   while($rowhienthitintrongtrang=mysql_fetch_array($tin))
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
  