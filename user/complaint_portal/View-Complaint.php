<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];
$profile = mysqli_query($link, "SELECT * FROM complaints WHERE complaint_id ='" . $complaint_id . "'");
$row = mysqli_fetch_assoc($profile);

?>
<link rel="stylesheet" href="../assets/complaint/style.css">
<style>
    .comp {
        box-shadow: 0 0 10px 1px rgba(201, 194, 194, 0.2);
    }
</style>



<style>
    #msform fieldset {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }

    .card-box {
        padding: 20px;
        border-radius: 3px;
        margin-bottom: 30px;
        background-color: #fff;
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);

    }

    .card {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);


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
</style>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper pb-0">
           
            <div class="row msform">
                <div class="col-md-6  ">
                    <a href="inquire.php?complaint_id=<?php echo $complaint_id ?>&action=seen" style="text-decoration: none;">
                        <div class="card">
                            <span class="my-3 mx-4 " style="font-weight: bold;font-size:20px;">
                                <i class="fa fa-user-circle " style="font-size: 50px;"></i>
                                &nbsp;&nbsp;Admin Inquiries

                                <?php

                                $inq1 = "SELECT  COUNT(complaint_id)  FROM inquiry WHERE  complaint_id='" . $row['complaint_id'] . "' AND reply IS NULL";
                                $result_inq1 = mysqli_query($link, $inq1);
                                $inq_count1 = mysqli_fetch_assoc($result_inq1);
                                $InqCount1 = $inq_count1["COUNT(complaint_id)"];
                                if ($InqCount1 > 0) { ?>
                                    <span class="btn btn-warning btn-sm">New</span>
                                <?php } ?>

                            </span>

                        </div>

                    </a>
                </div>
                <div class="col-md-6  ">
                    <a href="inquire_police.php?complaint_id=<?php echo $complaint_id ?>&action=seen" style="text-decoration: none;">
                        <div class="card">
                            <span class="my-3 mx-4 " style="font-weight: bold;font-size:20px;">
                                <i class="fa fa-user-circle-o " style="font-size: 50px;"></i>
                                &nbsp;&nbsp;Police Inquiries
                                <?php

                                $inq1 = "SELECT  COUNT(complaint_id)  FROM inquiry_police WHERE  complaint_id='" . $row['complaint_id'] . "' AND reply IS NULL";
                                $result_inq1 = mysqli_query($link, $inq1);
                                $inq_count1 = mysqli_fetch_assoc($result_inq1);
                                $InqCount1 = $inq_count1["COUNT(complaint_id)"];
                                if ($InqCount1 > 0) { ?>
                                    <span class="btn btn-warning btn-sm">New</span>
                                <?php } ?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row  mt-3">
                <div class="col-12 ">
                    <div class="card comp mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Filed On</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['created_at'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Complaint Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php

                                    if ($row['state'] == 'Ongoing' || $row['state'] == 'Ongoing_Currently') {
                                        echo 'Processing';
                                    } else
                                        echo $row['state'] ?>
                                </div>
                            </div>
                            <hr>
                            <?php if ($row['state'] != 'Rejected' && $row['state'] != 'Pending') { ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Transfered To</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php
                                        if ($row['police_id'] != NULL) {
                                            $profile1 = mysqli_query($link, "SELECT police_name FROM police_users WHERE police_id ='" . $row['police_id'] . "'");
                                            $row1 = mysqli_fetch_assoc($profile1);
                                            echo $row1['police_name'];
                                        } else {
                                        }

                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Receival Status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">

                                        <?php
                                        $profile1 = mysqli_query($link, "SELECT confirmed_date FROM police_complaints WHERE complaint_id ='" . $complaint_id . "'");
                                        $row1 = mysqli_fetch_assoc($profile1);
                                        if ($row1['confirmed_date'] === NULL) {
                                            echo 'Still not confirmed the receipt by the police station';
                                        } else
                                            echo 'Confirmed the receipt of the complaint on ', $row1['confirmed_date'];

                                        ?>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Closed On</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php
                                        $profile1 = mysqli_query($link, "SELECT closed_date FROM police_complaints WHERE complaint_id ='" . $complaint_id . "'");
                                        $row1 = mysqli_fetch_assoc($profile1);
                                        if ($row1['closed_date'] === NULL) {
                                            echo 'Ongoing complaint';
                                        } else
                                            echo 'Confirmed the receipt of the complaint on ', $row1['closed_date'];

                                        ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>



                </div>


            </div>
            <div class="row mt-1">


                <!--Main Content-->
                <div class="col-12">
                    <div id="msform">

                        <!-- fieldsets -->
                        <fieldset data-step="1">
                        <a href="complaint_pdf.php?complaint_id=<?php echo $complaint_id ?>"><i class="fa fa-print float-right" style="font-size: 30px;"></i></a>

                            <h2 class="fs-title text-center">Details I</h2><br>
                            <div class="row">
                                <div class="col-12">

                                    <label for="title" class="required" style="font-weight: bolder;color: black;">Complaint Title </label>
                                    <input type="text" class="form-control" value="<?php echo $row['title'] ?>" required readonly><br>

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
                                                <label for="v_name" class="required">Name</label>
                                                <input type="text" class="form-control" id="v_name" value="<?php echo $row['victim_name'] ?>" readonly>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-lg-6">
                                                    <label for="v_add" class="required">Address</label>
                                                    <input type="text" class="form-control" id="v_address" value="<?php echo $row['victim_addr'] ?>" readonly />

                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="required">District</label>
                                                    <input type="text" class="form-control" id="v_address" value="<?php echo $row['victim_dist'] ?>" readonly />

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="v_contact">Contact Number</label>
                                                    <input type="text" class="form-control" name="v_contact" id="v_contact" value="<?php echo $row['victim_contact'] ?>" readonly />

                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="v_email">Email Address</label>
                                                    <input type="email" class="form-control" name="v_email" id="v_email" value="<?php echo $row['victim_email'] ?>" readonly />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="v_nic">NIC Number</label>
                                                    <input type="text" class="form-control" name="v_nic" id="v_nic" value="<?php echo $row['victim_nic']; ?>" readonly />
                                                    <span id="help_nic" class="text-danger"></span>

                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="v_age">Age</label>
                                                    <input type="number" class="form-control" name="v_age" id="v_age" value="<?php echo $row['victim_age'] ?>" readonly />
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>



                            <input type="button"  translate="no"  translate="no" name="next" class="next action-button" value="Next" />
                        </fieldset>

                        <fieldset data-step="2">
                            <h2 class="fs-title text-center">Details II </h2><br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header "> Details of Respondent (Accused Party) </div>
                                        <div class="card-body">

                                            <div class="form-group ">
                                                <label for="r_name">Name</label>
                                                <input type="text" class="form-control" id="r_name" name="r_name" value="<?php echo $row['res_name'] ?>" readonly>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="r_address">Address</label>
                                                    <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_addr'] ?>" readonly />
                                                </div>


                                                <div class="form-group col-lg-6">
                                                    <label class="required">District</label>
                                                    <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_dist'] ?>" readonly />


                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="required">Sex</label>
                                                    <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_sex'] ?>" readonly />


                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="r_age" class="required">Age</label>
                                                    <input type="number" class="form-control" name="r_age" id="r_age" value="<?php echo $row['res_age'] ?>" readonly />
                                                    <span id="help_rage" class="text-danger"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="r_description">Physical Description of Accused person</label>
                                                <textarea class="form-control" id="r_description" rows="5" placeholder="<?php echo $row['res_desc'] ?>" readonly></textarea>
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
                                                    <input type="text" class="form-control " id="w_name1" name="w_name1" value="<?php echo $row['wit1_name'] ?>" readonly>

                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="w_contact1">Contact Number</label>
                                                    <input type="text" class="form-control" name="w_contact1" id="w_contact1" value="<?php echo $row['wit1_contact'] ?>" readonly />

                                                </div>

                                            </div>
                                            <div class="card-header text-center" style="border: none;height: 40px;">Witness 02 </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="w_name2">Name </label>
                                                    <input type="text" class="form-control" id="w_name2" name="w_name2" value="<?php echo $row['wit2_name'] ?>" readonly>
                                                    <span id="help_wname2" class="text-danger"></span>

                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="w_contact2">Contact Number</label>
                                                    <input type="text" class="form-control" name="w_contact2" id="w_contact2" value="<?php echo $row['wit2_contact'] ?>" readonly />
                                                    <span id="help_wcontact2" class="text-danger"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />
                            <input type="button"  translate="no"  name="next" class="next action-button" value="Next" />
                        </fieldset>

                        <fieldset data-step="3">
                            <h2 class="fs-title text-center">Incident & Evidence</h2>

                            <div class="card">
                                <div class="card-header "> Details of the incident</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="i-date" class="required">Date of the incident</label>
                                            <input type="date" class="form-control" name="i_date" id="i_date" value="<?php echo $row['incident_date'] ?>" readonly />

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="i_location" class="required">Location where the incident occured</label>
                                            <input type="text" class="form-control" name="i_location" id="i_location" placeholder="Location" value="<?php echo $row['incident_location'] ?>" readonly />

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="i_description_state" class="required">Physical & Emotional State of Victim (Describe any cuts, bruises, lacerations, behaviour, and mood)</label>
                                        <textarea class="form-control" id="i_description_state" rows="5" name="i_description_state" placeholder="<?php echo $row['victim_state'] ?>" readonly></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="i_description" class="required">Brief Description of Incident</label>
                                        <textarea class="form-control" id="i_description" rows="7" name="i_description" placeholder="<?php echo $row['incident_desc'] ?>" readonly></textarea>

                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">Evidences</div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="card col-md-2 text-center " style=" border: none;">
                                                    <a href="evidence.php?id=<?php echo $complaint_id; ?>&evidence=1" style="text-decoration: none;color: black;">
                                                        <?php if ($row['evidence1'] != null) {
                                                            if ($row['e1_type'] == "image/jpeg" || $row['e1_type'] == "image/png") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else if ($row['e1_type'] == "video/mp4") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-video-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Video';
                                                            } else if ($row['e1_type'] == "application/pdf") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Pdf';
                                                            } else {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Other';
                                                            }
                                                        } ?>
                                                    </a>
                                                </div>

                                                <div class=" card col-md-2 text-center " style="border:none;">
                                                    <a href="evidence.php?id=<?php echo $complaint_id; ?>&evidence=2" style="text-decoration: none;color: black;">
                                                        <?php if ($row['evidence2'] != null) {
                                                            if ($row['e2_type'] == "image/jpeg" || $row['e2_type'] == "image/png") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else if ($row['e2_type'] == "video/mp4") {
                                                                echo '<br>';
                                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<ber>';
                                                                echo 'Video';
                                                            } else if ($row['e2_type'] == "application/pdf") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Other';
                                                            }
                                                        } ?>
                                                    </a>
                                                </div>

                                                <div class="card col-md-2 text-center " style="border:none;">
                                                    <a href="evidence.php?id=<?php echo $complaint_id; ?>&evidence=3" style="text-decoration: none;color: black;">
                                                        <?php if ($row['evidence3'] != null) {
                                                            if ($row['e3_type'] == "image/jpeg" || $row['e2_type'] == "image/png") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else if ($row['e3_type'] == "video/mp4") {
                                                                echo '<br>';
                                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Video';
                                                            } else if ($row['e3_type'] == "application/pdf") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Other';
                                                            }
                                                        } ?>
                                                    </a>
                                                </div>

                                                <div class="card col-md-2 text-center " style="border:none;">
                                                    <a href="evidence.php?id=<?php echo $complaint_id; ?>&evidence=4" style="text-decoration: none;color: black;">
                                                        <?php if ($row['evidence4'] != null) {
                                                            if ($row['e4_type'] == "image/jpeg" || $row['e4_type'] == "image/png") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else if ($row['e4_type'] == "video/mp4") {
                                                                echo '<br>';
                                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Video';
                                                            } else if ($row['e4_type'] == "application/pdf") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Other';
                                                            }
                                                        } ?>
                                                    </a>
                                                </div>

                                                <div class="card col-md-2 text-center " style="border:none;">
                                                    <a href="evidence.php?id=<?php echo $complaint_id; ?>&evidence=5" style="text-decoration: none;color: black;">

                                                        <?php if ($row['evidence5'] != null) {
                                                            if ($row['e5_type'] == "image/jpeg" || $row['e5_type'] == "image/png") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else if ($row['e5_type'] == "video/mp4") {
                                                                echo '<br>';
                                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Video';
                                                            } else if ($row['e5_type'] == "application/pdf") {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Image';
                                                            } else {
                                                                echo '<br>';
                                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">';
                                                                echo '</i>';
                                                                echo '<br>';
                                                                echo 'Other';
                                                            }
                                                        } ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>


                            <input type="button"  translate="no"  name="previous" class="previous action-button-previous" value="Previous" />


                        </fieldset>


                    </div>

                </div>
            </div>
        </div><br><br>
    </div>
</div>

<?php
require_once 'footer.php';
?>