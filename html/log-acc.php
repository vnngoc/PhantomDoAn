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
<!-------------Header end------------------------>
<div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!--------------------------------------------------------------------->
        <form action="../inc/login.inc.php" class="sign-in-form"  method="POST">
          <h2 class="title">Đăng nhập</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Tài khoản đăng nhập" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Mật khẩu" />
          </div>
          <button type="submit" name="submit" class="btn solid">Đăng nhập</button>
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
                  case "wronglogin": echo "<script> alert('Đăng nhập không hợp lệ') </script>";
                    break;
                  
                }
              }
          ?>
        <!--------------------------------------------------------------------->
        
      </div>
    </div>
  

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content" id="left">
          <h3>Chưa có tài khoản ?</h3>
          <a href="./signup.php"> <button class="btn transparent" id="sign-up-btn">Đăng ký</button> </a> 
        </div>
        <img src="../img/signin.svg" class="image" alt="" />
      </div>
    </div>
  </div>
<script>
    // const sign_in_btn = document.querySelector("#sign-in-btn");
    // const sign_up_btn = document.querySelector("#sign-up-btn");
    // const container = document.querySelector(".container");

    // sign_up_btn.addEventListener("click", () => {
    // container.classList.add("sign-up-mode");
    // });

    // sign_in_btn.addEventListener("click", () => {
    // container.classList.remove("sign-up-mode");
    // });
</script>
<?php  include_once '../inc/footer.php'; ?>

<!---------Footer end------->


<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>