<?php
	require_once('../html/connect.php');

    if(isset($_GET["id"]))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM `all-games` where `id` = $id";
        $sql = mysqli_query($connect,$query);
        header("location: ../admin/List_game.php");

    }

?>