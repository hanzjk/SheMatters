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


<link rel="stylesheet" href="../assets/ss/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>




<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Share your Story</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Stories of Survival</li>
            </ul>
        </div>
    </div>
</section>


<!-- Contact Form -->
<section class="contact-form-section">
    <div class="auto-container">

        <div class="col-12">
            <form id="msform" enctype="multipart/form-data" method="post">
                <!-- progressbar -->
                <ul id="progressbar" class="text-center">
                    <li class="active">Basic Details</li>
                    <li>Submit</li>
                </ul>
                <!-- fieldsets -->
                <fieldset data-step="1">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header "> Basic Details</div>
                                <div class="card-body">

                                    <div class="form-group ">
                                        <label for="c_name" class="required">Name</label>
                                        <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Name" value="<?php echo $data['name'] ?>" required readonly>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="c_address" class="required">Address</label>
                                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Address" required value="<?php echo $data['homeAddress'] ?>" required readonly />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="c_nic" class="required">NIC Number</label>
                                            <input type="text" class="form-control" name="c_nic" id="c_nic" placeholder="NIC Number" required value="<?php echo $data['nic'] ?>" required readonly />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="c_email">Email Address</label>
                                            <input type="email" class="form-control" name="c_email" id="c_email" placeholder="Email Address" value="<?php echo $data['email'] ?>" required readonly />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="c_contact" class="required">Contact Number</label>
                                            <input type="text" class="form-control" name="c_contact" id="c_contact" placeholder="Contact Number" required value="<?php echo $data['contactNo'] ?>" required readonly />
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
                                <div class="card-header "> Your Story </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="required">Do you want to display your name publicly ?</label>
                                        <div class="form-check form-check-inline">
                                            <label for="radio1">
                                                <input type="radio" class="form-check-input" id="radio1" name="option" value="No" >No
                                            </label>
                                        </div>
                                        <div class=" form-check form-check-inline">
                                            <label for="radio2">
                                                <input type="radio" class="form-check-input" id="radio2" name="option" value="Yes" checked>Yes
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="r_description" class="required">Your Story</label>
                                        <textarea class="form-control" id="story" rows="25" name="story"></textarea>
                                        <span id="help_story" class="text-danger"></span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input type="button"   translate="no"  name="next1" class="next1 action-button" value="Next" />
                </fieldset>


                </fieldset>
                <fieldset data-step="2">
                    <h2 class="fs-title text-center">Declaration </h2>
                    <h3 class="fs-subtitle text-center">Read and agree to below terms before submitting the story</h3>
                    <div class="alert alert-danger" role="alert" style="display: none;" id="msg">
                        Please agree to below terms in order to submit the story
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="agree" name="agree" value="1">
                                    </div>

                                </div>
                                <div class="col-10" style="color: black;"> I, herein declare that:<br>
                                    &nbsp;&nbsp;(a) the information furnished herein above is true and
                                    correct <br>
                                    &nbsp;&nbsp;(b) I have not concealed or misrepresented any fact
                                    stated </div>
                            </div>


                        </div>
                    </div>
                    <br><br>

                    <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit"  translate="no"  name="submit" class="submit action-button" id="submit" value="Submit" />
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
                url: 'story_action.php',
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



<script src="../assets/ss/script.js"></script>



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
                <p>Submitted your story successfully.It will be displayed under survivor stories after the admin approval</p>
                <a href="#"><button class="btn btn-success" style="background-color: #004225;">Click Here to View</button></a>
                <a href="ss-intro.php"><button class="btn btn-success" style="background-color: #004225;">Go Back</button></a>

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
                <a href="ss-intro.php"><button class="btn btn-success">Go Back</button></a>

            </div>
        </div>
    </div>
</div>


</body>


</html>