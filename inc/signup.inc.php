<?php 
 require_once "../html/connect.php";

    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $rpPass = $_POST["rpPass"];
        
        require_once "function.inc.php";

        if(emptyInputSignup($name,$email,$pass,$rpPass) !== false)
        {
            header("location: ../html/signup.php?error=emptyinput");
            exit();
        }
        if(invalidUid($name) !== false)
        {
            header("location: ../html/signup.php?error=invaliduid");
            exit();
        }
        if(invalidEmail($email) !== false)
        {
            header("location: ../html/signup.php?error=invalidemail");
            exit();
        }
        if(passMatch($pass,$rpPass) !== false)
        {
            header("location: ../html/signup.php?error=unmatchpass");
            exit();
        }
        if(uidExists($connect,$name) !== false)
        {
            header("location: ../html/signup.php?error=usernamealreadyexist");
            exit();
        }
        
        createUser($connect,$name,$email,$pass);

    }
    else
    {
        header("location: ../html/signup.php");
        exit();
    }
?>