<?PHP
include "config.php";
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form action="#">
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" id="password" name="password" class="form-control" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <p class="login-alerts"></p>
                    <button class="btn btn-primary submit-btn btn-block" type="button" onclick="login()">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/off-canvas.js"></script>
    <script>
      function login() {
        var formdata = {
          username : $("#username").val(),
          password : $("#password").val(),
          login: "login"
        };   
        $(".login-alerts").html("<img src='assets/images/loader.gif' height='80'>");
        $.ajax({
            type:"POST",
            url:"back_end.php",
            data:formdata,
            success:function (responce) {
                if (responce == "dashboard") {
                  window.location.assign("dashboard/index.php");
                }else if(responce == "student"){
                  window.location.assign("dashboard.php");
                }else if(responce == "security"){
                  window.location.assign("security_dashboard.php");
                }else{
                  $('.login-alerts').html(responce);
                }
            }
        });
      }
    </script>
  </body>
</html>