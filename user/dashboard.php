<?php
require_once 'header.php';
$result = $link->query("SELECT photo FROM users WHERE  id='" . $data['id'] . "'");

?>
<link rel="stylesheet" href="assets/css/dashboard.css" />

<style>
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
    max-height: 500px;
    overflow-y: auto;

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

  div.dataTables_wrapper div.dataTables_length select {
    width: 60px;
  }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
  .form-control {
    margin-left: 10px;
    display: inline;
    width: 70%;
  }

  .pagination,
  div.dataTables_wrapper div.dataTables_filter {
    float: right;
  }
</style>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="col-md-11 col-sm-12 mx-auto">

      <!-- first row starts here -->
      <div class="pt-4">
        <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
        <p class="font-weight-normal mb-2 text-muted"><?php echo date("F j, Y, g:i a"); ?></p>


      </div>

      <div class="row">
        <div class="col-md-3">
          <a href="complaint_portal/complaint-intro.php" style="text-decoration: none;">

            <div class="card-counter primary text-center">
              <i class="mdi mdi-circle-edit-outline" style="font-size: 33px;"></i><br>
              <span style="font-size: 17x; font-weight: bolder;">Lodge a Complaint</span><br>

            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a href="financial_aid/faid-intro.php" style="text-decoration: none;">

            <div class="card-counter danger text-center">
              <i class="mdi mdi-cash-multiple" style="font-size: 33px;"></i><br>
              <span style="font-size: 17px; font-weight: bolder;">Apply for Aid</span><br>
            </div>
          </a>
        </div>


        <div class="col-md-3">
          <a href="survivor_stories/ss-intro.php" style="text-decoration: none;">

            <div class="card-counter success text-center">
              <i class="mdi mdi-star" style="font-size: 33px;"></i><br>
              <span style="font-size: 17px; font-weight: bolder;">Share your Story</span><br>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a href="raise_awarness/raiseAwarness.php" style="text-decoration: none;">

            <div class="card-counter info text-center">
              <i class="mdi mdi-book" style="font-size: 33px;"></i><br>
              <span style="font-size: 17px; font-weight: bolder;">Awareness</span><br>
            </div>
          </a>
        </div>


      </div>

      <?php

      $inq1 = "SELECT  COUNT(complaint_id)  FROM complaints WHERE  complainant_id='" . $data['id'] . "' ";
      $result_inq1 = mysqli_query($link, $inq1);
      $inq_count1 = mysqli_fetch_assoc($result_inq1);
      $InqCount1 = $inq_count1["COUNT(complaint_id)"];


      ?>


      <div class="row mt-5">

        <div class="col-lg-6 ">

          <div class="card ">

            <div class="card-body text-center">

              <div class="member-card pt-2 pb-2">

                <div class="thumb-lg member-thumb mx-auto">


                  <?php if ($result->num_rows > 0 && $data['photo'] != null) { ?>
                    <?php while ($row1 = $result->fetch_assoc()) { ?>
                      <img class="rounded-circle img-thumbnail" src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($row1['photo']); ?>" />
                    <?php } ?>
                  <?php } else { ?>
                    <img src="assets/images/user2.jpg" class="rounded-circle img-thumbnail" alt="profile-image">
                  <?php } ?>




                </div>
                <div class="">
                  <h4><?php echo $data['name'] ?></h4>
                  <p><?php echo $data['email'] ?>
                    <br> <span>Joined on <?php echo date('F d Y', strtotime($data['created_at']));   ?> </span>
                  </p>

                </div>

                <a href="profile1.php">
                  <button type="button" class="btn btn-dark mt-3 btn-rounded  col-4 " style="background-color: rgb(48, 44, 81);   box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);">Edit Profile</button></a>
                <div class="mt-4">
                  <div class="row">
                    <div class="col-md-4 col-sm-12">
                      <div class="mt-3">

                        <h4 class="font-weight-bold">
                          <?php echo $InqCount1 ?>
                        </h4>

                        <p class="mb-0" style="font-weight: bold;color: rgb(48, 44, 81)">Lodged Complaints</p>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="mt-3">

                        <?php

                        $inq2 = "SELECT  COUNT(application_id)  FROM applications WHERE  applicant_id='" . $data['id'] . "' ";
                        $result_inq2 = mysqli_query($link, $inq2);
                        $inq_count2 = mysqli_fetch_assoc($result_inq2);
                        $InqCount2 = $inq_count2["COUNT(application_id)"];

                        ?>
                        <h4 class="font-weight-bold"><?php echo $InqCount2 ?></h4>
                        <p class="mb-0 " style="font-weight: bold; color: rgb(48, 44, 81)">Aid Application</p>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="mt-3">
                        <h4 class="font-weight-bold">
                          <?php

                          echo 'Rs.';
                          $res1 = mysqli_query($link, "SELECT SUM(amount) FROM donations WHERE donator_id='" . $data['id'] . "'");
                          $row_s1 = mysqli_fetch_row($res1);
                          $sum1 = $row_s1[0];
                          if ($sum1 > 0)
                            echo $sum1;
                          else {
                            $sum1 = 0;
                            echo 0;
                          }

                          ?>
                        </h4>

                        <p class="mb-0 " style="font-weight: bold; color: rgb(48, 44, 81)">Donated</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="card mt-3 scroll " id="style-2">

            <div class="card-body">

              <p style="font-size: 15px;font-weight: bold;">COMPLAINT STATUS</p>
              <hr>
              <br>
              <?php if ($InqCount1 > 0) { ?>
                <table class="table table-hover   table-striped text-center  table-borderless " id="myTable1">
                  <thead>
                    <tr>
                      <th style="width: 50%">Complaint </th>
                      <th style="width: 25%">Filed On</th>
                      <th style="width:25%">Status </th>



                    </tr>
                  </thead>

                  <?php
                  $con = mysqli_connect("localhost", "root", "", "project");

                  $sql = "SELECT title,state,complaint_id,created_at FROM complaints WHERE complainant_id='" . $data['id'] . "' ";
                  $result = mysqli_query($con, $sql);


                  while ($row = mysqli_fetch_array($result)) {


                  ?>

                    <tr>
                      <td>
                        <?php
                        echo substr($row['title'], 0, 20) . "<a href='complaint_portal/View-Complaint.php?complaint_id=" . $row['complaint_id'] . "'>...</a>";


                        ?>

                      <td>

                        <?php
                        echo date('d M Y ', strtotime($row['created_at']));

                        ?>

                      </td>
                      <td>

                        <?php if ($row['state'] == "Pending") { ?>

                          <button class="status" style="background-color: #00308F;outline:none;"> <?php
                                                                                                  echo $row['state'];
                                                                                                  ?></button>
                        <?php } ?>



                        <?php if ($row['state'] == "Ongoing" || $row['state'] == "Ongoing_Currently") { ?>

                          <button class="status" style="background-color: #f39c12;outline: none;"> <?php
                                                                                                    echo 'Processing';
                                                                                                    ?></button>
                        <?php } ?>

                        <?php if ($row['state'] == "Closed") { ?>

                          <button class="status" style="background-color: #00a65a;outline:none;"> <?php
                                                                                                  echo $row['state'];
                                                                                                  ?></button>
                        <?php } ?>


                        <?php if ($row['state'] == "Rejected") { ?>

                          <button class="status" style="background-color: #d9534f; outline:none;"> <?php
                                                                                                    echo $row['state'];
                                                                                                    ?></button>
                        <?php } ?>


                        <?php


                        $inq1 = "SELECT  COUNT(complaint_id)  FROM inquiry WHERE  complaint_id='" . $row['complaint_id'] . "' AND reply IS NULL";
                        $result_inq1 = mysqli_query($link, $inq1);
                        $inq_count1 = mysqli_fetch_assoc($result_inq1);
                        $InqCount1 = $inq_count1["COUNT(complaint_id)"];


                        if ($InqCount1 > 0) { ?>

                          &nbsp;&nbsp;
                          <a href="complaint_portal/View-Complaint.php?complaint_id=<?php echo $row['complaint_id'] ?>&action=seen" id="button">
                            <i class="fa fa-envelope" style="color: black;font-size: large;">
                            </i></a>


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
                </table><?php } else { ?>
                You haven't filed any complaints yet
              <?php } ?>
            </div>
          </div>

        </div>


        <?php


        $con = mysqli_connect("localhost", "root", "", "project");

        $sql_a = "SELECT * FROM applications WHERE applicant_id='" . $data['id'] . "' ";
        $result_a = mysqli_query($con, $sql_a);
        $data_a = mysqli_fetch_assoc($result_a); ?>

        <div class="col-lg-6 ">


          <div class="card">
            <div class="card-body">


              <p style="font-size: 15px;font-weight: bold;">FiNANCIAL AID
              <hr>
                <?php if ($InqCount2 > 0) { ?>
                  <?php if ($data_a['state'] == "Pending") { ?>

                    <button class="status" style="background-color: #00308F;outline: none;"> <?php
                                                                                              echo $data_a['state'];
                                                                                              ?></button>
                  <?php } ?>


                  <?php if ($data_a['state'] == "Ongoing") { ?>

                    <button class="status" style="background-color: #f39c12;outline: none;"> <?php
                                                                                              echo $data_a['state'];
                                                                                              ?></button>
                  <?php } ?>


                  <?php if ($data_a['state'] == "Closed") { ?>

                    <button class="status" style="background-color: #00a65a;outline: none;"> <?php
                                                                                              echo $data_a['state'];
                                                                                              ?></button>
                  <?php } ?>


                  <?php if ($data_a['state'] == "Rejected") { ?>

                    <button class="status" style="background-color: #d9534f;outline: none;"> <?php
                                                                                              echo $data_a['state'];
                                                                                              ?></button>
                  <?php } ?>

              </p>

              <hr>

              <div id="circle" class="text-center">
                <h1 id="val" style="margin-top: -125px;"></h1>
              </div>
              <br><br>

              <!-- Demo info -->
              <div class="row text-center mt-4">
                <div class="col-6 border-right">
                  <div class="h4 font-weight-bold mb-0">Rs.

                    <?php

                    $res = mysqli_query($link, "SELECT SUM(amount) FROM donations WHERE application_id='" . $data_a['application_id'] . "'");
                    $row_s = mysqli_fetch_row($res);
                    $sum = $row_s[0];
                    if ($sum > 0)
                      echo $sum;
                    else {
                      $sum = 0;
                      echo 0;
                    }

                    ?>
                  </div><span class="small text-gray">Raised</span>
                </div>
                <div class="col-6">
                  <div class="h4 font-weight-bold mb-0">Rs. <?php echo $data_a['amount'] ?></div><span class="small text-gray">Goal</span>
                </div>
              </div>
            <?php } else { ?>
              <p>You haven't applied for financial aid</p>
            <?php } ?>

            </div>
          </div>



          <div class="card mt-3 scroll " id="style-2">
            <div class="card-body">


              <p style="font-size: 15px;font-weight: bold;">DONATED CAUSES</p>
              <hr>
              <?php if ($sum1 > 0) { ?>

                <table class="table table-hover table-sm  table-striped text-center  table-borderless" id="myTable">
                  <thead class="">
                    <tr>

                      <th scope="col">Cause </th>
                      <th scope="col">Donated Amount</th>
                      <th scope="col">Donated On</th>



                    </tr>
                  </thead>
                  <br>


                  <?php

                  $sql2 = "SELECT * FROM donations WHERE donator_id='" . $data['id'] . "' ";
                  $result2 = mysqli_query($link, $sql2);


                  while ($row2 = mysqli_fetch_array($result2)) {

                  ?>
                    <tr>

                      <td>
                        <?php

                        $query_1 = "SELECT * FROM applications WHERE application_id='" . $row2['application_id'] . "'";
                        $result_1 = $link->query($query_1);
                        // in case you need an array
                        $row_1 = $result_1->fetch_assoc();


                        ?>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn myModal" data-reason="<?php echo $row_1['reason'] ?>" data-use="<?php echo $row_1['use_fund'] ?>">
                          <img src="../download.jpg" alt="Image" style="width: 40px;border-radius: 50%;border: 3px solid rgb(218, 27, 74);"> </button>


                      </td>
                      <td>Rs.<?php echo $row2['amount'] ?></td>
                      <td><?php echo date('d M Y ', strtotime($row2['donated_on'])); ?></td>
                    </tr>
                  <?php } ?>
                </table> <?php } else { ?>
                You haven't done any donations yet
              <?php } ?>
            </div>








          </div>






        </div>


      </div>


    </div>
    <br>
    <!-- content-wrapper ends -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">

      <div class="modal-dialog modal-confirm">
        <div class="modal-content">
          <div class="modal-header">
            <div class="icon-box">
              <img src="../download.jpg" style="width: 100%;">
            </div>
            <h5 class="modal-title w-100 text-center mt-3 font-weight-bold">Details Of The Donated Cause</h5>
          </div>
          <div class="modal-body card " style="background-color: #eee; margin-left: -20px; margin-right: -20px;border:none;">
            <h6>Reason for Applying financial Aid</h6>
            <p id="reason"></p>
            <h6>How donations are used ?</h6>
            <p id="usage"></p>
          </div>
          <div class="modal-footer" style="background-color: #eee; margin-left: -20px; margin-right: -20px;margin-bottom: -30px;">
          </div>



        </div>
      </div>
    </div>

    <script>
      $(document).on("click", ".myModal", function() {
        var reason = $(this).data('reason');
        var use = $(this).data('use');


        document.getElementById("reason").innerHTML = reason;
        document.getElementById("usage").innerHTML = use;


      });
    </script>

    <?php
    require_once 'footer.php';
    ?>