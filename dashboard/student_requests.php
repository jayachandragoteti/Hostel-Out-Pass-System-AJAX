<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body table-responsive">
            <h4 class="card-title ">Student Requests</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Request Id</th>
                    <th scope="col">Roll Number</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Stream</th>
                    <th scope="col">Permissin Type</th>
                    <th scope="col">Reason of Leavenig</th>
                    <th scope="col">Leaving Date/time from collage </th>
                    <th scope="col">Return Date/time</th>
                    <th scope="col">Place</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Reject</th>
                    </tr>
                </thead>
                <tbody class="Student_Requests_details">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function accept_student_request(requst_id) {
        $.ajax({
            type:"POST",
            url:"back_end.php",
            data:{
                requst_id:requst_id,
                accept_student_request:"accept_student_request"
            },
            success:function (responce) {
                $('.Student_Requests_details').html(responce);
            }
        });
    }
    function reject_student_request(requst_id) {
        $.ajax({
            type:"POST",
            url:"reject_reason.php",
            data:{
                requst_id:requst_id,
                accept_student_request:"accept_student_request"
            },
            success:function (responce) {
                $('.AjaxContentDisplay').html(responce);
            }
        });
    }
    function reject_with_reason(requst_id) {
        var reject_reason = $("#reject_reason").val();
        $.ajax({
            type:"POST",
            url:"back_end.php",
            data:{
                requst_id:requst_id,
                reject_reason:reject_reason,
                reject_student_request:"reject_student_request"
            },
            success:function (responce) {
                $('.AjaxContentDisplay').html(responce);
            }
        });
    }
</script>