<?php
require_once 'header.php';
$application_id = $_GET['application_id'];

$action = "";
if (isset($_GET['action']) && $_GET['action'] == 'ongoing') {
    $action = 'ongoing';
} else if (isset($_GET['action']) && $_GET['action'] == 'pending') {
    $action = 'pending';
} else if (isset($_GET['action']) && $_GET['action'] == 'closed') {
    $action = 'closed';
} else if (isset($_GET['action']) && $_GET['action'] == 'rejected') {
    $action = 'rejected';
}

$profile = mysqli_query($link, "SELECT * FROM applications WHERE application_id ='" . $application_id . "'");
$row = mysqli_fetch_assoc($profile);

$applicant_id = $row['applicant_id'];
$profile1 = mysqli_query($link, "SELECT * FROM users WHERE id ='" . $applicant_id . "'");
$data = mysqli_fetch_assoc($profile1);

?>
<link rel="stylesheet" href="../../user/assets/complaint/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box1 {
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

    .modal-confirm .icon-box1 i {
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

    #msform fieldset {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>


<div class="row mt-3">


    <!--Main Content-->
    <div class="col-12">
    <?php
if($action=='ongoing' || $action=='closed'){
    $res = mysqli_query($link, "SELECT SUM(amount) FROM donations WHERE application_id='" . $application_id . "'");
    $row_s = mysqli_fetch_row($res);

    $res_a = mysqli_query($link, "SELECT * FROM applications WHERE application_id='" . $application_id . "'");
    $row_a = mysqli_fetch_assoc($res_a);

  


    $sum = $row_s[0];
    if ($sum <= 0)
        $sum = 0;


    ?>

    <div class="row">
        <div class="col-6">
            <span style="font-weight: bold;">Raised Amount : Rs<?php echo  $sum?></span>

        </div>
        <div class="col-6 ">
            <span class="float-right" style="font-weight: bold;">Required Amount : Rs<?php echo  $row_a['amount']?></span>

        </div>
    </div>
    <div class="progress mt-2">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="<?php echo ($sum / $row_a['amount']) * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo strval(($sum / $row_a['amount']) * 100) . '%' ?>"></div>
    </div>
    
    <?php } ?>
        <div id="msform">

            <!-- fieldsets -->
            <fieldset data-step="1">
                <h2 class="fs-title text-center">Details I</h2>
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
                                        <input type="text" class="form-control" name="emp" id="emp" value="<?php echo $row['emp_state'] ?>" readonly />
                                        <span id="help_emp" class="text-danger"></span>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="income" class="required">Annual Income (Rs.)</label>
                                        <input type="number" data-type="currency" class="form-control" name="income" id="income" value="<?php echo $row['income'] ?>" readonly />
                                        <span id="help_income" class="text-danger"></span>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="reason" class="required">Why Are you applying for financial Aid ?</label>
                                    <span id="help_reason" class="text-danger"></span>

                                    <textarea class="form-control" id="reason" rows="10" name="reason" readonly placeholder="<?php echo $row['reason'] ?>"></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="use" class="required">Please explain how you will put these funds to use </label>
                                    <span id="help_use" class="text-danger"></span>

                                    <textarea class="form-control" id="use" rows="10" name="use" readonly placeholder="<?php echo $row['use_fund'] ?>"></textarea>
                                </div>

                                <div class="form-group ">
                                    <label for="amount" class="required">Amount of funds requested (up to 25 000Rs)</label>
                                    <input type="number" class="form-control" name="amount" id="amount" value="<?php echo $row['amount'] ?>" readonly />
                                    <span id="help_amount" class="text-danger"></span>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>


            <fieldset data-step="2">
                <h2 class="fs-title text-center">Details II </h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header "> Details of References' </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-lg-6 ">
                                        <label for="r_name" class="required">Name</label>
                                        <input type="text" class="form-control" id="r_name" name="r_name" value="<?php echo $row['ref_name'] ?>" readonly>
                                        <span id="help_rname" class="text-danger"></span>

                                    </div>

                                    <div class="form-group col-lg-6 ">
                                        <label for="r_contact" class="required">Contact Number</label>
                                        <input type="text" class="form-control" id="r_contact" name="r_contact" value="<?php echo $row['ref_contact'] ?>" readonly />
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
                            <p style="padding-left: 10px;">Awarded funds will be transferred to this bank account</p>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="account" class="required">Account Number </label>
                                        <input type="text" class="form-control " id="account" name="account" value="<?php echo $row['accountNo'] ?>" readonly>
                                        <span id="help_account" class="text-danger"></span>

                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="branch" class="required">Branch</label>
                                        <input type="text" class="form-control" name="branch" id="branch" value="<?php echo $row['branch'] ?>" readonly />
                                        <span id="help_branch" class="text-danger"></span>

                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="branch" class="required">Bank Name</label>
                                        <input type="text" class="form-control" name="bank" id="bank" value="<?php echo $row['bank'] ?>" readonly />
                                        <span id="help_bank" class="text-danger"></span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
            </fieldset>


        </div>
        <br>

        <?php if ($action === 'pending') { ?>
            <div class="row mx-auto">
                <button class="btn btn-success col-12" data-toggle="modal" data-target="#myModal">Accept Application </button>
            </div>
            <div class="row"><br></div>
            <div class="row mx-auto">
                <button class="btn btn-danger col-12" data-toggle="modal" data-target="#myModal1">Reject Application </button>
            </div>

        <?php } ?>


        <?php if ($action === 'ongoing') { ?>
            <div class="row mx-auto">
                <button class="btn btn-danger col-12" data-toggle="modal" data-target="#myModal2">Close Application </button>
            </div>


        <?php } ?>
    </div>
</div>


<!-- Modal HTML -->
<div id="myModal" class="modal fade col-12">
    <div class="modal-dialog modal-confirm ">
        <div class="modal-content">
            <div class="modal-header justify-content-center" style="background-color: #01796f;">
                <div class="icon-box1">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Are you sure ?</h4>
                <p>Do you want to accept the application ? This process cannot be undone</p>
                <p>All accepted applications will be displayed under the donate section in the main page</p>

                <a href="accept.php?application_id=<?php echo $row['application_id'] ?>"><button class="btn btn-success" style="background-color:#01796f;">Accept</button></a>
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>


<!-- Modal HTML -->
<div id="myModal1" class="modal fade col-12">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box1">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Are you sure ?</h4>
                <p>Do you really want to reject this application ? This process cannot be undone</p>
                <a href="reject.php?application_id=<?php echo $row['application_id'] ?>"><button class="btn " style="background-color: #800020;">Reject</button></a>
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal HTML -->
<div id="myModal2" class="modal fade col-12">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box1">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Are you sure ?</h4>
                <p>Do you really want to close this complaint ? This process cannot be undone</p>
                <a href="close.php?application_id=<?php echo $row['application_id'] ?>"><button class="btn " style="background-color: #800020;">Close</button></a>
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<?php
require_once 'footer.php';
?>