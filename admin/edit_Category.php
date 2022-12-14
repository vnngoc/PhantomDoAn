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
             $query_edit = "SELECT * FROM `category` where `id`= $id ";
             $sql_edit = mysqli_query($connect,$query_edit);
             $result_edit = mysqli_fetch_array($sql_edit);
            
         
            
            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];

                require_once "../inc/function.inc.php";
                if(emptyInputCategory($name) !== false)
                {
                    header("location: ../admin/edit_Category.php?id=".$id."&error=emptyinput");
                    exit();
                }
                if(invalidCategoryName($name) !== false)
                {
                    header("location: ../admin/edit_Category.php?id=".$id."&error=invalidname");
                    exit();
                }
              
           
            
                $sql2 = "UPDATE `category` SET 
                            `TagName` = '$name' 
                        WHERE `id`= $id";

                $query2 = mysqli_query($connect,$sql2);
            

                header("location: ../admin/edit_Category.php?id=".$id."&error=none");
                exit();

            }
            
          
       
          
            // if($_FILES['image']['name'] == '')
            // {
            //     $image = $result_edit['image'];
            // }
		?>
       
				<form method="POST" enctype="multipart/form-data" >  
					<table>
						<tr>
							<td>Tên thể loại</td>
							<td>
                                <input type="text" name="name" placeholder="Nhập tên " require 
                                    value= "<?php echo $result_edit['TagName']; ?>">
                            </td>
						</tr>

						<tr>
							<td colspan="2" align="center">
								<button type="submit" name="submit" >Sửa</button>
							</td>
						</tr>
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