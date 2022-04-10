<?php

class ExtraViews extends Users
{


    //FOR STUDENT GENDER SELECTION
    public function studentGender($id){
        $rows = $this->GetStudentByID($id);
        ?>
        <option value="MALE"> <?php echo $rows[0]['sex']  ?> </option>
        <?php
        if($rows[0]['sex'] == 'MALE'){
          ?>
            <option value="FEMALE"> FEMALE </option>
            <option value="PRIVATE"> KEEP PRIVATE  </option>
            <?php
        }

        elseif($rows[0]['sex'] == 'FEMALE'){
            ?>
            <option value="MALE"> MALE </option>
            <option value="PRIVATE"> KEEP PRIVATE </option>
            <?php
        }
        else{
            ?>
            <option value="MALE"> MALE </option>
            <option value="FEMALE"> FEMALE </option>
            <?php
        }

    }




}