<div class="col-md grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add student</h4>
            <form class="form-sample" id="add_student_form">
            <p class="card-description"> Personal info </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">First Name *</label>
                    <div class="col-sm-9">
                        <input type="text" name="fname" id="fname" class="form-control"  >
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Last Name *</label>
                    <div class="col-sm-9">
                        <input type="text" name="lname" id="lname" class="form-control"  >
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender *</label>
                    <div class="col-sm-9">
                        <select name="gender" id="gender" class="form-control"  >
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth *</label>
                    <div class="col-sm-9"  >
                        <input  type="date" name="dob" id="dob" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Father Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="father_name" id="father_name" class="form-control"  >
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mother Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="mother_name" id="mother_name" class="form-control">
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Parent Phone*</label>
                        <div class="col-sm-9">
                            <input type="text" name="parent_phone" id="parent_phone" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Parent Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="parent_email" id="parent_email"class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Student Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_phone" id="student_phone" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Student Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_email" id="student_email"class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Student Id Proof Name*</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_id_proof_name" id="student_id_proof_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Student Id Proof No*</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_id_proof_no" id="student_id_proof_no"class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image*</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" id="image" class="form-control file-upload-info">
                            
                        </div>
                    </div>
                </div>
            </div>
            <p class="card-description"> Academic </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Roll Number*</label>
                        <div class="col-sm-9">
                            <input type="text" name="roll_no" id="roll_no" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Student Type*</label>
                        <div class="col-sm-9">
                            <select name="student_type" id="student_type" class="form-control"  >
                                <option value="">------- Select Type -------</option>
                                <option value="B-tech">B-tech</option>
                                <option value="MBA">MBA</option>
                                <option value="diploma">Diploma</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Branch*</label>
                        <div class="col-sm-9">
                            <select name="branch" id="branch" class="form-control"  >
                                <option value="">------- Select Branch -------</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="IT">IT</option>
                                <option value="MECH">MECH</option>
                                <option value="CIVIL">CIVIL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Starting-Ending Year*</label>
                        <div class="col-sm-9">
                            <input type="text" name="starting_ending_year" id="starting_ending_year" class="form-control" placeholder="2018-2022">
                        </div>
                    </div>
                </div>
            </div>
            <p class="card-description"> Address </p>
            <hr>
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Door No*</label>
                        <div class="col-sm-9">
                            <input type="text" name="door_no" id="door_no" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Street*</label>
                        <div class="col-sm-9">
                            <input type="text" name="street" id="street" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">village/City*</label>
                        <div class="col-sm-9">
                            <input type="text" name="village_city" id="village_city" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">State*</label>
                        <div class="col-sm-9">
                            <input type="text" name="state" id="state" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pincode*</label>
                        <div class="col-sm-9">
                            <input type="number" name="pincode" id="pincode" class="form-control">
                        </div>
                    </div>
                </div>
                
            </div>
            <p class="card-description"> Block-Room </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Block*</label>
                        <div class="col-sm-9">
                            <select name="blcok_name" id="blcok_name" class="form-control" onchange="ajax_slect_rooms_by_block(this.value)" >
                                <option value="">------- Select Blcok -------</option>
                                <?PHP 
                                    include "../config.php"; 
                                    $add_block_select_sql = mysqli_query($connect,"SELECT * FROM `blocks`");
                                    while ($add_block_select_row = mysqli_fetch_array($add_block_select_sql)) { ?>
                                    <option value="<?PHP echo $add_block_select_row['sno']; ?>" > <?PHP echo $add_block_select_row['block_name']; ?></option>
                                <?PHP }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Room*</label>
                        <div class="col-sm-9 ">
                        <select name="room_no" id="room_no" class="form-control display_slect_rooms_by_block"  >
                            <option value="">------- Select Room No -------</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-description text-primary add-student-alerts"></div>
            <button type="button" class="btn btn-primary mr-2" onclick="Add_Student()">Add</button>
        </form>
        </div>
    </div>
</div>
