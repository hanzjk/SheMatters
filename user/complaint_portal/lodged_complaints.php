<?php
require_once 'header.php';

?>
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
                        <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;My Complaints </span>
                        <span class="float-right">Complaint Portal &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;My Complaints</span>
                    </div>
                </div>
            </div>


            <div class="row mt-4" style="background-color:#fff;  border: 1px solid #e8eef1;">


                <div class="col-12 comp">


                    <div class="col-12 mx-auto table-responsive">


                        <!--Main Content-->

                        <table id="myTable" class="table table-hover  table-striped text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col">Complaint Title</th>
                                    <th scope="col">Filed On</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <br>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "project");

                            $sql = "SELECT complaint_id,created_at,title,state FROM complaints WHERE complainant_id='" . $data['id'] . "' ";
                            $result = mysqli_query($con, $sql);


                            while ($row = mysqli_fetch_array($result)) {
                                $InqCount = 0;

                                $inq = "SELECT  COUNT(complaint_id)  FROM inquiry WHERE  complaint_id='" . $row['complaint_id'] . "' ";
                                $result_inq = mysqli_query($link, $inq);
                                $inq_count = mysqli_fetch_assoc($result_inq);
                                $InqCount = $inq_count["COUNT(complaint_id)"];

                     

                                $inq1 = "SELECT  COUNT(complaint_id)  FROM inquiry WHERE  complaint_id='" . $row['complaint_id'] . "' AND reply IS NULL";
                                $result_inq1 = mysqli_query($link, $inq1);
                                $inq_count1 = mysqli_fetch_assoc($result_inq1);
                                $InqCount1 = $inq_count1["COUNT(complaint_id)"];

                                
                                $inq1p = "SELECT  COUNT(complaint_id)  FROM inquiry_police WHERE  complaint_id='" . $row['complaint_id'] . "' AND reply IS NULL";
                                $result_inq1p = mysqli_query($link, $inq1p);
                                $inq_count1p = mysqli_fetch_assoc($result_inq1p);
                                $InqCount1p = $inq_count1p["COUNT(complaint_id)"];


                            ?>

                                <tr>
                                    <td> <?php echo $row['title'] ?> </td>
                                    <td>

                                        <?php
                                        echo date('d M Y H:i:s', strtotime($row['created_at']));

                                        ?>

                                    </td>
                                    <td>

                                        <?php if ($row['state'] == "Pending") { ?>

                                            <button class="status" style="background-color: #00308F;outline: none;"> <?php
                                                                                                                        echo $row['state'];
                                                                                                                        ?></button>
                                        <?php } ?>


                                        <?php if ($row['state'] == "Ongoing" || $row['state'] == "Ongoing_Currently" ) { ?>

                                            <button class="status" style="background-color: #f39c12;outline: none;"> <?php
                                                                                                                        echo 'Processing';
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

                                    </td>

                                    <td>

                                        <a href="View-Complaint.php?complaint_id=<?php echo $row['complaint_id'] ?>" style="text-decoration: none;">
                                            <span class="btn btn-secondary"> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                        </a>

                                        <?php if ($InqCount1 > 0 || $InqCount1p>0) { ?>

                                            &nbsp;&nbsp;
                                            <a href="View-Complaint.php?complaint_id=<?php echo $row['complaint_id'] ?>" id="button">
                                                <i class="fa fa-envelope" style="color: black;font-size: large;">
                                                    <span class='badge badge-pill'><i class="fa fa-circle" id="dot" style="color: red;"></i></span></i></a>

                                        <?php } else if ($InqCount > 0) { ?>
                                            &nbsp;&nbsp;
                                            <a href="View-Complaint.php?complaint_id=<?php echo $row['complaint_id'] ?>" id="button">
                                                <i class="fa fa-envelope" style="color: black;font-size: large;">
                                                    <span class='badge badge-pill'><i class="fa fa-circle" id="dot"></i></span></i></a>
                                        <?php } else { ?>
                                            &nbsp;&nbsp;
                                            <a><i class="fa fa-envelope" style="color: transparent;"></i></a>

                                        <?php } ?>



                                    </td>






                                </tr>

                            <?php
                            }
                            mysqli_close($con);

                            ?>


                        </table>
                    </div>
                    <br>
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