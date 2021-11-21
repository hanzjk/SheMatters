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


$district = mysqli_query($link, "SELECT DISTINCT victim_dist, COUNT(victim_dist) as count FROM complaints GROUP BY victim_dist ORDER BY count DESC");






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
            while ($row_compalint = mysqli_fetch_array($result_complaint)) {
                echo "['" . $row_compalint["state"] . "', " . $row_compalint["number"] . "],";
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
            colors: ['#002D62', '#4B9CD3', '#48D1CC', '#6F00FF']




        };
        var chart = new google.visualization.PieChart(document.getElementById('complaints'));
        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['No of Complaints', 'District'],


            <?php
            while ($row_district = mysqli_fetch_array($district)) {
                echo "['" . $row_district["victim_dist"] . "', " . $row_district["count"] . "],";
            }
            ?>


        ]);

        var options = {
            bar: {
                groupWidth: "15%"
            },
            legend: {
                position: "none"
            },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('district'));

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
                    <p> New Complaints </p>
                </div>

                <a href="pending-complaints.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="card-box bg-orange col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $ongoingCount; ?> </h3>
                    <p> Ongoing Complaints </p>
                </div>

                <a href="ongoing-complaints.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="card-box bg-green col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $closedCount; ?> </h3>
                    <p> closed Complaints </p>
                </div>

                <a href="closed-complaints.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card-box bg-red col-md-12 text-center mx-auto">
                <div class="inner">
                    <br>
                    <h3> <?php echo $rejectedCount; ?> </h3>
                    <p> Rejected Complaints </p>
                </div>

                <a href="rejected-complaints.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-lg-8 mt-5">
            <a href="complaint_district.php" style="text-decoration: none;">
            <div class="card">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;color: black;">COMPLAINING RATE BASED ON DISTRICT</p>
                    <hr>

                    <div id="district" style="width: 100%;"></div>
                </div>

            </div>
            </a>
        </div>

        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">STATISTICS ON FILED COMPLAINTS</p>
                    <hr>

                    <div id="complaints" style="width: 100%;"></div>
                </div>

            </div>
        </div>


    </div>
</div>


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE MAtters 2021</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- base:js -->
<script src="../assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="../assets/Header/js/off-canvas.js"></script>
<script src="../assets/Header/js/template.js"></script>
<!-- End custom js for this page-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true

        });

} );
</script>


</body>

</html>