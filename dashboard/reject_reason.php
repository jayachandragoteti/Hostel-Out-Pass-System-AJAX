<?PHP 
if (isset($_POST['accept_student_request']) && isset($_POST['requst_id'])) { ?>
<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reject Reason</h4>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="block_name">Reason</label>
                    <input type="text" name="reject_reason" class="form-control" id="reject_reason" />
                </div>
                <div class="card-description text-primary add-block-alerts"></div>
                <button type="button" class="btn btn-primary mr-2" onclick="reject_with_reason(<?PHP echo $_POST['requst_id'];?>)">Reject</button>
            </form>
        </div>
    </div>             
</div>

<?PHP }else {
    echo "Failed";
}?>