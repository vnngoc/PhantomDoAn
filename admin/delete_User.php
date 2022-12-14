<?php
	require_once('../html/connect.php');

    if(isset($_GET["id"]))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM `acc` where `userId` = $id";
        $sql = mysqli_query($connect,$query);
        header("location: ../admin/List_user.php");

    }

?>