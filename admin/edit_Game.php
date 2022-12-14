<!DOCTYPE html>
<html lang="en">
 <?php include_once '../inc/head-admin.php' ?> 


<body> 

 <?php  include_once '../inc/navbar.php'; ?> 
	<?php  include_once '../inc/sidemenu.php'; ?> 


<section>
	<h3 class="i-name">
		Sửa thông tin
	</h3>

	 <?php 
			require_once('../html/connect.php');

			$query = "SELECT * FROM `category` order by `id`";
			$sql = mysqli_query($connect,$query);
             $id = $_GET['id'];
             $query_edit = "SELECT * FROM `all-games` where `id`= $id ";
             $sql_edit = mysqli_query($connect,$query_edit);
             $result_edit = mysqli_fetch_array($sql_edit);
            
         
            
            if(isset($_POST['g_Submit']))
            {
                $name = $_POST['g_name'];

                $tag = $_POST['g_Tag'];

                // 	$image = $_FILES['image']['name'];
                // 	$image_tmp = $_FILES['image']['tmp_name'];
                // move_uploaded_file($image_tmp, '../img/'.$image);

                $image = $_POST['g_Image'];

                $link = $_POST['g_Link'];

                if($_POST['g_Type'] == '' || $_POST['g_Type'] == NULL)
                {
                    $_POST['g_Type'] = "popular";
                }
            
                $type = $_POST['g_Type'];

                require_once "../inc/function.inc.php";

                if(emptyInputAddGame($name,$tag,$image) !== false)
                {
                    header("location: ../admin/edit_Game.php?id=".$id."&error=emptyinput");
                    exit();
                }
                if(invalidURL($image)){
                    header("location: ../admin/edit_Game.php?id=".$id."&error=invalidURL");
                    exit();
                }
            
            
                $sql2 = "UPDATE `all-games` SET 
                            `name` = '$name', 
                            `Tags` = '$tag', 
                            `image` = '$image', 
                            `link` = '$link', 
                            `type` = '$type' 
                        WHERE `id`= $id";

                $query2 = mysqli_query($connect,$sql2);
            

                header("location: ../admin/edit_Game.php?id=".$id."&error=none");
                exit();

            }
            
          
		?>
				<div class="prof-container">
					<div class="profile">
						<h2>Sửa Game</h2>
						<form method="POST" enctype="multipart/form-data">  
							<div class="txt_field">
								<input type="text" name="g_name" placeholder="Nhập tên game" require 
                                   	 value= "<?php echo $result_edit['name']; ?>">
								<span></span>
								<label for="">Tên game</label>
							</div>
							<div class="txt_field">
								<select name="g_Tag" id="g_Tag" require>
									<option value= "<?php echo $result_edit['Tags']; ?>"><?php echo $result_edit['Tags']; ?></option>
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
									<!-- <input type="file"  name="image" require> -->
									<input type="text"  name="g_Image" placeholder="Nhập địa chỉ hình ảnh" require
                                    value= "<?php echo $result_edit['image']; ?>">
								<span></span>
								<label for="">Hình ảnh</label>
							</div>
							<div class="txt_field">
								<input type="text" name="g_Link" placeholder="Nhập tên (Hoặc để trống)"
                                   		  value= "<?php echo $result_edit['link']; ?>">
		                        <span></span>
								<label for="">Tạo trang</label>
							</div>
							<div class="txt_field">
								<select name="g_Type" id="g_Tag">
									<option value= "<?php echo $result_edit['type']; ?>" > <?php echo $result_edit['type']; ?> </option>
									<option value="popular">popular</option>
									<option value="trend">trend</option>
									<option value="new">new</option>

								</select>						
							</div>
							
							
							<button type="submit" name="g_Submit" >Sửa</button>    
						</form>

					</div>
				</div>
       
			
					<?php
							if(isset($_GET["error"]))
							{
								$error = $_GET["error"];
								
								switch($error){
									case "emptyinput": echo "<script> alert('Vui lòng điền ít nhất TÊN, TAG, và HÌNH') </script>";
										break;
                                    case "invalidURL": echo "<script> alert('Địa chỉ ảnh không hợp lệ') </script>";
										break;
									case "none": echo "<script> alert('Sửa thành công') </script>";
										break;
								}


							}
						?>
								
	
					
					

		

	</section>






<!------Script------->
<script src="../js/Script.js">  </script>
<!------Script end------>
	</body>
</html>