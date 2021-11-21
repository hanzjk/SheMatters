<?php
require_once "../config.php";

if (!isset($_SESSION['loggedin_user'])) {
    header('Location: ../login.php');
    exit;
} else {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);
    require_once 'main/header.php';
}

?>
<style>
    .modal-confirm {
        color: #000;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        background: #800020;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 20px;
        margin: 10px 0;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #fff;
        text-shadow: none;
        opacity: 0.5;
    }

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box {
        color: #fff;
        width: 95px;
        height: 95px;
        display: inline-block;
        border-radius: 50%;
        z-index: 9;
        border: 5px solid #fff;
        padding: 15px;
        text-align: center;
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        margin: -2px 0 0 -2px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #002D62;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border-radius: 30px;
        margin-top: 10px;
        padding: 6px 20px;
        min-width: 150px;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #002D62 !important;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="../assets/financial_aid/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>




<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Financial Aid Application</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Apply For Financial Aid</li>
            </ul>
        </div>
    </div>
</section>


<!-- Contact Form -->
<section class="contact-form-section">
    <div class="auto-container">

        <div class="col-12">
            <form id="msform" method="post">
                <!-- progressbar -->
                <ul id="progressbar" class="text-center">
                    <li class="active">Details Part 01</li>
                    <li>Details Part 02</li>
                    <li>Submit</li>
                </ul>
                <!-- fieldsets -->
                <fieldset data-step="1">
                    <h2 class="fs-title text-center">Details I</h2>
                    <h3 class="fs-subtitle text-center">Please complete the below details before proceeding</h3>
                    <div class="row">
                        <div class="col-12">



                            <div class="card">
                                <div class="card-header "> Details of Applicant </div>
                                <div class="card-body">


                                 
                                    <div class="form-group ">
                                        <label for="name" class="required">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $data['name'] ?>" required readonly>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="address" class="required">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required value="<?php echo $data['homeAddress'] ?>" required readonly />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="nic" class="required">NIC Number</label>
                                            <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC Number" required value="<?php echo $data['nic'] ?>" required readonly />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $data['email'] ?>" required readonly />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="contact" class="required">Contact Number</label>
                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" required value="<?php echo $data['contactNo'] ?>" required readonly />
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="emp" class="required">Employment Status</label>
                                            <input type="text" class="form-control" name="emp" id="emp" placeholder="Employment Status" />
                                            <span id="help_emp" class="text-danger"></span>

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="income" class="required">Annual Income (Rs.)</label>
                                            <input type="number" data-type="currency" class="form-control" name="income" id="income" placeholder="Annual Income in Rs." />
                                            <span id="help_income" class="text-danger"></span>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="reason" class="required">Why Are you applying for financial Aid ?</label>
                                        <span id="help_reason" class="text-danger"></span>

                                        <textarea class="form-control" id="reason" rows="10" name="reason"></textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="use" class="required">Please explain how you will put these funds to use </label>
                                        <span id="help_use" class="text-danger"></span>

                                        <textarea class="form-control" id="use" rows="10" name="use"></textarea>
                                    </div>

                                    <div class="form-group ">
                                        <label for="amount" class="required">Amount of funds requested </label>
                                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount of funds in Rs." />
                                        <span id="help_amount" class="text-danger"></span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="button"   translate="no"  name="next1" class="next1 action-button" value="Next" />
                </fieldset>


                <fieldset data-step="2">
                    <h2 class="fs-title text-center">Details II </h2>
                    <h3 class="fs-subtitle text-center">Please complete the below details before proceeding</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header "> Details of References' </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-lg-6 ">
                                            <label for="r_name" class="required">Name</label>
                                            <input type="text" class="form-control" id="r_name" name="r_name" placeholder="Name">
                                            <span id="help_rname" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6 ">
                                            <label for="r_contact" class="required">Contact Number</label>
                                            <input type="text" class="form-control" id="r_contact" name="r_contact" placeholder="Contact Number" />
                                            <span id="help_rcontact" class="text-danger"></span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Bank Account Details</div>
                                <div class="card-body">
                                <p style="padding-left: 10px;">Awarded funds will be transferred to this bank account</p>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="account" class="required">Account Number </label>
                                            <input type="text" class="form-control " id="account" name="account" placeholder="Bank Account Number (without the hypen)">
                                            <span id="help_account" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="branch" class="required">Branch</label>
                                            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" />
                                            <span id="help_branch" class="text-danger"></span>

                                        </div>

                                    </div>

                                    <div class="form-group col-lg-6">
                                            <label class="required">Bank Name</label>
                                            <select class="custom-select" class="form-control" style="font-size: 13px;" id="bankName" name="bankName" >
                                                <option value="" selected>Choose</option>
                                                <option value="Bank of Ceylon">Bank of Ceylon </option>
                                                <option value="Cargills Bank Ltd"> Cargills Bank Ltd </option>
                                                <option value="Commercial Bank of Ceylon PLC ">Commercial Bank of Ceylon PLC </option>
                                                <option value="DFCC Bank PLC ">DFCC Bank PLC </option>
                                                <option value="Hatton National Bank PLC ">Hatton National Bank PLC </option>
                                                <option value="Indian Bank ">Indian Bank </option>
                                                <option value="National Development Bank PLC ">National Development Bank PLC </option>
                                                <option value="Nations Trust Bank PLC ">Nations Trust Bank PLC </option>
                                                <option value="Pan Asia Banking Corporation PLC ">Pan Asia Banking Corporation PLC </option>
                                                <option value="People's Bank">People's Bank </option>
                                                <option value="Sampath Bank PLC"> Sampath Bank PLC </option>
                                                <option value="Seylan Bank PLC ">Seylan Bank PLC </option>
                                                <option value="Standard Chartered Bank ">Standard Chartered Bank </option>
                                                <option value="The Hong Kong and Shanghai Banking Corporation Ltd (HSBC) ">The Hong Kong and Shanghai Banking Corporation Ltd (HSBC) </option>
                                                <option value="Union Bank of Colombo PLC ">Union Bank of Colombo PLC </option>
                                                <option value="National Savings Bank ">National Savings Bank </option>
                         

                                            </select>
                                            <span id="help_bank" class="text-danger"></span>

                                        </div>
                                        <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button"  translate="no"  name="next2" class="next2 action-button" value="Next" />
                </fieldset>

                <fieldset data-step="3">
                    <h2 class="fs-title text-center">Declaration </h2>
                    <h3 class="fs-subtitle text-center">Read and agree to below terms before submitting the complaint</h3>
                    <div class="alert alert-danger" role="alert" style="display: none;" id="msg">
                        Please agree to below terms in order to submit the application
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="agree" name="agree" value="1">
                                    </div>

                                </div>
                                <div class="col-10" style="color: black;"> I, the applicant herein declare that:<br>
                                    &nbsp;&nbsp;(a) the information furnished herein above is true and
                                    correct <br>
                                    &nbsp;&nbsp;(b) I have not concealed or misrepresented any fact
                                    stated and the documents submitted
                                    herewith.</div>



                            </div>


                        </div>
                    </div>
                    <br><br>

                    <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit"  translate="no"   name="submit" class="submit action-button" id="submit" value="Submit" />
                </fieldset>

            </form>

        </div>
    </div>
</section>


<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">

        <div class="footer-bottom">
            <div class="left-content">
            <div class="icon"><img src="../assets/images/logo.png" alt=""></div>

                <div class="copyright-text"><a href="#">Copyright © SHE MAtters 2021</a>
                </div>
            </div>

        </div>
    </div>
</footer>

<!--Scroll to top-->
</div>
<!--End pagewrapper-->
   <!-- JS -->
   <script src="../assets/main/js/jquery.js"></script>
    <script src="../assets/main/js/popper.min.js"></script>
    <script src="../assets/main/js/bootstrap.min.js"></script>
    <script src="../assets/main/js/TweenMax.min.js"></script>
    <script src="../assets/main/js/wow.js"></script>
    <script src="../assets/main/js/owl.js"></script>
    <script src="../assets/main/js/appear.js"></script>
    <script src="../assets/main/js/swiper.min.js"></script>
    <script src="../assets/main/js/jquery.fancybox.js"></script>
    <script src="../assets/main/js/menu-nav-btn.js"></script>
    <script src="../assets/main/js/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="../assets/main/js/script.js"></script>
<script>
    $('#submit').click(function(e) {
        if ($('#agree').prop("checked") == true) {
            e.preventDefault();
            var id = <?php echo $id ?>;

            var formData = new FormData($("#msform")[0]);
            formData.append('id', id); //id is the variable that has the data that I ne
            $.ajax({
                url: 'application_action.php',
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                data: formData,
                success: function(data) {
                    if (data === "Success") {
                        jQuery('#myModal').modal();

                    } else {
                        // console.log(data);
                        jQuery('#myModal1').modal();

                    }
                },
                cache: false,

            });

        } else {
            document.getElementById('msg').style.display = "block";
        }

    });
</script>



<script src="../assets/financial_aid/script.js"></script>



<!-- Modal HTML -->
<div id="myModal" class="modal fade col-12" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center" style="background-color: #01796f;">
                <div class="icon-box">
                    <i class="material-icons">done</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p>Application Submitted Successfully.</p>
                <a href="my_applications.php"><button class="btn btn-success" style="background-color: #004225;">Click Here to View</button></a>
                <a href="faid-intro.php"><button class="btn btn-success" style="background-color: #004225;">Go Back</button></a>

            </div>
        </div>
    </div>
</div>


<!-- Modal HTML -->
<div id="myModal1" class="modal fade col-12" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="material-icons">close</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Error!</h4>
                <p>Something went wrong. Please try again later.</p>
                <a href="faid-intro.php"><button class="btn btn-success">Go Back</button></a>

            </div>
        </div>
    </div>
</div>


</body>


</html>