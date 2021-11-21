<?php
require_once 'header.php';


$tot = "SELECT  COUNT(complaint_id)  FROM complaints WHERE  state='Ongoing_Currently' AND police_id='" . $police_id . "'";
$result_tot = mysqli_query($link, $tot);
$inq_tot = mysqli_fetch_assoc($result_tot);
$InqTot = $inq_tot["COUNT(complaint_id)"];

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>


<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;Ongoing Complaints (<?php echo $InqTot ?>)</span>
            <span class="float-right">Complaint Portal &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Ongoing Complaints</span>
        </div>
    </div>
</div>

<div class="row mt-3" style="background-color:#fff;  border: 1px solid #e8eef1;">


    <div class="col-12 mx-auto comp table-responsive">

        <!--Main Content-->
        <br>
        <table id="myTable" class="table table-hover text-center table-striped">
            <thead>
                <tr>
                    <th class="d-none">ID</th>
                    <th scope="col">Complaint Title</th>
                    <th scope="col">Filed On</th>
                    <th scope="col">Received On</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "project");

            $sql = "SELECT complaint_id,title,created_at FROM complaints WHERE state='Ongoing_Currently' AND police_id='" . $police_id . "'";
            $result = mysqli_query($con, $sql);
            $count = 0;

            while ($row = mysqli_fetch_array($result)) {
                $sql2 = "SELECT confirmed_date FROM police_complaints WHERE complaint_id='" . $row['complaint_id'] . "'";
                $result2 = mysqli_query($con, $sql2);
                $rowd = mysqli_fetch_assoc($result2);


                $inq = "SELECT  COUNT(reply)  FROM inquiry_police WHERE  complaint_id='" . $row['complaint_id'] . "' AND seen=0";
                $result_inq = mysqli_query($link, $inq);
                $inq_count = mysqli_fetch_assoc($result_inq);
                $InqCount = $inq_count["COUNT(reply)"];


                $inq1 = "SELECT  COUNT(reply)  FROM inquiry_police WHERE  complaint_id='" . $row['complaint_id'] . "' AND seen=1";
                $result_inq1 = mysqli_query($link, $inq1);
                $inq_count1 = mysqli_fetch_assoc($result_inq1);
                $InqCount1 = $inq_count1["COUNT(reply)"];

            ?>

                <tr>

                    <td class="c_id d-none"><?php echo $row['complaint_id'] ?> </td>

                    <td><?php echo $row['title'] ?> </td>
                    <td>

                        <?php
                        echo date('d M Y H:i:s', strtotime($row['created_at']));

                        ?>

                    </td>


                    <td>

                        <?php
                        echo date('d M Y H:i:s', strtotime($rowd['confirmed_date']));

                        ?>

                    </td>



                    <td>



                        <a href="View-Complaint-Ongoing.php?complaint_id=<?php echo $row['complaint_id'] ?>" style="text-decoration: none;">
                            <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                        </a>
                        <a href="inquires.php?complaint_id=<?php echo $row['complaint_id'] ?>" style="text-decoration: none;">
                            <span class="btn btn-secondary"> Inquire&nbsp;<i class="fa fa-comments" aria-hidden="true"></i></span>
                        </a>

                        <?php if ($InqCount > 0) { ?>

                            &nbsp;&nbsp;
                            <a href="inquires.php?complaint_id=<?php echo $row['complaint_id'] ?>&action=seen" id="button">
                                <i class="fa fa-envelope" style="color: black;font-size: large;">
                                    <span class='badge badge-pill'><i class="fa fa-circle" id="dot"></i></span></i></a>
                        <?php } else if ($InqCount1 > 0) { ?>
                            &nbsp;&nbsp;
                            <a href="inquires.php?complaint_id=<?php echo $row['complaint_id'] ?>&action=seen" id="button">
                                <i class="fa fa-envelope" style="color: black;font-size: large;">
                                    <span class='badge badge-pill'><i class="fa fa-circle" id="dot" style="color:#32cd32;"></i></span></i></a>
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
        <br><br>
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
<script src="assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="assets/Header/js/off-canvas.js"></script>
<script src="assets/Header/js/template.js"></script>
<!-- End custom js for this page-->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true

        });

    });
</script>

</script>



</body>

</html>