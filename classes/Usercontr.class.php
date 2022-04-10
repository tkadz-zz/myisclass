<?php
class Usercontr extends Users{




    public function autoLoginUsers($id, $regNumber, $par){
        parent::autoLoginUsers($id, $regNumber, $par);
    }

    public function SigninUser($regNumber, $password){
        parent::SigninUser($regNumber, $password);
    }

    public function log_out(){
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['surname']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['status']);
        echo "<script type='text/javascript'>
      window.location='index.php';
      </script>";
        return true;
    }

}
