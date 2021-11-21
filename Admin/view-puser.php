<?php
require_once 'header.php';

if (isset($_GET['pid'])) {
    $puser_id = $_GET['pid'];
}


$sql = "SELECT  *  FROM  police_users WHERE  police_id='" . $puser_id . "'";
$query = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($query);


$inq1 = "SELECT  COUNT(complaint_id)  FROM complaints WHERE  police_id='" . $puser_id . "' ";
$result_inq1 = mysqli_query($link, $inq1);
$inq_count1 = mysqli_fetch_assoc($result_inq1);
$InqCount1 = $inq_count1["COUNT(complaint_id)"];






?>
<style>
    .comp {
        box-shadow: 0 0 10px 1px rgba(201, 194, 194, 0.2);
    }
</style>


<style>
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

    .social-links li a {
        border-radius: 50%;
        color: rgba(121, 121, 121, .8);
        display: inline-block;
        height: 30px;
        line-height: 27px;
        border: 2px solid rgba(121, 121, 121, .5);
        text-align: center;
        width: 30px
    }

    .social-links li a:hover {
        color: #797979;
        border: 2px solid #797979
    }

    .thumb-lg {
        height: 88px;
        width: 88px;
    }

    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
    }

    .text-pink {
        color: #ff679b !important;
    }

    .btn-rounded {
        border-radius: 2em;
    }

    .text-muted {
        color: #98a6ad !important;
    }


    .status {
        border-radius: 50px;
        line-height: 14px;
        font-size: 12px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
        border: none;
    }


    .badge {
        position: absolute;
        font-size: small;
        margin-left: -10px;
        margin-top: -10px;
        color: #32cd32;
    }



    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }

    .modal-confirm {
        color: black;
        font-size: 14px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -50px;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        z-index: 9;
        background: #fff;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        position: relative;
        top: 3px;
    }


    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }
</style>

<style>
    .modal-delete {
        color: #000;
       
    }

    .modal-delete .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-delete .modal-header {
        background: #800020;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-delete h4 {
        text-align: center;
        font-size: 20px;
        margin: 10px 0;
    }

    .modal-delete .form-control,
    .modal-delete .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-delete .close:hover {
        opacity: 0.8;
    }

    .modal-delete .icon-box1 {
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

    .modal-delete .icon-box1 i {
        font-size: 58px;
        margin: -2px 0 0 -2px;
    }

    .modal-delete.modal-dialog {
        margin-top: 80px;
    }

    .modal-delete .btn,
    .modal-delete .btn:active {
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

    .modal-delete .btn:hover,
    .modal-delete .btn:focus {
        background: #002D62 !important;
        outline: none;
    }

    #msform fieldset{
    box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }

  
    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }

    
  

    .scroll {
    max-height:600px;
    overflow-y: auto;

    }

 
</style>

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card comp">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    
                        <img src="assets/images/user2.jpg" alt="Image" style="border-radius: 50%; width: 120px;">
                   

                    <div class="mt-3">
                        <h4><?php echo $row['police_name'] ?></h4>
                        <p class="text-secondary mb-1"><i class=" mdi mdi-account-circle"></i>&nbsp;<?php echo $row['police_username'] ?></p>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete"> Delete Account</button>

                            <!-- Modal HTML -->
                            <div id="myModal_delete" class="modal fade col-12">
                                <div class="modal-dialog modal-delete">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <div class="icon-box1">
                                                <i class="fa fa-close"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4>Are you sure ?</h4>
                                            <p>Do you really want to delete this account ? This process cannot be undone</p>
                                            <a href="delete_police.php?id=<?php echo $row['police_id'] ?>"><button class="btn " style="background-color: #800020;">Delete</button></a>
                                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 comp">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-phone" aria-hidden="true"></i> Contact</h6>
                    <span class="text-secondary"><?php echo $row['police_contact'] ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-envelope" aria-hidden="true"></i> Email</h6>
                    <span class="text-secondary"><?php echo $row['police_username'] ?></span>
                </li>

            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card comp mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Police Station</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $row['police_name'] ?>
                    </div>
                </div>
                <hr>
            
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $row['police_username'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Contact No</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $row['police_contact'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $row['police_address'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">District</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $row['police_district'] ?>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Joined</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo date('d M Y H:i:s', strtotime($row['created_at'])); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-12">

        <div class="card mt-3 scroll "  id="style-2">
            <div id="style-2">

                <div class="card-body">

                    <p style="font-size: 15px;font-weight: bold;">RECEIVED COMPLAINTS</p>
                    <hr>
                    <?php if ($InqCount1 > 0) { ?>
                        <table class="table table-hover table-sm  table-striped text-center  table-borderless">
                            <thead class="">
                                <tr>
                                    <th scope="col">Complaint </th>
                                    <th scope="col">Complainant </th>
                                    <th scope="col">Filed On</th>
                                    <th scope="col">Status </th>



                                </tr>
                            </thead>

                            <?php
                            $con = mysqli_connect("localhost", "root", "", "project");

                            $sql = "SELECT * FROM complaints WHERE police_id='" . $puser_id . "' ";
                            $result = mysqli_query($con, $sql);


                            while ($row_a = mysqli_fetch_array($result)) {

                                $sql_name = "SELECT * FROM users WHERE  id='" . $row_a['complainant_id'] . "'";
                                $records_name = mysqli_query($link, $sql_name);
                                $data_name = mysqli_fetch_assoc($records_name);  


                            ?>

                                <tr>
                                    <td> <?php echo $row_a['title'] ?> </td>
                                    <td> <?php echo $data_name['name'] ?> </td>
                                    <td>

                                        <?php
                                        echo date('d M Y ', strtotime($row_a['created_at']));

                                        ?>

                                    </td>
                                    <td>

                                        <?php if ($row_a['state'] == "Ongoing") { ?>

                                            <button class="status" style="background-color: #00308F;outline:none;"> <?php
                                                                                                                    echo 'Processing';
                                                                                                                    ?></button>
                                        <?php } ?>


                                        <?php if ($row_a['state'] == "Ongoing_Currently") { ?>

                                            <button class="status" style="background-color: #f39c12;outline:none;"> <?php
                                                                                                                    echo 'Ongoing';
                                                                                                                    ?></button>
                                        <?php } ?>


                                        <?php if ($row_a['state'] == "Closed") { ?>

                                            <button class="status" style="background-color: #00a65a;outline:none;"> <?php
                                                                                                                    echo 'Closed';
                                                                                                                    ?></button>
                                        <?php } ?>


                                        <?php if ($row_a['state'] == "Rejected") { ?>

                                            <button class="status" style="background-color: #d9534f; outline:none;"> <?php
                                                                                                                        echo $row_a['state'];
                                                                                                                        ?></button>
                                        <?php } ?>


                                    </td>


                                </tr>

                            <?php
                            }
                            mysqli_close($con);

                            ?>
                        </table><?php } else { ?>
                        Haven't received any complaints yet
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once 'footer.php';
?>