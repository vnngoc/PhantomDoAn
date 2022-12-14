<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai</title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="../css/index-styles.css">

		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />

	
	</head>

<body> 

<!-------------Header start------------------------>
<?php 
 include_once '../inc/navbar.php'; 
 require_once '../html/connect.php';
 $date = date("Y-m-d");
		 $query5 = "SELECT * FROM `countviews` WHERE `Dates` = '$date'";
		 $good =  mysqli_query($connect,$query5);
		 if($good -> num_rows == 0)
		 {
			 $insertQuery = "INSERT INTO `countviews`(`Dates`) VALUE ('$date') ";
			 mysqli_query($connect,$insertQuery);
		 }
		 else
		 {
			 $updateQuery = "UPDATE `countviews` SET `VIEWS` = `VIEWS` + 1 WHERE `Dates` = '$date'";
			 mysqli_query($connect,$updateQuery);
		 }
 ?>

<!-------------Header end----------------------->
<div class="banner">							
	<div class="Bground">
			<div class="row">

				<div class="content">  
					<div class="content-title">
						<h1> 
							<span class="text-ani1"> WELCOME TO </span> 
							<br>
							<span class="text-ani2"> 
								<span class="color1"> GAMING </span>  
								<span class="color2"> Kai </span> 
							</span> 
						</h1>
					</div>
					
					<p class="text-ani3"> -UwU- </p>
					<div>
						<?php 
							if(isset($_SESSION['userName']))
							{
								echo '';
							}
							else
							{
								echo '
								<a href="../html/log-acc.php" > 
									<button type="button" class="btn"> 
										<span class="span-banner"> </span> ĐĂNG NHẬP 
									</button></a>
								<a href="../html/all-game.php" >
									<button type="button" class="btn">
									<span class="span-banner"> </span> XEM THÊM &#8594 
								</button></a>
							';
							}
						
						
						?>
						
					</div>
				</div>

			</div>
		
	</div>
</div>




<!-------Trending section start-------------->
<section id="trend" >
	<div class="title">
		<h3 > 
			<i class="fa-solid fa-fire"></i>
			Trending Game
		</h3>
	</div>

	<div class="TrendingGame">
		
		<div>
			<button class="pre-btn">  <img src="https://i.imgur.com/OuCb1FE.png"> </button>
			<button class="next-btn"> <img src="https://i.imgur.com/OuCb1FE.png"> </button> 
		</div>
		<div class="Tgame-container">
			<!-----Box start------>
			<!-- <div class="Tgame-box">
				<a href="./html/download.html" target="_blank">
					<div class="image">
						<img src="https://i.imgur.com/MtRzKPh.png">
					</div>
					<div class="overlay"></div>
					<div class="overlay2"></div>
					<div class="Tgame-info">
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<h2>Overlay text </h2>
						<p> Tag categories  </p>
					</div>
				</a>
			</div>  -->
			<!-----Box end------>
			<?php 
			// require_once('../html/connect.php');
			$query = "SELECT * FROM `all-games` WHERE `type` = 'trend' ";
			$sql = mysqli_query($connect,$query);
			while($row = mysqli_fetch_array($sql))
			{
			?>
				<div class="Tgame-box">
				<a href="<?php if($row['link'] != '') echo '../example/'.$row['link'].'.php?name='.$row['name']; else echo "#"; ?>">
					<div class="image">
						<img src="<?php echo $row['image']; ?>">
					</div>
					<div class="overlay"></div>
					<div class="overlay2"></div>
					<div class="Tgame-info">
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<span class="span-overlay"></span>
						<h2><?php echo $row['name']; ?> </h2>
						<p> <?php echo $row['Tags']; ?>  </p>
					</div>
				</a>
			</div> 
			<?php
			}			
			?>
			
				
		</div>
	</div>
</section>


<!-----------Trending section end--------->	


<!-----Vid Trailer section start-->
<section id="video">
	<div class="title">
			<h3>
				<i class="fa-solid fa-gamepad"></i> Video Trailer
			</h3>
	</div>

	
	<!--------Vid container--------------->
	<div class="container">
		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/1.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> Trailer ra mắt WAH, The Acient One 
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>
	
		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/2.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> Litterally make me goosebump  || Mazusensei tskr <i class="fa-solid fa-person-praying"></i>
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>

		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/3.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> Banger animation HUGE W!!!
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>

		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/4.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> Absolutely give me chill
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>

		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/5.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> Banger Action-scene let's goooooo!!!
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>

		<article>
			<div class="item-video">
				<video autoplay controls muted loop>
					<source  src="../video/6.mp4" type="video/mp4">
				</video>
			</div>

			<div class="item-text">
				 <a href="#" class="item-title">
					<span class="category"> Trailer </span> 草 | A lot of 草草草
				</a>
					<!---Ttile video here----->
					<p class="text">
						Đây sẽ là phần mô tả bổ sung thêm của cái video trailer đó nếu chịu lên mạng copy về
						<!---Description--->
					</p>

			</div>
		</article>

	</div>

		

</section>
<!-----Vid Trailer section end-->

<!------News section start-->
<section id="news">
	<div class="title">
	
			<h3>
				<i class="fa-solid fa-scroll"></i>
				 Tin tức
			</h3>
	</div>


</section>
<!------News section end-->


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


<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>