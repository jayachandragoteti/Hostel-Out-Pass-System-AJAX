<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Student Request</h4>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="gender">Outing Permission Type</label>
                    <select id="prmissiontype"  name="prmissiontype" class="form-control form-control-lg" >
                        <option value="">----- Select Permission Type -----</option>
						<option value="one hour permission">One Hour Permission</option>
						<option value="home permission">Home Permission</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="leavingdatetime">Leaving Date & Time</label>
                    <input type="datetime-local" name="leavingdatetime"  id="leavingdatetime" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="returndatetime">Return Date & Time</label>
                    <input type="datetime-local"  name="returndatetime" id="returndatetime" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="place">Place</label>
                    <input type="text"  name="place" id="place" class="form-control" placeholder="Ex: Vijayanagaram"/>
                </div>
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <input type="text" name="reason"  id="reason" class="form-control" placeholder="Ex: To Home">
                </div>
                <div class="form-group">
                    <label for="contactnumber">Contact Number</label>
                    <input type="text" name="contactnumber"  id="contactnumber" class="form-control" placeholder="Ex: 9491694195">
                </div>
                <div class="card-description text-primary perpermissions-request-alerts"></div>
                <button type="button" class="btn btn-primary mr-2" onclick="perpermissions_request()">Submit</button>
            </form>
        </div>
    </div>             
</div>
