<?php

class StudentView extends Users
{





    public function ViewAllStudents($student){
        $rows = $this->GetAllStudents($student);
        $s = 0;
        foreach ($rows as $row)
        {
            $s++;
            ?>

            <tr>
                <td>
                    <?php
                    if($row['regStatus'] == 1){
                        ?>
                        <span class="badge badge-success"> <?php echo $s ?></span>
                        <?php
                    }
                    else{
                        ?>
                        <span class="badge badge-warning"> <?php echo $s ?></span>
                        <?php
                    }
                    ?>
                </td>


                <td><?php echo $row["regNumber"] ?>
                    <?php
                    if($row['id'] == $_SESSION['id'])
                    {
                        ?>
                        <span style="font-size: 13px; color: #0c63e4" class="fa fa-check-circle"></span>
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $row["name"] ?> </td>
                <td><?php echo $row["surname"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["sex"] ?></td>
            </tr>

            <?php
        }
    }

    public function ViewAllStudentsPrint($student){
        $rows = $this->GetAllStudents($student);
        $s = 0;
        foreach ($rows as $row)
        {
            $s++;
            ?>

            <tr>
                <td><?php echo $s ?></td>
                <td><?php echo $row["regNumber"] ?>
                    <?php
                    if($row['id'] == $_SESSION['id'])
                    {
                        ?>
                        <span style="font-size: 13px; color: #0c63e4" class="fa fa-check-circle"></span>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($row['sex'] == 'MALE'){
                        ?>
                        <span class="mdi mdi-human-male text-warning"></span>
                        <?php
                    }
                    elseif ($row['sex'] == 'FEMALE'){

                        ?>
                        <span class="mdi mdi-human-female text-primary"></span>
                        <?php
                    }
                    else{
                        ?>
                        <span class="mdi mdi-exclamation text-danger"></span>
                        <?php
                    }
                    echo $row["name"] .' '. $row["surname"] ;
                    ?>

                </td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["phone"] ?></td>
            </tr>

            <?php
        }
    }









    public function StudentViewChangePassword($id){
        $userRow = $this->GetUser($id);
        $studentRow = $this->GetStudentByID($id);
        ?>
        <div class="container card-body col-md-12 card grid-margin stretch-card rounded bg-white mt-4 mb-4">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>

                        </div>
                        <form method="post" action="includes/StudentUpdate.inc.php" >
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Current Password</label>
                                    <input name="op" type="password" class="form-control" placeholder="Current Password" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">New Password</label>
                                    <input id="password" name="np" type="password" class="form-control" placeholder="New Password" onkeyup='check();' minlength="8" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Confirm New Password</label>
                                    <input id="confirmPassword" name="cp" type="password" class="form-control" placeholder="Confirm New Password" onkeyup='check();' minlength="8" required>
                                </div>
                            </div>

                            <script>
                                var check = function() {
                                    if (document.getElementById('password').value ==
                                        document.getElementById('confirmPassword').value) {
                                        document.getElementById('message').style.color = 'green';
                                        document.getElementById("save-btn").disabled = false;
                                        document.getElementById('message').innerHTML = '<div id="divDis" class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-success"><span class="fa fa-check-circle"></span>Password matched</div>';
                                    }
                                    else {
                                        document.getElementById('message').style.color = 'red';
                                        document.getElementById("save-btn").disabled = true;
                                        document.getElementById('message').innerHTML = '<div class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-danger"><span class="fa fa-exclamation-circle"></span>New Password not matching Confirm Password</div>';
                                    }


                                }
                            </script>

                            <div>

                                <span id='message'></span>

                            </div>


                            <div class="mt-5 text-center">
                                <button id="save-btn" name="btn_updatePassword" class="btn btn-primary" type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <span>More Options</span>
                        </div>
                        <hr>
                        <a href="profile.php" class="btn btn-dark align-items-center"> <span class="fa fa-user-edit"></span><span class="fa fa-arrow-left"></span> Update Profile</a>
                        <br>
                        <br>
                        <a href="#!" class="btn btn-warning align-items-center"> <span class="fa fa-exclamation-circle"></span> Deactivate Account</a>
                        <br>
                        <br>
                        <a href="#!" class="btn btn-danger align-items-center"> <span class="fa fa-exclamation-triangle"></span> Permanently Delete Account</a>


                    </div>
                </div>

            </div>
        </div>
        <?php
    }










    public function StudentViewProfile($id){
        $userRow = $this ->GetUser($id);
        $studentRow = $this->GetStudentByID($id);
        ?>

        <div class="container card-body col-md-12 card grid-margin stretch-card rounded bg-white mt-4 mb-4">
            <div class="row ">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="../avatar/undraw_profile_1.svg">
                        <span class="font-weight-bold"><?php echo $studentRow[0]['name'] .' '. $studentRow[0]['surname']   ?></span>
                        <span class="text-black-50"><?php echo $studentRow[0]['email'] ?></span>
                        <span> </span>
                    </div>
                </div>


                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>

                        </div>
                        <form method="post" action="includes/StudentUpdate.inc.php" >
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Reg-Number</label>
                                    <input name="regNumber" type="text" class="form-control" placeholder="first name" value="<?php echo $userRow[0]['regNumber']  ?>"  disabled>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="first name" value="<?php echo $studentRow[0]['name'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Surname</label>
                                    <input name="surname" type="text" class="form-control" value="<?php echo $studentRow[0]['surname'] ?>" placeholder="surname" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Mobile Number</label>
                                    <input name="phone" type="text" class="form-control" placeholder="enter phone number" value="<?php echo $studentRow[0]['phone'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email ID</label>
                                    <input name="email" type="text" class="form-control" placeholder="enter email id" value="<?php echo $studentRow[0]['email'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">D.O.B : <span class="text-dark"><?php echo date('d F Y', strtotime($studentRow[0]['dob'])); ?></span></label>
                                    <input name="dob" type="date" class="form-control" placeholder="enter address line 2" value="<?php echo $studentRow[0]['dob'] ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Sex</label>
                                    <select name="sex" class="form-control bg-white" style="color: #0b0b0b">
                                        <?php
                                        $extraV = new ExtraViews();
                                        $extraV -> studentGender($_SESSION['id']);
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="mt-5 text-center">
                                <button name="btn_updateProfile" class="btn btn-primary" type="submit">Save Profile</button>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <span>Additional Settings</span>
                        </div>
                        <hr>
                        <a href="password.php" class="btn btn-dark align-items-center"> <span class="fa fa-lock"></span> Change Password <span class="fa fa-arrow-right"></span></a>
                        </div>
                </div>
            </div>
        </div>

        <?php
    }













    public function accountOverview($id){
        //Student Dashboard Account Overview
        $userRow = $this ->GetUser($id);
        $studentRow = $this->GetStudentByID($id);

        ?>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Details | <a style="font-size: 13px" href="profile.php"><span class="fa fa-pencil">update</span></a></h4>
                    <p class="card-description">
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p class="fw-bold">Full Name</p>
                                <p>
                                    <?php echo $studentRow[0]['name'] .' '. $studentRow[0]['surname'] ?>
                                </p>
                                <hr>
                                <p class="fw-bold">Reg-Number</p>
                                <p>
                                    <?php echo $userRow[0]['loginID'] ?>
                                </p>
                                <hr>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address class="text-primary">
                                <p class="fw-bold">
                                    E-mail
                                </p>
                                <p class="mb-2">
                                    <?php echo $studentRow[0]['email'] ?>
                                </p>
                                <hr>
                                <p class="fw-bold">
                                    Phone
                                </p>
                                <p>
                                    <?php echo $studentRow[0]['phone'] ?>
                                </p>
                                <hr>
                                <p class="fw-bold">
                                    DOB
                                </p>
                                <p>
                                    <?php echo $studentRow[0]['phone'] ?>
                                </p>

                            </address>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <?php
    }

    public function attachmentStatus($id){
        $userRow = $this ->GetUser($id);
        $studentRow = $this->GetStudentByID($id);
        ?>


        <?php
        if($studentRow[0]['attachmentStatus'] != 1)
        {
            ?>
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="border border-warning nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Not Attached yet</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                    <a href="#!" class="dropdown-item py-3 border border-bottom-dark " >
                        <p class="mb-0 font-weight-medium float-left">
                            More options will appear below once you get attachment
                        </p>
                    </a>
                    <a href="#!" class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><span class="mdi mdi-book-open-page-variant"></span> Vacancies</p>
                            <p class="fw-light small-text mb-0">View and apply to available vacancies</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="cv.php" class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><span class="mdi mdi-book-open-page-variant"></span> Curriculum Vitae</p>
                            <p class="fw-light small-text mb-0">Keep your CV up-to-date</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <?php
        }

        else{
            ?>
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="border border-success nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split text-primary" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Attached</a>
                <div class="border border-success dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                                <span style="color: black" class="dropdown-item py-3 disabled" >
                                    <p class="mb-0 font-weight-medium float-left">Work Related Learning Management</p>
                                </span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><span class="mdi mdi-book-open-page-variant"></span> Logbook </p>
                            <p class="fw-light small-text mb-0">Upload and update your logbook</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><span class="mdi mdi-book-open-page-variant"></span> Attachment Report/s</p>
                            <p class="fw-light small-text mb-0">your attachment report/s</p>
                        </div>
                    </a>
                    <a href="cv.php" class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark"><span class="mdi mdi-book-open-page-variant"></span> Curriculum Vitae</p>
                            <p class="fw-light small-text mb-0">Keep your CV up-to-date</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">More ...<span class="mdi mdi-chevron-double-right"></span> </p>
                        </div>
                    </a>
                </div>
            </li>
            <?php
        }
        ?>
        <?php
    }


}

?>