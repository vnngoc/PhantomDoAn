<!DOCTYPE html>
<html lang="en">
 <?php include_once '../inc/head-admin.php' ?> 


<body> 

 <?php  include_once '../inc/navbar.php'; ?> 
	<?php  include_once '../inc/sidemenu.php'; ?> 


<section>
	<h3 class="i-name">
		Thêm Games
	</h3>

	 <?php 
			require_once('../html/connect.php');
			$query = "SELECT * FROM `category` order by `id`";
			$sql = mysqli_query($connect,$query);

		?>
	<div class="prof-container">
		<div class="profile">
			<h2>Thêm Game</h2>
			<form method="POST" enctype="multipart/form-data" action="../inc/addGame.inc.php">  
				<div class="txt_field">
					<input type="text" name="g_name" placeholder="Nhập tên game" require>
					<span></span>
					<label for="">Tên game</label>
				</div>
				<div class="txt_field">
					<select name="g_Tag" id="g_Tag" require >
								<option selected disabled>Thể loại</option>
								<?php 
									while($row = mysqli_fetch_array($sql))
									{
										echo 
										'
										<option value="'.$row['TagName'].'">'.$row['TagName'].'</option>
										';
									}
								
								?>
					</select>
				</div>
				<div class="txt_field">
				<input type="text"  name="g_Image" require placeholder="Nhập địa chỉ hình ảnh">
					<span></span>
					<label for="">Hình ảnh</label>
				</div>
				<div class="txt_field">
					<input type="text" name="g_Link" placeholder="Nhập tên (Hoặc để trống)">                        <span></span>
					<label for="">Tạo trang</label>
				</div>
				<div class="txt_field">
					<select name="g_Type" id="g_Tag">
								<option selected disabled>Trạng thái</option>
								<option value="popular">popular</option>
								<option value="trend">trend</option>
								<option value="new">new</option>

						</select> 

					
				</div>
				
				
				<button type="submit" name="g_Submit" >Thêm</button>    
			</form>

		</div>
	</div>

				
					<?php
							if(isset($_GET["error"]))
							{
								$error = $_GET["error"];
								
								switch($error){
									case "emptyinput": echo "<script> alert('Vui lòng điền ít nhất tên, tag, và hình') </script>";
										break;
									case "invalidURL": echo "<script> alert('Địa chỉ ảnh không hợp lệ') </script>";
										break;
									case "none": echo "<script> alert('Thêm thành công') </script>";
										break;
								}


							}
						?>
								
	
				</form>
					
		
		

	</section>






<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>