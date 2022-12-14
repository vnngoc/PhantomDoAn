<!DOCTYPE html>
<html lang="en">
<?php include_once '../inc/head-admin.php' ?>


<body> 

 	<?php  include_once '../inc/navbar.php'; ?>  

 	 <?php  include_once '../inc/sidemenu.php'; ?> 

	 
<section>
		<?php 
			require_once('../html/connect.php');
			$query = "SELECT * FROM `acc` WHERE `userType` = 'user' ";
			$query2 = "SELECT * FROM `all-games` ";
			$query3 = "SELECT * FROM `all-games` WHERE `type` = 'trend' ";
			$query4 = "SELECT * FROM `category` ORDER BY TagName ASC";
			$query6 = "SELECT count(name) as 'NumTags', Tags
						FROM `all-games` 
						GROUP BY Tags  
						ORDER BY Tags";
						
			$query7 = "SELECT * FROM `all-games` order by `id` desc LIMIT 5 ";
			$query8 = "SELECT * FROM `acc` WHERE `userType` = 'user' order by `userId` desc LIMIT 5";
			$query9 = "(SELECT * FROM `countviews` ORDER by Dates DESC LIMIT 7) ORDER BY Dates ASC";
			
			
			
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
	<h3 class="i-name">
		Trang chính
	</h3>

	<div class="values">
		<?php
			if($sql = mysqli_query($connect,$query))
			{
				$result = mysqli_num_rows($sql);
		?>
		<div class="val-box">
			<i class="fas fa-users"></i>
			<div class="val-text">
				<h3>
					<?php
						echo $result;
						mysqli_free_result($sql);
			}
					?>
				</h3>
				<span>Người dùng</span>
			</div>
		</div>
		<?php
			if($sql2 = mysqli_query($connect,$query2))
			{
				$result2 = mysqli_num_rows($sql2);
		?>
		<div class="val-box">
			<i class="fa-solid fa-gamepad"></i>
			<div class="val-text">
				<h3>
				<?php
						echo $result2;
						mysqli_free_result($sql2);
			}
					?>
				</h3>
				<span>Game hiện có</span>
			</div>
		</div>
		<?php
			if($sql3 = mysqli_query($connect,$query3))
			{
				$result3 = mysqli_num_rows($sql3);
		?>
		<div class="val-box">
			<i class="fa-solid fa-fire"></i>
			<div class="val-text">
				<h3>
				<?php
						echo $result3;
						mysqli_free_result($sql3);
			}
					?>
				</h3>
				<span>Trending</span>
			</div>
		</div>
		<?php
			if($sql4 = mysqli_query($connect,$query4))
			{
				$result4 = mysqli_num_rows($sql4);
		?>
		<div class="val-box">
			<i class="fa-solid fa-list-ul"></i>
			<div class="val-text">
				<h3>
				<?php
						echo $result4;
						mysqli_free_result($sql4);
			}
					?>
				</h3>
				<span>Thể loại</span>
			</div>
		</div>
		
	</div>
	<!--------- Chart ------------------>
	

	<div class="graphBox"> 
		<div class="box"> 
			<canvas id="viewsChart" ></canvas>
		</div>
		<div class="box">
			<canvas id="catergoryChart" ></canvas>
		</div>
	</div>
	<!-- ------------------------------------------ -->
	<script>
		<?php
			$sql10 = mysqli_query($connect,$query9);
			foreach ($sql10 as $data3)
			{
				$viewslabel[] = $data3['Dates'];
			}
			//-------------------------------------
			$sql11 = mysqli_query($connect,$query9);
			foreach ($sql11 as $data4)
			{
				$viewsdata[] = $data4['VIEWS'];
			}
		?>

		const ViewsLabel = <?php echo json_encode($viewslabel) ?>;
		const ViewsData = <?php echo json_encode($viewsdata) ?>;

		const ctx = document.getElementById('viewsChart');
				new Chart(ctx, {
				type: 'line',
				data: {
					labels: ViewsLabel,
					datasets: [{
					label: 'Views:',
					data: ViewsData,
					backgroundColor:[
								'#e7ae8c', '#e06763', 'White', '#e3f882', '#a67cdd', 
								'#f8f526','#44f09f','LightBlue','#ffac2e','Pink','#6cc8fd','#8bfd3f'
							],
					borderWidth: 1.2,
					borderColor: ['black']
					}]
				},
				options: {
					maintainAspectRatio:false,
					responsive:true
					}
				});
			// ----------------------------------------------------
		<?php
			$sql5 = mysqli_query($connect,$query4);
			foreach ($sql5 as $data1)
			{
				$categorylabel[] = $data1['TagName'];
			}
			//-------------------------------------
			$sql6 = mysqli_query($connect,$query6);
			foreach ($sql6 as $data2)
			{
				$categorydata[] = $data2['NumTags'];
			}
		?>
		const CategoryLabel = <?php echo json_encode($categorylabel) ?>;
	
		const CategoryData = <?php echo json_encode($categorydata) ?>;
		const ctx2 = document.getElementById('catergoryChart');
				new Chart(ctx2, {
				type: 'doughnut',
				data: {
					labels: CategoryLabel,
					datasets: [{
					label: 'Number',
					data: CategoryData,
					backgroundColor:[
								'#e7ae8c', '#e06763', 'White', '#e3f882', '#a67cdd', 
								'#f8f526','#44f09f','LightBlue','#ffac2e','Pink','#6cc8fd','#8bfd3f'
							],
					borderWidth: 1.3,
					borderColor: ['black']
					}]
				},
				options: {
					maintainAspectRatio:false,
					responsive:true,
					
				},
				plugins: [ChartDataLabels]
			});
	</script>
<!---------------------------------------------------->
	<div class="recent-grid">
		<div class="game">
			<div class="card">
				<div class="card-header">
					<h2>Games</h2>
					<a href="./List_game.php"> 
						<button>Xem thêm <span class="fas fa-arrow-right"></span>
					</button>
					</a>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>ID</th>
									<th>Hình ảnh</th>
									<th>Tên</th>
									<th>Thể loại</th>
									
								</tr>
							</thead>
				
							<tbody>
								<?php
								$sql7 = mysqli_query($connect,$query7);
								while($row_G = mysqli_fetch_array($sql7))
								{
									echo 
								'<tr>
									<td>
										'.$row_G['id'].'
									</td>
									<td>
										<img src="'.$row_G['image'].'" >
									</td>
									<td>
										'.$row_G['name'].'
									</td>
									<td>
										'.$row_G['Tags'].'
									</td>
								</tr>';
								}
								?>
								
				
							</tbody>
						</table>
					</div>
						
				</div>
			</div>
		</div>

		<div class="user">
			<div class="card">
				<div class="card-header">
					<h2 id="amogus">Người dùng</h2>
					<a href="./List_user.php"> <button id="sus">Xem thêm <span class="fas fa-arrow-right"></span></button></a>
				</div>
				
				<div class="card-body">
					<div class="custom">
						<table>
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên người dùng</th>
									<th>Email</th>
								</tr>
							</thead>
				
							<tbody>
							<?php
								$sql8 = mysqli_query($connect,$query8);
								while($row_U = mysqli_fetch_array($sql8))
								{
									echo 
									'<tr>
										<td>
											'.$row_U['userID'].'
										</td>
										<td>
											'.$row_U['userName'].'
										</td>
										<td>
											'.$row_U['userEmail'].'
										</td>
									</tr>';
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


</section>





<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>