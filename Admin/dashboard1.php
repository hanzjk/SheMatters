<?php
require_once 'header.php';


$query_complaint = "SELECT state, count(*) as number FROM complaints GROUP BY state";
$result_complaint = mysqli_query($link, $query_complaint);


$pending = "SELECT  COUNT(state) FROM complaints WHERE  state= 'Pending'";
$result = mysqli_query($link, $pending);
$pending_count = mysqli_fetch_assoc($result);
$pendingCount = $pending_count["COUNT(state)"];


$ongoing = "SELECT  COUNT(state) FROM complaints WHERE  state= 'Ongoing' OR state='Ongoing_Currently'";
$result = mysqli_query($link, $ongoing);
$ongoing_count = mysqli_fetch_assoc($result);
$ongoingCount = $ongoing_count["COUNT(state)"];


$closed = "SELECT  COUNT(state) FROM complaints WHERE  state= 'Closed'";
$result = mysqli_query($link, $closed);
$closed_count = mysqli_fetch_assoc($result);
$closedCount = $closed_count["COUNT(state)"];

$rejected = "SELECT  COUNT(state) FROM complaints WHERE  state= 'Rejected'";
$result = mysqli_query($link, $rejected);
$rejected_count = mysqli_fetch_assoc($result);
$rejectedCount = $rejected_count["COUNT(state)"];


$pendingf = "SELECT  COUNT(state) FROM applications WHERE  state= 'Pending'";
$resultf = mysqli_query($link, $pendingf);
$pending_countf = mysqli_fetch_assoc($resultf);
$pendingCountf = $pending_countf["COUNT(state)"];


$ongoingf = "SELECT  COUNT(state) FROM applications WHERE  state= 'Ongoing'";
$resultf = mysqli_query($link, $ongoingf);
$ongoing_countf = mysqli_fetch_assoc($resultf);
$ongoingCountf = $ongoing_countf["COUNT(state)"];


$closedf = "SELECT  COUNT(state) FROM applications WHERE  state= 'Closed'";
$resultf = mysqli_query($link, $closedf);
$closed_countf = mysqli_fetch_assoc($resultf);
$closedCountf = $closed_countf["COUNT(state)"];

$rejectedf = "SELECT  COUNT(state) FROM applications WHERE  state= 'Rejected'";
$resultf = mysqli_query($link, $rejectedf);
$rejected_countf = mysqli_fetch_assoc($resultf);
$rejectedCountf = $rejected_countf["COUNT(state)"];

?>

<style>
    .card {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);

    }

    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 30px 0;
        padding-left: 30px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #da265c;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .status {
        border-radius: 50px;
        line-height: 20px;
        font-size: 12px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
        border: none;
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


    ul.timeline1>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid blue;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .scroll {
        max-height: 600px;
        overflow-y: auto;
    }
</style>

