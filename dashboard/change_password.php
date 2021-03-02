<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Change Password</h4>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="oldpassword">Old Password</label>
                    <input type="password" name="oldpassword"  id="oldpassword" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="text" name="newpassword"  id="newpassword" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword"  id="confirmpassword" class="form-control"/>
                </div>
                <div class="card-description text-primary change-password-alerts"></div>
                <button type="button" class="btn btn-primary mr-2" onclick="Change_password()">Submit</button>
            </form>
        </div>
    </div>             
</div>
