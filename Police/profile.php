<?php
require_once "config.php";


if (!isset($_SESSION['loggedin_padmin'])) {
    header('Location: login.php');
    exit;
} else {
    $police_id = $_SESSION['police_id'];
    $sql = "SELECT * FROM police_users WHERE police_id='" . $police_id . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);
  //  $result = $link->query("SELECT admin_photo FROM admin WHERE  admin_id='" . $admin_id . "'");

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SHE Matters</title>
    <!-- base:css -->

    <link rel="stylesheet" href="assets/Header/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/Header/vendors/feather/feather.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="assets/Header/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/Header/vendors/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->

    <link rel="stylesheet" href="assets/Header/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class=" navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand " href="#"><img src="assets/Header/images/logo.png" style="width: 50px; height: 60px; margin-left: -10%;" alt="logo" /></a>
                <div class="logo-word">
                    <p style="margin-left: -18%; font-size: x-large; margin-top: 10%;color: black; font-weight: bold;"> SHE Matters </p>
                </div>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">


                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                        </a>
                   
                    </li>
                    <li class="nav-item dropdown d-flex ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>

                            <a class="dropdown-item preview-item" href="logout.php">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- partial -->

        <!-- partial -->
        <div class="container1-fluid page-body-wrapper">
            <div class="main-panel1" style="width: 100%;">
                <div class="content-wrapper">
                    <a href="dashboard.php" style="color: black;  text-decoration: none !important">
                        <i class="fa fa-undo"></i> Go Back
                    </a>

                    <div class="row mt-5">
                        <!--Main Content-->

                        <div class="container">


                            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                                <div class="profile-tab-nav border-right col-md-4 col-sm-12">
                                    <div class="p-4">
                                        <div class="img-circle text-center mb-3">
                                        <img src="assets/images/user2.jpg" alt="Image" class="shadow">

                                           
                                        </div>


                                        <h4 class="text-center" style="color: white;" id="user_name"> <?php echo $data['police_name']; ?></h4>
                                    </div>
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                            <i class="fa fa-home text-center mr-1"></i>
                                            Account
                                        </a>
                                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                            <i class="fa fa-key text-center mr-1"></i>
                                            Password
                                        </a>

                                    </div>
                                </div>

                                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <h3 class="mb-4">Account Settings</h3>


                                        <div id="result"></div>

                                        <form id="form1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="email" name="update_name" class="form-control" value="<?php echo $data['police_username']; ?>" required>
                                                    </div>
                                                </div>


                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Police Station</label>
                                                        <input type="text" name="update_pname"  value="<?php echo $data['police_name']; ?>" class="form-control"  required>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" name="update_addr" class="form-control" value=<?php echo $data['police_address']; ?> required>
                                                    </div>
                                                </div>

                         
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contact number</label>
                                                        <input type="text" name="update_tel"  value="<?php echo $data['police_contact']; ?>" class="form-control"  required>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <br>
                                            <div>
                                                <button class="btn btn-dark " id="edit_profile" type="submit ">Update</button>
                                                <button class="btn btn-light">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                        <h3 class="mb-4">Password Settings</h3>
                                        <div id="pwd"></div>
                                        <form id="password_change">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Old password</label>
                                                        <input type="password" class="form-control" name="old_pass" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New password</label>
                                                        <input type="password" class="form-control" name="new_pass" minlength="6" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Confirm new password</label>
                                                        <input type="password" class="form-control" name="confirm_pass" minlength="6" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div>
                                                <button class="btn btn-dark " id="password_change_btn" type="submit ">Update</button>
                                                <button class="btn btn-light" onclick="this.form.reset();">Cancel</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer1">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE MAtters 2021</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="assets/Header/js/off-canvas.js"></script>
<script src="assets/Header/js/template.js"></script>

    <!-- End custom js for this page-->


    <script>
        $(document).ready(function() {
            $("#edit_profile").click(function(e) {
                var id = <?php echo $police_id ?>;
                var action = "edit_profile";
                if($("#form1")[0].checkValidity()){

                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: 'edit_action.php',

                    data: $("#form1").serialize() + '&id=' + id + '&action=' + action,
                    success: function(data) {
                       // alert(data);
                        if (data.split('#')[0] === "updated") {
                            $("#user_name").html(data.split('#')[1]);
                            $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Profile Updated Successfully!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });

                        } else if (data === "email_duplicate") {
                            $("#user_name").html(data.split('#')[1]);
                            $("#result").html('<div class="alert alert-warning"><button type="button" class="close">×</button>Change the Email Address : There is and account asscociated with this email address!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });
                        } else {
                            $("#result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Cannot Update the Profile!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });
                        }
                    }
                });
            }

            });


            $("#password_change_btn").click(function(e) {
                var id = <?php echo $police_id ?>;
                var action = "password_change";

                if($("#password_change")[0].checkValidity()){

                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: 'edit_action.php',

                    data: $("#password_change").serialize() + '&id=' + id + '&action=' + action,
                    success: function(data) {
                       // alert(data);
                        if (data === "updated") {
                            $("#pwd").html('<div class="alert alert-success"><button type="button" class="close">×</button>Password Updated Successfully!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });

                        } else if (data === "mismatch") {
                            $("#pwd").html('<div class="alert alert-warning"><button type="button" class="close">×</button>Canot Update the password : Password mismatch !</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });
                        } else if (data === "invalid_pwd") {
                            $("#pwd").html('<div class="alert alert-warning"><button type="button" class="close">×</button>Password entered is invalid!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });
                        } else {
                            $("#pwd").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Cannot Update the Password!</div>');
                            $('.alert .close').on("click", function(e) {
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                            });
                        }
                    }
                });

            }
            });

        });
    </script>

    <script>
        document.getElementById("edit_photo").onchange = function() {
            document.getElementById("image_upload_form").submit();
        };
    </script>


</body>

</html>