<?php

require_once('../html/connect.php');
if(isset($_POST['g_Submit']))
{
    $name = $_POST['g_name'];

    $tag = $_POST['g_Tag'];

    
    // 	$image = $_FILES['image']['name'];
    // 	$image_tmp = $_FILES['image']['tmp_name'];
   

    $image = $_POST['g_Image'];

    $link = $_POST['g_Link'];

    if($_POST['g_Type'] == '' || $_POST['g_Type'] == NULL)
    {
        $_POST['g_Type'] = "popular";
    }
 
    $type = $_POST['g_Type'];

    require_once "function.inc.php";

    if(emptyInputAddGame($name,$tag,$image) !== false)
    {
        header("location: ../admin/add_Game.php?error=emptyinput");
        exit();
    }
    if(invalidURL($image)){
        header("location: ../admin/add_Game.php?error=invalidURL");
        exit();
    }
    $sql2 = "INSERT INTO `all-games`(`name`, `Tags`, `image`, `link`, `type`)
    VALUES ('$name', '$tag', '$image', '$link', '$type')";

    $query2 = mysqli_query($connect,$sql2);
    // move_uploaded_file($image_tmp, '../img/'.$image);

    header("location: ../admin/add_Game.php?error=none");
    exit();



}
else
{
    header("location: ../admin/add_Game.php");
    exit();
}