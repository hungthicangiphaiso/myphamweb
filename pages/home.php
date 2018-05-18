<div class="monhoc">
  <div class="title">
        <p class="chude">Toán Học</p>
  </div>
  <div class="line"></div>
 <?php
    $bontinmoinhat=bontinmoinhat(1);
	while($rowbontinmoinhat=mysql_fetch_array($bontinmoinhat))
	{
		?>
        <div class="tinhot">
        <img src="upload/hinh/<?php echo $rowbontinmoinhat["urlhinh"]?>" id="anh">
        <a class="tieude" href="index.php?p=chitiettin&idTin=<?php echo $rowbontinmoinhat["idTin"]?>"style="float:left"><?php echo $rowbontinmoinhat["tieude"]?></a>
        <p align="justify"><?php echo $rowbontinmoinhat["tomtat"]?></p>
        </div>
        <?php
	}
 ?>
</div>
<div class="monhoc" style="margin-top:10px">
  <div class="title">
        <p class="chude">Lí Học</p>
  </div>
  <div class="line"></div>
  <?php
    $bontinmoinhat=bontinmoinhat(3);
	while($rowbontinmoinhat=mysql_fetch_array($bontinmoinhat))
	{
		?>
        <div class="tinhot">
        <img src="upload/hinh/<?php echo $rowbontinmoinhat["urlhinh"]?>" id="anh">
        <a class="tieude" href="index.php?p=chitiettin&idTin=<?php echo $rowbontinmoinhat["idTin"]?>"><?php echo $rowbontinmoinhat["tieude"]?></a>
        <p align="justify"><?php echo $rowbontinmoinhat["tomtat"]?></p>
        </div>
        <?php
	}
 ?>
</div>
<div class="monhoc" style="margin-top:10px">
  <div class="title">
        <p class="chude">Hóa Học</p>
  </div>
  <div class="line"></div>
  <?php
    $bontinmoinhat=bontinmoinhat(2);
	while($rowbontinmoinhat=mysql_fetch_array($bontinmoinhat))
	{
		?>
        <div class="tinhot">
        <img src="upload/hinh/<?php echo $rowbontinmoinhat["urlhinh"]?>" id="anh">
        <a class="tieude" href="index.php?p=chitiettin&idTin=<?php echo $rowbontinmoinhat["idTin"]?>"><?php echo $rowbontinmoinhat["tieude"]?></a>
         <p align="justify"><?php echo $rowbontinmoinhat["tomtat"]?></p>
        </div>
        <?php
	}
 ?>
</div>
<div class="monhoc" style="margin-top:10px">
  <div class="title">
        <p class="chude">Thể Thao</p>
  </div>
  <div class="line"></div>
  <div id="menubar">
  <ul>
  <li>
  <a href="index.php?p=tintrongloai&idTL=90">Bóng Đá</a>
  </li>
  <li>
  <a href="index.php?p=tintrongloai&idTL=91">Tennis</a>
  </li>
  <li>
  <a href="index.php?p=tintrongloai&idTL=92">Thể Thao</a>
  </li>
  </ul>
  </div>
  <?php
    $bontinmoinhat=bontinmoinhat(90);
	while($rowbontinmoinhat=mysql_fetch_array($bontinmoinhat))
	{
		?>
        <div class="tinhot">
        <img src="upload/hinh/<?php echo $rowbontinmoinhat["urlhinh"]?>" id="anh">
        <a class="tieude" href="index.php?p=chitiettin&idTin=<?php echo $rowbontinmoinhat["idTin"]?>"><?php echo $rowbontinmoinhat["tieude"]?></a>
        <p align="justify"><?php echo $rowbontinmoinhat["tomtat"]?></p>
        </div>
        <?php
	}
 ?>
</div>