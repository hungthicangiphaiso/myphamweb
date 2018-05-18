<style type="text/css">
.anhdata
{
	width:100px;
	height:auto;
	float:left;
	margin-right:5px;
	margin-bottom:10px;
}
.tenthanhvien
{
	color:#666;
	text-align:left;
	margin-bottom:7px;
}
.tieudelay
{
	text-align:left;
	color:#666;
	margin-bottom:5px;
}
.noidunglay{color:#666;text-align:left;}
.codinh
    {
	text-align:left;
	color:#666;
	}
</style>
<?php
if(isset($_GET["idthoaluan"]))
{
	$idthoaluan=$_GET["idthoaluan"];
	settype($idthoaluan,"int");
}
else
{
	$idthoaluan=1;
}
$laythoaluan=laythoaluan($idthoaluan);
$rowlaythoaluan=mysql_fetch_array($laythoaluan);
$doisanganh=doisangten($rowlaythoaluan['iduser']);
$rowdoisangten=mysql_fetch_array($doisanganh);
?>
<img src="data/<?php echo $rowdoisangten["urlhinh"]?>" class="anhdata"/>
<h3 class="tenthanhvien"><?php echo $rowdoisangten["username"]?></h3>
<p class="codinh">Thanh vien cua hoctudau.vn</p>
<h3 class="tieudelay"><?php echo $rowlaythoaluan['tieude']?></h3>
<p class="noidunglay"><?php echo $rowlaythoaluan['noidung']?></p>
<?php
if(isset($_SESSION["iduser"]))
{
	require "block/comment.php";
	if(isset($_POST["btnbinhluan"]))
	{
		$com=$_POST["boxcomment"];
		if($com=='')
		{
			echo "ban chua binh luan gi ca";
		}
		else
		{
			@$addcomment=mysql_query(
			" INSERT INTO binhluantrongchuyende(
				noidungbl,
				idthoaluan,
				iduser
				)
				VALUE
				('{$com}',
				 '{$idthoaluan}',
				 '{$_SESSION['iduser']}'
				 )
				 ");
		}
	}
}
?>
<?php
$laytongsobinhluan=laybinhluanchochuyende($idthoaluan);
$rowtongsobinhluan=mysql_num_rows($laytongsobinhluan);
$sotin=10;
$phantrang=$rowtongsobinhluan/$sotin;
if(isset($_GET["trangthoa"]))
{
	$trangthoa=$_GET["trangthoa"];
	settype($trangthoa,"int");
}
else 
{
	$trangthoa=0;
}
for($i=1;$i<=$phantrang;$i++)
{
?>
<a href="index.php?p=thoaluan&idthoaluan=<?php echo $rowlaythoaluan["idthoaluan"]?>&trangthoa=<?php echo $i?>" id="khongco"><?php echo $i?></a>
<?php
}
?>
<?php
$laytungnguoibinhluan=phantrangthoaluan($trangthoa,$sotin,$idthoaluan);
while($rowlaytungnguoibinh=mysql_fetch_array($laytungnguoibinhluan))
{
	$doisanganh=doisangten($rowlaytungnguoibinh['iduser']);
	$rowdoisanganh=mysql_fetch_array($doisanganh);
?>
   <img src="data/<?php echo $rowdoisanganh["urlhinh"]?>" class="anhdata"/>
   <h3 class="tenthanhvien"><?php echo $rowdoisanganh["username"]?></h3>
   <p class="noidunglay"><?php echo $rowlaytungnguoibinh["noidungbl"]?></p>
   <div id="clear"></div>
   <img src="hinh/line_center.png" style="align:center";/>
<?php
}
?>
