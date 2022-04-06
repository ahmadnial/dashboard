<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (isset($_SESSION["login"])) {
  header("location: dashboard.php");
  exit;
}

include "conn.php";

// error_reporting(0);

if (isset($_POST['mangkat'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  // $sql = "SELECT * FROM RSNR_user WHERE email = '$email' ";
  $query = sqlsrv_query($conn, "SELECT * FROM RSNR_user WHERE email = '$email' and password='$password'");
  // var_dump (sqlsrv_num_rows($query)); die();
  if (sqlsrv_fetch_array($query) != 0) {

    $_SESSION["login"] = true;
    // $row = sqlsrv_fetch_array($query);
    // if(password_verify($password, $row['password']) ) {
    header('location: dashboard.php');
    exit;
  }
  echo "<script>
						swal('Salah Format mazehh', 'Kudu PDF tur Ukuran Cilik!', 'error')
						</script>";
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<style type="text/css">
  .content-wrapper {
    background-image: url("images/auth/rsnr.jpg");
    height: 100 %;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #eee;
  }
</style>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper  d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo-light.svg" alt="">
              </div>
              <h4>Holla! <b>Bismillah</b> dulu ya, let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="Email" placeholder="Email" Required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="Password" placeholder="Password" Required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn mt-1" name="mangkat"> Log In </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <!-- <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button> -->
                </div>
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="js/sweetalert.min.js"></script>
  <script src="js/sweetalert.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- endinject -->
</body>

</html>