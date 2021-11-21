<?php
require_once 'header.php';
$row = NULL;
    $applicant_id =$data['id'];
    $profile = mysqli_query($link, "SELECT * FROM applications WHERE applicant_id ='" . $applicant_id . "'");
    $row = mysqli_fetch_assoc($profile);


?>
<link rel="stylesheet" href="../assets/financial_aid/style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css" />


<style>
    .table-title {
        color: #fff;
        background: rgb(48, 44, 81);
        padding: 16px 25px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .badge {
        position: absolute;
        font-size: small;
        margin-left: -10px;
        margin-top: -10px;
        color: #32cd32;
    }

    .status {
        border-radius: 50px;
        line-height: 20px;
        font-size: 15px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
        border: none;
    }


    .btn {
        border-radius: 50px;
        line-height: 20px;
        font-size: 15px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
        border: none;
    }

    #msform fieldset {
        box-shadow: 0 0 5px 1px rgba(201, 194, 194, 0.4);
    }

    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>


<div class="container-fluid page-body-wrapper">

    <div class="main-panel col-12">
        <br>
        <div class="content-wrapper pb-3">

            <div class="row " style="margin-top: -10px;">

                <div class="col-12 card comp " style="outline: none;border: none;">

                    <div class="mt-2 mb-2">
                        <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp;My Application </span>
                        <span class="float-right">Financial Aid Portal &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;My Application</span>
                    </div>
                </div>
            </div>

            <div class="row mt-4" style="background-color:#fff;  border: 1px solid #e8eef1;">
                <div class="col-12 comp">

                    <?php if (!is_null($row)) { ?>
                        <br>


                        <div class="row float-right mr-1 mt-4 mb-4 font-weight-bold">
                            State :
                            <?php if ($row['state'] == "Pending") { ?>

                                <button class="status" style="background-color: #00308F;outline: none;"> <?php
                                                                                                            echo $row['state'];
                                                                                                            ?></button>
                            <?php } ?>


                            <?php if ($row['state'] == "Ongoing") { ?>

                                <button class="status" style="background-color: #f39c12;outline: none;"> <?php
                                                                                                            echo $row['state'];
                                                                                                            ?></button>
                            <?php } ?>


                            <?php if ($row['state'] == "Closed") { ?>

                                <button class="status" style="background-color: #00a65a;outline: none;"> <?php
                                                                                                            echo $row['state'];
                                                                                                            ?></button>
                            <?php } ?>


                            <?php if ($row['state'] == "Rejected") { ?>

                                <button class="status" style="background-color: #d9534f;outline: none;"> <?php
                                                                                                            echo $row['state'];
                                                                                                            ?></button>
                            <?php } ?>
                        </div>

                        <form id="msform" method="post">

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
                                                    <label for="amount" class="required">Amount of funds requested </label>
                                                    <input type="number" class="form-control" name="amount" id="amount" value="<?php echo $row['amount'] ?>" readonly />
                                                    <span id="help_amount" class="text-danger"></span>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <input type="button"  translate="no"  name="next" class="next action-button" value="Next" />
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>


                        </form>
                        <br>

                    <?php } else { ?>

                        <div class="text-center"><br><br>Haven't submitted <br><br><br><br></div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
require_once 'footer.php';
?>