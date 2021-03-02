<?PHP
session_start();
include "config.php";
if (!isset($_SESSION['login']) || $_SESSION['login']['type'] != 3 ) {
    header('location:logout.php');
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
            <img src="assets/images/<?PHP echo $site['favicon'];?>" alt="logo" wisth="10"/>
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
                <img class="img-xs rounded-circle" src="assets/images/<?PHP echo $site['favicon'];?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/<?PHP echo $site['favicon'];?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">Security</p>
                  <p class="font-weight-light text-muted mb-0"><?PHP echo $_SESSION['login']['roll_no'];?></p>
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
                  <img class="img-xs rounded-circle" src="assets/images/<?PHP echo $site['favicon'];?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin</p>
                  <p class="designation"><?PHP echo $_SESSION['login']['roll_no'];?></p>
                </div>
              </a>
            </li>

            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item ">
              <a class="nav-link" href="#" onclick="Out_pass_search_page_call()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Search Outpass</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="logout.php">
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
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/off-canvas.js"></script>
    <!--============================================================-->
    <!--============================================================-->
    <script>
     //------------------------
      function Out_pass_search_page_call()  {
        $(".AjaxContentDisplay").html("<img src='assets/images/loader.gif'>");
          $.ajax({
              url: "search_outpass.php",
              success: function (result) {
                  $(".AjaxContentDisplay").html(result);
              }
          });
      }
    //------------------------
    function Print_out_time(out_passid) {
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            out_passid:out_passid,
            Print_out_time:"Print_out_time"
            
          },
          success:function (responce) {
            $(".print-out-in-time-alerts").html(responce);
          }
        });
    }
    //------------------------
    function Print_in_time(in_passid) {
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:{
            in_passid:in_passid,
            Print_in_time:"Print_in_time"
          },
          success:function (responce) {
            $(".print-out-in-time-alerts").html(responce);
          }
        });
    }
    </script>
    <!--============================================================-->
    <!--============================================================-->
  </body>
</html>