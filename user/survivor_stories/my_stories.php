<?php
require_once 'header.php';


$tot = "SELECT  COUNT(story_id)  FROM survivor_stories WHERE  survivor_id='" . $data['id'] . "'";
$result_tot = mysqli_query($link, $tot);
$inq_tot = mysqli_fetch_assoc($result_tot);
$InqTot = $inq_tot["COUNT(story_id)"];


$limit = 10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$result = mysqli_query($link, "SELECT * FROM survivor_stories WHERE survivor_id= '" . $data['id'] . "' ORDER BY story_id ASC LIMIT $start_from, $limit");
?>



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

    #mytable tr.odd {
        background: rgba(0, 0, 0, .1);
    }
</style>


<div class="container-fluid page-body-wrapper">

    <div class="main-panel col-12">
        <div class="content-wrapper pb-3">

            <div class="row mt-3" style="margin-top: -10px;">

                <div class="col-12 card comp " style="outline: none;border: none;">

                    <div class="mt-2 mb-2">
                        <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;My Story </span>
                        <span class="float-right">Survivor Stories &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;My Story</span>
                    </div>
                </div>
            </div>

            <div class="row mt-4" style="background-color:#fff;  border: 1px solid #e8eef1;">


                <div class="col-12 mx-auto comp">

                    <!--Main Content-->

                    <table id="myTable" class="table table-hover text-center ">
                        <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th scope="col">Story </th>
                                <th scope="col">Added On</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <br>
                        <?php


                        while ($row = mysqli_fetch_array($result)) {

                            $sql1 = "SELECT * FROM users WHERE id='" . $row['survivor_id']  . "'";
                            $records_name = mysqli_query($link, $sql1);
                            $name = mysqli_fetch_assoc($records_name);
                        ?>

                            <tr>

                                <td class="c_id d-none"><?php echo $row['story_id'] ?> </td>

                                <td data-toggle="collapse" data-target="#collapse<?= $row['story_id'] ?>" class="accordion-toggle">


                                    <a href="#"> View </a>
                                    <?php if ($row['state'] == 'Approved') { ?>
                                        <i class="fa fa-heart ml-3" style="font-size: x-large;color: #e91849;"> </i>
                                        <span><?php echo $row['hearts']; ?></span>
                                    <?php } else { ?>
                                        <i class="fa fa-heart ml-3" style="font-size: x-large;color: #e91849;visibility: hidden;"> </i>
                                        <span style="visibility: hidden;"><?php echo $row['hearts']; ?></span>

                                    <?php } ?>

                                </td>
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




                                    <?php if ($row['state'] == "Approved") { ?>

                                        <button class="status" style="background-color: #00a65a;outline: none;"> <?php
                                                                                                                    echo $row['state'];
                                                                                                                    ?></button>
                                        <?php if ($row['remove'] == 1) { ?>
                                            <span class="btn btn-warning ">Removed</span>


                                    <?php }
                                    } ?>


                                    <?php if ($row['state'] == "Rejected") { ?>

                                        <button class="status" style="background-color: #d9534f;outline: none;"> <?php
                                                                                                                    echo $row['state'];
                                                                                                                    ?></button>
                                    <?php } ?>






                                </td>
                            </tr>

                            <tr class="hiddenRow accordian-body collapse" id="collapse<?= $row['story_id'] ?>">
                                <td colspan="3">

                                    <div class="card">
                                        <div class="card-header ">
                                            <h5>Basic Details </h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group ">
                                                <label for="c_name" class="required float-left">Name</label>
                                                <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Name" value="<?php echo $name['name'] ?>" disabled>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="c_address" class="required float-left">Address</label>
                                                    <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Address" required value="<?php echo $name['homeAddress'] ?>" disabled />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="c_nic" class="required float-left">NIC Number</label>
                                                    <input type="text" class="form-control" name="c_nic" id="c_nic" placeholder="NIC Number" required value="<?php echo $name['nic'] ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="c_email" class="float-left">Email Address</label>
                                                    <input type="email" class="form-control" name="c_email" id="c_email" placeholder="Email Address" value="<?php echo $name['email'] ?>" disabled />
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="c_contact" class="required float-left">Contact Number</label>
                                                    <input type="text" class="form-control" name="c_contact" id="c_contact" placeholder="Contact Number" required value="<?php echo $name['contactNo'] ?>" disabled />
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header ">
                                            <h5>Story</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="required float-left">Do you want to display your details publicly ?</label>
                                                <input class="form-control" placeholder="<?php echo $row['anonymous'] ?>" disabled></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label class="required float-left">Story</label>
                                                <textarea class="form-control" placeholder="<?php echo $row['story'] ?>" disabled></textarea>

                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>



                    </table>


                    <?php
                    $result_db = mysqli_query($link, "SELECT COUNT(story_id) FROM survivor_stories WHERE survivor_id='" . $data['id'] . "'");
                    $row_db = mysqli_fetch_row($result_db);
                    $total_records = $row_db[0];
                    $total_pages = ceil($total_records / $limit);
                    /* echo  $total_pages; */
                    $pagLink = "<div class='row float-right mx-2  mt-3'><ul class='pagination mx-auto'>";
                    if ($page == 1) {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a class='page-link ' style='pointer-events: none; cursor: default; color:#666666' aria-disabled='true' >Previous</a></li>";
                    } else {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='my_stories.php?page=" . ($page - 1) . "' class='page-link' >Previous</a></li>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            $pagLink .= "<li class='page-item active' style='font-size:15px;width:30px;' ><a class='page-link active' href='my_stories.php?page=" . $i . "'>" . $i . "</a></li>";
                        } else {
                            $pagLink .= "<li class='page-item ' style='font-size:15px;width:30px;' ><a class='page-link active' href='my_stories.php?page=" . $i . "'>" . $i . "</a></li>";
                        }
                    }

                    if ($page == $total_pages) {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a aria-disabled='true' style='pointer-events: none; cursor: default; color:#666666'class='page-link ' >Next</a></li>";
                    } else {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='my_stories.php?page=" . ($page + 1) . "' class='page-link ' >Next</a></li>";
                    }


                    echo $pagLink . "</ul></div>";
                    ?>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>






<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="container">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE Matters
                2021</span>
        </div>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->


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

    });
</script>
<script>
    $(document).ready(function() {



        $("tr:visible").each(function(index) {
            $(this).css("background-color", !!(index & 1) ? "rgba(0,0,0,.05)" : "rgba(0,0,0,0)");
        });



    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

      var url = window.location.href;
      var page = url.substr(url.lastIndexOf('/') + 1);

      if(page==="my_stories.php"){
        $("#page1 a:contains('Survivor Stories')").parent().addClass('active');
      }


      $('.nav-item a[href*="' + page + '"]').parent().addClass('active');

    });
  </script>











<!-- End custom js for this page -->
</body>

</html>