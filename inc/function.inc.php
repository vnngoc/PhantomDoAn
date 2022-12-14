<?php
    function emptyInputSignup($name,$email,$pass,$rpPass){
        $result;
        if(empty($name) || empty($email) || empty($pass)|| empty($rpPass))
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }

        return $result;
    }

    function emptyInputLogin($username,$pass){
        $result;
        if(empty($username) || empty($pass) )
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }

        return $result;
    }

    function emptyInputAddGame($name,$tag,$image){
        $result;
        if(empty($name) || empty($tag) || empty($image))
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }

        return $result;
    }
    function emptyInputEditUser($name,$email){
        $result;
        if(empty($name) || empty($email) )
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }

        return $result;
    }
    function emptyInputCategory($name){
        $result;
        if(empty($name))
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }

        return $result;
    }

    function invalidUid($name){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$name))
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }
        return $result;
    }   
    function invalidCategoryName($name){
        $result;
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) //Only letters and white space allowed
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }
        return $result;
    }
    function invalidURL($URL){
        $result;
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$URL)) 
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }
        return $result;
    }

    function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }
        return $result;
    }

    function passMatch($pass,$rpPass){
        $result;
        if($pass !== $rpPass)
        {
            $result = true; //mean error
        }
        else
        {
            $result = false; //mean no error
        }
        return $result;
    }

    function uidExists($connect,$name) {
        $sql = "SELECT * FROM `acc` WHERE userName = ?;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location:../html/signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData))
        {
            return $row;
        }
        else
        {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function  createUser($connect,$name,$email,$pass)
    {
        $sql = "INSERT INTO `acc`(`userName`, `userEmail`, `userPass`) 
                    VALUES (?,?,?) ";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location:../html/signup.php?error=stmtfailed");
            exit();
        }

        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashedPass);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("location: ../html/signup.php?error=none");
        exit();
    }

    function loginUser($connect,$username,$pass){
        $uidExist =uidExists($connect,$username);

        if($uidExist === false)
        {
            header("location: ../html/log-acc.php?error=wronglogin");
            exit();
        }

        $passHashed = $uidExist["userPass"];
        $checkPass = password_verify($pass,$passHashed);
        if($checkPass === false)
        {
            header("location: ../html/log-acc.php?error=wronglogin");
            exit();
        }
        else if($checkPass === true)
        {
            session_start();
            $_SESSION["userID"] = $uidExist["userID"];
            $_SESSION["userName"] = $uidExist["userName"];
            $_SESSION["userType"] = $uidExist["userType"];
            $_SESSION["userEmail"] = $uidExist["userEmail"];
            $_SESSION["userPass"] = $uidExist["userPass"];
            if($_SESSION["userType"] == "admin")
            {
                header("location: ../admin/admin-index.php");
                exit();
            }
            else
            {
                header("location: ../main/index.php");
                exit();
            }
           
        }
    }

   

?>