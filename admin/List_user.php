<!DOCTYPE html>
<html lang="en">
<?php include_once '../inc/head-admin.php' ?>


<body> 

 <?php  include_once '../inc/navbar.php'; ?> 
<?php  include_once '../inc/sidemenu.php'; ?> 


<section>


	<!-- <div class="values">
		<div class="val-box">
			<i class="fas fa-users"></i>
			<div class="val-text">
				<h3>22</h3>
				<span>Người dùng</span>
			</div>
		</div>
		<div class="val-box">
			<i class="fa-solid fa-gamepad"></i>
			<div class="val-text">
				<h3>101</h3>
				<span>Game hiện có</span>
			</div>
		</div>
		<div class="val-box">
			<i class="fa-solid fa-fire"></i>
			<div class="val-text">
				<h3>7</h3>
				<span>Trending</span>
			</div>
		</div>
		<div class="val-box">
			<i class="fa-solid fa-list-ul"></i>
			<div class="val-text">
				<h3>7</h3>
				<span>Thể loại</span>
			</div>
		</div>
		
	</div> -->

	<!-- <div class="table">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Hình ảnh</th>
					<th>Tên</th>
					<th>Thể loại</th>
					<th>Chỉnh sửa</th>


				</tr>
			</thead>

			<tbody>
				<tr>
					<td>
						1
					</td>
					<td>
						<img src="https://i.imgur.com/MtRzKPh.png" >
					</td>
					<td>
						gà
					</td>
					<td>
						horror
					</td>
			
					<td>
						<span class="action-btn">
							<a href="#">
								<i class="fa-solid fa-pen" id="edit"></i>
							</a>
							<a href="#">
								<i class="fa-solid fa-trash-can" id="delete"></i>
							</a>
						</span>
					</td>
				</tr>
				<tr>
					<td>
						1
					</td>
					<td>
						<img src="https://i.imgur.com/MtRzKPh.png" >
					</td>
					<td>
						gà
					</td>
					<td>
						horror
					</td>
			
					<td>
						<span class="action-btn">
							<a href="#">
								<i class="fa-solid fa-pen" id="edit"></i>
							</a>
							<a href="#">
								<i class="fa-solid fa-trash-can" id="delete"></i>
							</a>
						</span>
					</td>
				</tr>
			

			</tbody>

		</table>
	</div>
	 -->
	 <?php 
			require_once('../html/connect.php');
			$query = "SELECT * FROM `acc` ORDER BY `acc`.`userType` ASC";
		?>
	 <div class="recent-grid" id="A">
		<div class="game">
			<div class="card">
				<div class="card-header" id="B">
					<h2>Danh sách tài khoản</h2>
					<a href="../html/signup.php"> 
						<button> 
							Thêm  
							<i class="fa-solid fa-plus"></i>
						</button></a>
				</div>

				<div class="card-body">
					<div class="table">
						<table id="myTab">
							<thead>
								<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Email</th>
								<th>Loại</th>
								<th>Chỉnh sửa</th>
									
								</tr>
							</thead>
				
							<tbody>
								<?php
								$sql = mysqli_query($connect,$query);
								while($row_G = mysqli_fetch_array($sql))
								{
									echo 
								'<tr>
									<td>
										'.$row_G['userID'].'
									</td>
									<td>
										'.$row_G['userName'].'
									</td>
									<td>
										'.$row_G['userEmail'].'
									</td>
									<td>
										'.$row_G['userType'].'
									</td>
									<td>';
									?>
											<span class="action-btn">
												<a href="./edit_User.php?id=<?php echo $row_G['userID']; ?>">
													<i class="fa-solid fa-pen" id="edit"></i>
												</a>
												<a onclick="return Del('<?php echo $row_G['userName']; ?>')" href="./delete_User.php?id=<?php echo $row_G['userID'] ?>">
													<i class="fa-solid fa-trash-can" id="delete"></i>
												</a>
											</span>
									<?php	
										echo 
										'
											</td>
										</tr>
										';
										
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


<script>  
	$(document).ready(function () {
		$('#myTab').DataTable();
	});
	function Del(name) {
				return confirm("Bạn có chắc muốn xóa: " + name +" ?");
			}
</script>




<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>