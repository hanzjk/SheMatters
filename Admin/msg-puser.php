<?php
require_once 'header.php';
$puser_id='';
if (isset($_GET['pid'])) {
    $puser_id = $_GET['pid'];
}


?>
<style>
    /*================================
Filter Box Style
====================================*/


    .text-right {
        text-align: right;
    }

    .job-box-filter {
        padding: 12px 15px;
        background: #ffffff;
        border-bottom: 1px solid #e8eef1;
        margin-bottom: 20px;
    }

    .job-box {
        background: #ffffff;
        display: inline-block;
        width: 100%;
        padding: 0 0px 40px 0px;
        border: 1px solid #e8eef1;
    }




    /*=====================================
Inbox Message Style
=======================================*/
    .inbox-message ul {
        padding: 0;
        margin: 0;
    }

    .inbox-message ul li {
        list-style: none;
        position: relative;
        padding: 15px 20px;
        border-bottom: 2px solid #e8eef1;
    }

    .inbox-message ul li:hover,
    .inbox-message ul li:focus {
        background: #eff6f9;
    }

    .inbox-message .message-avatar {
        position: absolute;
        left: 30px;
        top: 50%;
        transform: translateY(-50%);
    }

    .message-avatar img {
        display: inline-block;
        width: 54px;
        height: 54px;
        border-radius: 50%;
    }

    .inbox-message .message-body {
        margin-left: 85px;
        font-size: 15px;
        color: #62748F;
    }

    .message-body-heading h5 {
        font-weight: 600;
        display: inline-block;
        color: #62748F;
        margin: 0 0 7px 0;
        padding: 0;
    }

    .message-body h5 span {
        border-radius: 50px;
        line-height: 14px;
        font-size: 12px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
    }

    .message-body h5 span.unread {
        background: #07b107;
    }

    .message-body h5 span.reply {
        background: #dd2027;
    }

    .message-body h5 span.replied {
        background: orange;
    }

    .message-body h5 span.important {
        background: #dd2027;
    }

    .message-body h5 span.pending {
        background: #2196f3;
    }

    .message-body-heading span {
        float: right;
        color: #62748F;
        font-size: 14px;
    }

    .messages-inbox .message-body p {
        margin: 0;
        padding: 0;
        line-height: 27px;
        font-size: 15px;
    }

    a:hover {
        text-decoration: none;
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

    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>

<div class="row mt-3">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-comment" aria-hidden="true"></i> &nbsp;Messages </span>

            <a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $puser_id ?>" data-pid="<?php echo $puser_id ?>" id="getID" style="text-decoration: none;" class="float-right mt-2">
                <span class="btn btn-info "> <i class="fa fa-plus"></i>&nbsp;&nbsp;New Message</span>
            </a>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48, 44, 81);">
                <h4 class="modal-title" style="color: white;">New Message</h4>
            </div>
            <form id="reply_form">
                <div class="modal-body">
                    <div id="result_inquiry"></div>
                    <div class="form-group">
                        <label for="message" style="font-weight: bold;">Message</label>
                        <textarea class="form-control" id="message" rows="5" required name="message"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm" id="reply_submit">Submit</button>

                    <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" onClick="window.location.reload();">Close</button>

                </div>
                <form>
        </div>

    </div>
</div>


<div class="row mt-4">
    <div class="col-12 card comp">
        <div class="chat_container">
            <div class="job-box" style="border: none;">

                <div class="inbox-message">


                    <?php
                    $con = mysqli_connect("localhost", "root", "", "project");

                    $sql = "SELECT *  FROM admin_message_police WHERE police_id='" . $puser_id . "' ";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) == 0) { ?>
                        <ul>
                            <li>
                                <div>

                                    <h4>No Messages</h4>
                                </div>
                            </li>
                        </ul>

                    <?php }
                    while ($row = mysqli_fetch_array($result)) {

                    ?>

                        <ul>
                            <div class="col-12 ">

                                <li>
                                    <ul>
                                        <li>
                                            <div class="message-avatar">
                                                <img src="../Police/assets/images/message.jpg" alt="">
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    <h5 style="color: black;">Message</h5>
                                                    <?php if ($row['reply'] != NULL) { ?>
                                                        <a href="#myModal_reply" data-toggle="modal" data-id="<?php echo $row['msgID'] ?>" id="get_reply">
                                                            <h5> <span class="replied">Replied</span></h5>
                                                        </a>
                                                    <?php } ?>

                                                    <?php if ($row['reply'] === NULL) { ?>
                                                        <a href="#myModal_reply" data-toggle="modal" data-id="<?php echo $row['msgID'] ?>" id="get_reply">
                                                            <h5> <span class="replied" style="background-color: red;">Not Replied</span></h5>
                                                        </a>
                                                    <?php } ?>

                                                    <span><?php echo $row['msg_date'] ?></span>
                                                </div>
                                                <p><?php echo $row['msg'] ?></p>
                                            </div>
                                        </li>

                                        <?php if ($row['reply'] != NULL) { ?>
                                            <li>
                                                <div class="message-avatar">
                                                    <img src="../Police/assets/images/reply.png" alt="">
                                                </div>
                                                <div class="message-body">
                                                    <div class="message-body-heading">
                                                        <h5 style="color: black;">Reply</h5>



                                                        <span><?php echo $row['reply_date'] ?></span>
                                                    </div>
                                                    <p><?php echo $row['reply'] ?></p>
                                                </div>
                                            </li> <?php } ?>

                                    </ul>


                                </li>
                            </div>
                        <?php } ?>



                        </ul>


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

} );
</script>


<script src="../user/node_modules/jquery-circle-progress/dist/circle-progress.js"></script>


<script>
  $('#circle').circleProgress({
    value: <?php  echo $sum/$data_a['amount']?> ,
    size: 180,
    fill: {
      gradient: ["#D2122E", "#FF033E"]
    }

  });
  var value = $('#circle').circleProgress('value'); // 0.5
  document.getElementById("val").innerHTML= value.toFixed(2)+'%';


 
</script>

<script>
    $(document).on("click", "#getID", function() {
   
        var police_id = $(this).data('pid');


        $('#reply_submit').click(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: 'police_msg_action.php',

                data: $("#reply_form").serialize() + '&police_id=' + police_id,
                success: function(data) {
                    if (data == "success") {
                        $("#result_inquiry").html('<div class="alert alert-success"><button type="button" class="close">×</button>Message Sent Successfully!</div>');
                        $('.alert .close').on("click", function(e) {
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    } else {
                        alert(data);
                        $("#result_inquiry").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Cannot Send Your Message!</div>');
                        $('.alert .close').on("click", function(e) {
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }
                }
            });
        });
    });
</script>



<script>
      $(document).on("click", ".myModal_a", function() {

        var reason = $(this).data('reason');
        var use = $(this).data('use');

        document.getElementById("reason").innerHTML = reason;
        document.getElementById("usage").innerHTML = use;


      });
    </script>




</body>

</html>













