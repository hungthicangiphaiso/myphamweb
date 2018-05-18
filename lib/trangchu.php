<?php
function layidTin($idTin)
{
	 $qr="SELECT *from tin where idTin=$idTin";
	 return mysql_query($qr);
}
function bontinmoinhat($idTL)
{
	$qr="SELECT *FROM tin where idTL=$idTL ORDER BY idTin limit 0,2";
	return mysql_query($qr);
}
function haitinmoitiep($idTL)
{
	$qr="SELECT *FROM tin where idTL=$idTL ORDER BY idTin limit 4,5";
	return mysql_query($qr); 
}
function tincungloai($idTin,$idTL)
{ 
   $qr="SELECT *from tin where idTin<>$idTin and idTL=$idTL ORDER BY Rand() DESC limit 0,3";
   return mysql_query($qr);
}
function laybinhluan($idTin)
{
	$qr="SELECT *from comment where idTin=$idTin ORDER BY idbl DESC limit 0,5";
	return mysql_query($qr);
}
function doisangten($idUser)
{
	$qr="SELECT *FROM users where iduser=$idUser";
	return mysql_query($qr);
}
function tongsotintrongloai($idTL,$trang,$sotintrongtrang)
{
	$vd=$trang*$sotintrongtrang;
	$qr="SELECT *FROM tin where idTL=$idTL ORDER BY idTin DESC limit $vd,$sotintrongtrang";
	return mysql_query($qr);
}
function tongsotin($idTL)
{
	$qr="SELECT *FROM tin where idTL=$idTL";
	return mysql_query($qr);
}
function laytongsoluongnguoidung()
{
	$qr="SELECT *FROM users";
	return mysql_query($qr);
}
function laytoanthoaluan()
{
	$qr="SELECT *FROM thoaluan";
	return mysql_query($qr);
}
function laytindiendan($trang,$sothoaluantrentrang)
{
	$vd=$trang*$sothoaluantrentrang;
	$qr="SELECT *FROM thoaluan ORDER BY idthoaluan DESC limit $vd,$sothoaluantrentrang";
	return mysql_query($qr);
}
function laythoaluanchuyende($chuyende)
{
	$qr="SELECT *FROM thoaluanchuyende where monchuyende='$chuyende'";
	return mysql_query($qr);
}
function laytinchuyende($trang,$sothoaluantrentrang,$ten)
{
	$vd=$trang*$sothoaluantrentrang;
	$qr="SELECT *FROM thoaluanchuyende where monchuyende='$ten' ORDER BY idthoaluanchuyende DESC limit $vd,$sothoaluantrentrang";
	return mysql_query($qr);
}
function laythoaluan($idthoaluan)
{
	$qr="SELECT *FROM thoaluanchuyende where idthoaluanchuyende=$idthoaluan";
	return mysql_query($qr);
}
function laybinhluanchochuyende($idthoaluan)
{
	$qr="SELECT *FROM binhluantrongchuyende where idthoaluan=$idthoaluan";
	return mysql_query($qr);
}
function phantrangthoaluan($trang,$sotin,$idthoaluan)
{
	$vd=$trang*$sotin;
	$qr="SELECT *from binhluantrongchuyende where idthoaluan=$idthoaluan ORDER BY idbinhluan DESC limit $vd,$sotin";
	return mysql_query($qr); 
}
function laythoaluanvande($idthoaluan)
{
	$qr="SELECT *from thoaluan where idthoaluan=$idthoaluan";
	return mysql_query($qr);
}function laybinhluanchovande($idthoaluan)
{
	$qr="SELECT *FROM binhluan where idthoaluan=$idthoaluan";
	return mysql_query($qr);
}
function phantrangtrongvande($trang,$sotin,$idthoaluan)
{
	$vd=$trang*$sotin;
	$qr="SELECT *FROM binhluan where idthoaluan=$idthoaluan ORDER BY idbinhluan DESC limit $vd,$sotin";
	return mysql_query($qr);
	
}
function timkiem($tukhoa)
{
	$qr="SELECT *FROM tin where tieude REGEXP '$tukhoa' ORDER BY idtin DESC";
	return mysql_query($qr);
}

?>