<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai </title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="./css/all-game-style.css">

		<!----normalize------->
		<link rel="stylesheet" href ="./css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!---JQUERY---->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
		integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		
	</head>
	
<body> 
	
<header>
	<img class ="logo" src="https://i.imgur.com/IIfskYh.png" >
	<nav>
		<ul>
			<li><a href="./index.php"> Trang chủ </a></li>
			<li><a href="./all-game.php"> Games </a></li>
			<li><a href="#"> Tin Tức </a></li>
			<li><a href="#"> Tài Khoản </a></li>
			<li><a href="#"> Liên hệ </a></li>
		</ul>
	</nav>
</header>





<section class="container">

	
		<div id="search-container" class="search-container">

			<input type="text" id="search-input" placeholder="Tìm kiếm"
				onkeyup="search()"/>
			<i class="fa-solid fa-magnifying-glass"></i> 
			<!-- <button id="search">
					<i class="fa-solid fa-magnifying-glass"></i> 
			</button> -->
			
			<div class="category-filter" id="category-filter">
				<a href="./all-game.php"><span class="filter-item active-tag">  All</span> </a> 
				<a href="./Tags.php?id=FPS"><span class="filter-item" > FPS </span> </a> 
				<a href="./Tags.php?id=Action"><span class="filter-item" > Action </span></a> 
				<a href="./Tags.php?id=RPG"><span class="filter-item"> RPG </span> </a> 

				
				<!-- <input type="radio" class="none" value="All" name="Tags" id="rad1" >
				<label for="rad1" class="filter-item">All</label>

				<input type="radio" class="none" value="FPS" name="Tags" id="rad2">
				<label for="rad2" class="filter-item" >FPS</label>

				<input type="radio" class="none" value="RPG" name="Tags" id="rad3">
				<label for="rad3" class="filter-item">RPG</label>

				<input type="radio" class="none" value="Action" name="Tags" id="rad4">
				<label for="rad4" class="filter-item">Action</label> -->

				
				

			</div>
		</div>
	<!------------------------->


		<div class="all-game-content" id="game-content">
		<?php 
  		//   require_once('connect.php');
		// 	$query = "SELECT * FROM `all-games`";
		// 	$sql = mysqli_query($connect,$query);
		// 	while($row = mysqli_fetch_array($sql))
		// 	{
		// 		?>
		<!-- // 		<div class='box' id='box' >
		// 			<a href="./<?php //echo $row['link']; ?>" target='_blank'>
		// 			<div class='image'>
		// 				<img src="<?php //echo $row['image']; ?>"> 
		// 			</div>
		// 			<div class='box-text'>
		// 				<h2><?php //echo $row["name"]; ?> </h2>
		// 				<h3><?php //echo $row["Tags"];  ?></h3>
		// 			</div> </a>
		// 		</div> -->
		 		<?php
		// 	}
  		?>   



			<!---Box start---->
				<!-- <div class="box" id="box" >
				<a href="./download.html" target="_blank" >
					<div class="image">
						<img src="https://i.imgur.com/MtRzKPh.png" >
					</div>
					<div class="box-text">
						<h2>kekw </h2>
						<h3>Action</h3>
					</div>
				</a>
				</div>	 -->
			<!---Box end---->
			
		
		</div>
	<div class="pagination">
		<!-- <div class="previous-page"><i class="fa-solid fa-angle-left"></i></div>
		<div class="page">Page <span class="page-num"></span></div>
		<div class="next-page"><i class="fa-solid fa-angle-right"></i></div> -->
	</div>
<script>
	$(document).ready(function(){
		function load_data(page,query = '')
        {
            $.ajax({
                url: "fetch.php",
                method:"POST",
                data:{page:page, query:query},
                success:function(data)
				{
					$("#game-content").html(data);
				}
            })
        }

		load_data(1);

	});
</script>



</section>

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




<!------Script------->
<!-- <script src="./js/Script.js"></script>
<script src="./js/pagination.js"></script>
<script src="../js/search.js"></script> -->
<!------Script end------>
	</body>
</html>