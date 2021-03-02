<?PHP
include "back_end.php";
if (!isset($_SESSION['login']) || $_SESSION['login']['type'] != 1 ) {
  header('location:logout.php');
}
$srolln = $_SESSION['login']['roll_no'];
$select=mysqli_query($connect,"SELECT * FROM `student_details` WHERE `roll_no` = '$srolln'");
$student_details_row =  mysqli_fetch_array($select);
$site = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?PHP echo $site['site_name'];?></title>
    <link rel="shortcut icon" href="assets/images/<?PHP echo $site['favicon'];?>" />
    <script src="backscript.js"></script>
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
            <img src="assets/images/<?PHP echo $site['logo_white'];?>" alt="logo" wisth="10" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            <img src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="logo" wisth="10"/>
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class=" search-form d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?PHP echo $student_details_row['roll_no'];?></p>
                </div>
                <a class="dropdown-item">My Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="logout.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper" style="padding-left:0;">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="assets/images/student_img/<?PHP echo $student_details_row['image'];?>" alt="<?PHP echo $student_details_row['roll_no'];?>">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?PHP echo $student_details_row['fname']." ".$student_details_row['lname'];?></p>
                  <p class="designation"><?PHP echo $student_details_row['roll_no'];?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Add_Student_Page_Call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">New Request</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">My Requests</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="My_Requests_Page_Call(1)">Accepted</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="My_Requests_Page_Call(2)">Rejected</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="My_Requests_Page_Call(0)">Pending</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Change_password_Page_Call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Change Password</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="logout.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Sign Out</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Ends-->
            <div class="row justify-content-md-center AjaxContentDisplay">
            
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <a href="http://adityatekkali.edu.in/" target="_blank">AITAM</a></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design and Developed by AITAM<a href="http://aitamsac.in/" target="_blank"> DEVELOPERS CLUB</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/off-canvas.js"></script>
    <!--============================================================-->
    <!--============================================================-->
    <script>
    //------------------------
    function Add_Student_Page_Call() {
      $(".AjaxContentDisplay").html("<img src='assets/images/loader.gif'>");
        $.ajax({
            url: "student_request.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
            }
      });
    }
    //------------------------
    function perpermissions_request(roll_no) {
      $(".perpermissions-request-alerts").html("<img src='assets/images/loader.gif' height='80'>");
      var formdata = {
        prmissiontype:$("#prmissiontype").val(),
        leavingdatetime:$("#leavingdatetime").val(),
        returndatetime:$("#returndatetime").val(),
        place:$("#place").val(),
        reason:$("#reason").val(),
        contactnumber:$("#contactnumber").val(),
        roll_no:roll_no,
        perpermissions_request:"perpermissions_request"
      }
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:formdata,
          success:function (responce) {
            $(".perpermissions-request-alerts").html(responce);
          }
      });
    }
    //------------------------
    function My_Requests_Page_Call(status) {
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
        $.ajax({
            url: "my_requests.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
                My_Requests_details(status);
            }
        });
    }
    //------------------------
    function My_Requests_details(status) {
        $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            status:status,
            My_Requests_details:"My_Requests_details"
          },
          success:function (responce) {
            $(".my_requests_details").html(responce);
          }
        });
    }
    //------------------------
    function Delete_My_Request(out_passid) {
        $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            out_passid:out_passid,
            Delete_My_Request:"Delete_My_Request"
          },
          success:function (responce) {
            $(".my_requests_details").html(responce);
          }
        });
    }
    //--------------------------
    function Change_password_Page_Call() {
      $(".AjaxContentDisplay").html("<img src='assets/images/loader.gif'>");
        $.ajax({
            url: "change_password.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
            }
      });
    }
    //--------------------------
    function Change_password() {
        $(".perpermissions-request-alerts").html("<img src='assets/images/loader.gif' height='80'>");
        var formdata = {
          oldpassword:$("#oldpassword").val(),
          newpassword:$("#newpassword").val(),
          confirmpassword:$("#confirmpassword").val(),
          Change_password:"Change_password"
        }
        $.ajax({
          type:"POST",
          url:"back_end.php",
          data:formdata,
          success:function (responce) {
            $(".change-password-alerts").html(responce);
          }
        });
    }
    </script>
    <!--============================================================-->
    <!--============================================================-->
  </body>
</html>