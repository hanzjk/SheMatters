<?php
require_once 'config.php';

$msg = $msg_success = '';
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = $success = "";

if (isset($_GET['email']) && isset($_GET['token'])) {


  $email = $_GET['email'];
  $token = $_GET['token'];

  if (isset($_POST['submit'])) {

    $newpass = $_POST['password'];
    $cnewpass = $_POST['cpassword'];

    $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

    if ($newpass == $cnewpass) {
      // Prepare an update statement
      $sql = "UPDATE admin SET admin_pwd = ? WHERE admin_email = ? AND token =?";

      if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_password, $param_email, $param_token);

        // Set parameters
        $param_password = $hnewpass;
        $param_email = $email;
        $param_token = $token;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
          $msg_success = " Password updated successfully."; // Destroy the session, and redirect to login pag
          //header("location: login.php");
          //exit();
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
      }
    } else {
      $msg = "Password did not matched";
    }

    // Close connection
    $link->close();
  }
}
require_once 'main_header.php';

?>


  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/forgot-pwd.css">

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">

      <div class="card forgot-card col-lg-7 mx-auto">
        <div class="row no-gutters">

          <div class="col">
            <div class="row">

              <div class="card-body col-12 text-center" style="align-self: center;">
                <div class="brand-wrapper">
                  <img src="assets/images/logo.png" alt="logo" class="logo">

                  <span class= "logo_text">SHE Matters</span>
                </div>

                <?php

                if ($msg != null) {
                  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                  echo $msg;
                  echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                }

                if ($msg_success != null) {
                  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                  echo $msg_success;
                  echo '&nbsp';
                  echo 'Please click here to ';
                  echo '<a href="login.php">Log In</a>';
                  echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                }


                ?>
                <p class="forgot-card-description">Reset Password </p>


                <div class="row ">
                  <div class="col d-flex justify-content-center">

                    <form action="#" method="POST">

                      <div class="form-group">
                        <label for="password" class="sr-only">password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
                      </div>

                      <div class="form-group">
                        <label for="password" class="sr-only">cpassword</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm New Password" required>
                      </div>

                      <input name="submit" id="submit" class="btn btn-block forgot-btn mb-4" type="submit" value="Submit">

                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    </div>
  </main>


  
    
  <!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">

        <div class="footer-bottom">
            <div class="left-content">
            <div class="icon"><img src="assets/images/logo.png" alt=""></div>

                <div class="copyright-text"><a href="#">Copyright © SHE MAtters 2021</a>
                </div>
            </div>

        </div>
    </div>
</footer>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-arrow"></span></div>

</div>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>