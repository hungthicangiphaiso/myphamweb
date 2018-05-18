<style type="text/css">
#placecomment
{ 
  
  margin-top:15px;
  width:100%;
  height:auto;
}
#cach{clear:left;}
#ten
{
	color:#0F0;
	font-size:15px;
	width:100%;	
}
#noidungcom p
{
	
	text-align:left;
	margin-left:30px;
	color:#666;
	font-size:18px;
}	
</style>
<?php
   if(isset($_GET["idTin"]))
   {
	   $idTin=$_GET["idTin"];
	   settype($idTin,"int");
   }
   else
   {
	   $idTin=1;
   }
   $layidtin=layidTin($idTin);
   $rows=mysql_fetch_array($layidtin);
?>
<div id="chitiet">
  <?php echo $rows["noidung"];?>
</div>
<p style="color:#090;text-align:left;">Các bài học khác.</p>
<div id="tincungloai">
<ul>
<?php 
    $laytintiep=tincungloai($idTin,$rows["idTL"]);
	while($rowstunghang=mysql_fetch_array($laytintiep))
	{
		?>
        <li style="float:left">
        <img src="upload/hinh/<?php echo $rowstunghang["urlhinh"]?>" width="70px;" height="auto" style="float:left;margin-left:-40px;"/>
        <a href="index.php?p=chitiettin&idTin=<?php echo $rowstunghang["idTin"]?>"><?php echo $rowstunghang["tieude"]?></a>
        </li>
   <?php     
	}
	?>
  </ul>
</div>
<div id="cach"></div>
<div class="line"></div>
<p style="color:#F00;text-align:left; margin-top:5px;">Bình Luận</p>
<?php
if(isset($_SESSION["iduser"]))
{
	require "block/comment.php";
	if(isset($_POST["btnbinhluan"]))
	{
		$com=$_POST["boxcomment"];
		if($com==' ')
		{
			echo "ban chua binh luan gi ca";
		}
		else
		{
			@$addcomment=mysql_query(
			" INSERT INTO comment(
			    iduser,
				noidung,
				idTin)
				VALUE
				('{$_SESSION['iduser']}',
				 '{$com}',
				 '{$idTin}'
				 )
				 ");
		}
	}
}
$laybinhluan=laybinhluan($idTin);
while($rowlayhangbinhluan=mysql_fetch_array($laybinhluan))
{
	$doisangten=doisangten($rowlayhangbinhluan["iduser"]);
	$rowlayten=mysql_fetch_array($doisangten);
?>

<div id="placecomment">
<div id="ten">
<img src="data/<?php echo $rowlayten["urlhinh"]?>" width="30px" height="30px" style="float:left;">
<h3 style="float:left;margin-left:5px;"><?php echo $rowlayten["username"]?></h3>
</div>
<div id="cach"></div>
<div id="noidungcom">
<p><?php echo $rowlayhangbinhluan["noidung"]?></p>
</div>
</div>
<?php
}
?>
<div id="clear"></div>