<!DOCTYPE html>
<html lang="en">
<?php include_once '../inc/head-admin.php' ?>


<body> 

<?php  include_once '../inc/navbar.php'; ?> 
	<?php  include_once '../inc/sidemenu.php'; ?>


<section>
	 <?php 
			require_once('../html/connect.php');
			$query = "SELECT * FROM `all-games` ";
		?>
		<div class="game">
			<div class="card">
				<div class="card-header" id="B">
					<h2>Games</h2>
					<a href="./add_Game.php"> 
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
								<th>Hình ảnh</th>
								<th>Tên</th>
								<th>Thể loại</th>
								<th>Liên kết</th>
								<th>Trạng thái</th>
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
									<td>
									'.$row_G['link'].'
									</td>
									<td>
									'.$row_G['type'].'
									</td>
									<td>';
								?>
										<span class="action-btn">
											<a href="./edit_Game.php?id=<?php echo $row_G['id']; ?>">
												<i class="fa-solid fa-pen" id="edit"></i>
											</a>
											<a onclick="return Del('<?php echo $row_G['name']; ?>')" href="./delete_Game.php?id=<?php echo $row_G['id'] ?>">
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