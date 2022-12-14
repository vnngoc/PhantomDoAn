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

	<?php 
			require_once('../html/connect.php');
			$query = "SELECT * FROM `category` ORDER BY id";
			$sql = mysqli_query($connect,$query);

			if(isset($_POST['submit']))
			{
				$name = $_POST['name'];
				require_once "../inc/function.inc.php";
				if(emptyInputCategory($name) !== false)
                {
                    header("location: ../admin/List_category.php?error=emptyinput");
                    exit();
                }
                if(invalidCategoryName($name) !== false)
                {
                    header("location: ../admin/List_category.php?error=invalidname");
                    exit();
                }

				$query2 ="INSERT INTO `category`(`TagName`) VALUES ('$name')";
				$sql2 = mysqli_query($connect,$query2);
				header("location: ../admin/List_category.php?error=none");
    			exit();
			}
		?>
	 <div class="recent-grid" id="A">
		<div class="game">
			<div class="card">
				<div class="card-header" >
					<h2 id="tit">Thể loại</h2>

					<form method="POST" enctype="multipart/form-data" >  
						<input id="inp" type="text" name="name" placeholder="Nhập tên ">
							<button id="butt" type="submit" name="submit"> 
								Thêm  
								<i class="fa-solid fa-plus"></i>
							</button>
					</form>
					
				</div>

				<div class="card-body">
					<div class="table">
						<table id="myTab" >
							<thead>
								<tr>
								<th>ID</th>
								<th>Tên thể loại</th>
								<th>Chỉnh sửa</th>
									
								</tr>
							</thead>
				
							<tbody>
								<?php
								while($row_G = mysqli_fetch_array($sql))
								{
									echo 
								'<tr>
									<td>
										'.$row_G['id'].'
									</td>
								
									<td>
										'.$row_G['TagName'].'
									</td>
									<td>';
									?>
											<span class="action-btn">
												<a href="./edit_Category.php?id=<?php echo $row_G['id']; ?>">
													<i class="fa-solid fa-pen" id="edit"></i>
												</a>
												<a onclick="return Del('<?php echo $row_G['TagName']; ?>')" href="./delete_Category.php?id=<?php echo $row_G['id'] ?>">
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
						<?php
							if(isset($_GET["error"]))
							{
								$error = $_GET["error"];
								
								switch($error){
									case "emptyinput": echo "<script> alert('Vui lòng điền đầy đủ thông tin') </script>";
										break;
                                    case "invalidname": echo "<script> alert('Tên không hợp lệ') </script>";
										break;
									case "none": echo "<script> alert('Thêm thành công') </script>";
										break;
								}


							}
						?>
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