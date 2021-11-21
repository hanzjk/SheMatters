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


<link rel="stylesheet" href="../assets/complaint/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>




<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Complaint Registration Form</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Lodge a Complaint</li>
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
                    <li class="active">Details Part 01</li>
                    <li>Details Part 02</li>
                    <li>Incident & Evidence</li>
                    <li>Submit</li>
                </ul>
                <!-- fieldsets -->
                <fieldset data-step="1">
                    <h2 class="fs-title text-center">Details I</h2>
                    <h3 class="fs-subtitle text-center">Please complete the below details before proceeding</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="border: none;">
                        <label for="title" class="required" style="font-weight: bolder;color: black;">Complaint Title (Nature of the complaint)</label>

                        <div class="form-group ">
                                            <select class="custom-select" class="form-control" style="font-size: 14px;" id="title" name="title" >
                                                <option value="" selected>Choose</option>
                                                <option value="Causing hurt">Causing hurt </option>
                                                <option value="Voluntarily causing hurt by dangerous weapons or means">Voluntarily causing hurt by dangerous weapons or means </option>
                                                <option value="Sexual Abuse ">Sexual Abuse </option>
                                                <option value="Domestic violence ">Domestic violence </option>
                                                <option value="Cyber violence">Cyber violence </option>
                                                <option value="Rape ">Rape </option>
                                                <option value="Offence of gross indecency & punishment. ">Offence of gross indecency & punishment. </option>
                                                <option value="Seduction, Prostitution or unlawful carnal intercourse of a female child. ">Seduction, Prostitution or unlawful carnal intercourse of a female child. </option>
                                                <option value="Obscene publication & exhibition ">Obscene publication & exhibition  </option>
                                                <option value="Developing obscene publications  ">Developing obscene publications </option>
                                                <option value="Other ">Other </option>
                                                
                                                

                                            </select>
                                            <span id="help_rdistrict" class="text-danger"></span>

                                        </div>
                        <span id="help_title" class="text-danger"></span>

                        </div><br>


                            <div class="card">
                                <div class="card-header "> Details of Complainant </div>
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
                                <div class="card-header "> Details of Victim </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="required">Whether the complainant is the victim ? </label>
                                        <div class="form-check form-check-inline">
                                            <label for="radio1">
                                                <input type="radio" class="form-check-input" id="radio1" name="inlineRadioOptions" value="option1" checked onclick="ClearFields();">No
                                            </label>
                                        </div>
                                        <div class=" form-check form-check-inline">
                                            <label for="radio2">
                                                <input type="radio" class="form-check-input" id="radio2" name="inlineRadioOptions" value="option2" onclick="SetFields();">Yes
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="v_name" class="required">Name</label>
                                        <input type="text" class="form-control" id="v_name" name="v_name" placeholder="Name" required>
                                        <span id="help_vname" class="text-danger"></span>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label for="v_address" class="required">Address</label>
                                            <input type="text" class="form-control" id="v_address" name="v_address" placeholder="Address" required />
                                            <span id="help_vaddress" class="text-danger"></span>

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="required">Select District</label>
                                            <select class="custom-select" class="form-control" style="font-size: 13px;" id="v_district" name="v_district" required>
                                                <option value="" selected>Choose</option>
                                                <option value="Ampara">Ampara </option>
                                                <option value="Anuradhapura"> Anuradhapura </option>
                                                <option value="Badulla ">Badulla </option>
                                                <option value="Batticaloa ">Batticaloa </option>
                                                <option value="Colombo ">Colombo </option>
                                                <option value="Galle ">Galle </option>
                                                <option value="Gampaha ">Gampaha </option>
                                                <option value="Hambantota ">Hambantota </option>
                                                <option value="Jaffna ">Jaffna </option>
                                                <option value="Kalutara">Kalutara </option>
                                                <option value="Kandy"> Kandy </option>
                                                <option value="Kegalle ">Kegalle </option>
                                                <option value="Kilinochchi ">Kilinochchi </option>
                                                <option value="Kurunegala ">Kurunegala </option>
                                                <option value="Mannar ">Mannar </option>
                                                <option value="Matale ">Matale </option>
                                                <option value="Matara ">Matara </option>
                                                <option value="Monaragala ">Monaragala </option>
                                                <option value="Mullaitivu">Mullaitivu </option>
                                                <option value="Nuwara Eliya"> Nuwara Eliya </option>
                                                <option value="Polonnaruwa ">Polonnaruwa </option>
                                                <option value="Puttalam ">Puttalam </option>
                                                <option value="Ratnapura ">Ratnapura </option>
                                                <option value="Trincomalee ">Trincomalee </option>
                                                <option value="Vavuniya ">Vavuniya </option>

                                            </select>
                                            <span id="help_vdistrict" class="text-danger"></span>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="v_contact">Contact Number</label>
                                            <input type="text" class="form-control" name="v_contact" id="v_contact" placeholder="Contact Number" />
                                            <span id="help_contact" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="v_email">Email Address</label>
                                            <input type="email" class="form-control" name="v_email" id="v_email" placeholder="Email Address" />
                                            <span id="help_email" class="text-danger"></span>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="v_nic">NIC Number</label>
                                            <input type="text" class="form-control" name="v_nic" id="v_nic" placeholder="NIC Number" />
                                            <span id="help_nic" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="v_age" class="required">Age</label>
                                            <input type="number" class="form-control" name="v_age" id="v_age" placeholder="Age (Approximation)" />
                                            <span id="help_vage" class="text-danger"></span>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>



                    <input type="button" translate="no" name="next1" class="next1 action-button" value="Next" />
                </fieldset>

                <fieldset data-step="2">
                    <h2 class="fs-title text-center">Details II </h2>
                    <h3 class="fs-subtitle text-center">Please complete the below details before proceeding</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header "> Details of Respondent (Accused Party) </div>
                                <div class="card-body">

                                    <div class="form-group ">
                                        <label for="r_name">Name</label>
                                        <input type="text" class="form-control" id="r_name" name="r_name" placeholder="Name">
                                        <span id="help_rname" class="text-danger"></span>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="r_address">Address</label>
                                            <input type="text" class="form-control" id="r_address" name="r_address" placeholder="Address" />
                                        </div>


                                        <div class="form-group col-lg-6">
                                            <label >Select District</label>
                                            <select class="custom-select" class="form-control" style="font-size: 13px;" id="r_district" name="r_district" >
                                                <option value="" selected>Choose</option>
                                                <option value="Ampara">Ampara </option>
                                                <option value="Anuradhapura"> Anuradhapura </option>
                                                <option value="Badulla ">Badulla </option>
                                                <option value="Batticaloa ">Batticaloa </option>
                                                <option value="Colombo ">Colombo </option>
                                                <option value="Galle ">Galle </option>
                                                <option value="Gampaha ">Gampaha </option>
                                                <option value="Hambantota ">Hambantota </option>
                                                <option value="Jaffna ">Jaffna </option>
                                                <option value="Kalutara">Kalutara </option>
                                                <option value="Kandy"> Kandy </option>
                                                <option value="Kegalle ">Kegalle </option>
                                                <option value="Kilinochchi ">Kilinochchi </option>
                                                <option value="Kurunegala ">Kurunegala </option>
                                                <option value="Mannar ">Mannar </option>
                                                <option value="Matale ">Matale </option>
                                                <option value="Matara ">Matara </option>
                                                <option value="Monaragala ">Monaragala </option>
                                                <option value="Mullaitivu">Mullaitivu </option>
                                                <option value="Nuwara Eliya"> Nuwara Eliya </option>
                                                <option value="Polonnaruwa ">Polonnaruwa </option>
                                                <option value="Puttalam ">Puttalam </option>
                                                <option value="Ratnapura ">Ratnapura </option>
                                                <option value="Trincomalee ">Trincomalee </option>
                                                <option value="Vavuniya ">Vavuniya </option>

                                            </select>
                                            <span id="help_rdistrict" class="text-danger"></span>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="required">Sex</label>
                                            <select class="custom-select" class="form-control" style="font-size: 13px;" id="r_sex" name="r_sex" required>
                                                <option value="" selected>Choose</option>
                                                <option value="Female">Female </option>
                                                <option value="Male"> Male </option>
                                                <option value="Other"> Other </option>

                                            </select>
                                            <span id="help_rsex" class="text-danger"></span>

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="r_age" class="required">Age</label>
                                            <input type="number" class="form-control" name="r_age" id="r_age" placeholder="Age (Approximation)" required />
                                            <span id="help_rage" class="text-danger"></span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="r_description">Physical Description of Accused person</label>
                                        <textarea class="form-control" id="r_description" rows="5" name="r_description"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header"> Details of Witnesse's</div>
                                <div class="card-body">

                                    <div class="card-header text-center" style="border: none;height: 40px;">Witness 01 </div><br>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="w_name1">Name </label>
                                            <input type="text" class="form-control " id="w_name1" name="w_name1" placeholder="Name">
                                            <span id="help_wname1" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="w_contact1">Contact Number</label>
                                            <input type="text" class="form-control" name="w_contact1" id="w_contact1" placeholder="Contact Number" />
                                            <span id="help_wcontact1" class="text-danger"></span>

                                        </div>

                                    </div>
                                    <div class="card-header text-center" style="border: none;height: 40px;">Witness 02 </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="w_name2">Name </label>
                                            <input type="text" class="form-control" id="w_name2" name="w_name2" placeholder="Name">
                                            <span id="help_wname2" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="w_contact2">Contact Number</label>
                                            <input type="text" class="form-control" name="w_contact2" id="w_contact2" placeholder="Contact Number" />
                                            <span id="help_wcontact2" class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input type="button" name="previous" translate="no" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next2"  translate="no" class="next2 action-button" value="Next" />
                </fieldset>

                <fieldset data-step="3">
                    <h2 class="fs-title text-center">Incident & Evidence</h2>
                    <h3 class="fs-subtitle text-center">Please provide a brief description and evidence of the incident </h3>

                    <div class="card">
                        <div class="card-header "> Details of the incident</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="i-date" class="required">Date of the incident</label>
                                    <input type="date" class="form-control" name="i_date" id="i_date" placeholder="Date" required />
                                    <span id="help_idate" class="text-danger"></span>

                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="i_location" class="required">Location where the incident occured</label>
                                    <input type="text" class="form-control" name="i_location" id="i_location" placeholder="Location" required />
                                    <span id="help_ilocation" class="text-danger"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="i_description_state" class="required">Physical & Emotional State of Victim (Describe any cuts, bruises, lacerations, behaviour, and mood)</label>
                                <textarea class="form-control" id="i_description_state" rows="5" name="i_description_state"></textarea>
                                <span id="help_istate" class="text-danger"></span>

                            </div>
                            <div class="form-group">
                                <label for="i_description" class="required">Brief Description of Incident</label>
                                <textarea class="form-control" id="i_description" rows="7" name="i_description" required></textarea>
                                <span id="help_idescription" class="text-danger"></span>

                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Evidences</div>
                                <div class="card-body">

                                    <p>Upload upto five files as evidences</p>
                                    <div class="custom-file mb-3 ">
                                        <input type="file" class="custom-file-input" id="evidence1" name="evidence1">
                                        <label class="custom-file-label" for="evidence1">Choose file</label>
                                    </div>

                                    <div class="custom-file mb-3 ">
                                        <input type="file" class="custom-file-input" id="evidence2" name="evidence2">
                                        <label class="custom-file-label" for="evidence2">Choose file</label>
                                    </div>

                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="evidence3" name="evidence3">
                                        <label class="custom-file-label" for="evidence3">Choose file</label>
                                    </div>

                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="evidence4" name="evidence4">
                                        <label class="custom-file-label" for="evidence4">Choose file</label>
                                    </div>

                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="evidence5" name="evidence5">
                                        <label class="custom-file-label" for="evidence5">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>


                    <input type="button" name="previous" translate="no" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next3" translate="no" class="next3 action-button" value="Next" />


                </fieldset>
                <fieldset data-step="4">
                    <h2 class="fs-title text-center">Declaration </h2>
                    <h3 class="fs-subtitle text-center">Read and agree to below terms before submitting the complaint</h3>
                    <div class="alert alert-danger" role="alert" style="display: none;" id="msg">
                        Please agree to below terms in order to submit the complaint
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="agree" name="agree" value="1">
                                    </div>

                                </div>
                                <div class="col-10" style="color: black;"> I, the complainant herein declare that:<br>
                                    &nbsp;&nbsp;(a) the information furnished herein above is true and
                                    correct <br>
                                    &nbsp;&nbsp;(b) I have not concealed or misrepresented any fact
                                    stated and the documents submitted
                                    herewith.</div>



                            </div>


                        </div>
                    </div>
                    <br><br>

                    <input type="button" translate="no" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" translate="no"  name="submit" class="submit action-button" id="submit" value="Submit" />
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

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

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
    function ClearFields() {
        document.getElementById("v_name").value = "";
        document.getElementById("v_address").value = "";
        document.getElementById("v_contact").value = "";
        document.getElementById("v_email").value = "";
        document.getElementById("v_nic").value = "";

    }

    function SetFields() {

        document.getElementById("v_name").value = "<?php echo $data['name'] ?>";
        document.getElementById("v_address").value = "<?php echo $data['homeAddress'] ?>";
        document.getElementById("v_contact").value = "<?php echo $data['contactNo'] ?>";
        document.getElementById("v_email").value = "<?php echo $data['email'] ?>";
        document.getElementById("v_nic").value = "<?php echo $data['nic'] ?>";


    }

    $('#submit').click(function(e) {
        if ($('#agree').prop("checked") == true) {
            e.preventDefault();
            var id = <?php echo $id ?>;

            var formData = new FormData($("#msform")[0]);
            formData.append('id', id); //id is the variable that has the data that I ne
            $.ajax({
                url: 'complaint_action.php',
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                data: formData,
                success: function(data) {
                    if (data === "Success") {
                        jQuery('#myModal').modal();

                    } else {
                       console.log(data);
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



<script src="../assets/complaint/script.js"></script>



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
                <p>Complaint Filed Successfully.</p>
                <a href="lodged_complaints.php"><button class="btn btn-success" style="background-color: #004225;">Click Here to View</button></a>
                <a href="complaint-intro.php"><button class="btn btn-success" style="background-color: #004225;">Go Back</button></a>

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
                <a href="complaint-intro.php"><button class="btn btn-success">Go Back</button></a>

            </div>
        </div>
    </div>
</div>


</body>


</html>