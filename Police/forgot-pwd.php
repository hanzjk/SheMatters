<?php
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$email = "";
$email_err = $emailmsg = $emailmsg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address";
    } else {
        $email = trim($_POST["email"]);
        $email = stripslashes($email);
        $email = htmlspecialchars($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        } else {
            // Prepare a select statement
            $sql = "SELECT admin_id FROM admin WHERE admin_email = ?";

            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_email);

                // Set parameters
                $param_email = $email;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    /* store result */
                    $stmt->store_result();

                    if ($stmt->num_rows() <= 0) {
                        $email_err = "This email is not registered";
                    } else {
                        $records = mysqli_query($link, "SELECT police_id,police_username,police_name FROM police_users WHERE police_username = '$email'");

                        if ($data = mysqli_fetch_array($records)) {

                            $token = uniqid();
                            $token = str_shuffle($token);
                            $sql2 = "UPDATE police_users SET token = '" . $token . "' WHERE  police_id='" . $data['police_id'] . "'";
                            $update = mysqli_query($link, $sql2);

                            if ($update) {

                                try {

                                    //Server settings
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = "";
                                    $mail->Password = "";
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                    $mail->Port = 587;

                                    //Recipients
                                    $mail->setFrom("", "PROJECT");
                                    $mail->addAddress($email);     // Add a recipient


                                    $name = $data['police_name'];
                                    $id = $data['police_id'];

                                    // Content
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = "Password Reset Request";

                                    $mail->Body    = ' <h3>Hi,' . $name . '! </h3> <br><h4>We just received a request to change the the password of your account</h4>
                             <br>If you did not make this request, just ignore this email. Otherwise ,please click the 
                             link below to change your password.<br>
                             <a href="http://localhost/PROJECT_0/Police/Reset_Password.php?email=' . $email . '&token=' . $token . '">Reset Password</a>
                             <br> Regards<br>Hansi Karunarathna</h3>

                            <br> Best Regards <br> Hansi Karunarathna';

                                    if ($mail->send()) {
                                        $emailmsg = "Recovery Link is succefully sent to your registered email address.";
                                    }
                                } catch (Exception $e) {
                                    $emailmsg_err = $e;
                                }
                            } else {
                                echo "Oops! Something went wrong.";
                            }
                        }
                    }
                } else {
                    echo "Oops! Something went wrong when inserting email. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    }
}
require_once 'main_header.php';

?>
<!DOCTYPE html>
<html lang="en">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/forgot-pwd.css">

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">

            <div class="card forgot-card col-lg-9 mx-auto">
                <div class="row no-gutters">

                    <div class="col-12">
                        <div class="row">

                            <div class="card-body col-12 text-center" style="align-self: center;">
                                <div class="brand-wrapper">
                                    <img src="assets/images/logo.png" alt="logo" class="logo">

                                    <span class= "logo_text">SHE Matters</span>
                                </div>
                                <p class="forgot-card-description">Forgot Password ? </p>
                                <div style="width: 90%;" class="mx-auto">
                                    <?php
                                    if ($emailmsg != null) {
                                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                        echo $emailmsg;
                                        echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                    } else if ($emailmsg_err != null) {
                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                        echo $emailmsg_err;
                                        echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                    }

                                    ?>


                                    <?php
                                    if ($email_err != null) {
                                        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                        echo $email_err;
                                        echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                    }

                                    ?>
                                </div>
                                <p>Enter the email address used during the registration to receive the
                                    password reset link.</p>



                                <div class="row ">
                                    <div class="col d-flex justify-content-center">

                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


                                            <div class="form-group">
                                                <label for="email" class="sr-only">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                                            </div>

                                            <input name="submit" id="submit" class="btn btn-block forgot-btn mb-4" type="submit" value="Submit">


                                        </form>
                                    </div>
                                </div>
                                <p class="forgot-card-footer-text"><a href="login.php">Back to login</a></p>

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
