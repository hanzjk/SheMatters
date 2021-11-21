<?php

 require_once 'config.php';


// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin_user"]) && $_SESSION["loggedin_user"] === true) {
  header("location: dashboard.php");
  exit;
}



$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter the username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement

    $sql = "SELECT id, email, password FROM users WHERE email = ?";

    if ($stmt = $link->prepare($sql)) {

      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Store result
        $stmt->store_result();

        // Check if username exists, if yes then verify password
        if ($stmt->num_rows() == 1) {
          // Bind result variables
          $stmt->bind_result($id, $username, $hashed_password);

          if ($stmt->fetch()) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              

              // Store data in session variables
              $_SESSION["loggedin_user"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: home.php");
            } else {
              // Display an error message if password is not valid
              $password_err = "The password you entered is not valid.";
              $password = "";
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $username_err = "No account found with that username.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      $stmt->close();
    }
  }

  // Close connection
  $link->close();
}

require_once 'main_header.php';

?>



  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.1/dist/bootstrap-float-label.min.css">




  
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card ">
        <div class="row no-gutters">
          <div class="col-lg-7 ">
            <img src="assets/images/stop.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-lg-5 ">
            <div class="row">

              <div class="card-body col-12 text-center" style="align-self: center;">
                <div class="brand-wrapper">
                  <img src="assets/images/logo.png" alt="logo" class="logo">

                  <span class="logo_text">SHE Matters</span>
                </div>
                <p class="login-card-description">Sign into your account</p>
                <div class="row ">
                  <div class="col d-flex justify-content-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="width: 150%;">
                      <?php

                      if ($username_err != null) {
                        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                        echo $username_err;
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                      }


                      if ($password_err != null) {
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                        echo $password_err;
                        echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                      }

                      ?>
                      <div class="form-group">

                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="username" id="username" class="form-control" value="<?php echo $username ?>" placeholder="Email address" required>
                      </div>
                      <div class="form-group mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>" placeholder="Password" required>
                      </div>
                      <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" value="Login">

                    </form>
                  </div>
                </div>
                <a href="forgot-pwd.php" class="forgot-password-link">Forgot password?</a>


                <div class="d-none d-md-block">
                  <p style="margin-bottom: 1%;">Don't have an account? <a href="register.php">
                      Register here</a></p>
                </div>
                <div class="d-md-none"> <p style="margin-bottom: 1%;">Don't have an account? <a href="register.php" ><br>
                  Register here</a></p></div>

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