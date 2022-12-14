<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai </title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="../css/down-ex-styles.css">
		<!-----custom-------->
	
		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>

    <body>
 <?php  include_once '../inc/navbar.php'; ?>

 	<?php 
			require_once '../html/connect.php';
			if(isset($_GET['name']))
			{
				$id=$_GET['name'];
				$query = "SELECT * FROM `all-games` where `name`= '$id' order by `id`";
				$sql = mysqli_query($connect,$query);
				$row= mysqli_fetch_array($sql);
			}
			 
	
	?>
<section id="down">
	<div class="Game container">
		<div class="row">
			<div class="box">
				<div class="image">
					<img src="<?php echo $row['image']; ?>">
				</div>
			</div>
			<div class="content">
				<h1><?php echo $row['name']; ?></h1>
		
				<h4><?php echo $row['Tags']; ?></h4>
			</div>
		</div>
	</div>

	<div class="About container">
		<div class="title">
			<h3>
				 Mô tả
			</h3>
		</div>

		<p class="text">
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
			Đây là một đoạn văn bản chỉ có Ctrl C - Ctrl V cho dài vì không chịu lên mạng copy xuống.
		</p>
	</div>

	<div class="ytb-vid container">
		<div class="title">
			<h3>
				Trailer
			</h3>
		</div>

		<iframe 
		src="https://www.youtube.com/embed/mBuHQeL-OO8" 
		title="YouTube video player" 
		frameborder="0" 
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
		allowfullscreen></iframe>

	</div>

	

	<div class="Img container">
		<div class="title">
			<h3>
				 Hình ảnh Gameplay
			</h3>
		</div>

		<div class="img-content" id="img-content">
			<img src="https://i.imgur.com/MtRzKPh.png">
			<img src="https://i.imgur.com/MtRzKPh.png">
			<img src="https://i.imgur.com/MtRzKPh.png">
			<img src="https://i.imgur.com/MtRzKPh.png">	
		</div>

	</div>

	<div class="popup-img">
		<span> &times; </span>
		<img src="https://i.imgur.com/5Jk6wUp.png" alt="">
	</div>

	<!----Download----->
	<div class="download">
		<div class="title" id="down">
			<h3>Link Tải Xuống</h3>
		</div>

		<div class="popup-mess" id="popup-mess">
			<div class="overlay-mess">
				<div class="log-mess">
					<div class="cls-btn">&times; </div>
					<h2>Thông báo</h2>
					<p> Bạn cần <a href="../html/log-acc.php">đăng nhập </a> để tiếp tục</p>
				</div>
			</div>
		</div>
		<?php
			if(isset($_SESSION["userName"]))
			{
				echo '<div class="download-links">
						<a href="../download/download.rar" download="">Android</a>
						<a href="../download/download.rar" download="">IOS</a>
						<a href="../download/download.rar" download="" >Windows</a>
					</div>';
			}

			else
			{
				echo '<div class="download-links">
						<a href="#" class="pop">Android</a>
						<a href="#" class="pop">IOS</a>
						<a href="#" class="pop">Windows</a>
					</div>';
			}


		?>
		
	
	</div>

</section>

<script>
	document.querySelectorAll(".container img").forEach(image =>{
		image.onclick = () =>{
			document.querySelector(".popup-img").style.display ="block";
			document.querySelector(".popup-img img").src = image.getAttribute('src');
		} 
	});

	document.querySelector(".popup-img span").onclick = () =>{
		document.querySelector(".popup-img").style.display ="none";
	}



	document.querySelectorAll(".pop").forEach(a => {
		a.onclick = () => {
			document.querySelector(".popup-mess").style.display="block";
		}
	});
	document.querySelector(".cls-btn").onclick = () =>{
		document.querySelector(".popup-mess").style.display="none";
	}

</script>







        <!---------Footer start------->
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
    <!----Script---->
	<script src="../js/Script.js">  </script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!---------------->
    </body>
</html>