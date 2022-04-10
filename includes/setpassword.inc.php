<?php
include("autoloader.inc.php");

if(isset($_POST['save-btn'])) {



    $id = $_SESSION['ids'];
    $regNumber = $_SESSION['regNumbers'];

    $password_unprotected = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $password = password_hash($password_unprotected, PASSWORD_BCRYPT);

    if (strlen($password_unprotected) < 8 || strlen($confirmPassword) < 8){
        $_SESSION['type'] = 'w';
        $_SESSION['err'] = 'Password is too short';
        echo "<script type='text/javascript'>;
             window.location='signup.php';
            </script>";
    }
    else {


        try {
            $login = new Usercontr();
            $login->autoLoginUsers($id, $regNumber, $password);

        } catch (TypeError $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
else{
    echo "<script type='text/javascript'>;
             window.location='../unauthorized.php';
            </script>";
}