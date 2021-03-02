<?PHP 
include "../config.php";
session_start();
/* function pproduct_card(){ ob_start(); ?> <?PHP return ob_get_clean(); } ?> */
function block_wise_rooms($room_no,$student_id,$fname,$lname,$status){ ob_start(); ?> 
<div class="col-md-4 mt-3">
    <a href="#" onclick="student_details_page_call('<?PHP echo $student_id;?>')">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 align-items-center">
                <h6 class="font-weight-semibold mb-0"><?PHP echo $fname." ".$lname;?></h6>
                <h6 class="font-weight-semibold mb-0"><?PHP echo $student_id;?></h6>
            </div>
            <div class="d-flex justify-content-between">
                <p class="mb-0">Room No : <?PHP echo $room_no;?></p>
                <div class="icon-holder">
                <?PHP if ($status == 1) {  ?>
                        <i class="fas fa-bed text-success"></i>
                    <?PHP  }else{?>
                        <i class="fas fa-bed text-danger"></i>
                    <?PHP  } ?>
                </div>
            </div>
        </div>
    </div>  
    </a>
</div>
<?PHP return ob_get_clean(); } ?>