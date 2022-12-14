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
             $id = $_GET['id'];
             $query_edit = "SELECT * FROM `acc` where `userID`= $id ";
             $sql_edit = mysqli_query($connect,$query_edit);
             $result_edit = mysqli_fetch_array($sql_edit);
            
         
            
            if(isset($_POST['g_Submit']))
            {
                $name = $_POST['g_name'];

                $email = $_POST['g_Email'];
            
                $type = $_POST['g_Type'];

                require_once "../inc/function.inc.php";

                if(emptyInputEditUser($name,$email) !== false)
                {
                    header("location: ../admin/edit_User.php?id=".$id."&error=emptyinput");
                    exit();
                }
                if(invalidUid($name) !== false)
                {
                    header("location: ../admin/edit_User.php?id=".$id."&error=invalidname");
                    exit();
                }
                if(invalidEmail($email) !== false)
                {
                    header("location: ../admin/edit_User.php?id=".$id."&error=invalidemail");
                    exit();
                }
              
           
            
                $sql2 = "UPDATE `acc` SET 
                            `userName` = '$name', 
                            `userEmail` = '$email', 
                            `userType` = '$type' 
                        WHERE `userID`= $id";

                $query2 = mysqli_query($connect,$sql2);
            

                header("location: ../admin/edit_User.php?id=".$id."&error=none");
                exit();

            }
		?>
       <div class="prof-container">
					<div class="profile">
						<h2>Sửa Game</h2>
						<form method="POST" enctype="multipart/form-data">  
							<div class="txt_field">
								<input type="text" name="g_name" placeholder="Nhập tên tài khoản" require 
                                    value= "<?php echo $result_edit['userName']; ?>">
								<span></span>
								<label for="">Tên tài khoản</label>
							</div>
							<div class="txt_field">
								<input type="text"  name="g_Email" require
                                    value= "<?php echo $result_edit['userEmail']; ?>">
								<span></span>
								<label for="">Email</label>
							</div>
							<div class="txt_field">
								<select name="g_Type" id="g_Type">
                                    <option value="<?php echo $result_edit['userType']; ?>"><?php echo $result_edit['userType']; ?></option>
									<option value="user">user</option>
									<option value="admin">admin</option>

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
									case "emptyinput": echo "<script> alert('Vui lòng điền đầy đủ thông tin') </script>";
										break;
                                    case "invalidname": echo "<script> alert('Tên tải khoản không hợp lệ') </script>";
										break;
                                    case "invalidemail": echo "<script> alert('Email không hợp lệ') </script>";
										break;
									case "none": echo "<script> alert('Sửa thành công') </script>";
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