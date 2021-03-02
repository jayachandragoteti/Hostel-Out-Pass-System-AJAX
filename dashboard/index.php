<?PHP
session_start();
include "../config.php";
if (!isset($_SESSION['login']) || $_SESSION['login']['type'] != 2 ) {
    header('location:../logout.php');
}
$site = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?PHP echo $site['site_name'];?></title>
    <link rel="shortcut icon" href="../assets/images/<?PHP echo $site['favicon'];?>" />
    <script src="backscript.js"></script>
    <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style_2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
            <img src="../assets/images/<?PHP echo $site['logo_white'];?>" alt="logo" wisth="10" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            <img src="../assets/images/<?PHP echo $site['favicon'];?>" alt="logo" wisth="10"/>
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
                <img class="img-xs rounded-circle" src="../assets/images/<?PHP echo $site['favicon'];?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../assets/images/<?PHP echo $site['favicon'];?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">Admin</p>
                  <p class="font-weight-light text-muted mb-0"><?PHP echo $_SESSION['login']['roll_no'];?></p>
                </div>
                <a class="dropdown-item">My Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="../logout.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
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
                  <img class="img-xs rounded-circle" src="../assets/images/<?PHP echo $site['favicon'];?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin</p>
                  <p class="designation"><?PHP echo $_SESSION['login']['roll_no'];?></p>
                </div>
              </a>
            </li>

            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Requests" aria-expanded="false" aria-controls="Requests">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">New Requests</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Requests">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="Student_Requests_Page_Call(2)">Girls</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="Student_Requests_Page_Call(1)">Boys</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#allRequests" aria-expanded="false" aria-controls="allRequests">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">All Requests</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="allRequests">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="Student_all_Requests_Page_Call(2)">Girls</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="Student_all_Requests_Page_Call(1)">Boys</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Blocks" aria-expanded="false" aria-controls="Blocks">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Blocks</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Blocks">
                <ul class="nav flex-column sub-menu">
                  <?PHP  
                      $block_select_sql = mysqli_query($connect,"SELECT * FROM `blocks`");
                      while ($block_select_row = mysqli_fetch_array($block_select_sql)) { ?>
                      <li class="nav-item">
                        <a class="nav-link" href="#" onclick="block_details_Page_Call(<?PHP echo $block_select_row['sno']; ?>)"><?PHP echo $block_select_row['block_name']; ?></a>
                      </li>
                  <?PHP }?>
                </ul>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Add_Student_Page_Call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Add Student</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Add_Block_Page_Call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Add Block</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Change_password_Page_Call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Change Password</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../logout.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Logout</span>
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
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/off-canvas.js"></script>
    <!--============================================================-->
    <!--============================================================-->
    <script>
    //------------------------
    function Add_Student_Page_Call() {
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
        $.ajax({
            url: "add_student.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
            }
        });
    }
    //------------------------
    function Add_Block_Page_Call() {
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
        $.ajax({
            url: "add_block.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
            }
        });
    }
    //------------------------
    function Student_all_Requests_Page_Call(gender) {
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
        $.ajax({
            url: "student_all_requests..php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
                Student_all_Requests_details(gender);
            }
        });
    }
    //------------------------
    //------------------------
    function Student_Requests_Page_Call(gender){
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
        $.ajax({
            url: "student_requests.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
                Student_Requests_details(gender);
            }
        });
    }
    //------------------------
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
    function student_details_page_call(student_id) {
          $(".AjaxContentDisplay").html("<img src='assets/images/loader.gif'>");
            $.ajax({
                type:"POST",
                url: "student_details.php",
                data:{
                  student_id:student_id,
                  student_details_page_call:"student_details_page_call"
                },
                success: function (result) {
                    $(".AjaxContentDisplay").html(result);
                }
          });
        }
    //--------------------------
    function Add_Block() {
      $(".add-block-alerts").html("<img src='../assets/images/loader.gif' height='80'>");
      var formdata = {
          block_name : $("#block_name").val(),
          number_of_floors : $("#number_of_floors").val(),
          number_of_rooms : $("#number_of_rooms").val(),
          students_per_room :$("#students_per_room").val(),
          gender :$("#gender").val(),
          Add_Block: "Add_Block"
      };   
      if (formdata.block_name  =="" || formdata.number_of_floors == "" || formdata.number_of_rooms == "" || formdata.students_per_room == "" || formdata.gender == "") {
          $(".add-block-alerts").html('All fields must be filled!');
      } else if(isNaN(formdata.number_of_floors)){
          $(".add-block-alerts").html('Number of floors must be number');
      }else if(isNaN(formdata.number_of_rooms)){
          $(".add-block-alerts").html('Number of rooms must be number');
      }else if(isNaN(formdata. students_per_room)){
          $(".add-block-alerts").html('Students per room must be number');
      } else {
        $.ajax({
          type:"POST",
          url:"back_end.php",
          data:formdata,
          success:function (responce) {
            $(".add-block-alerts").html(responce);
          }
        });
      }
    }

    function block_details_Page_Call (block_sno) {
      $(".AjaxContentDisplay").html("<img src='../assets/images/loader.gif'>");
      if (block_sno != "") {
        var formdata = {
          block_sno :block_sno,
          block_details:"block_details"          
        }
        $.ajax({
              url: "block_details.php",
              success: function (result) {
                  $(".AjaxContentDisplay").html(result);
                  $.ajax({
                    type:"POST",
                    url:"back_end.php",
                    data:formdata,
                    success:function (responce) {
                      $(".display_block_wise_rooms").html(responce);
                    }
                  });
              }
          });  
      }
    }
    //------------------------
    function ajax_slect_rooms_by_block(value) {
        $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            value:value,
            ajax_slect_rooms_by_block:"ajax_slect_rooms_by_block"
          },
          success:function (responce) {
            $(".display_slect_rooms_by_block").html(responce);
          }
        });
    }
    //-------------------------
    function Add_Student() {
      var form = $("#add_student_form")[0];
      var formdata =  new FormData(form);
      $(".add-student-alerts").html("<img src='../assets/images/loader.gif' height='80'>");
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:formdata,
          contentType:false,
          processData:false,
          success:function (responce) {
              $('.add-student-alerts').html(responce);
          }
      });
    }
    //-------------------------------
    function Student_Requests_details(gender) {
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            gender:gender,
            Student_Requests_details:"Student_Requests_details"
          },
          success:function (responce) {
              $('.Student_Requests_details').html(responce);
          }
      });
    }
    //----------------------------
    function Student_all_Requests_details(gender) {
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            gender:gender,
            student_all_requests_details:"student_all_requests_details"
          },
          success:function (responce) {
              $('.student_all_requests_details').html(responce);
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