<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];


set_time_limit(0);

$state  = "";
$success=0;




?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/additional_info.css">


<style>
 .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }

	.modal-confirm {
        color: #000;
       
    }

    .modal-confirm .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        background: #800020;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 20px;
        margin: 10px 0;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box1 {
        color: #fff;
        width: 95px;
        height: 95px;
        display: inline-block;
        border-radius: 50%;
        z-index: 9;
        border: 5px solid #fff;
        padding: 15px;
        text-align: center;
    }

    .modal-confirm .icon-box1 i {
        font-size: 58px;
        margin: -2px 0 0 -2px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #002D62;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border-radius: 30px;
        margin-top: 10px;
        padding: 6px 20px;
        min-width: 150px;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #002D62 !important;
        outline: none;
    }

</style>

<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-file" aria-hidden="true"></i> &nbsp; Additional records regarding the complaint </span>
            <span class="float-right">Complaint Portal &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Ongoing Complaints</span><br><br>
			<span>(supporting documents if any, immediate action taken, records relating to the investigation including witness statements)</span>

		</div>
    </div>
</div>

<div class="row mt-4 card comp" style="background-color:#fff;  border: 1px solid #e8eef1;">
  <div class="accordion is-expanded  " id="accordionExample">

    <div class="col-12 " >
      <div class="card-header" id="headingOne" style="background-color:#fff;  ">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" style="color:#000; font-weight:bold; text-decoration:none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Previously Uploaded Records 
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
	<br>
          <table class="table table-hover text-center  table-striped col-12 " id="myTable" >
            <thead >
              <tr>
                <th scope="col">#</th>
                <th scope="col">File Name</th>
                <th scope="col">View</th>

              </tr>
            </thead>

            <?php
            $con = mysqli_connect("localhost", "root", "", "project");

            $sql = "SELECT fileid , filename ,filetype FROM complaint_info WHERE complaint_id='".$complaint_id."'";
            $result = mysqli_query($con, $sql);
              

            while ($row = mysqli_fetch_array($result)) {
			
			
          ?>
              <tr>
                <td><?php echo $row['fileid']; ?></td>
                <td><?php if ($row['filetype']=="application/pdf" ) {
                        echo   '<i class="fa fa-file-pdf-o" style="font-size:25px;color:red">'; echo '</i>';
                        echo   ' &nbsp'; 
                      }

                        else if($row['filetype']=="image/jpeg" || $row['filetype']=="image/png"){
                          echo   '<i class="fa fa-file-image-o" style="font-size:25px;color:black">'; echo '</i>';
                          echo   ' &nbsp'; 
                        }
                        
                          echo $row['filename'];

                        
                ?> 
                </td>
  

                <td><a href="download.php?id=<?php echo urlencode($row['fileid']); ?>"
                   ><?php $row['filename'];?><i class="fa fa-download"></i></a></td>
              </tr>
            <?php
            }
            ?>

          </table>

<br>

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
<script src="assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="assets/Header/js/off-canvas.js"></script>
<script src="assets/Header/js/template.js"></script>
<!-- Custom Theme Scripts -->
<!-- End custom js for this page-->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.10.25/datatables.min.js"></script>
<!-- Bootstrap -->

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true

        });

    });
</script>


</body>

</html>



</body>

</html>