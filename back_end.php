<?PHP
session_start();
include "config.php";
function student_details_by_roll_no($srolln){
    include "config.php";
    $select=mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$srolln'");
    return mysqli_fetch_array($select);
}
if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['login']!="" &&  $_POST['username'] !="" && $_POST['password'] !="" ) {
        $username = $connect -> real_escape_string(strtoupper($_POST['username']));
        $password = $connect -> real_escape_string(strtoupper($_POST['password']));
        $user_select_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `username` = '$username' ");
        $user_no_row = mysqli_num_rows($user_select_sql);
        $user_row = mysqli_fetch_array($user_select_sql);
        if ($user_no_row == 0) {
            echo "User does not exist.";
        }elseif($user_row['password'] != $password){
            echo "Incorrect password";
        }else {
            $_SESSION['login'] = array(
                'roll_no' => $username,
                'type'=>$user_row['type']
            );
            if (isset($_SESSION['login'])) {
                if ($user_row['type'] == 1) {
                    echo "student";
                }elseif ($user_row['type'] == 2) {
                    echo "dashboard";
                }elseif ($user_row['type'] == 3) {
                    echo "security";
                }else {
                    echo "Failed try again!";
                } 
            } else {
                echo "Failed try again!";
            }
        }
    } else {
        echo "All fields must be filled!";
    }
}

if (isset($_POST['perpermissions_request']) && isset($_SESSION['login']['roll_no']) && isset($_POST['prmissiontype']) && isset($_POST['leavingdatetime']) && isset($_POST['returndatetime']) && isset($_POST['place']) && isset($_POST['reason'])&& isset($_POST['contactnumber'])) {
    if ($_POST['perpermissions_request'] !="" &&  $_SESSION['login']['roll_no'] !="" && $_POST['prmissiontype'] !="" && $_POST['leavingdatetime'] !="" && $_POST['returndatetime']!="" && $_POST['place'] !="" && $_POST['reason'] !="" && $_POST['contactnumber'] !="") {
        $rollnumber =$_SESSION['login']['roll_no'];
        $prmissiontype = $connect -> real_escape_string(strtoupper($_POST['prmissiontype']));
        $leavingdatetime = $connect -> real_escape_string(strtoupper($_POST['leavingdatetime']));
        $returndatetime = $connect -> real_escape_string(strtoupper($_POST['returndatetime']));
        $place = $connect -> real_escape_string(strtoupper($_POST['place']));
        $reason = $connect -> real_escape_string(strtoupper($_POST['reason']));
        $contactnumber = $connect -> real_escape_string(strtoupper($_POST['contactnumber']));
        $status=0;
        $room_details_sql=mysqli_query($connect,"SELECT * FROM `rooms` WHERE `student_id`='$rollnumber'");
        $room_details_row=mysqli_fetch_array($room_details_sql);
        $room_sno = $room_details_row['sno'];
        $block_name = $room_details_row['block_name'];
        if (mysqli_num_rows($room_details_sql) != 0) {
            $blcok_select_sql = mysqli_query($connect,"SELECT * FROM `blocks` WHERE `sno` = '$block_name'");
            $blcok_select_row = mysqli_fetch_array($blcok_select_sql);
            $gender  = $blcok_select_row['gender'];
            $perpermissions_request_sql=mysqli_query($connect,"INSERT INTO `perpermissions_details`(`rollnumber`, `prmissiontype`, `leavingdatetime`, `returndatetime`, `place`, `reason`, `contacnumber`, `status`,`room_sno`,`gender`) VALUES ('$rollnumber','$prmissiontype','$leavingdatetime','$returndatetime','$place','$reason','$contactnumber','$status','$room_sno','$gender')");
            if ($perpermissions_request_sql) {
                echo "Out Pass Request Successfully Submited";
            } else {
                echo "Out Pass Request  is Faild,try again";
            }
        } else {
            echo "Out Pass Request  is Faild,try again";
        }
    }else {
        echo "All fields must be filled!";
    }
}
/*===============================================================================================================*/

