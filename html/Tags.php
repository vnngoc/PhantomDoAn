<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai </title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="../css/all-game-styless.css">

		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
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
	
<?php  include_once '../inc/navbar.php'; ?>






<section class="container">

	
		<div id="search-container" class="search-container">

			<input type="text" id="search-input" placeholder="Tìm kiếm"
				onkeyup="search()" />
			<i class="fa-solid fa-magnifying-glass"></i> 
			<!-- <button id="search">
					<i class="fa-solid fa-magnifying-glass"></i> 
			</button> -->
			
			<?php 
				require_once 'connect.php';
				$id = $_GET['id'];
				function activeTag($name){
					if($_GET['id'] == $name)
						echo "active-tag";
				}
				$query2 = "SELECT * FROM `category`";
				$sql2 = mysqli_query($connect,$query2);

			?>
			<div class="category-filter" id="category-filter">
				<a href="./all-game.php"><span class="filter-item">  All</span> </a> 
				<?php
				while($row2 = mysqli_fetch_array($sql2))
				{
					// echo 
					// '		
					// 	<a href="./Tags.php?id='.$row2['TagName'].'">
					// 	<span class="filter-item" > '.$row2['TagName'].' </span> 
					// 	</a> 
					// ';
					echo '<a href="./Tags.php?id='.$row2['TagName'].'">';
					if($row2['TagName'] == $id)
					{
						echo '<span class="filter-item active-tag" > '.$row2['TagName'].' </span> ';
					}
					else
					{
						echo '<span class="filter-item" > '.$row2['TagName'].' </span> ';
					}
					echo '</a> ';
				}
				?>  			

			</div>
		</div>
	<!------------------------->


		<div class="all-game-content" id="game-content">
		<?php 
         
            switch($id){
                case $id: $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%".$id."%'";
                    break;
                // case 'RPG': $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%RPG%'";
                //     break;
                // case 'Action': $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%Action%'";
                //     break;
                // case 'All': $query = "SELECT * FROM `all-games`";
                //     break;
                default: $query = "SELECT * FROM `all-games` ";
            }

            $sql = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($sql))
            {
                ?>
                <div class='box' id='box' >
                    <a href="<?php if($row['link'] != '') echo './'.$row['link']; else echo "#"; ?>" >
                    <div class='image'>
                        <img src="<?php echo $row['image']; ?>"> 
                    </div>
                    <div class='box-text'>
                        <h2><?php echo $row["name"]; ?> </h2>
                        <h3><?php echo $row["Tags"];  ?></h3>
                    </div> </a>
                </div>
                <?php
            }
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
<script src="../js/Script.js"></script>
<!-- <script src="../js/tag-filter.js"></script> -->
<script src="../js/pagination.js"></script>
<script src="../js/search.js"></script>
<!------Script end------>
	</body>
</html>