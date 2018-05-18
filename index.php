<?php
  session_start();
  require("Mail/Mail.php");
  require "lib/config.php";
  require "lib/trangchu.php";
  if(!isset($_POST["txtdk"]))
  {
	 
  }
  else
  {
     $name=addslashes($_POST["tendangnhap"]);
     $email=addslashes($_POST["email"]);
     $pass=addslashes($_POST["matkhau"]);
     $comfitpass=addslashes($_POST["xacnhanmatkhau"]);
     $sodienthoai=addslashes($_POST["sodienthoai"]);
	 ?>
	 <script type="text/javascript">
		window.onload = function(){
			alert('<?php echo $name?>');	
		}
	     </script>
         <?php
     if($name==''||$email==''||$pass==''||$comfitpass==''||$sodienthoai=='')
     {
		 ?>
       <script type="text/javascript">
		window.onload = function(){
			alert('ban dien thieu thong tin vui long dieu dau du thong tin');	
		}
	     </script>
         <?php 
     }
     else
     {
        if(mysql_num_rows(mysql_query("SELECT * from users where username='$name'"))>0)
        {
			?>
           <script type="text/javascript">
		window.onload = function(){
			alert('ten dang nhap da duoc dung ban vui long dung ten khac');	
		}
	     </script>
           <?php
        }
		else if(mysql_num_rows(mysql_query("SELECT *from users where email='$email'"))>0)
		{
			?>
			<script type="text/javascript">
		window.onload = function(){
			alert('email da duoc dung');	
		}
	     </script>
			<?php
		}
		else if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
        {
        ?>
         <script type="text/javascript">
		window.onload = function(){
			alert('email khong dung dinh danh ban vui long kiem tra lai');	
		}
	     </script>
         <?php
         }
		  if (!ereg("^0+[0-9]{9,10}",$sodienthoai))
         {?>
             <script type="text/javascript">
		window.onload = function(){
			alert('so dien thoai khong dung dinh dang vui long nhap lai');	
		}
	     </script>
         <?php  
        }
		else if($pass!=$comfitpass)
		{?>
			<script type="text/javascript">
		window.onload = function(){
			alert('mat khau xac thuc va mat khau chua khop nhau');	
		}
	     </script>
		<?php
        }
		else
		{
		   if($_FILES['file']['name'] != NULL)
		{
			if($_FILES['file']['type']=="image/jpeg"||
			  $_FILES['file']['type']=="image/png"||
			  $_FILES['file']['type']=="image/gif")
			  {
				  if($_FILES['file']['size']>1048576)
				  { ?>
                      <script type="text/javascript">
						window.onload = function(){
							alert('kich thuoc file qua lon');	
						}
						 </script>
				     <?php
			   }
				  else
				  {
					  $path= "data/";
					  $tmp_name=$_FILES['file']['tmp_name'];
					  $namehinh=$_FILES['file']['name'];
					  $laysonguoidung=laytongsoluongnguoidung();
					  $songuoidung=mysql_num_rows($laysonguoidung);
					  $songuoidung=$songuoidung+1;
					  $type=$_FILES['file']['type'];
					  if($type=="image/jpeg")
					     $nameinfile="hinhanh$songuoidung.jpeg";
					  else if($type=="image/png")
					     $nameinfile="hinhanh$songuoidung.png";
					  else 
					       $nameinfile="hinhanh$songuoidung.gif";
						   $size=$_FILES['file']['size'];
				 }
	    }
		}
		else
		   {
			   $nameinfile="macdinh.png";
		   }
		    move_uploaded_file($tmp_name,$path.$nameinfile);
			$unicode=md5(uniqid(rand()));
			$caigido=md5($pass);
			@$addmember=mysql_query("
			INSERT INTO users
			( username,
			  password,
			  email,
			  sodienthoai,
			  urlhinh,
			  unicode
			  ) 
			  VALUES
			  ('{$name}',
			    '{$caigido}',
				'{$email}',
				'{$sodienthoai}',
				'{$nameinfile}',
				'{$unicode}'
				)
			");
			  
     
	  $from="hungpro9309@gmail.com";
	  $to=$email;
	  $host="ssl://smtp.gmail.com";
	  $port= "465";
	  $username="hungpro9309@gmail.com";
	  $password="hung1012";
	  $subject="THƯ XÁC NHẬN ĐĂNG KÍ TÀI KHOẢN";
	  $message="
	       Thanks for signing up !
		   Your account has been created, you can login with the following credentials after you have activated your account by
		   pressing the url below.
           ------------------------
           Username: '.$name.'
           Password: '.$pass.'
           ------------------------
 
           Please click this link to activate your account:
           http://http://localhost:8080/php/giasu/index.php?p=kichhoat&passkey=$unicode
				  "
		;
		
	 $header=array('from'=>$from,'to'=>$to,'subject'=>$subject);
     $smtp=Mail::factory('smtp',array(
     'host'=>$host,
	 'port'=>$port,
	 'auth'=>true,
	 'username'=>$username,
	 'password'=>$password
	 ));
	 $mail=$smtp->send($to,$header,$message);
	 if(PEAR::isError($mail))
	 {
	 echo $mail->getMessage();
	 }
	 else 
	 {
	 //echo "thanh cong";
	 }     
		                 
    //Thông báo quá trình lưu
    if ($addmember)
        {?>
			<script type="text/javascript">
		window.onload = function(){
			alert('ban da dang ki thanh cong vui long vao email xac nhan');	
		}
	     </script>
         <?php
		}
    else
       {?>
		   <script type="text/javascript">
		window.onload = function(){
			alert('co loi xay ra trong qua trinh dang ki');	
		}
	     </script>
         <?php
	   }
		}
  }
  }
  if(isset($_GET["passkey"]))
		{
			$passkey=$_GET["passkey"];
			$laytinh=mysql_query("SELECT * from users where unicode='$passkey'");
			if(mysql_num_rows($laytinh)==1)
			{
				$sql="UPDATE users set activite='1' where unicode='$passkey'";
				mysql_query($sql);
				?>
                <script type="text/javascript">
						window.onload = function(){
							alert('xin chuc mung ban da chinh thuc tro thanh thanh vien hocladau.vn');	
						}
						 </script>
                         <?php
			}
		}
   if(isset($_POST["btndn"]))
   {
	   $un=$_POST['tendangnhap'];
	   $mk=$_POST['matkhau'];
	   $mk=md5($mk);
	   $laytinhtiep="SELECT * from users where username='$un' and password='$mk' and activite='1'";
	   $sohang=mysql_query($laytinhtiep);
	   if(mysql_num_rows($sohang)==1)
	   {
		   $rows=mysql_fetch_array($sohang);
		   $_SESSION["iduser"]=$rows["iduser"];
		   $_SESSION["username"]=$rows["username"];
	   }
	   else
	   {
		   ?>
		   <script type="text/javascript">
		window.onload = function(){
			alert('ten dang nhao hoac mat khau khong dung');	
		}
	     </script>
         <?php
	   }
   }
   if(isset($_GET["p"]))
   {
	   $p=$_GET["p"];
   }
   else $p="";
   if(isset($_POST['btnexit']))
   {
	   unset($_SESSION['iduser']);
	   unset($_SESSION['username']);
   }
if(isset($_POST["capnhap"]))
{
	
	$iduser=$_SESSION["iduser"];
	$tendn=$_POST['tendn'];
	$Sodienthoai=$_POST['sdt'];
	
if($tendn!=''||$Sodienthoai!=''||$_FILES['file']['name']!=NULL)
{
	
	if($tendn!='')
	{
     $qr="UPDATE users set username='$tendn' where iduser='$iduser'";
     mysql_query($qr);
	}
	if($Sodienthoai!='')
	{
		
		$qa="UPDATE users set Sodienthoai='$Sodienthoai' where iduser='$iduser'";
		mysql_query($qa);
	}
	if($_FILES['file']['name']!=NULL)
	{
		if($_FILES['file']['type']=="image/jpeg"||
			  $_FILES['file']['type']=="image/png"||
			  $_FILES['file']['type']=="image/gif")
			  {
				  if($_FILES['file']['size']>1048576)
				  { 
				     echo "kich thuoc file qua lon mong ban chon hinh anh khac  <a href='javascript: history.go(-1)'>Trở lại</a>";
					 exit;
				  }
				  else
				  {
					  $path= "data/";
					  $tmp_name=$_FILES['file']['tmp_name'];
					  $namehinh=$_FILES['file']['name'];
					  $laynguoidung=doisangten($_SESSION["iduser"]);
					  $soidnguoidung=mysql_fetch_array($laynguoidung);
					  $rowsoidnguoidung=$soidnguoidung["iduser"];
					  $type=$_FILES['file']['type'];
					  if($type=="image/jpeg")
					     $nameinfile="hinhanh$rowsoidnguoidung.jpeg";
					  else if($type=="image/png")
					     $nameinfile="hinhanh$rowsoidnguoidung.png";
					  else 
					       $nameinfile="hinhanh$rowsoidnguoidung.gif";
						   $size=$_FILES['file']['size'];
				move_uploaded_file($tmp_name,$path.$nameinfile);
			  $qul="UPDATE users set urlhinh='$nameinfile' where iduser='$iduser'";
			  mysql_query($qul);
				  }
			  }
			  
}
}
}
if(isset($_POST["mechamay"]))
{
	
	$tenchichi=$_SESSION["iduser"];
	$laiphaidoi=doisangten($_SESSION["iduser"]);
	$rowlaiphaidoi=mysql_fetch_array($laiphaidoi);
	$matkhaucu=$rowlaiphaidoi["password"];
	$laynao=$_POST["matkhaucu"];
	$laynao=md5($laynao);
	$laymatkhaumoi=$_POST["matkhaumoi"];
	$xacnhanchomatkhaumoi=$_POST["xacnhan"];
	if($matkhaucu!=$laynao)
	{
		?>
		<script type="text/javascript">
		window.onload = function(){
			alert('mat khau cu khong dung');	
		}
	     </script>
         <?php
	}
	else if($laymatkhaumoi==''||$xacnhanchomatkhaumoi=='')
	{?>
		<script type="text/javascript">
		window.onload = function(){
			alert('thieu thong tin');	
		}
	     </script>
	<?php
    }
	else if($laymatkhaumoi!=$xacnhanchomatkhaumoi)
	{?>
		<script type="text/javascript">
		window.onload = function(){
			alert('mat khau moi va mat khau xac nhan khong khop');	
		}
	     </script>
	<?php
    }
	else
	{
		$laymatkhaumoi=md5($laymatkhaumoi);
		$qchi="UPDATE users set password='$laymatkhaumoi' where iduser='$tenchichi'";
		mysql_query($qchi);
		?>
        <script type="text/javascript">
		window.onload = function(){
			alert('cap nhap thanh cong');	
		}
	     </script>
        <?php
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Website hàng đầu việt nam cung cấp bạn những công thức làm đẹp từ chuyên gia hàng đầu về mỹ phẩm ở việt nam, giúp bạn trẻ, đẹp một cách tự nhiên và nhanh chóng nhưng hoàn toàn miễn phí"/>
<meta name="keywords" content="lam dep, Làm đẹp Ở đà nẵng, lam dep da o da nang, meo lam dep, cach lam my pham, my pham da nang, lam dep mien phi ,giup ban lam dep"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width"/>
<title>Làm đẹp, lam dep, giup ban lam dep, lam dep mien phi, trang da</title>
<meta name="copyright" content="Lam Dep Mien Phi/">
<meta name="author" content="COSMETIC"/>
<meta name="robots" content="index,follow"/>
<meta http-equiv="content-language" content="vi">
<meta name="geo.placename" content="Da Nang, Viet Nam">
<meta name="geo.region" content="VN-62">
<meta name="geo.position" content="16.083754; 108.157319">
<meta name="ICBM" content="16.083754; 108.157319">
<meta name="revisit-after" content=" days">
<meta name="dc.description" content="Lam dep, Lam dep mien phi tai da nang, giup ban lam dep">
<meta name="dc.keywords" content="lam dep, lam dep da o da nang, meo lam dep, cach lam my pham ,giup ban lam dep">
<meta name="dc.subject" content="lam dep o da nang">
<meta name="dc.created" content="2018-05-30">
<meta name="dc.publisher" content="COSMETIC">
<meta name="dc.rights.copyright" content="COSMETIC">
<meta name="dc.creator.name" content="COSMETIC">
<meta name="dc.creator.email" content="lamdepmienphi@gmail.com">
<meta name="dc.identifier" content="http://hoccachlamdep.vn/">
<meta name="dc.language" content="vi-VN">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="thu.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="dialog.js"></script>
</head>

<body>
<div id="baohom">
<div id="top">
<?php 
if(isset($_SESSION['iduser']))
{ 
      require "block/FormHello.php";
}
else require "block/fromlogin.php";
?>
</div>
<div id="logo">
<img  id="logoleft" alt="lam dep mien phi" src="hinh/lam-dep-mien-phi.png"  title="Làm đẹp miễn phí"></img>
<img  id="logoright" alt="cach lam dep" src="hinh/cach-lam-dep.png"  title="Cách làm đẹp"/>
</div>
<?php require "block/menu.php";?>
<div id="navleft">
  <!-- o dau se require navleft-->
  <?php require "block/navleft.php";?>
</div>
<div id="center">
<?php
    switch($p)
	{
		case "tintrongloai":require "pages/tintrongloai.php";
		 break;
		 case "chitiettin":require "pages/chitiettin.php";
		 break;
		 case "diendan":     require "pages/diendan.php";
		 break;
		 case "taobaiviet":   require "pages/taobaiviet.php";
		 break;
		 case "taochuyendetoan": require "pages/diendantoan.php";
		 break;
		 case "taochuyendeli": require "pages/diendanli.php";
		 break;
		 case "taochuyendehoa": require "pages/diendanhoa.php";
		 break;
		 case "thoaluan": require "pages/tinthaoluan.php";
		 break;
		 case "tintrongdiendan": require "pages/tintrongdiendan.php";
		 break;
		 case "timkiem": require "pages/timkiem.php";
		 break;
		 case "thaydoiprofile": require "pages/thaydoiprofile.php";
		 break;
		 case "thaydoimatkhau": require "pages/thaydoimatkhau.php";
		 break;
		 default: require "pages/home.php";
	}
?>
</div>
<div id="clear"></div>
<div id="bottom">
</div>
</div>
</body>
</html>
