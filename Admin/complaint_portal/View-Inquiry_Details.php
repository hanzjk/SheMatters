<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];


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

    .btn{
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
</style>


<div class="row mt-3">
    <!--Main Content-->
    <div class="chat_container col-12">
                        <div class="job-box">
                            <div class="job-box-filter">
                                <h5>Replies received from complainant regarding the inquiry</h5>
                            </div>
                            <div class="inbox-message">


                                <?php
                                $con = mysqli_connect("localhost", "root", "", "project");

                                $sql = "SELECT *  FROM inquiry WHERE complaint_id='" . $complaint_id . "' ";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result)==0) { ?>
                                    <ul>
                                    <li>
                                            <div >
                     
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
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">

                                                    <?php if ($row['reply'] === NULL) { ?>
                                                        <h5> <span class="unread">Unread</span>
                                                            <a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['inquiry_id'] ?>" id="getID"><span class="reply">Reply</span></a>
                                                        </h5>
                                                    <?php } else { ?>
                                                        <a href="#myModal_reply" data-toggle="modal" data-id="<?php echo $row['inquiry_id'] ?>" id="get_reply"><h5> <span class="replied">Replied</span></h5></a>
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
<?php
require_once 'footer.php';
?>