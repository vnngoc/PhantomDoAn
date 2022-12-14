<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai</title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="../css/log-acc-styles.css">

		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />

	
	</head>

<body> 

<!-------------Header start------------------------>
<?php  include_once '../inc/navbar.php'; ?>
<div class="container">
	<div class="forms-container">
		<div class="signin-signup">
			<form action="../inc/signup.inc.php" class="sign-in-form" method="POST">
				<h2 class="title">Đăng ký</h2>
	  
				<div class="input-field">
				  <i class="fas fa-user"></i>
				  <input type="text" name="name" placeholder="Tên tài khoản"/>
				</div>
				<div class="input-field">
				  <i class="fas fa-envelope"></i>
				  <input type="email" name="email" placeholder="Email" />
				</div>
				<div class="input-field">
				  <i class="fas fa-lock"></i>
				  <input type="password" name="pass" placeholder="Mật khẩu" />
				</div>
				<div class="input-field">
				  <i class="fa-solid fa-shield"></i>
				  <input type="password" name="rpPass" placeholder="Nhập lại mật khẩu" />
				</div>
	  
				<button type="submit" name="submit" class="btn" >Đăng ký</button>
				<p class="social-text">Hoặc đang nhập bằng</p>
				<div class="social-media">
				  <a href="#" class="social-icon">
					<i class="fab fa-facebook-f"></i>
				  </a>
				  <a href="#" class="social-icon">
					<i class="fab fa-twitter"></i>
				  </a>
				  <a href="#" class="social-icon">
					<i class="fab fa-google"></i>
				  </a>
				
				</div>
			  </form>
			  <?php
              if(isset($_GET["error"]))
              {
                $error = $_GET["error"];
                switch($error){
					case "emptyinput": echo "<script> alert('Vui lòng điền đầy đủ thông tin') </script>";
						break;
					case "invaliduid": echo "<script> alert('Tên không hợp lệ') </script>";
						break;
					case "invalidemail": echo "<script> alert('Email không hợp lệ') </script>";
						break;
					case "unmatchpass": echo "<script> alert('Mật khẩu không trùng khớp') </script>";
						break;
					case "usernamealreadyexist": echo "<script> alert('Tên đăng nhập đã tồn tại') </script>";
						break;
					case "stmtfailed": echo "<script> alert('Đã có lỗi xảy ra') </script>";
						break;
						case "none": echo "<script> alert('Đăng ký thành công') </script>";
						break;
                }
              }
          ?>
		</div>
	</div>


	<div class="panels-container">
		<div class="panel left-panel">
			<?php
			if(isset($_SESSION['userName']))
			{
				if($_SESSION['userType'] == "admin")
				{
					echo '';
				}
				
			}
			else
			{
				echo '
					<div class="content" id="left">
					<h3>Đã có tài khoản rồi ?</h3>
					<a href="./log-acc.php"><button class="btn transparent" id="sign-up-btn">Đăng nhập</button> </a> 
					</div>
					';
			}
			?>
			
			<img src="../img/signup.svg" class="image" alt="" />
		  </div>
		</div>
	</div>
</div>
    

<footer id="footer" class="footer">
	<div class="footer-container">
		<div class="footer-link-1">
			<img class ="logo" src="https://i.imgur.com/IIfskYh.png" >
			<ul class="flex">
				<li>
					<a href="#">
						<i class="fa-brands fa-facebook-f"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-youtube"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-facebook-messenger"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-twitter"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-discord"></i>
					 </a>
				</li>
			
			</ul>
		</div>

		<div class="footer-link-2">
			<ul class="flex">
				<li>
					<a href="#">
						Cái mục
					 </a>
				</li>
				<li>
					<a href="#">
						Nhìn 
					 </a>	
				</li>
				<li>
					<a href="#">
						Cho
					 </a>
				</li>
				<li>
					<a href="#">
						Chuyên Nghiệp
					 </a>
				</li>
			</ul>
			<p class="text">&copy; GAMING KAI | COPYRIGHT</p>
		</div>
	</div>
</footer>

<!---------Footer end------->


<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>