<div id="logochoi">
</div>
<form id="form1" name="form1" method="post" action="">
    
    <label for="selecmenu">Chọn Điểm Đến</label>
      <select name="selecmenu" id="selecmenu">
        <option value="dautien">---Chọn địa điểm đến-----</option>
        <option value="tiep"> Cần Thơ </option>
        <option value="tiep"> Huế     </option>
        <option value="tiep"> Hải Phòng </option>
        <option value="tiep"> Hà Nội </option>
      </select>
    
    <label for="benden">Chọn Bến đến</label>
    <select name="benden" id="benden">
    <option value="dautien">---Chọn bến đến-----</option>
    <option value="tiep">     Bến xe Mỹ Đình </option>
        <option value="tiep"> Bến xe Miền đông     </option>
        <option value="tiep"> Bến xe Huế </option>
        <option value="tiep"> Bến xe Miền Tây </option>
    </select>
    <input type="submit" name="btntim" id="btntim" value="Tìm Kiếm" />
</form>
    <table width="100%" border="1" cellspacing="0" cellpadding="0" id="bang">
      <tr>
        <th width="3%" style="color:#F00">STT</th>
        <th width="23%" style="color:#F00">Tuyến xe</th>
        <th width="21%" style="color:#F00">Cự Li</th>
        <th width="22%" style="color:#F00">Giờ Khởi Hành</th>
        <th width="19%" style="color:#F00">Giá Vé(VND)</th>
        <th width="12%"style="color:#F00">Lộ Trình</th>
      </tr>
      <?php
	     if(isset($_GET["trang"]))
		 { 
		    $trang=$_GET["trang"];
			settype($trang,"int");
		 }
		 else $trang=1;
		 $trang=$trang-1;
		 $sotin=10;
		 $laytuyenxe=laycactuyenxe($trang,$sotin);
		 $tongsotin=tongsotuyen();
		 $sotrang=mysql_num_rows($tongsotin)/$sotin;
		 while($vaotungtrangtin=mysql_fetch_array($laytuyenxe))
		 {
	  ?>
        <tr >
        <td width="3%" style="color:#000"><?php echo $vaotungtrangtin['idtuyenxe']?></th>
        <td width="23%" style="color:#000"><?php echo $vaotungtrangtin['tuyenxe'] ?></th>
        <td width="21%" style="color:#000"><?php echo $vaotungtrangtin['culi']?></th>
        <td width="22%" style="color:#000"><?php echo $vaotungtrangtin['goikhoihanh']?></th>
        <td width="19%" style="color:#000"><?php echo $vaotungtrangtin['giave']?></th>
        <td width="12%"style="color:#000"><a href="index.php?p=chitietlotrinh&idtuyenxe=<?php echo $vaotungtrangtin['idtuyenxe']?>">Xem</th>
      </tr>
      <?php
		 }
		 ?>
    </table>
  <div id="onhobenduoi">
    <?php
	   for($i=1;$i<=$sotrang;$i++)
	   {
		   ?>
           <a href="index.php?trang=<?php echo $i?>" id="tungo"><?php echo $i?></a>
           <?php
	   }
	?>
  </div>