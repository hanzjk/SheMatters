<?php
require_once 'header.php';

$district = mysqli_query($link, "SELECT DISTINCT victim_dist, COUNT(victim_dist) as count FROM complaints GROUP BY victim_dist ORDER BY count DESC");

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
<style>
 

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


    .badge {
        position: absolute;
        font-size: small;
        margin-left: -10px;
        margin-top: -10px;
        color: red;
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

    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>
<div class="row ">
<div class="col-lg-8 mt-3 mx-auto">
            <div class="card comp">
                <div class="card-body">
                    <hr>

                    <div id="district" style="width: 100%;"></div>
                </div>

            </div>
        </div>
</div>
<div class="row card comp mt-3" style="background-color:#fff;  border: 1px solid #e8eef1;">
    <div class="accordion" id="accordionExample">

        <?php
        $con = mysqli_connect("localhost", "root", "", "project");

        $sql = "SELECT DISTINCT victim_dist FROM complaints";
        $result = mysqli_query($con, $sql);
        $count = 0;

        while ($row = mysqli_fetch_array($result)) {
            $string = $row['victim_dist'];
        ?>
            <div class="card">
                <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target=<?php echo '#', $string ?> aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                            <?php echo $row['victim_dist'] ?> District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                        </button>
                    </h2>
                </div>

                <div id=<?php echo $string ?> class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                        <table id="myTable1" class="table table-hover text-center table-striped  ">
                            <thead>
                            
                                <tr>
                                    <th scope="col">Complainant</th>
                                    <th scope="col">Police Station </th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <?php
                            $sql1 = "SELECT * FROM complaints WHERE victim_dist='" . $row['victim_dist']  . "'";
                            $records_det = mysqli_query($link, $sql1);



                            while ($row_det = mysqli_fetch_array($records_det)) {
                            ?>



                                <tr>


                                    <td>
                                        <?php
                                        $sql1 = "SELECT * FROM users WHERE id='" . $row_det['complainant_id']  . "'";
                                        $records_name = mysqli_query($link, $sql1);
                                        $name = mysqli_fetch_assoc($records_name);

                                        echo $name['name'];

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($row_det['state'] == 'Rejected') {
                                            echo '-';
                                        } else if ($row_det['state'] == 'Pending') {
                                            echo '-';
                                        } else {
                                            $sql1 = "SELECT * FROM police_users WHERE police_id='" . $row_det['police_id']  . "'";
                                            $records_name = mysqli_query($link, $sql1);
                                            $name = mysqli_fetch_assoc($records_name);

                                            echo $name['police_name'];
                                        }


                                        ?>
                                    </td>

                                    <td>

                                        <?php if ($row_det['state'] == "Pending") { ?>

                                            <button class="status" style="background-color: #00308F;outline: none;"> <?php
                                                                                                                        echo $row_det['state'];
                                                                                                                        ?></button>
                                        <?php } ?>


                                        <?php if ($row_det['state'] == "Ongoing" || $row_det['state'] == "Ongoing_Currently") { ?>

                                            <button class="status" style="background-color: #f39c12;outline: none;"> <?php
                                                                                                                        echo 'Ongoing';
                                                                                                                        ?></button>
                                        <?php } ?>


                                        <?php if ($row_det['state'] == "Closed") { ?>

                                            <button class="status" style="background-color: #00a65a;outline: none;"> <?php
                                                                                                                        echo $row_det['state'];
                                                                                                                        ?></button>
                                        <?php } ?>


                                        <?php if ($row_det['state'] == "Rejected") { ?>

                                            <button class="status" style="background-color: #d9534f;outline: none;"> <?php
                                                                                                                        echo $row_det['state'];
                                                                                                                        ?></button>
                                        <?php } ?>

                                    </td>
                                </tr>



                            <?php
                            }


                            ?>

                        </table>

                    </div>
                </div>
            </div>

        <?php } ?>

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

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.0/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable1').DataTable({
            responsive: true

        });

    });
</script>


</body>

</html>