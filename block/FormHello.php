<?php
if(isset($_POST["suapro"]))
{
	$p='thaydoiprofile';
}
if(isset($_POST["suapa"]))
{
	$p='thaydoimatkhau';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#anhthanhdaidien").hide();
    $("#githe").hover(function(){
        $("#anhthanhdaidien").show();
    });
});
</script>
</script>
<style type="text/css">
.gido {
	color: #0F3;
	margin-left:0px;
	float:left;
}
#anhdaidien
{
	margin-left:0px;
	float:left;
	height:30px;
	width:auto;
}
#anhthanhdaidien
{	
   margin-left:1030px;
   width:80px;
   margin-top:-30px;
}
#githe
{
	margin-left:999px;
	width:120px;
	height:30px;
	cursor:pointer;
	position:relative;
}
#suapro{width:80px;}
#btnexit{width:80px;}
#suapa{width:80px};
</style>
<?php
$anhdaidien=doisangten($_SESSION["iduser"]);
$rowanhdaidien=mysql_fetch_array($anhdaidien);
?>
<div id="githe">

<img src="data/<?php echo $rowanhdaidien["urlhinh"]?>" id="anhdaidien"/>
<h3 class="gido"><?php echo $_SESSION['username'];?> </h3> 
<form action="" method="post" name="form1" class="gido">
  <!--<p>
    <input type="submit" name="btnexit" id="btnexit" value="Thoat">
  </p>-->
</form>

</div>
<form action="" method="post" name="form1" id="anhthanhdaidien">
    <input type="submit" name="suapro" id="suapro" value="sửa Profile">
    <input type="submit" name="suapa" id="suapa" value="đổi mật khẩu">
     <input type="submit" name="btnexit" id="btnexit" value="Thoát">
</form>

