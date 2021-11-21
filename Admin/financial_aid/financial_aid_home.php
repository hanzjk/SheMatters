<?php
require_once 'header.php';
$query_applications = "SELECT state, count(*) as number FROM applications GROUP BY state";
$result_applications = mysqli_query($link, $query_applications);

$pending = "SELECT  COUNT(state) FROM applications WHERE  state= 'Pending'";
$result = mysqli_query($link, $pending);
$pending_count = mysqli_fetch_assoc($result);
$pendingCount = $pending_count["COUNT(state)"];


$ongoing = "SELECT  COUNT(state) FROM applications WHERE  state= 'Ongoing'";
$result = mysqli_query($link, $ongoing);
$ongoing_count = mysqli_fetch_assoc($result);
$ongoingCount = $ongoing_count["COUNT(state)"];


$closed = "SELECT  COUNT(state) FROM applications WHERE  state= 'Closed'";
$result = mysqli_query($link, $closed);
$closed_count = mysqli_fetch_assoc($result);
$closedCount = $closed_count["COUNT(state)"];

$rejected = "SELECT  COUNT(state) FROM applications WHERE  state= 'Rejected'";
$result = mysqli_query($link, $rejected);
$rejected_count = mysqli_fetch_assoc($result);
$rejectedCount = $rejected_count["COUNT(state)"];

?>

<style>
    .card {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);

    }

    .card-box {

        color: #fff;
        height: 140px;
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
    }

    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }

    .bg-blue {
        background-color: #00308F !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }

    .bg-orange {
        background-color: #f39c12 !important;
    }

    .bg-red {
        background-color: #d9534f !important;
    }


    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 2px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }

    
  

    .scroll {
    max-height: 700px;
    overflow-y: auto;
    overflow-x: auto;

    }
    .pagination,
div.dataTables_wrapper div.dataTables_filter label,
div.dataTables_wrapper div.dataTables_length select,
div.dataTables_wrapper div.dataTables_length label,
div.dataTables_wrapper div.dataTables_filter,
table.dataTable td.dataTables_empty,
table.dataTable th.dataTables_empty,
div.dataTables_wrapper div.dataTables_info {
    font-size: 12px;
}

</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['State', 'Number'],
            <?php
            while ($row_appli = mysqli_fetch_array($result_applications)) {
                echo "['" . $row_appli["state"] . "', " . $row_appli["number"] . "],";
            }
            ?>
        ]);
        var options = {
            pieHole: 0.5,
            chartArea: {
                left: 10,
                top: 20,
                width: "100%",
                height: "100%"
            },
            colors: ['#E52B50', '#F08080', '#a71930', '#F08080']




        };
        var chart = new google.visualization.PieChart(document.getElementById('applications'));
        chart.draw(data, options);
    }
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css" />
<div class="justify-content-center">


    <div class="row  ">
        <!--Main Content-->
        <div class="col-md-3 mb-2">

            <div class="card-box bg-blue col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $pendingCount; ?> </h3>
                    <p> New Applications </p>
                </div>

                <a href="pending-applications.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 mb-2">

            <div class="card-box bg-orange col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $ongoingCount; ?> </h3>
                    <p> Ongoing Applications </p>
                </div>

                <a href="ongoing-applications.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="card-box bg-green col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $closedCount; ?> </h3>
                    <p> closed Applications </p>
                </div>

                <a href="closed-applications.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card-box bg-red col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $rejectedCount; ?> </h3>
                    <p> Rejected Applications </p>
                </div>

                <a href="rejected-applications.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <a href="donors.php" style="text-decoration: none;">
            <div class="card">
                <div class="card-body text-center" style="text-decoration: none;">
                    <div class="row">
                        <div class="col-lg-6 border-right">

                            <h1 style="color: rgb(218,27,74);">Rs
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

                                ?> </h1>
                            <h6 style="text-decoration: none;color: black;">Total Amount Raised</h6>
                        </div>

                        <div class="col-lg-6">
                            <h1 style="color: rgb(218,27,74);">
                                <?php

                                $res1 = mysqli_query($link, "SELECT COUNT(DISTINCT donator_id) FROM donations ");
                                $row_s1 = mysqli_fetch_row($res1);
                                $sum1 = $row_s1[0];
                                if ($sum1 > 0)
                                    echo $sum1;
                                else {
                                    $sum1 = 0;
                                    echo 0;
                                }

                                ?>
                            </h1>
                            <h6 style="text-decoration: none;color: black;">Donors</h6>
                        </div>
                    </div>


                </div>
            </div>
                            </a>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card  scroll "  id="style-2">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">ONGOING APPLICATIONS</p>
                    <hr>




                    <?php

                    $sql_a = "SELECT * FROM applications WHERE  state='Ongoing'";
                    $result_a = mysqli_query($link, $sql_a);
                    $num_rows_a = mysqli_num_rows($result_a);

                    if ($num_rows_a > 0) { ?>
                        <table class="table table-hover table-sm   table-borderless " id="myTable">
                            <thead class="">
                                <tr>
                                    <th>Applicant </th>

                                    <th>Status</th>

                                </tr>
                            </thead>


                            <?php while ($row_a = mysqli_fetch_array($result_a)) { ?>
                                <tr>
                                    <td class="text-nowrap"><a href="View-Application.php?application_id=<?php echo $row_a['application_id']?>&action=ongoing" style="text-decoration: none;color: black;">



                                        <?php

                                        $sql_appicant = "SELECT * FROM users WHERE  id='" . $row_a['applicant_id'] . "'";
                                        $records_applicant = mysqli_query($link, $sql_appicant);
                                        $data_applicant = mysqli_fetch_assoc($records_applicant);
                                        $result_A = $link->query("SELECT photo FROM users WHERE  id='" . $data_applicant['id'] . "'");


                                        if ($result_A->num_rows > 0 && $data_applicant['photo'] != null) { ?>
                                            <?php while ($rowa = $result_A->fetch_assoc()) { ?>
                                                <img src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($rowa['photo']); ?>" />
                                            <?php } ?>
                                        <?php } else { ?>
                                            <img src="../assets/images/user2.jpg" alt="Image">
                                        <?php } ?>


                                        <?php

                                        echo '&nbsp';
                                        echo '&nbsp';
                                        echo $data_applicant['name'];
                                        echo '&nbsp';
                                        echo '&nbsp';
                                        ?>

</a>
                                    </td>

                                    <td class="w-100">
                                        <?php

                                        $res = mysqli_query($link, "SELECT SUM(amount) FROM donations WHERE application_id='" . $row_a['application_id'] . "'");
                                        $row_s = mysqli_fetch_row($res);
                                        $sum = $row_s[0];
                                        if ($sum <= 0)
                                            $sum = 0;

                                        ?>


                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="<?php echo ($sum / $row_a['amount']) * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo strval(($sum / $row_a['amount']) * 100) . '%' ?>"></div>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                            <tbody>


                            </tbody>
                        </table>




                    <?php } else { ?>
                        <div class="text-center">No Ongoing Causes</div>

                    <?php } ?>
                </div>

            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">STATISTICS ON FINANCIAL AID APPLICATIONS</p>
                    <hr>


                    <div id="applications" style="width: 100%;"></div>
                </div>

            </div>

        </div>


    </div>



</div>






<?php
require_once 'footer.php';
?>