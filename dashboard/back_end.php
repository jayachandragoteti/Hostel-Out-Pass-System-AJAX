<?PHP
include "../config.php";
include "components.php";
/*===============================================================================================================*/
function student_details_by_roll_no($srolln){
    include "../config.php";
    $select=mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$srolln'");
    return mysqli_fetch_array($select);
}
/*===============================================================================================================*/
if (isset($_POST['Add_Block']) && isset($_POST['block_name']) && isset($_POST['number_of_floors']) && isset($_POST['number_of_rooms']) && isset($_POST['students_per_room'])) {
    if ($_POST['Add_Block'] !="" && $_POST['block_name'] !="" && $_POST['number_of_floors'] !="" && $_POST['number_of_rooms'] !="" && $_POST['students_per_room'] !="") {
        $block_name = $connect -> real_escape_string(ucfirst($_POST['block_name']));
        $gender = $connect -> real_escape_string($_POST['gender']);
        $block_check_sql = mysqli_query($connect,"SELECT * FROM `blocks` WHERE `block_name` = '$block_name' AND `gender` ='$gender'");
        $block_check_count=mysqli_num_rows($block_check_sql);
        if ($block_check_count != 0) {
            echo "Block already exists!";
        } else {
            $number_of_floors = $connect -> real_escape_string($_POST['number_of_floors']);
            $number_of_rooms = $connect -> real_escape_string($_POST['number_of_rooms']);
            $students_per_room = $connect -> real_escape_string($_POST['students_per_room']);   
            $add_block_query="INSERT INTO `blocks`(`block_name`, `number_of_floors`, `number_of_rooms`, `students_per_room`,`gender`) VALUES ('$block_name','$number_of_floors','$number_of_rooms','$students_per_room','$gender')";
            $add_block_sql=mysqli_query($connect,$add_block_query);
            $rcount=0;
            if ($add_block_sql) {
                $block_select_sql = mysqli_query($connect,"SELECT * FROM `blocks` WHERE `block_name` = '$block_name'");
                $block_select_row = mysqli_fetch_array($block_select_sql);
                $block_name_insert = $block_select_row["sno"];
                for ($nor=1; $nor <= $block_select_row['number_of_rooms']; $nor++) { 
                    for ($spr=1; $spr <= $students_per_room ; $spr++) { 
                        $add_room_query="INSERT INTO `rooms`(`room_no`, `block_name`,`student_id`, `user_sno`) VALUES ('$nor','$block_name_insert','','')";
                        $add_room_sql=mysqli_query($connect,$add_room_query);
                        if ($add_room_sql) {
                            $rcount= $rcount+1;
                        } else {
                            mysqli_query($connect,"DELETE FROM `rooms` WHERE `block_name`='$block_name_insert'");
                        }
                    }
                }
                if ($rcount == $number_of_rooms*$students_per_room) {
                    echo "Blcok added";
                } else {
                    mysqli_query($connect,"DELETE FROM `blocks` WHERE `sno`='$block_name_insert'");
                    echo "Filled try again!";
                }
            }else {
                echo "Filled try again";
            }
        }        
    } else {
        echo "  All fields must be filled!";
    }
}
/*===============================================================================================================*/
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender'])&& isset($_POST['dob'])&& isset($_POST['father_name'])&& isset($_POST['mother_name'])&& isset($_POST['parent_phone'])&& isset($_POST['parent_email'])&& isset($_POST['student_phone'])&& isset($_POST['student_email'])&& isset($_POST['student_id_proof_name'])&& isset($_POST['student_id_proof_no'])&& isset($_POST['roll_no'])&& isset($_POST['student_type'])&& isset($_POST['branch'])&& isset($_POST['starting_ending_year'])&& isset($_POST['door_no'])&& isset($_POST['street'])&& isset($_POST['village_city'])&& isset($_POST['state'])&& isset($_POST['pincode'])&& isset($_POST['blcok_name'])&& isset($_POST['room_no']) && $_FILES['image'] && isset($_POST['blcok_name']) && isset($_POST['room_no'])) {
    if ($_POST['fname'] !="" && $_POST['lname'] !="" && $_POST['gender'] !="" && $_POST['dob'] !="" && $_POST['father_name'] !="" && $_POST['mother_name'] !="" && $_POST['parent_phone'] !="" && $_POST['student_id_proof_name'] !="" && $_POST['student_id_proof_no'] !="" && $_POST['roll_no'] !="" && $_POST['student_type'] !="" && $_POST['branch'] !="" && $_POST['starting_ending_year'] !="" && $_POST['door_no'] !="" && $_POST['street'] !="" && $_POST['village_city'] !="" && $_POST['state'] !=""  && $_POST['pincode'] !="" && $_POST['blcok_name'] !="" && $_POST['room_no'] !="" && $_FILES['image']  && $_POST['blcok_name']!=""  && $_POST['room_no'] !="") {
        $fname = $connect -> real_escape_string($_POST['fname']);
        $lname = $connect -> real_escape_string($_POST['lname']);
        $gender = $connect -> real_escape_string($_POST['gender']);
        $dob = $connect -> real_escape_string($_POST['dob']);
        $father_name = $connect -> real_escape_string($_POST['father_name']);
        $mother_name = $connect -> real_escape_string($_POST['mother_name']);
        $parent_phone = $connect -> real_escape_string($_POST['parent_phone']);
        //-----------------------------
        if ($_POST['parent_email'] == "") {
            $parent_email="";
        }else {
            $parent_email = $connect -> real_escape_string($_POST['parent_email']);
        }
        if ($_POST['student_phone'] == "") {
            $student_phone="";
        }else {
            $student_phone = $connect -> real_escape_string($_POST['student_phone']);
        }
        if ($_POST['student_email'] == "") {
            $student_email = "";
        }else {
            $student_email = $connect -> real_escape_string($_POST['student_email']);
        }
        //-----------------------------
        $student_id_proof_name = $connect -> real_escape_string($_POST['student_id_proof_name']);
        $student_id_proof_no = $connect -> real_escape_string($_POST['student_id_proof_no']);
        $roll_no = $connect -> real_escape_string(strtoupper($_POST['roll_no']));
        $student_type = $connect -> real_escape_string($_POST['student_type']);
        $branch = $connect -> real_escape_string($_POST['branch']);
        $starting_ending_year = $connect -> real_escape_string($_POST['starting_ending_year']);
        $door_no = $connect -> real_escape_string($_POST['door_no']);
        $street = $connect -> real_escape_string($_POST['street']);
        $village_city = $connect -> real_escape_string($_POST['village_city']);
        $state = $connect -> real_escape_string($_POST['state']);
        $pincode = $connect -> real_escape_string($_POST['pincode']);
        //----------
        $blcok_name = $connect -> real_escape_string($_POST['blcok_name']);
        $room_no = $connect -> real_escape_string($_POST['room_no']);
        //----------
        $uploadImg = $_FILES['image']['name'];
        $img_file = $_FILES['image']['tmp_name'];
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif');
        $path = '../assets/images/student_img/';
        $ext = strtolower(pathinfo($uploadImg, PATHINFO_EXTENSION));
        $final_image = strtolower($roll_no.".".$ext);
        $path = $path.($final_image);
        if(!in_array($ext, $valid_extensions)){
            echo "Images extension can be 'jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif'";
        }elseif($_FILES['image']['size'] > 1097152){
            echo "Image size must be exactly 1MB or below";
        }elseif(move_uploaded_file($img_file,$path)){
            $student_insert_sql = mysqli_query($connect,"INSERT INTO `student_details`(`fname`, `lname`, `dob`, `gender`, `father_name`, `mother_name`, `parent_phone`, `parent_email`, `student_phone`, `student_email`, `student_id_proof_name`, `student_id_proof_no`, `roll_no`, `student_type`, `branch`, `starting_ending_year`, `door_no`, `street`, `village_city`, `state`, `pincode`, `image`) VALUES ('$fname', '$lname', '$dob', '$gender', '$father_name', '$mother_name', '$parent_phone', '$parent_email', '$student_phone', '$student_email', '$student_id_proof_name', '$student_id_proof_no', '$roll_no', '$student_type', '$branch', '$starting_ending_year', '$door_no', '$street', '$village_city', '$state', '$pincode', '$final_image')");
            if ($student_insert_sql) {
                $student_details_row = student_details_by_roll_no($roll_no);
                $student_details_roll_no = $student_details_row['roll_no'];
                $student_details_sno =$student_details_row['sno'];
                $room_update_sql=mysqli_query($connect,"UPDATE `rooms` SET `student_id`='$student_details_roll_no',`user_sno`='$student_details_sno' WHERE `sno`='$room_no' AND `block_name`='$blcok_name'");
                if ($room_update_sql) {
                    $rool_number = strtoupper($roll_no);
                    $user_sql = mysqli_query($connect,"INSERT INTO `users`(`username`, `password`, `type`) VALUES ('$rool_number','$rool_number','1')");
                    if ($user_sql) {
                        echo "Student successfully added.";
                    } else {
                        echo "username,password not inserted!";
                    }
                } else {
                    mysqli_query($connect,"DELETE FROM `student_details` WHERE `roll_no` = '$roll_no'");
                    unlink("../assets/images/student_img/$final_image");
                }
            } else {
                unlink("../assets/images/student_img/$final_image");
                echo "failed,May be student already exist.try again!";
            }
        }else {
            echo "Image is not uploaded.Try Again!";
        }
        
    } else {
        echo "  All fields must be filled!";
    }  
}
/*===============================================================================================================*/
if (isset($_POST['block_sno']) && isset($_POST['block_details'])) {
    if ($_POST['block_sno'] != "") {
        $block_sno = $connect -> real_escape_string($_POST['block_sno']);
        $room_details_sql = mysqlI_query($connect,"SELECT * FROM `rooms` WHERE `block_name` ='$block_sno'");
        while ($room_details_row = mysqli_fetch_array($room_details_sql)) {
            if ($room_details_row['student_id'] !="") {
                $rollnumber = $room_details_row['student_id'];
                $student_details_row = student_details_by_roll_no($room_details_row['student_id']);
                $select_status_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE `perpermissions_details`.`rollnumber` ='$rollnumber' AND `outtime` !='' AND `intime` =''"); 
                $select_status_row_count=mysqli_num_rows($select_status_sql );
                $select_status_row = mysqli_fetch_array($select_status_sql) ;
                if ($select_status_row_count !=0) {
                    $status=0;
                }else {
                    $status=1;
                }
                echo block_wise_rooms($room_details_row['room_no'],$room_details_row['student_id'],$student_details_row['fname'],$student_details_row['lname'],$status);
            } 
        }
    } else {
        echo " All fields must be filled!"; 
    }
    
}
/*===============================================================================================================*/
if (isset($_POST['ajax_slect_rooms_by_block']) && isset($_POST['value'])) {
    $block_sno = $connect -> real_escape_string($_POST['value']);
    $select_room_sql=mysqli_query($connect,"SELECT * FROM `rooms` WHERE `rooms`.`block_name`='$block_sno' AND `rooms`.`user_sno` ='' AND `rooms`.`student_id` =''"); ?>
        <option value="">------- Select Room No -------</option>
        <?PHP while ($select_room_row = mysqli_fetch_array($select_room_sql)) { ?>
            <option value="<?PHP echo $select_room_row['sno']; ?>"><?PHP echo $select_room_row['room_no']; ?></option>
        <?PHP 
    }
}
/*===============================================================================================================*/
if (isset($_POST['Student_Requests_details']) && $_POST['Student_Requests_details'] !="" && isset($_POST['gender']) && $_POST['gender'] !="") {
    $gender = $connect -> real_escape_string($_POST['gender']);
    $student_request_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE `perpermissions_details`.`gender` = '$gender' AND `status`= '0' ORDER BY `perpermissions_details`.`sno`  DESC");
    $student_request_no_row = mysqli_num_rows($student_request_sql);
    if ($student_request_no_row != 0) {
        while ($student_request_row = mysqli_fetch_array($student_request_sql)) { 
            $rollnumber = $student_request_row['rollnumber'];
            $student_details_sql = mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$rollnumber'");
            $student_details_row =  mysqli_fetch_array($student_details_sql);
            ?>
            <tr>
                <td class="py-1">
                    <img src="../assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="image">
                </td>
                <td><?PHP echo $student_request_row['sno'];?></td>
                <td><?PHP echo $student_details_row['roll_no'];?></td>
                <td><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'];?></td>
                <td><?PHP echo $student_details_row['student_type'];?></td>
                <td><?PHP echo $student_request_row['prmissiontype'];?></td>
                <td><?PHP echo $student_request_row['reason'];?></td>
                <td><?PHP echo $student_request_row['leavingdatetime'];?></td>
                <td><?PHP echo $student_request_row['returndatetime'];?></td>
                <td><?PHP echo $student_request_row['place'];?></td>
                <td><a href="tel:<?PHP echo $student_request_row['contacnumber'];?>"><?PHP echo $student_request_row['contacnumber'];?></a></td>
                <td><a class='btn btn-success' href='#' onclick="accept_student_request(<?PHP echo $student_request_row['sno'];?>)">Accept</a></td>
                <td><a  class='btn btn-danger' href='#' onclick="reject_student_request(<?PHP echo $student_request_row['sno'];?>)">Reject</a></td>
            </tr>
        <?PHP }
    }else {?>
        <tr>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1">No Data found</td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
        </tr>
    <?PHP }
}
/*===============================================================================================================*/
if (isset($_POST['requst_id']) && isset($_POST['accept_student_request']) && $_POST['requst_id'] !="") {
    $requst_id = $connect -> real_escape_string($_POST['requst_id']);
    $update_student_request =mysqli_query($connect,"UPDATE `perpermissions_details` SET `status`='1' WHERE `sno` = '$requst_id'"); 
    if ($update_student_request) {
        echo "Request Accepted";
    }else{
        echo "Failed try again";
    }
}
/*===============================================================================================================*/
if (isset($_POST['reject_student_request']) && isset($_POST['requst_id']) && isset($_POST['reject_reason'])) {
    if ($_POST['requst_id'] !="" && $_POST['reject_reason'] !="") {
        $requst_id = $connect -> real_escape_string($_POST['requst_id']);
        $reject_reason = $connect -> real_escape_string($_POST['reject_reason']);
        $update_student_request =mysqli_query($connect,"UPDATE `perpermissions_details` SET `status`='$reject_reason' WHERE `sno` = '$requst_id'"); 
        if ($update_student_request) {
            echo "Request Rejected";
        }else{
            echo "Failed try again";
        }
    } else {
        echo "All fields must be filled!"; 
    }
}
/*===============================================================================================================*/
if (isset($_POST['student_all_requests_details']) && $_POST['student_all_requests_details'] !="" && isset($_POST['gender']) && $_POST['gender'] !="") {
    $gender = $connect -> real_escape_string($_POST['gender']);
    $student_request_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE `perpermissions_details`.`gender` = '$gender' AND `status` != '0' ORDER BY `perpermissions_details`.`sno`  DESC");
    $student_request_no_row = mysqli_num_rows($student_request_sql);
    if ($student_request_no_row != 0) {
        while ($student_request_row = mysqli_fetch_array($student_request_sql)) { 
            $rollnumber = $student_request_row['rollnumber'];
            $student_details_sql = mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$rollnumber'");
            $student_details_row =  mysqli_fetch_array($student_details_sql);
            ?>
            <tr>
                <td class="py-1">
                    <img src="../assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="image">
                </td>
                <td><?PHP echo $student_request_row['sno'];?></td>
                <td><?PHP echo $student_details_row['roll_no'];?></td>
                <td><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'];?></td>
                <td><?PHP echo $student_details_row['student_type'];?></td>
                <td><?PHP echo $student_request_row['prmissiontype'];?></td>
                <td><?PHP echo $student_request_row['reason'];?></td>
                <td><?PHP echo $student_request_row['leavingdatetime'];?></td>
                <td><?PHP echo $student_request_row['returndatetime'];?></td>
                <td><?PHP echo $student_request_row['place'];?></td>
                <td><a href="tel:<?PHP echo $student_request_row['contacnumber'];?>"><?PHP echo $student_request_row['contacnumber'];?></a></td>
                <td>
                <?PHP if ($student_request_row['status'] == 1){echo "Accepted";}else {echo $student_request_row['status'];}?>
                </td>
            </tr>
        <?PHP }
    }else {?>
        <tr>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1">No Data found</td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
            <td class="py-1"></td>
        </tr>
    <?PHP }
}
/*===============================================================================================================*/
/*===============================================================================================================*/
if (isset($_POST['Change_password']) && isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword']) && isset($_SESSION['login']['roll_no'])) {
    if ($_POST['Change_password'] !="" && $_POST['oldpassword'] !="" && $_POST['newpassword'] !="" && $_POST['confirmpassword'] !="") {
        $oldpassword = $connect -> real_escape_string(strtoupper($_POST['oldpassword']));
        $newpassword = $connect -> real_escape_string(strtoupper($_POST['newpassword']));
        $confirmpassword = $connect -> real_escape_string(strtoupper($_POST['confirmpassword']));
        $rollnumber = $_SESSION['login']['roll_no'];
        $select_user_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `username` = '$rollnumber'");
        $select_user_row = mysqli_fetch_array($select_user_sql);
        if ($confirmpassword != $newpassword) {
            echo "New password and confirm password should be same";
        }elseif ($select_user_row['password'] != $oldpassword) {
            echo "Old password  is incorrect!";
        }else {
            $change_password_sql = mysqli_query($connect,"UPDATE `users` SET `password` = '$confirmpassword' WHERE `username` = '$rollnumber'");
            if ($change_password_sql) {
                echo "Successfully Password is changed";
            }else {
                echo "Failed try again!";
            }
        }
    } else {
        echo "All fields must be filled!";
    } 
}
/*===============================================================================================================*/
