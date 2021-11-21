<?php
require_once 'header.php';

$tot = "SELECT  COUNT(police_id)  FROM police_users ";
$result_tot = mysqli_query($link, $tot);
$inq_tot = mysqli_fetch_assoc($result_tot);
$InqTot = $inq_tot["COUNT(police_id)"];
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- page content -->
<style>
    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>

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
</style>





<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-users" aria-hidden="true"></i> &nbsp; Registered Police Stations (<?php echo $InqTot ?>)</span>
            <a href="#myModal" data-toggle="modal" data-target="#myModal">

                <button class="btn btn-info float-right mt-1 "> <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; &nbsp;Add Police Station</button>
            </a>

        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48, 44, 81);">
                <h4 class="modal-title" style="color: white;">Add New Police Station</h4>
            </div>
            <form id="reply_form">
                <div class="modal-body">
                    <div id="result_inquiry"></div>
                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Email address for registration" required>
                    </div>

                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Temporary Password</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Temporary Password" required>
                    </div>


                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Police Station</label>
                        <input type="text" name="name" class="form-control" placeholder="Name of Police Station" required>
                    </div>


                    <div class="form-group ">
                        <label class="message" style="font-weight: bold;"> District</label>
                        <select class="custom-select" class="form-control" name="dist" required>
                            <option value="" selected>Choose</option>
                            <option value="Ampara">Ampara </option>
                            <option value="Anuradhapura"> Anuradhapura </option>
                            <option value="Badulla ">Badulla </option>
                            <option value="Batticaloa ">Batticaloa </option>
                            <option value="Colombo ">Colombo </option>
                            <option value="Galle ">Galle </option>
                            <option value="Gampaha ">Gampaha </option>
                            <option value="Hambantota ">Hambantota </option>
                            <option value="Jaffna ">Jaffna </option>
                            <option value="Kalutara">Kalutara </option>
                            <option value="Kandy"> Kandy </option>
                            <option value="Kegalle ">Kegalle </option>
                            <option value="Kilinochchi ">Kilinochchi </option>
                            <option value="Kurunegala ">Kurunegala </option>
                            <option value="Mannar ">Mannar </option>
                            <option value="Matale ">Matale </option>
                            <option value="Matara ">Matara </option>
                            <option value="Monaragala ">Monaragala </option>
                            <option value="Mullaitivu">Mullaitivu </option>
                            <option value="Nuwara Eliya"> Nuwara Eliya </option>
                            <option value="Polonnaruwa ">Polonnaruwa </option>
                            <option value="Puttalam ">Puttalam </option>
                            <option value="Ratnapura ">Ratnapura </option>
                            <option value="Trincomalee ">Trincomalee </option>
                            <option value="Vavuniya ">Vavuniya </option>

                        </select>
               

                    </div>

                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Contact Number</label>
                        <input type="text" name="contact" class="form-control" placeholder="Contact Number" required>
                    </div>

                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Address</label>
                        <input type="text" name="addr" class="form-control" placeholder="Address" required>
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



<div class="row mt-4 card comp" style="background-color:#fff;  border: 1px solid #e8eef1;">

    <div class="accordion" id="accordionExample">


        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Ampara District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse1" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable1" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Ampara'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>




                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Anuradhapura District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse2" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable2" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Anuradhapura'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Badulla District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse3" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable3" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Badulla'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Batticaloa District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse4" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable4" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Batticaloa'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Colombo District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse5" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable5" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Colombo'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Galle District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse6" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable6" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Galle'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Gampaha District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse7" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable7" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Gampaha'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Hambantota District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse8" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable8" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Hambantota'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Jaffna District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse9" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable9" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Jaffna'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>
                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>




                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Kalutara District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse10" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable10" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Kalutara'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Kandy District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse11" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable11" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Kandy'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>
                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>




                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Kegalle District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse12" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable13" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Kegalle'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Kilinochchi District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse13" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable14" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Kilinochchi'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Kurunegala District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse14" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable15" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Kurunegala'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>



                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>

                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Mannar District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse15" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable15" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Mannar'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>



                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>

                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Matale District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse16" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable16" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Matale'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Matara District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse17" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable17" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Matara'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse18" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Monaragala District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse18" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable18" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Monaragala'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse19" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Mullaitivu District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse19" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable19" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Mullaitivu'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse20" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Nuwara Eliya District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse20" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable20" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Nuwara Eliya'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>
                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>




                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse21" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Polonnaruwa District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse21" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable21" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Polonnaruwa'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>


                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse22" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Puttalam District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse22" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable22" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Puttalam'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse23" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Ratnapura District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse23" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable23" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Ratnapura'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse24" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Trincomalee District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse24" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable24" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Trincomalee'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>

                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne" style="background-color:#fff;  ">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse25" aria-expanded="true" aria-controls="collapseOne" style="color:#000; font-weight:bold; text-decoration:none">
                        Vavuniya District &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>

                    </button>
                </h2>
            </div>

            <div id="collapse25" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table id="myTable25" class="table table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Police Station </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT * FROM police_users WHERE police_district='Vavuniya'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {


                        ?>

                            <tr>


                                <td>

                                    <?php echo $row['police_name'] ?>
                                </td>




                                <td>



                                    <a href="view-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-info "> View&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </a>


                                    <a href="msg-puser.php?pid=<?php echo $row['police_id'] ?>" style="text-decoration: none;">
                                        <span class="btn btn-secondary "> Message&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></span>
                                    </a>



                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($con);

                        ?>


                    </table>

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

<!-- End custom js for this page-->


<script src="assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="assets/Header/js/off-canvas.js"></script>
<script src="assets/Header/js/template.js"></script>

<!-- Custom Theme Scripts -->


<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable1').DataTable({
            responsive: true

        });

        $('#myTable2').DataTable({
            responsive: true

        });
        $('#myTable3').DataTable({
            responsive: true

        });
        $('#myTable4').DataTable({
            responsive: true

        });
        $('#myTable5').DataTable({
            responsive: true

        });
        $('#myTable6').DataTable({
            responsive: true

        });
        $('#myTable7').DataTable({
            responsive: true

        });
        $('#myTable8').DataTable({
            responsive: true

        });
        $('#myTable9').DataTable({
            responsive: true

        });
        $('#myTable10').DataTable({
            responsive: true

        });
        $('#myTable11').DataTable({
            responsive: true

        });
        $('#myTable12').DataTable({
            responsive: true

        });
        $('#myTable13').DataTable({
            responsive: true

        });
        $('#myTable14').DataTable({
            responsive: true

        });
        $('#myTable15').DataTable({
            responsive: true

        });
        $('#myTable16').DataTable({
            responsive: true

        });
        $('#myTable17').DataTable({
            responsive: true

        });
        $('#myTable18').DataTable({
            responsive: true

        });
        $('#myTable19').DataTable({
            responsive: true

        });
        $('#myTable20').DataTable({
            responsive: true

        });
        $('#myTable21').DataTable({
            responsive: true

        });
        $('#myTable22').DataTable({
            responsive: true

        });
        $('#myTable23').DataTable({
            responsive: true

        });
        $('#myTable24').DataTable({
            responsive: true

        });
        $('#myTable25').DataTable({
            responsive: true

        });

    });
</script>


<script>
    $('#reply_submit').click(function(e) {
        // alert(inquiryId);
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'add_police_action.php',

            data: $("#reply_form").serialize(),
            success: function(data) {
                if (data === "success") {
                    $("#result_inquiry").html('<div class="alert alert-success"><button type="button" class="close">×</button> New Police Station Added Successfully!</div>');
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