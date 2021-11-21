<?php
 ob_start();

require_once "header.php";

if (!isset($_SESSION['loggedin_user'])) {
    header('Location: login.php');
    exit;
} else {

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);

    $result = $link->query("SELECT photo FROM users WHERE  id='" . $id . "'");
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $status = 'error';
    if (!empty($_FILES["edit_photo"]["name"])) {
        $uploadimg = "Image Selected";
        // Get file info 
        $fileName = basename($_FILES["edit_photo"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['edit_photo']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));


            $sql_img = "UPDATE users SET photo = '" . $imgContent . "' WHERE  id='" . $id . "'";
            $update_img = mysqli_query($link, $sql_img);

            if ($update_img) {
                $status = 'success';
                $uploadimg = "File uploaded successfully.";
                header("location: profile1.php");
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}
ob_end_flush();

?>

    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">

  <!-- partial -->
      <!-- partial -->
     
      <div class="container1-fluid page-body-wrapper">
            <div class="main-panel1" style="width: 100%;">
                <div class="content-wrapper">

                    <div class="row mt-5">
                        <!--Main Content-->

                        <div class="container">


                            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                                <div class="profile-tab-nav border-right">
                                    <div class="p-4">
                                        <div class="img-circle text-center mb-3">
                                            <?php if ($result->num_rows > 0 && $data['photo'] != null) { ?>
                                                <?php while ($row1 = $result->fetch_assoc()) { ?>
                                                    <img class="shadow" src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($row1['photo']); ?>" />
                                                <?php } ?>
                                            <?php } else { ?>
                                                <img src="assets/images/user2.jpg" alt="Image" class="shadow">
                                            <?php } ?>
                                           
                                        </div>

                                        <div class="text-center ">
                                            <form id="image_upload_form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                <label class="btn btn-light " onclick="document.getElementById('edit_photo').click()">
                                                    <span><i class="fa fa-camera"></i>&nbsp;Change Photo</span></label>
                                                <input type='file' id="edit_photo" style="display:none" name="edit_photo" class="buttonimg">
                                            </form>
                                        </div>

                                        <h4 class="text-center" style="color: white;" id="user_name"> <?php echo $data['name']; ?></h4>
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
                                                        <label>Name</label>
                                                        <input type="text" name="update_name" class="form-control" value="<?php echo $data['name']; ?>" pattern="[a-zA-Z\s]+"  oninvalid="this.setCustomValidity('Only letters are allowed for the name')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>NIC Number</label>
                                                        <input type="text" name="update_nic" class="form-control"  value="<?php echo $data['nic']; ?>" pattern="[0-9Vv]{10}|[0-9]{12}" oninvalid="this.setCustomValidity('Only 9 Numbers with V or v is allowed for the old version while only 12 Numbers are allowed for the new version')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact number</label>
                                                        <input type="text" name="update_tel" class="form-control" value=<?php echo $data['contactNo']; ?> pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Only 10 digits are allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" name="update_email" class="form-control" value=<?php echo $data['email']; ?> required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Home Adrress</label>
                                                        <input type="text" name="update_addr" class="form-control" value="<?php echo $data['homeAddress']; ?>" required>
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
            </div>
      </div>



            
    <!-- content-wrapper ends -->


  
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE Matters
            2021</span>
        </div>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/Header/js/vendor.bundle.base.js"></script>

  <script src="assets/Header/js/off-canvas.js"></script>
  <script src="assets/Header/js/settings.js"></script>

  

  <script>
        $(document).ready(function() {
            $("#edit_profile").click(function(e) {
                if($("#form1")[0].checkValidity()){

                e.preventDefault();
                var id = <?php echo $id ?>;
                var action = "edit_profile";

                
                $.ajax({
                    method: 'POST',
                    url: 'edit_action.php',

                    data: $("#form1").serialize() + '&id=' + id + '&action=' + action,
                    success: function(data) {
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
                        } else if (data === "nic_duplicate") {
                            $("#user_name").html(data.split('#')[1]);
                            $("#result").html('<div class="alert alert-warning"><button type="button" class="close">×</button>Change the NIC Number : There is and account asscociated with this nic number!</div>');
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
                var id = <?php echo $id ?>;
                var action = "password_change";
                if($("#password_change")[0].checkValidity()){

                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: 'edit_action.php',

                    data: $("#password_change").serialize() + '&id=' + id + '&action=' + action,
                    success: function(data) {
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


<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script src="assets/complaint/script.js"></script>



  <!-- End custom js for this page -->
</body>

</html>


