<?php
require_once 'header.php';
?>


<link rel="stylesheet" type=text/css href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

<script src="assets/Header/vendors/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<!-- page content -->
<style>
    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>

<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp; Report Generation </span>
            <span class="float-right">Home &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Report</span><br>

		</div>
    </div>
</div>

<div class="row mt-4 card comp" style="background-color:#fff;  border: 1px solid #e8eef1;">

  <div class="accordion" id="accordionExample">


  <div class="card">
      <div class="card-header" id="headingOne" style="background-color:#fff;  ">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseN" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Report On Received Complaints

          </button>
        </h2>
      </div>

      <div id="collapseN" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <p class="h6 font-weight-bold">Please choose the date range</p>
          <div class="mb-1 col-md-8">

          <form method="post" action="complaints_export.php">
                    <div class=" row">
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="start_date" class="form-control" readonly placeholder="start date" />
                        </div>
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="end_date" class="form-control" readonly placeholder="end date" />
                        </div>
                        <div class="col-md-4 mt-2">
                        <input type="submit" name="complaints_export" value="Export as Excel" class="btn btn-info btn-sm" />

                        </div>
                    </div>
                </form>

          </div>
          <br>



        </div>
      </div>
    </div>


    <div class="card">
      <div class="card-header" id="headingOne" style="background-color:#fff;  ">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseF" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Report On Financial Aid Donations

          </button>
        </h2>
      </div>

      <div id="collapseF" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <p class="h6 font-weight-bold">Please choose the date range</p>
          <div class="mb-1 col-md-8">

          <form method="post" action="faid_export.php">
                    <div class=" row">
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="start_date" class="form-control" readonly placeholder="start date" />
                        </div>
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="end_date" class="form-control" readonly placeholder="end date" />
                        </div>
                        <div class="col-md-4 mt-2">
                        <input type="submit" name="faid_export" value="Export as Excel" class="btn btn-info btn-sm" />

                        </div>
                    </div>
                </form>

          </div>
          <br>



        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingOne" style="background-color:#fff;  ">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseU" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Report On Registered Users

          </button>
        </h2>
      </div>

      <div id="collapseU" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <p class="h6 font-weight-bold">Please choose the date range</p>
          <div class="mb-1 col-md-8">

          <form method="post" action="users_export.php">
                    <div class=" row">
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="start_date" class="form-control" readonly placeholder="start date" />
                        </div>
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="end_date" class="form-control" readonly placeholder="end date" />
                        </div>
                        <div class="col-md-4 mt-2">
                        <input type="submit" name="users_export" value="Export as Excel" class="btn btn-info btn-sm" />

                        </div>
                    </div>
                </form>

          </div>
          <br>



        </div>
      </div>
    </div>


    <div class="card">
      <div class="card-header" id="headingOne" style="background-color:#fff;  ">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseP" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Report On Registered Police Stations

          </button>
        </h2>
      </div>

      <div id="collapseP" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <p class="h6 font-weight-bold">Please choose the date range</p>
          <div class="mb-1 col-md-8">

          <form method="post" action="police_export.php">
                    <div class=" row">
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="start_date" class="form-control" readonly placeholder="start date" />
                        </div>
                        <div class=" input-daterange col-md-4 mt-2">
                            <input type="text" name="end_date" class="form-control" readonly placeholder="end date" />
                        </div>
                        <div class="col-md-4 mt-2">
                        <input type="submit" name="police_export" value="Export as Excel" class="btn btn-info btn-sm" />

                        </div>
                    </div>
                </form>

          </div>
          <br>



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

  <script src="assets/Header/js/off-canvas.js"></script>
  <script src="assets/Header/js/template.js"></script>
  <!-- End custom js for this page-->




<script>
  $(document).ready(function() {
    $('.input-daterange').datepicker({
      todayBtn: 'linked',
      format: "yyyy-mm-dd",
      autoclose: true,
      orientation: 'auto bottom'

    });
  });
</script>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/Header/vendors/custom.min.js"></script>





</body>

</html>