<style>


    .card-box {

        color: #000;
        height: 140px;
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);

    }

    .card-box .inner {
        padding: 5px 10px 0 10px;
    }

    .card-box .card-box-footer {
        position: absolute;
        left: 0px;
        bottom: 0px;
        text-align: center;
        padding: 3px 0;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        text-decoration: none;
        font-size: small;
    }

    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }

    .bg-blue {
        background-color: #00308F !important;
    }
    .blue{
        color: #00308F !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }
    
    .green {
        color: #00a65a !important;
    }

    .bg-orange {
        background-color: #f39c12 !important;
    }

    .orange {
        color: #f39c12 !important;
    }

    .bg-red {
        
        background-color: #d9534f !important;
    }

    .red {
        color: #d9534f !important;
    }
</style>






<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">


<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
        <p class="font-weight-normal mb-2 text-muted"><?php echo date("F j, Y, g:i a"); ?></p>
    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <div class="card" style="background-color: #2522af; color: #fff;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-folder-edit primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(complaint_id)  FROM complaints  ";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(complaint_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span>Complaints Received</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card" style="background-color: #870d92; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-file-document primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(application_id)  FROM applications  ";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(application_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span>Applications for Financial Aid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="row">
        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner" style="color: #00308F;">
                    <br>
                    <h3> <?php echo $pendingCount ?> </h3>
                    <p> New Complaints </p>
                </div>

                <a href="complaint_portal/pending-complaints.php" class="card-box-footer bg-blue" >View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner orange">
                    <br>
                    <h3> <?php echo $ongoingCount; ?> </h3>
                    <p> Ongoing Complaints </p>
                </div>

                <a href="complaint_portal/ongoing-complaints.php" class="card-box-footer bg-orange">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner green">
                    <br>
                    <h3> <?php echo $closedCount; ?> </h3>
                    <p> closed Complaints </p>
                </div>

                <a href="complaint_portal/closed-complaints.php" class="card-box-footer bg-green">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner red">
                    <br>
                    <h3> <?php echo $rejectedCount; ?> </h3>
                    <p> Rejected Complaints </p>
                </div>

                <a href="complaint_portal/rejected-complaints.php" class="card-box-footer bg-red">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>
        </div>
        
    </div>


    <div class="col-lg-6">
        <div class="row">
        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner" style="color: #00308F;">
                    <br>
                    <h3> <?php echo $pendingCountf ?> </h3>
                    <p> New Applications </p>
                </div>

                <a href="financial_aid/pending-applications.php" class="card-box-footer bg-blue" >View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner orange">
                    <br>
                    <h3> <?php echo $ongoingCountf; ?> </h3>
                    <p> Ongoing Applications </p>
                </div>

                <a href="financial_aid/ongoing-applications.php" class="card-box-footer bg-orange">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>

        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner green">
                    <br>
                    <h3> <?php echo $closedCountf; ?> </h3>
                    <p> closed Applications </p>
                </div>

                <a href="financial_aid/closed-applications.php" class="card-box-footer bg-green">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <div class="col-3">
        <div class="card-box  col-md-12 text-center mx-auto">
                <div class="inner red">
                    <br>
                    <h3> <?php echo $rejectedCountf; ?> </h3>
                    <p> Rejected Applications </p>
                </div>

                <a href="financial_aid/rejected-applications.php" class="card-box-footer bg-red">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>
        </div>
        
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card" style="background-color: #19bb21; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-star primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(story_id)  FROM survivor_stories  ";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(story_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span>Survival Stories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card" style="background-color:#da265c; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-cash-multiple primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <!--?php

                            $sql = "SELECT  COUNT(application_id)  FROM applications  ";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(application_id)"];


                            ?-->
                            <h3>Rs.
                                <?php

                                $res1 = mysqli_query($link, "SELECT SUM(amount) FROM donations ");
                                $row_s1 = mysqli_fetch_row($res1);
                                $sum1 = $row_s1[0];
                                if ($sum1 > 0)
                                    echo $sum1;
                                else {
                                    $sum1 = 0;
                                    echo 0;
                                }

                                ?> </h3>
                            <span>Raised</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class=" row">
    <div class="col-lg-5 ">
        <div class="card scroll " id="style-2">
            <div>
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">LATEST ACTIVITIES</p>
                    <hr>
                    <div class="row">
                        <?php

                        $sql = "SELECT  COUNT(complaint_id)  FROM complaints WHERE state='Pending'  ";
                        $result = mysqli_query($link, $sql);
                        $inq_count1 = mysqli_fetch_assoc($result);
                        $Count = $inq_count1["COUNT(complaint_id)"];




                        if ($Count > 0) {
                        ?>

                            <div class="col-lg-12">
                                <a href="complaint_portal/pending-complaints.php" style="color: black;text-decoration: none;">
                                    <p style="font-weight: bold;"> <?php echo $Count ?> New
                                        <?php if ($Count == 1) {
                                            echo 'Complaint';
                                        } else {
                                            echo 'Complaints';
                                        }
                                        ?>


                                    </p>
                                </a>
                                <ul class="timeline">
                                    <?php

                                    $sql_pending = "SELECT * FROM complaints WHERE state='Pending' ";
                                    $result_pending = mysqli_query($link, $sql_pending);

                                    while ($row_pending = mysqli_fetch_array($result_pending)) {
                                        $sql_name = "SELECT * FROM users WHERE  id='" . $row_pending['complainant_id'] . "'";
                                        $records_name = mysqli_query($link, $sql_name);
                                        $data_name = mysqli_fetch_assoc($records_name);

                                    ?>



                                        <li>
                                            <a href="complaint_portal/View-Complaint.php?complaint_id=<?php echo $row_pending['complaint_id'] ?>" style="color: black;text-decoration: none;"><span style="font-weight: bold;"><?php echo $row_pending['title'] ?></span></a>
                                            <span class="float-right" style="color: gray;"> <?php echo date('d M Y H:i:s', strtotime($row_pending['created_at'])); ?></span>
                                            <p>Filed by <?php echo $data_name['name'] ?> </p>
                                        </li>

                                    <?php } ?>

                                </ul>
                            </div>
                            <br>

                        <?php }

                        $sql = "SELECT  COUNT(application_id)  FROM applications WHERE state='Pending'  ";
                        $result = mysqli_query($link, $sql);
                        $inq_count1 = mysqli_fetch_assoc($result);
                        $Count1 = $inq_count1["COUNT(application_id)"];

                        if ($Count1 > 0) { ?>

                            <div class="col-lg-12">
                                <a href="financial_aid/pending-applications.php" style="color: black;text-decoration: none;">
                                    <p style="font-weight: bold;"> <?php echo $Count1 ?> New Financial Aid
                                        <?php if ($Count1 == 1) {
                                            echo 'Application';
                                        } else {
                                            echo 'Applications';
                                        }
                                        ?>


                                    </p>
                                </a>

                                <ul class="timeline">
                                    <?php

                                    $sql_pending = "SELECT * FROM applications WHERE state='Pending' ";
                                    $result_pending = mysqli_query($link, $sql_pending);

                                    while ($row_pending = mysqli_fetch_array($result_pending)) {
                                        $sql_name = "SELECT * FROM users WHERE  id='" . $row_pending['applicant_id'] . "'";
                                        $records_name = mysqli_query($link, $sql_name);
                                        $data_name = mysqli_fetch_assoc($records_name);

                                    ?>

                                        <li>
                                            <a href="financial_aid/View-Application.php?application_id=<?php echo $row_pending['application_id'] ?>&action=pending" style="color: black;text-decoration: none;">
                                                <span style="font-weight: bold; margin: 0;"> Raise Rs.<?php echo  $row_pending['amount'] ?></span></a>
                                            <span class="float-right" style="color: gray;"> <?php echo date('d M Y H:i:s', strtotime($row_pending['created_at'])); ?></span>
                                            <p>Applied by <?php echo $data_name['name'] ?> </p>
                                        </li>

                                    <?php } ?>

                                </ul>
                            </div>
                        <?php }
                        $sql = "SELECT  COUNT(story_id)  FROM survivor_stories WHERE state='Pending'  ";
                        $result = mysqli_query($link, $sql);
                        $inq_count1 = mysqli_fetch_assoc($result);
                        $Count2 = $inq_count1["COUNT(story_id)"];

                        if ($Count2 > 0) { ?>

                            <div class="col-lg-12">
                                <a href="survivor_stories/storiesq.php" style="color: black;text-decoration: none;">
                                    <p style="font-weight: bold;"> <?php echo $Count2 ?> New
                                        <?php if ($Count2 == 1) {
                                            echo '   Story';
                                        } else {
                                            echo '   Stories ';
                                        }
                                        ?>



                                        Added</p>
                                </a>

                                <ul class="timeline">
                                    <?php

                                    $sql_pending = "SELECT * FROM survivor_stories WHERE state='Pending' ";
                                    $result_pending = mysqli_query($link, $sql_pending);

                                    while ($row_pending = mysqli_fetch_array($result_pending)) {
                                        $sql_name = "SELECT * FROM users WHERE  id='" . $row_pending['survivor_id'] . "'";
                                        $records_name = mysqli_query($link, $sql_name);
                                        $data_name = mysqli_fetch_assoc($records_name);

                                    ?>

                                        <li>
                                            <span class="float-right" style="color: gray;"> <?php echo date('d M Y H:i:s', strtotime($row_pending['created_at'])); ?></span>
                                            <a href="survivor_stories/storiesq.php" style="color: black;text-decoration: none;">
                                                <p>Added by <?php echo $data_name['name'] ?> </p>
                                            </a>
                                        </li>

                                    <?php } ?>

                                </ul>
                            </div>
                        <?php }

                        ?>
                    </div>
                    <?php if ($Count == 0 && $Count1 == 0 && $Count2 == 0) { ?>
                        <div class="text-center">No New Activities</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card  scroll " id="style-2">
            <div id="style-2">

                <div class="card-body">

                    <p style="font-size: 15px;font-weight: bold;">NEW MESSAGES</p>
                    <hr>


                    <?php

                    $sql_reply = "SELECT * FROM inquiry WHERE seen=0 AND reply IS NOT NULL AND complaint_id IN (SELECT complaint_id FROM complaints WHERE state='Pending' OR state='Ongoing') ";
                    $result_reply = mysqli_query($link, $sql_reply);
                    $num_rows = mysqli_num_rows($result_reply);

                    if ($num_rows > 0) { ?>


                        <ul class="timeline timeline1">
                            <?php



                            while ($row_reply = mysqli_fetch_array($result_reply)) {
                                $sql_user = "SELECT * FROM users WHERE  id IN (SELECT complainant_id FROM complaints WHERE complaint_id='" . $row_reply['complaint_id'] . "')";
                                $records_user = mysqli_query($link, $sql_user);
                                $data_user = mysqli_fetch_assoc($records_user);
                                $result_P = $link->query("SELECT photo FROM users WHERE  id='" . $data_user['id'] . "'");

                                $sql_s = "SELECT * FROM complaints WHERE  complaint_id='" . $row_reply['complaint_id'] . "'";
                                $records_s = mysqli_query($link, $sql_s);
                                $data_s = mysqli_fetch_assoc($records_s);

                            ?>



                                <li>


                                    <span class="float-right" style="color: gray;"> <?php echo date('d M Y H:i:s', strtotime($row_reply['reply_date'])); ?></span>

                                    <a href="complaint_portal/inquire.php?complaint_id=<?php echo $row_reply['complaint_id']  ?>&action=seen" style="color: black;text-decoration: none;">

                                        <span> <?php if ($data_user['photo'] != null) { ?>

                                                <img style="width: 30px;border-radius: 50%;" src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($data_user['photo']); ?>" />

                                            <?php } else { ?>
                                                <img src="assets/images/user2.jpg" alt="Image" style="width: 30px;border-radius: 50%;">
                                            <?php } ?></span>&nbsp;<span style="font-weight: bold;"><?php echo $data_user['name'] ?> </span>
                                    </a>
                                    <br>
                                    <span><?php echo $data_s['title'] ?></span>
                                </li>

                            <?php } ?>

                        </ul>


                    <?php } else { ?>
                        <div class="text-center">No New Messages</div>

                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</div>





<?php
require_once 'footer.php';
?>