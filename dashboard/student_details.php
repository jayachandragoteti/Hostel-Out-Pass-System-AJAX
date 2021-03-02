<?PHP if(isset($_POST['student_id']) && isset($_POST['student_details_page_call'])) { 
    include "../config.php";
    $rollnumber  =$_POST['student_id'];
    $student_details_sql = mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$rollnumber'");
    $student_details_row =  mysqli_fetch_array($student_details_sql);
    ?>  
            <div class="col-md-6 grid-margin card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?PHP echo $student_details_row['roll_no'];?></h4>
                    <p class="card-title mb-4 text-primary print-out-in-time-alerts"></p>  
                    <div class="jvectormap-container" style="background-color: transparent;">
                        <img src="../assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="image" class="col-md-12" height="350">
                    </div>
                    <div class="wrapper">
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Name :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'];?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">DOD :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['dob']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Gender :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['gender']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Father Name :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['father_name']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Mother Mame :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['mother_name']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Parent Phone :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><a href="tel:<?PHP echo $student_details_row['parent_phone']?>"><?PHP echo $student_details_row['parent_phone']?></a></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Parent Email :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><a href="mailto:<?PHP echo $student_details_row['parent_email']?>"><?PHP echo $student_details_row['parent_email']?></a></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Student Phone :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><a href="tel:<?PHP echo $student_details_row['student_phone']?>"><?PHP echo $student_details_row['student_phone']?></a></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Student Email :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><a href="mailto:<?PHP echo $student_details_row['student_email']?>"><?PHP echo $student_details_row['student_email']?></a></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Student Id Poof Name :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['student_id_proof_name']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Student Id Poof No :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['student_id_proof_no']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Student Type :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['student_type']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Branch :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['branch']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Door No :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['door_no']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Street :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['street']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Village/City:</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['village_city']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">State :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['state']?></p>
                            </div>
                        </div>
                        <div class="d-flex w-100 pt-2 mt-4">
                            <p class="mb-0 font-weight-semibold">Pincode :</p>
                            <div class="wrapper ml-auto d-flex align-items-center">
                                <p class="font-weight-semibold mb-0"><?PHP echo $student_details_row['pincode']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?PHP }?>  