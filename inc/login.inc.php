<?php
 require_once "../html/connect.php";

    if(isset($_POST["submit"]))
    {
        $username =$_POST["username"];
        $pass = $_POST["pass"];

        require_once "function.inc.php";

        if(emptyInputLogin($username,$pass) !== false)
        {
            header("location: ../html/log-acc.php?error=emptyinput");
            exit();
        }

        loginUser($connect,$username,$pass);

    }
    else
    {
        header("location: ../html/log-acc.php");
        exit();
    }

?>