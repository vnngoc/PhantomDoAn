<?php 
	session_start();
	// require_once '../html/connect.php';
	// $date = date("Y-m-d");
	// 		$query5 = "SELECT * FROM `countviews` WHERE `Dates` = '$date'";
	// 		$good =  mysqli_query($connect,$query5);
	// 		if($good -> num_rows == 0)
	// 		{
	// 			$insertQuery = "INSERT INTO `countviews`(`Dates`) VALUE ('$date') ";
	// 			mysqli_query($connect,$insertQuery);
	// 		}
	// 		else
	// 		{
	// 			$updateQuery = "UPDATE `countviews` SET `VIEWS` = `VIEWS` + 1 WHERE `Dates` = '$date'";
	// 			mysqli_query($connect,$updateQuery);
	// 		}
?>

<header>
		<img class ="logo" src="https://i.imgur.com/IIfskYh.png" >
		<nav>
			<ul>
				<li><a href="../main/index.php"> Trang chủ </a></li>
				<li><a href="../html/all-game.php"> Games </a></li>
				<li><a href="#"> Tin Tức </a></li>
				<?php
					if(isset($_SESSION["userName"]))
					{
						if($_SESSION["userType"]== "admin")
						{
							echo "<li><a href='../html/profile.php'> Trang cá nhân </a></li>";
							echo "<li><a href='../admin/admin-index.php'> Quản lý </a></li>";
							echo "<li><a href='../inc/logout.inc.php'> Đăng xuất </a></li>";
							echo "<li>".$_SESSION["userEmail"]." </li>";
						}
						else
						{
							echo "<li><a href='../html/profile.php'> Trang cá nhân </a></li>";
							echo "<li><a href='../inc/logout.inc.php'> Đăng xuất </a></li>";
							echo "<li>".$_SESSION["userEmail"]." </li>";

						}
					}
					else
					{
						echo "<li><a href='../html/log-acc.php'> Tài Khoản </a></li>";
					}
				?>
				
				
			</ul>
		</nav>
</header>