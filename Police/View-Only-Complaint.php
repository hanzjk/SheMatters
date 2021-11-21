<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];

$profile = mysqli_query($link, "SELECT * FROM complaints WHERE complaint_id ='" . $complaint_id . "'");
$row = mysqli_fetch_assoc($profile);

$complainant_id= $row['complainant_id'];
$profile1 = mysqli_query($link, "SELECT * FROM users WHERE id ='" . $complainant_id . "'");
$data = mysqli_fetch_assoc($profile1);

?>
<link rel="stylesheet" href="../user/assets/complaint/style.css">
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

    #msform fieldset{
    box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }

  

 
</style>
<div class="row float-right">
    <a href="additional_details_view.php?complaint_id=<?php echo $row['complaint_id'] ?>">
<button class="btn btn-info ">Additional Details</button></a>
</div>
<br>
<div class="row mt-3">
  

    <!--Main Content-->
    <div class="col-12">
            <div id="msform" >
             
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
                                            <input type="text" class="form-control" id="v_address"   value="<?php echo $row['victim_addr'] ?>"readonly/>

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="required">District</label>
                                            <input type="text" class="form-control" id="v_address"   value="<?php echo $row['victim_dist'] ?>"readonly/>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="v_contact">Contact Number</label>
                                            <input type="text" class="form-control" name="v_contact" id="v_contact" value="<?php echo $row['victim_contact'] ?>"readonly/>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="v_email">Email Address</label>
                                            <input type="email" class="form-control" name="v_email" id="v_email" value="<?php echo $row['victim_email'] ?>"readonly />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="v_nic">NIC Number</label>
                                            <input type="text" class="form-control" name="v_nic" id="v_nic" value="<?php echo $row['victim_nic']; ?>"readonly />
                                            <span id="help_nic" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="v_age">Age</label>
                                            <input type="number" class="form-control" name="v_age" id="v_age" value="<?php echo $row['victim_age'] ?>"readonly/>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>



                    <input type="button" name="next" class="next action-button" value="Next" />
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
                                        <input type="text" class="form-control" id="r_name" name="r_name" value="<?php echo $row['res_name'] ?>"readonly>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="r_address">Address</label>
                                            <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_addr'] ?>"readonly />
                                        </div>


                                        <div class="form-group col-lg-6">
                                            <label class="">District</label>
                                            <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_dist'] ?>"readonly />


                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="required">Sex</label>
                                            <input type="text" class="form-control" id="r_address" name="r_address" value="<?php echo $row['res_sex'] ?>"readonly />
                                

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="r_age" class="required">Age</label>
                                            <input type="number" class="form-control" name="r_age" id="r_age" value="<?php echo $row['res_age'] ?>"readonly />
                                            <span id="help_rage" class="text-danger"></span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="r_description">Physical Description of Accused person</label>
                                        <textarea class="form-control" id="r_description" rows="5" placeholder="<?php echo $row['res_desc'] ?>"readonly></textarea>
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
                                            <input type="text" class="form-control " id="w_name1" name="w_name1" value="<?php echo $row['wit1_name'] ?>"readonly>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="w_contact1">Contact Number</label>
                                            <input type="text" class="form-control" name="w_contact1" id="w_contact1" value="<?php echo $row['wit1_contact'] ?>"readonly />

                                        </div>

                                    </div>
                                    <div class="card-header text-center" style="border: none;height: 40px;">Witness 02 </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="w_name2">Name </label>
                                            <input type="text" class="form-control" id="w_name2" name="w_name2" value="<?php echo $row['wit2_name'] ?>"readonly>
                                            <span id="help_wname2" class="text-danger"></span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="w_contact2">Contact Number</label>
                                            <input type="text" class="form-control" name="w_contact2" id="w_contact2" value="<?php echo $row['wit2_contact'] ?>"readonly />
                                            <span id="help_wcontact2" class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <fieldset data-step="3">
                    <h2 class="fs-title text-center">Incident & Evidence</h2>

                    <div class="card">
                        <div class="card-header "> Details of the incident</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="i-date" class="required">Date of the incident</label>
                                    <input type="date" class="form-control" name="i_date" id="i_date" value="<?php echo $row['incident_date'] ?>"readonly/>

                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="i_location" class="required">Location where the incident occured</label>
                                    <input type="text" class="form-control" name="i_location" id="i_location" placeholder="Location"  value="<?php echo $row['incident_location'] ?>"readonly />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="i_description_state" class="required">Physical & Emotional State of Victim (Describe any cuts, bruises, lacerations, behaviour, and mood)</label>
                                <textarea class="form-control" id="i_description_state" rows="5" name="i_description_state" placeholder="<?php echo $row['victim_state'] ?>"readonly></textarea>

                            </div>
                            <div class="form-group">
                                <label for="i_description" class="required">Brief Description of Incident</label>
                                <textarea class="form-control" id="i_description" rows="7" name="i_description" placeholder="<?php echo $row['incident_desc'] ?>"readonly></textarea>

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
                                    <div class="card col-md-2 text-center " style=" border: none;" >
                                    <a href="evidence.php?id=<?php echo $complaint_id;?>&evidence=1" style="text-decoration: none;color: black;">
                                       <?php if ($row['evidence1']!=null){
                                            if($row['e1_type']=="image/jpeg" || $row['e1_type']=="image/png"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';

                                            }

                                            else if ($row['e1_type']=="video/mp4"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-video-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Video';
                                            }


                                            else if ($row['e1_type']=="application/pdf"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Pdf';
                                            }
                                            else{
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Other';
                                            }


                                       }?>
                                    </a>
                                    </div>

                                    <div class=" card col-md-2 text-center " style="border:none;">
                                    <a href="evidence.php?id=<?php echo $complaint_id;?>&evidence=2" style="text-decoration: none;color: black;">
                                    <?php if ($row['evidence2']!=null){
                                            if($row['e2_type']=="image/jpeg" || $row['e2_type']=="image/png"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';

                                            }

                                            else if ($row['e2_type']=="video/mp4"){
                                                echo '<br>';
                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<ber>';
                                                echo 'Video';
                                            }


                                            else if ($row['e2_type']=="application/pdf"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';
                                            }
                                            else{
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Other';
                                            }
                                       }?>
                                    </a>
                                    </div>

                                    <div class="card col-md-2 text-center "  style="border:none;">
                                    <a href="evidence.php?id=<?php echo $complaint_id;?>&evidence=3" style="text-decoration: none;color: black;">
                                    <?php if ($row['evidence3']!=null){
                                            if($row['e3_type']=="image/jpeg" || $row['e2_type']=="image/png"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';

                                            }

                                            else if ($row['e3_type']=="video/mp4"){
                                                echo '<br>';
                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Video';
                                            }


                                            else if ($row['e3_type']=="application/pdf"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';
                                            }
                                            else{
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Other';
                                            }


                                       }?>
                                    </a>
                                    </div>

                                    <div class="card col-md-2 text-center "  style="border:none;">
                                    <a href="evidence.php?id=<?php echo $complaint_id;?>&evidence=4" style="text-decoration: none;color: black;">
                                    <?php if ($row['evidence4']!=null){
                                            if($row['e4_type']=="image/jpeg" || $row['e4_type']=="image/png"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';

                                            }

                                            else if ($row['e4_type']=="video/mp4"){
                                                echo '<br>';
                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Video';
                                            }


                                            else if ($row['e4_type']=="application/pdf"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';
                                            }
                                            else{
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Other';
                                            }


                                       }?>
                                    </a>
                                    </div>

                                    <div class="card col-md-2 text-center "  style="border:none;">
                                    <a href="evidence.php?id=<?php echo $complaint_id;?>&evidence=5" style="text-decoration: none;color: black;">

                                    <?php if ($row['evidence5']!=null){
                                            if($row['e5_type']=="image/jpeg" || $row['e5_type']=="image/png"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-picture-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';

                                            }

                                            else if ($row['e5_type']=="video/mp4"){
                                                echo '<br>';
                                                echo  '<i class="fa fa-file-video-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Video';
                                            }


                                            else if ($row['e5_type']=="application/pdf"){
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-pdf-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Image';
                                            }
                                            else{
                                                echo '<br>';
                                                echo   '<i class="fa fa-file-o" style="font-size:40px;color:black">'; echo '</i>';
                                                echo '<br>';
                                                echo 'Other';
                                            }


                                       }?>
                                    </a>
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



        </div>
</div>
    




<?php
require_once 'footer.php';
?>