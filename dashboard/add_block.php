<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Block</h4>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="block_name">Block Name</label>
                    <input type="text" name="block_name" class="form-control" id="block_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="number_of_floors">Number Of Floors</label>
                    <input type="number" min="1" name="number_of_floors" class="form-control" id="number_of_floors" placeholder="Enter number of floors">
                </div>
                <div class="form-group">
                    <label for="number_of_rooms">Number of Rooms</label>
                    <input type="number" min="1" name="number_of_rooms"class="form-control" id="number_of_rooms" placeholder="Enter number of Rooms">
                </div>
                <div class="form-group">
                    <label for="students_per_room">Number of students per room</label>
                    <input type="number" min="1"class="form-control" id="students_per_room" placeholder="Enter number of students per room">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control form-control-lg" id="gender">
                        <option value="">------ Select Type ------</option>
                        <option value="1">Boys</option>
                        <option value="2">Girls</option>
                    </select>
                </div>
                <div class="card-description text-primary add-block-alerts"></div>
                <button type="button" class="btn btn-primary mr-2" onclick="Add_Block()">Add</button>
            </form>
        </div>
    </div>             
</div>
