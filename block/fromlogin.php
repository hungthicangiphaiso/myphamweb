<?php 
    if(isset($_POST["btnquen"]))
	{
		$email=$_POST["youremail"];
		if($email=="")
		{
			echo "ban chua dien email cua ban <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}
		else
		{
			if(mysql_num_rows(mysql_query("SELECT * FROM user where email=$email"))==0)
			{
				echo "email ban dieu chua dung vao long xac nhan lai email <a href='javascript: history.go(-1)'>Trở lại</a>";
				exit;
			}
			else 
			{
				echo "thu xac nhan mat khau da duoc goi toi email cua ban vui long vao email de check lai";
				$host="ssl://smtp.gmail.com";
	              $port= "465";
				  $username="hungpro9309@gmail.com";
				  $password="hung1012";
				  $subject="ĐẶT LẠI MẬT KHẨU MỚI";
				  $message="
	                   you just require news password. Let do it.
					   Please click this link to activate your account:
					   http://http://localhost:8080/php/giasu/block/fotgotpassword.php
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
			}
		}
	}
	
?>

<div id="member">
<ul>
  <li><a href="#login-box" class="login-window link">Đăng Nhập</a></li>
  <div id="login-box" class="login">
  <p class="login_title">Login</p>
  <a href="#" class="close"><img src="hinh/close.png" alt="close" class="img-close" title="close" /></a>
  <form action="" method="post" class="login_form" name="form1">
  <label class="username">
  <span>Username:</span>
  <input id="users" type="text" name="tendangnhap" autocomplete="on" placeholder="Username" value="" />
  </label>
  <label class="password">
  <span>Password:</span>
  <input id="pass" type="password" value="" name="matkhau" autocomplete="on" placeholder="Password" />
  </label>
  <input type="submit" name="btndn" id="btndn" value="Đăng nhập" />
            <p>
            <a class="forgot link" href="#forgot-box">Quên mật khẩu?</a>
            <div id="forgot-box" class="quenroi">
            <p class="fotgot_title">FORGOT PASSWORD</p>
            <a href="#" class="close"><img src="hinh/close.png" alt="close" class="img-close" title="close"/></a>
            <form action="index.php" method="post" class="forgot_form">
            <label class="email">
            <span>Email:</span>
            <input type="text" name="youremail" autocomplete="on" placeholder="Email" value="" id="email" />
            </label>
            <button type="button" name="btnquen" class="button submit_button">OK</button>
            </form>
            </div>
            </p>  
  </form>
  </div>
  <li>|</li>
  <li><a href="#register-box" class="signup-window link">Đăng Kí</a>
  <div id="register-box" class="signup">
  <p class="signup_title">Signup</p>
  <a href="#" class="close"><img src="hinh/close.png" alt="close" class="img-close" title="close" /></a>
  <form action="index.php" method="post" class="signup_form" name="form1" enctype="multipart/form-data">
  <label class="username">
  <span>Username:</span>
  <input id="users" type="text" name="tendangnhap" autocomplete="on" placeholder="Username" value="" />
  </label>
  <label class="email">
  <span>Email:</span>
  <input id="email" type="text" name="email" autocomplete="on" placeholder="Email" value="" />
  </label>
  <label class="password">
  <span>Password:</span>
  <input id="password" type="password" value="" name="matkhau" autocomplete="on" placeholder="Password" />
  </label>
  <label class="comfitpass">
  <span>ComfitPass:</span>
  <input type="password" name="xacnhanmatkhau" id="comfitpass" autocomplete="on" placeholder="comfitPass" />
  </label>
  <label class="choice image">
  <span>Image:</span>
  <input type="file" name="file" id="file" />
  </label>
   <label class="phonenumber">
   <span>Phone:</span>
   <input id="phonenumber" name="sodienthoai" value="" autocomplete="on" placeholder="0902809464" type="text" />
   </label>
   <input type="submit" name="txtdk" id="txtdk" value="Đăng Kí">
   </form>
   </div>
</ul>
</div>