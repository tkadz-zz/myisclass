<?php
include("autoloader.inc.php");

if(isset($_POST['btn-signin'])) {
    $regNumber = $_POST["regNumber"];
    $password = $_POST["password"];

    try {
        $login = new Usercontr();
        $login->SigninUser($regNumber, $password);

    } catch (TypeError $e) {
        echo "Error" . $e->getMessage();
    }
}
else{
    echo "<script type='text/javascript'>;
             window.location='../unauthorized.php';
            </script>";
}