if (isset($_POST['My_Requests_details']) && $_POST['My_Requests_details'] !="" && isset($_POST['status']) && $_POST['status'] !="") {
    $status = $connect -> real_escape_string($_POST['status']);
    $rollnumber = $_SESSION['login']['roll_no'];
    if ($status == '2') {
        $student_request_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE  `status` = '$status' AND `rollnumber` = '$rollnumber' ORDER BY `perpermissions_details`.`sno`  DESC");
    }else {
        $student_request_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE  `status` = '$status' AND `rollnumber` = '$rollnumber' ORDER BY `perpermissions_details`.`sno`  DESC");
    }
    $student_request_no_row = mysqli_num_rows($student_request_sql);
    if ($student_request_no_row != 0) {
        while ($student_request_row = mysqli_fetch_array($student_request_sql)) { 
            $student_details_sql = mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$rollnumber'");
            $student_details_row =  mysqli_fetch_array($student_details_sql);
            ?>
            <tr>
                <td class="py-1">
                    <img src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="image">
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
                <td><?PHP echo $student_request_row['contacnumber'];?></td>
                <td>
                <?PHP if ($student_request_row['status'] == 1){echo "Accepted ";?><!--<a class='btn btn-danger' href='#' onclick="Delete_My_Request(<?PHP echo $out_passid;?>)">DELETE</a>--><?PHP }else if( $student_request_row['status'] == 0) {?> 
                    <a class='btn btn-danger' href='#' onclick="Delete_My_Request(<?PHP echo $out_passid;?>)">DELETE</a>
                <?PHP } else{ echo $student_request_row['status'];}?>
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
if (isset($_POST['search_OutPass']) && isset($_POST['out_passid'])) {
    if ($_POST['search_OutPass'] !="" && $_POST['out_passid'] != "") {
        $out_passid = $connect -> real_escape_string($_POST['out_passid']);
        $search_outpass_sql = mysqli_query($connect,"SELECT * FROM `perpermissions_details` WHERE `sno` = '$out_passid' OR `rollnumber` = '$out_passid' AND `status` ='1' ORDER BY `perpermissions_details`.`sno` DESC");
        $search_outpass_no_row = mysqli_num_rows($search_outpass_sql);
        if ($search_outpass_no_row != 0) {
            $search_outpass_row = mysqli_fetch_array($search_outpass_sql);
            $rollnumber  = $search_outpass_row['rollnumber'];
            $student_details_sql = mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$rollnumber'");
            $student_details_row =  mysqli_fetch_array($student_details_sql);
            ?>
            <div class="col-md-6 grid-margin card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?PHP echo $search_outpass_row['prmissiontype']." ( ".$search_outpass_row['sno']." )";?></h4>
                    <p class="card-title mb-4 text-primary print-out-in-time-alerts"></p>  
                    <div class="jvectormap-container" style="background-color: transparent;">
                        <img src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="image" class="col-md-12" height="350">
                    </div>
                    <div class="wrapper">
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Name ( Roll No )  :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'] ." ( ".$student_details_row['roll_no']." ) ";?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Leaving Date & Time :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $search_outpass_row['leavingdatetime'];?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Return Date & Time :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0"><?PHP echo $search_outpass_row['returndatetime'];?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Place :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0"><?PHP echo $search_outpass_row['place'];?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Reason :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0"><?PHP echo $search_outpass_row['reason'];?></p>
                            </div>
                        </div>
                        <?PHP if ($search_outpass_row['outtime'] =="" && $search_outpass_row['intime'] =="") {?>
                        <div class="d-flex w-100 pt-2">
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="mb-0 font-weight-semibold"><a class='btn btn-danger' href='#' onclick="Print_out_time(<?PHP echo $out_passid;?>)">Out</a></p>
                            </div>
                        </div>                            
                        <?PHP }else if($search_outpass_row['outtime'] !="" && $search_outpass_row['intime'] ==""){?>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Out Time : </p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="mb-0 font-weight-semibold"><?PHP echo $search_outpass_row['outtime'];?></p>
                            </div>
                        </div>   
                        <div class="d-flex w-100 pt-2">
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="mb-0 font-weight-semibold"><a class='btn btn-success' href='#' onclick="Print_in_time(<?PHP echo $out_passid;?>)">IN</a></p>
                            </div>
                        </div>    
                        <?PHP }else{?>
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">Out Time : </p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="mb-0 font-weight-semibold"><?PHP echo $search_outpass_row['outtime'];?></p>
                            </div>
                        </div>   
                        <div class="d-flex w-100 pt-2">
                            <p class="mb-0 font-weight-semibold">In Time : </p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="mb-0 font-weight-semibold"><?PHP echo $search_outpass_row['intime'];?></p>
                            </div>
                        </div>    
                        
                        <?PHP }?>
                    </div>
                </div>
            </div>
            <?PHP 
        }else {
            echo "No Data found";
        }
    } else {
        echo "All fields must be filled!";
    }
}
/*===============================================================================================================*/
if (isset($_POST['Print_in_time']) && isset($_POST['in_passid'])) {
    if ($_POST['Print_in_time'] !="" && $_POST['in_passid'] !="") {
        $in_passid = $connect -> real_escape_string($_POST['in_passid']);
        date_default_timezone_set("Asia/Calcutta");
        $checkin=date("Y-m-d h:i:sa");
        $insert_intime_sql = mysqli_query($connect,"UPDATE `perpermissions_details` SET `perpermissions_details`.`intime` = '$checkin' WHERE `perpermissions_details`.`sno` = '$in_passid' AND  `perpermissions_details`.`outtime` != ''  AND `perpermissions_details`.`intime` =''");
        if ($insert_intime_sql) {
            echo "Successfully in time inserted";
        }else {
            echo "Failed try again!";
        }
    } else {
        echo "All fields must be filled!";
    } 
}
/*===============================================================================================================*/
if (isset($_POST['Print_out_time']) && isset($_POST['out_passid'])) {
    if ($_POST['Print_out_time'] !="" && $_POST['out_passid'] !="") {
        $out_passid = $connect -> real_escape_string($_POST['out_passid']);
        date_default_timezone_set("Asia/Calcutta");
        $checkout=date("Y-m-d h:i:sa");
        $insert_outtime_sql = mysqli_query($connect,"UPDATE `perpermissions_details` SET `perpermissions_details`.`outtime` = '$checkout' WHERE `perpermissions_details`.`sno` = '$out_passid' AND `perpermissions_details`.`outtime` ='' AND `perpermissions_details`.`intime` =''");
        if ($insert_outtime_sql) {
            echo "Successfully out time inserted";
        }else {
            echo "Failed try again!";
        }
    } else {
        echo "All fields must be filled!";
    } 
}
/*===============================================================================================================*/
if (isset($_POST['Delete_My_Request']) && isset($_POST['out_passid'])) {
    if ($_POST['Delete_My_Request'] !="" && $_POST['out_passid'] !="") {
        $out_passid = $connect -> real_escape_string($_POST['out_passid']);
        $delete_request_sql = mysqli_query($connect,"DELETE FROM `perpermissions_details` WHERE  `perpermissions_details`.`sno` = '$out_passid' AND `perpermissions_details`.`status` ='0' OR `perpermissions_details`.`status` ='1'");
        if ($delete_request_sql) {
            echo "Successfully Deleted";
        }else {
            echo "Failed try again!";
        }
    } else {
        echo "All fields must be filled!";
    } 
}
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
