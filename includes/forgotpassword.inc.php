<?php
include("autoloader.inc.php");

if(isset($_POST['btn-recover-password'])) {
    $email = $_POST["email"];

    try {
        $login = new Usercontr();
        $login->forgotpassword($email);

    } catch (TypeError $e) {
        echo "Error" . $e->getMessage();
    }
}
else{
    echo "<script type='text/javascript'>;
             window.location='../unauthorized.php';
            </script>";
}