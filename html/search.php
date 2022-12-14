<?php 
    // require_once('connect.php');
    // $query = "SELECT * FROM `all-games` WHERE `name` LIKE '%".$_POST['name']."%'";
	// $sql = mysqli_query($connect,$query);
    // if(mysqli_num_rows($sql) > 0)
    // {
    //     while($row = mysqli_fetch_array($sql))
    //     {
    //         echo "<div class='box' id='box'>
    //         <a href='./download.html' target='_blank'>
    //         <div class='image'>
    //             <img src=".$row['image']."> 
    //         </div>
    //         <div class='box-text'>
    //             <h2>".$row["name"]."</h2>
    //             <h3>".$row["Tags"]."</h3>
    //         </div> </a>
    //     </div>";
    //     }
    // }
  
    require_once 'connect.php';
    if(isset($_POST['name']) != '')
    {
        $query = "SELECT * FROM `all-games` WHERE `name` LIKE '%".$_POST['name']."%'";
    }
    else
    {
        $query = "SELECT * FROM `all-games`";
    }
	$sql = mysqli_query($connect,$query);
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            echo "<div class='box' id='box'>
            <a href='./download.html' target='_blank'>
            <div class='image'>
                <img src=".$row['image']."> 
            </div>
            <div class='box-text'>
                <h2>".$row["name"]."</h2>
                <h3>".$row["Tags"]."</h3>
            </div> </a>
        </div>";
        }
    }


?>

  