<?php
require_once 'header.php';


$tot = "SELECT  COUNT(admin_id)  FROM admin ";
$result_tot = mysqli_query($link, $tot);
$inq_tot = mysqli_fetch_assoc($result_tot);
$InqTot = $inq_tot["COUNT(admin_id)"];

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

    .modal-delete {
        color: #000;

    }

    .modal-delete .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-delete .modal-header {
        background: #800020;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-delete h4 {
        text-align: center;
        font-size: 20px;
        margin: 10px 0;
    }

    .modal-delete .form-control,
    .modal-delete .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-delete .close:hover {
        opacity: 0.8;
    }

    .modal-delete .icon-box1 {
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

    .modal-delete .icon-box1 i {
        font-size: 58px;
        margin: -2px 0 0 -2px;
    }

    .modal-delete.modal-dialog {
        margin-top: 80px;
    }

    .modal-delete .btn,
    .modal-delete .btn:active {
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

    .modal-delete .btn:hover,
    .modal-delete .btn:focus {
        background: #002D62 !important;
        outline: none;
    }
</style>


<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Administrators (<?php echo $InqTot ?>)</span>
            <a href="#myModal" data-toggle="modal" data-target="#myModal">

                <button class="btn btn-info float-right mt-1 "> <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; &nbsp;Add Administrator</button>
            </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48, 44, 81);">
                <h4 class="modal-title" style="color: white;">Add New Administrator</h4>
            </div>
            <form id="reply_form">
                <div class="modal-body">
                    <div id="result_inquiry"></div>
                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Administror Email</label>
                        <input type="text" name="username" class="form-control" placeholder="Email address for registration" required>
                    </div>

                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Temporary Password</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Temporary Password" required>
                    </div>


                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Administrator Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name of Police Station" required>
                    </div>




                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Contact Number</label>
                        <input type="text" name="contact" class="form-control" placeholder="Contact Number" required>
                    </div>



                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" style="width: 100%; background-color: rgb(48, 44, 81);    padding: 10px;
" class="btn " id="reply_submit">Add</button>
                        </div>
                        <div class="col">
                            <button type="reset" style="width:100%; padding: 10px;" class="btn btn-secondary btn" data-dismiss="modal" onClick="window.location.reload();">Close</button>
                        </div>
                    </div>



                </div>


                <form>
        </div>

    </div>
</div>

<div class="row mt-3" style="background-color:#fff;  border: 1px solid #e8eef1;">


    <div class="col-12 mx-auto comp">

        <!--Main Content-->
        <br>
        <table id="myTable" class="table table-hover text-center table-striped">
            <thead>
                <tr>                    <th scope="col"></th>

                    <th scope="col">Administrator </th>
                    <th scope="col">Contact Number </th>
                    <th scope="col">Email </th>
                    <th scope="col">Joined On </th>

                    

                </tr>
            </thead>
            <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "project");

            $sql = "SELECT * FROM admin";
            $result = mysqli_query($con, $sql);
            $count = 0;

            while ($row = mysqli_fetch_array($result)) {


            ?>

                <tr>
                <td >



<button class="btn btn-danger del mt-1" data-toggle="modal" data-target="#myModal_delete">Delete&nbsp;<i class="fa fa-close" aria-hidden="true"></i></button>

<!-- Modal HTML -->
<div id="myModal_delete" class="modal fade col-12">
    <div class="modal-dialog modal-delete">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box1">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Are you sure ?</h4>
                <p>Do you really want to delete this account ? This process cannot be undone</p>
                <a href="delete-admin.php?id=<?php echo $row['admin_id'] ?>"><button class="btn " style="background-color: #800020;">Delete</button></a>
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>




</td>


                    <td>
                        <?php


                        if ($row['admin_photo'] != null) { ?>
                            <img src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($row['admin_photo']); ?>" />
                        <?php } else { ?>
                            <img src="assets/images/user2.jpg" alt="Image">
                        <?php } ?>
                        &nbsp;
                        <?php echo $row['admin_name'] ?>
                    </td>

                 
                    <td>
                        <?php echo $row['admin_contact'] ?>
                    </td>

                    <td>
                        <?php echo $row['admin_email'] ?>
                    </td>
                    <td>
                        <?php echo date('d M Y H:i:s', strtotime($row['created_at'])); ?>
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


<script>
    $('#reply_submit').click(function(e) {
   
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'add_admin_action.php',

            data: $("#reply_form").serialize(),
            success: function(data) {
                if (data === "success") {
                    $("#result_inquiry").html('<div class="alert alert-success"><button type="button" class="close">×</button>New Administrator Added Successfully!</div>');
                    $('.alert .close').on("click", function(e) {
                        $(this).parent().fadeTo(500, 0).slideUp(500);
                    });

                } else {
                    alert(data);
                    $("#result_inquiry").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Error: Please Try Again!</div>');
                    $('.alert .close').on("click", function(e) {
                        $(this).parent().fadeTo(500, 0).slideUp(500);
                    });

                }
            }
        });
    });
</script>


</body>

</html>