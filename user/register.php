<?php
require_once 'config.php';


$fname = $lname = $nic = $contactNo = $address = $email = $password = $cpassword = "";
$name_err = $nic_err = $contact_err = $address_err = $email_err = $password_err = $cpassword_err = "";
$warning = $danger = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Name
    if (empty(trim($_POST["fname"])) || empty(trim($_POST["lname"]))) {
        $name_err = "Please enter your name.";
    } else {
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $fullname = $fname . " " . $lname;
    }

    //validate NIC

    if (empty(trim($_POST["nic"]))) {
        $nic_err = "Please enter your NIC number";
    } else {
        $nic = trim($_POST["nic"]);

        // check if nic only contains digits and v/V
        if (!preg_match("/^[0-9'v'V]*$/", $nic)) {
            $nic_err = "Invalid NIC Number";
        } else if (strlen($nic) != 10 && strlen($nic) != 12) { //there can be 9 digits with letter V/v in old format and 12 digits in new format
            $nic_err = "Invalid NIC Number";
        } else {

            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE nic = ?";

            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_nic);

                // Set parameters
                $param_nic = $nic;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    /* store result */
                    $stmt->store_result();

                    if ($stmt->num_rows() >= 1) {
                        $nic_err = "Account has been created for this NIC Number";
                        $warning = true;
                        echo '
                        <script>
                        $("#myHiddenDiv").html("Username already exists");
                        </script>';
                    } else {
                        $nic = trim($_POST["nic"]);
                    }
                } else {
                    echo "Oops! Something went wrong when inserting email. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    }

    //validate Contact No
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter your Contact number";
    } else {
        $contactNo = trim(($_POST["contact"]));
        // check if telephone number only contains digits
        if (!preg_match("/^[0-9]*$/", $contactNo)) {
            $contact_err = "Only Numbers are allowed";
        } else if (strlen($contactNo) != 10) { //there can be only 10 digits in local telephone numbers
            $contact_err = "Invalid Telephone Number";
        }
    }

    //Validate Address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your Home Address";
    } else {
        $address = $_POST["address"];
    }


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
            $sql = "SELECT id FROM users WHERE email = ?";

            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_email);

                // Set parameters
                $param_email = $email;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    /* store result */
                    $stmt->store_result();

                    if ($stmt->num_rows() >= 1) {
                        $email_err = "Account has been created for this Email Address";
                        $warning = true;
                    } else {
                        $email = trim($_POST["email"]);
                    }
                } else {
                    echo "Oops! Something went wrong when inserting email. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    }


    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
        $warning = true;
    } else {
        $password = trim($_POST["password"]);
        $send_password = $password;
    }

    // Validate confirm password
    if (empty(trim($_POST["cpassword"]))) {
        $cpassword_err = "Please confirm password.";
    } else {
        $cpassword = trim($_POST["cpassword"]);
        if (empty($password_err) && ($password != $cpassword)) {
            $cpassword_err = "Passwords did not match.";
            $danger = true;
        }
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($nic_err)  && empty($contact_err) &&  empty($address_err)  && empty($email_err) && empty($password_err) && empty($cpassword_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, nic,contactNo,homeAddress,email,password) VALUES (?, ?, ?, ?,?,?)";
        if ($stmt = $link->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            if ($stmt->bind_param("ssssss", $param_name, $param_nic, $param_contact, $param_address, $param_email, $param_password))

                // Set parameters
                $param_name = $fullname;
            $param_nic = $nic;
            $param_contact = $contactNo;
            $param_address = $address;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                header("Location: login.php");
            } else {

                echo "Something went wrong when executing. Please try again later.";
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card register-card my-auto">
                <div class="row no-gutters">

                    <div class="col">
                        <div class="row">

                            <div class="card-body col-12 text-center" style="align-self: center;">
                                <div class="brand-wrapper">
                                    <img src="assets/images/logo.png" alt="logo" class="logo">

                                    <span class="logo_text"> SHE Matters</span>
                                </div>
                                <p class="register-card-description">Create an account</p>


                                <?php

                                if ($cpassword_err != null && $danger == true) {
                                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"  style="font-size:13px;">';
                                    echo $cpassword_err;
                                    echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                }

                                if ($password_err != null && $warning == true) {
                                    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert"  style="font-size:13px;">';
                                    echo $password_err;
                                    echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                }

                                if ($nic_err != null && $email_err != null && $warning == true) {
                                    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                    echo 'Accout has been created for this Email Address and NIC Number';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                } else if ($nic_err != null && $warning == true) {
                                    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                    echo $nic_err;
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                } else if ($email_err != null && $warning == true) {
                                    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size:13px;" >';
                                    echo $email_err;
                                    echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                                }

                                ?>


                                <div class="row ">
                                    <div class="col d-flex justify-content-center">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="form1">

                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <label for="text" class="sr-only">fname</label>
                                                    <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" placeholder="First Name" pattern="[a-zA-Z\s]+" oninvalid="this.setCustomValidity('Only letters are allowed for the name')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="text" class="sr-only">lname</label>
                                                    <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" placeholder="Last Name" pattern="[a-zA-Z\s]+" oninvalid="this.setCustomValidity('Only letters are allowed for the name')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="col-md-6">
                                                    <label for="text" class="sr-only">nic</label>
                                                    <input type="text" name="nic" value="<?php echo $nic ?>" class="form-control" placeholder="NIC Number" pattern="[0-9Vv]{10}|[0-9]{12}" oninvalid="this.setCustomValidity('Only 9 Numbers with V or v is allowed for the old version while  only 12 Numbers are allowed for the new version')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="text" class="sr-only">contact</label>
                                                    <input type="text" name="contact" value="<?php echo $contactNo ?>" class="form-control" placeholder="Contact Number" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Only 10 digits are allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text" class="sr-only">address</label>
                                                <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Home Address" required>
                                            </div>




                                            <div class="form-group">
                                                <label for="email" class="sr-only">email</label>
                                                <input type="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Email Address" required>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="password" class="sr-only">password</label>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Create a Password" minlength="6" required onkeyup='check();'>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="password" class="sr-only">cpassword</label>
                                                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" minlength="6" required onkeyup='check();'>
                                                </div>
                                            </div>



                                            <input name="register" id="register" class="btn btn-block register-btn mb-4" type="submit" value="Sign Up">

                                        </form>
                                    </div>
                                </div>

                                <div class="d-none d-md-block">
                                    <p style="margin-bottom: 1%;">Already have an account? <a href="login.php">
                                    Sign in here</a></p>
                                </div>
                                <div class="d-md-none">
                                    <p style="margin-bottom: 1%;">Already have an account?<a href="login.php"><br>
                                    Sign in here</a></p>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/images/stop.jpg" class="register-card-img">
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>


<script>
    var check = function() {

        if (document.getElementById('password').value ==
            document.getElementById('cpassword').value) {

            if (document.getElementById('password').value.length >= 6) {
                document.getElementById('password').style.backgroundColor = '#007bff1c';
                document.getElementById('cpassword').style.backgroundColor = '#007bff1c';

            }
        } else {
            document.getElementById('password').style.backgroundColor = 'rgba(85, 85, 85, 0.082)';
            document.getElementById('cpassword').style.backgroundColor = 'rgba(85, 85, 85, 0.082)';
        }
    }
</script>

</html>