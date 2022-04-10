<?php


class Users extends Dbh
{

    protected function studentUpdateProfile($name,$surname,$phone,$email,$sex,$dob,$id)
    {
        $sql = "UPDATE users SET name=?, surname=?, phone=?, email=?, sex=?, dob=? WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$name,$surname,$phone,$email,$sex,$dob,$id])){
            //success
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;

            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Profile Updated Successfully';

            echo "<script type='text/javascript'>;
                      window.location='../profile.php';
                    </script>";
        }
        else{
            //err
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'Profile Failed To Update';
            echo "<script type='text/javascript'>;
                      window.location='../profile.php';
                    </script>";
        }
    }


    protected function studentUpdatePassword($op, $cp, $id){
        //update student password
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();

        if(password_verify($op, $rows[0]['password'])){
            //Match
            $sql2 = "UPDATE users SET password=? WHERE id=?";
            $stmt2 = $this->con()->prepare($sql2);
            $pass_safe = password_hash($cp, PASSWORD_DEFAULT);

            if($stmt2->execute([$pass_safe, $id])){

                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Password Updated Successfully';

                echo "<script type='text/javascript'>;
                      window.location='../password.php';
                    </script>";
            }
            else{

                $_SESSION['type'] = 'd';
                $_SESSION['err'] = 'Password Update Failed';

                echo "<script type='text/javascript'>;
                      window.location='../password.php';
                    </script>";
            }
        }
        else{
            //Not Matched

            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'New Password did not match Old Password';

            echo "<script type='text/javascript'>;
                      window.location='../password.php';
                    </script>";
        }

    }



    //STUDENT LOGIN/SIGNIN
    protected function SigninUser($regNumber, $password)
    {
        $sql = "SELECT * FROM users WHERE regNumber=? ";
        $stmt = $this->con()->prepare($sql);
        if ($stmt->execute([$regNumber])) {
            $record = $stmt->fetchAll();
            /* Check the number of rows that match the SELECT statement */
            if (count($record) > 0) {

                if($record[0]['regStatus'] != 1){

                    $_SESSION['regNumTemp'] = $record[0]['regNumber'];
                    $_SESSION['regNumbers'] = $record[0]['regNumber'];

                    $_SESSION['idTemp'] = $record[0]['id'];
                    $_SESSION['ids'] = $record[0]['id'];
                    $_SESSION['type'] = 's';
                    $_SESSION['err'] = 'Looks like this is your first time login-in! Please Choose a password of your choice to proceed';

                    echo "<script type='text/javascript'>;
                          window.location='../setPassword.php';
                        </script>";                }
                else{
                    //Proceed to normal login
                    foreach ($record as $row) {
                        $passwords = $row["password"];
                        $user_id = $row["id"];

                        if (password_verify($password, $passwords)) {
                            $_SESSION['id'] = $user_id;
                            $par = NULL; //This is a third parameter lm using for password auto login through sign-in pae
                            Usercontr::autologinUsers($_SESSION['id'], $regNumber, $par);
                        } else {
                            //Password Did Not match
                            $_SESSION['type'] = 'w';
                            $_SESSION['err'] = 'Wrong Reg-Number or Password';

                            echo "<script type='text/javascript'>;
                          window.location='../signin.php?regNum=".$regNumber."';
                        </script>";
                        }
                    }
                }



            }
                /* No rows matched -- do something else */
            else {
                $_SESSION['type'] = 'w';
                $_SESSION['err'] = 'Wrong Reg-Number or Password';

                echo "<script type='text/javascript'>;
                          window.location='../signin.php?regNum=".$regNumber."';
                        </script>";
                }
            }
        }





    //STUDENT REGISTRATION CLASSES

    protected function GetUserByregNumber($regNumber){
        $sql = "SELECT * FROM users WHERE regNumber=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$regNumber]);
        return $stmt->fetchAll();
    }

    protected function GetAllStudents($student){
        $sql = "SELECT * FROM users WHERE role=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$student]);
        return $stmt->fetchAll();
    }

    protected function GetStudentByID($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetStudentByRegNumber($regNumber){
        $sql = "SELECT * FROM users WHERE regNumber=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$regNumber]);
        return $stmt->fetchAll();
    }

    protected function GetUser($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }



    



    protected function autoLoginUsers($id, $regNumber, $par)
    {
        //LOGIN FROM NORMAL LOGIN PAGE
        $rowsUser = $this->GetUserByregNumber($regNumber);


        if ($rowsUser[0]['role'] == 'student' OR $rowsUser[0]['role'] == 'admin') {
            //redirect to student Portal
            $rowsStudent = $this->GetStudentByID($id);

            if($rowsUser[0]['regStatus'] != 1){
                $newRegStatus = 1;
                $sql = "UPDATE users SET regStatus=?, password=? WHERE regNumber=?";
                $stmt = $this->con()->prepare($sql);
                $stmt->execute([$newRegStatus, $par,  $regNumber]);
            }

            $_SESSION['name'] = $rowsStudent[0]['name'];
            $_SESSION['surname'] = $rowsStudent[0]['surname'];
            $_SESSION['regNumber'] = $regNumber;
            $_SESSION['role'] = $rowsUser[0]['role'];
            $_SESSION['id'] = $rowsUser[0]['id'];
            $_SESSION['email'] = $rowsUser[0]['email'];
            $_SESSION['phone'] = $rowsUser[0]['phone'];

            if ($rowsUser[0]['status'] != 1) {
                $_SESSION['type'] = 'd';
                $_SESSION['err'] = 'Your account (' . $rowsStudent[0]['name'] . ' ' . $rowsStudent[0]['surname'] . ') is temporarily deactivated. Contact the administrator to get this issue fixed';

                unset($_SESSION['id']);
                unset($_SESSION['name']);
                unset($_SESSION['surname']);
                unset($_SESSION['email']);
                unset($_SESSION['role']);
                unset($_SESSION['status']);

                echo "<script type='text/javascript'>
                        window.location='../signin.php?regNum=$regNumber';
                      </script>";
            } else {

                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Welcome '.$regNumber.'!';

                echo "<script type='text/javascript'>
                        window.location='../student/index.php';
                      </script>";

            }
        }

    }


}