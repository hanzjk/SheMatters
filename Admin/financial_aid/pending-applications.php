<?php
require_once 'header.php';


$tot = "SELECT  COUNT(application_id)  FROM applications WHERE  state='Pending'";
$result_tot = mysqli_query($link, $tot);
$inq_tot = mysqli_fetch_assoc($result_tot);
$InqTot = $inq_tot["COUNT(application_id)"];

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css"/>
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

    .comp{
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>


<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

  <div class="mt-2 mb-2">
      <span  style="font-size: 20px;font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;New Applications (<?php echo $InqTot?>)</span>
  <span class="float-right">Financial Aid Portal &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i>  &nbsp;&nbsp;New Applications</span>
  </div>
    </div>
</div>

<div class="row mt-3" style="background-color:#fff;  border: 1px solid #e8eef1;">


    <div class="col-12 mx-auto comp">

        <!--Main Content-->
<br>
        <table id="myTable" class="table table-hover text-center table-striped">
            <thead>
                <tr>
                    <th class="d-none">ID</th>
                    <th scope="col">Applicant </th>
                    <th scope="col">Applied On</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "project");

            $sql = "SELECT application_id,applicant_id,created_at FROM applications WHERE state='Pending' ";
            $result = mysqli_query($con, $sql);
            $count = 0;

            while ($row = mysqli_fetch_array($result)) {

                $sql1 = "SELECT * FROM users WHERE id='" . $row['applicant_id']  . "'";
                $records_name = mysqli_query($link, $sql1);
                $name = mysqli_fetch_assoc($records_name);
            ?>

                <tr>

                    <td class="c_id d-none"><?php echo $row['application_id'] ?> </td>

                    <td>

                    <?php $result_P = $link->query("SELECT photo FROM users WHERE  id='" . $row['applicant_id'] . "'");


                        if ($result_P->num_rows > 0 && $name['photo'] != null) { ?>
                            <?php while ($rowp = $result_P->fetch_assoc()) { ?>
                                <img src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($rowp['photo']); ?>" />
                            <?php } ?>
                        <?php } else { ?>
                            <img src="../assets/images/user2.jpg" alt="Image">
                        <?php } ?>
                        &nbsp;
                        
                    <?php echo $name['name'] ?> </td>
                    <td>

                        <?php
                        echo date('d M Y H:i:s', strtotime($row['created_at']));

                        ?>

                    </td>


                    <td>



                        <a href="View-Application.php?application_id=<?php echo $row['application_id'] ?>&action=pending" style="text-decoration: none;">
                            <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                        </a>

                     



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

</script>



</body>

</html>