<?php
    $connect = mysqli_connect('localhost','root','','games') or die ('Không thể kết nối CSDL
    MySQL');
    if($connect){
        mysqli_query($connect,"SET NAMES 'UTF8'");
    }else
        echo 'connect fail'; 
?>