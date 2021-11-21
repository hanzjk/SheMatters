<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];


?>
<link rel="stylesheet" href="../assets/css/dashboard.css" />
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
        border-bottom: 1px solid #e8eef1;
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
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="row mt-3" style="margin-top: -10px;">

                <div class="col-12 card comp " style="outline: none;border: none;">

                    <div class="mt-2 mb-2">
                        <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;Inquiries from admin regarding the complaint </span>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 card comp">
                    <div class="chat_container" >
                        <div class="job-box" style="border: none;">
                           
                            <div class="inbox-message">


                                <?php
                                $con = mysqli_connect("localhost", "root", "", "project");

                                $sql = "SELECT *  FROM inquiry WHERE complaint_id='" . $complaint_id . "' ";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) == 0) { ?>
                                    <ul>
                                        <li>
                                            <div>

                                                <h4>No Inquiries</h4>
                                            </div>
                                        </li>
                                    </ul>

                                <?php }
                                while ($row = mysqli_fetch_array($result)) {

                                ?>

                                    <ul>
                                        <li>
                                            <div class="message-avatar">
                                                <img src="../assets/images/admin.jpg" alt="">
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">

                                                    <?php if ($row['reply'] === NULL) { ?>
                                                        <h5> <span class="unread">Unread</span>
                                                            <a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['inquiry_id'] ?>" id="getID"><span class="reply">Reply</span></a>
                                                        </h5>
                                                    <?php } else { ?>
                                                        <a href="#myModal_reply" data-toggle="modal" data-id="<?php echo $row['inquiry_id'] ?>" id="get_reply">
                                                            <h5> <span class="replied">Replied</span></h5>
                                                        </a>
                                                    <?php } ?>

                                                    <span><?php echo $row['inquiry_date'] ?></span>
                                                </div>
                                                <p><?php echo $row['message'] ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>



                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<!-- Modal -->
<div id="myModal_reply" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48, 44, 81);">
                <h4 class="modal-title" style="color: white;">Enquiry Info</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message" style="font-weight: bold;">Reply</label>
                    <div class="fetched-data"></div>
                </div>

            </div>

            <div class="modal-footer">

                <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" onClick="window.location.reload();">Close</button>

            </div>
        </div>

    </div>
</div>


<!-- content-wrapper ends -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48, 44, 81);">
                <h4 class="modal-title" style="color: white;">Reply</h4>
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
<script src="../assets/Header/js/vendor.bundle.base.js"></script>

<script src="../assets/Header/js/off-canvas.js"></script>
<script src="../assets/Header/js/settings.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        var url = window.location.href;
        var page = url.substr(url.lastIndexOf('/') + 1);

        if (page === "lodged_complaints.php") {
            $("#page1 a:contains('Complaint Portal')").parent().addClass('active');
        }


        $('.nav-item a[href*="' + page + '"]').parent().addClass('active');

    });
</script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>


<script>
    $(document).on("click", "#getID", function() {
        var inquiryId = $(this).data('id');


        $('#reply_submit').click(function(e) {
            // alert(inquiryId);
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: 'inquiry_action.php',

                data: $("#reply_form").serialize() + '&inquiry_id=' + inquiryId,
                success: function(data) {
                    if (data === "success") {
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


    $('#myModal_reply').on('show.bs.modal', function(e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type: 'post',
            url: 'inquiry_action.php', //Here you will fetch records 
            data: 'rowid=' + rowid, //Pass $id
            success: function(data) {
                $('.fetched-data').html(data); //Show fetched data from database
            }
        });
    });
</script>

<!-- End custom js for this page -->
</body>

</html>