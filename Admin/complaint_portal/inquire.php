<?php
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];


if ( isset($_GET['action']) && $_GET['action'] === 'seen') {


    $seen =  "UPDATE  inquiry SET seen=1 WHERE complaint_id ='" . $complaint_id . "' AND reply IS NOT NULL";
    $seen_inq = mysqli_query($link, $seen);


  
}

?>

<style>
 

    .msgcard {
        box-shadow: 0 0px 25px rgba(0, 0, 0, .2);
    }

    .chat-log {
        overflow: auto;
        height: calc(60vh);
    }

    .chat-log_item {
        background: #eaeaea;
        padding: 10px;
        margin: 0 auto 10px;
        max-width: 95%;
        min-width: 25%;
        float: left;
        font-size: 13px;
        border-radius: 0 20px 20px 20px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        clear: both;
    }

    .chat-log_item.chat-log_item-own {
        float: right;
        background: rgba(186, 186, 240, 0.43);
        text-align: right;
        margin-right: 0.7rem;
        border-radius: 20px 0 20px 20px;
    }

    .chat-form {
        background: #DDDDDD;
        padding: 40px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .chat-log_author {
        margin: 0 auto 0em;
        font-size: 12px;
        font-weight: bold;
    }

    .chat-log_time {
        margin: 0 auto .5em;
        direction: rtl;
        font-size: 12px;
        opacity: 0.5;
    }

    #messages_container::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #messages_container::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    }

    #messages_container::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }

</style>

<div class="row">
    <div class="col col-md-10 col-lg-9 col-xl-8 mx-auto my-auto">
 
        <div class="card my-3 msgcard">
            <div class="card-header" style=" background-color: #fff;">
                <span style="font-size: 20px;font-weight: bold;"> <i class=" mdi mdi-comment-text-outline"></i>&nbsp;Quick inquiry regarding the complaint</span>
            </div>
            
            <div class="card-body">
                <div class="container-fluid">
                    <div id="messages_container" class="chat-log">


                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project");

                        $sql = "SELECT *  FROM inquiry WHERE complaint_id='" . $complaint_id . "' ";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($result)) {

                            if ($row['message'] != NULL) {
                                echo "<div class='chat-log_item chat-log_item-own z-depth-0'>
                                <div class='row justify-content-end mx-1 d-flex'>
                                    <div class='col-auto px-0'>
                                        <span class='chat-log_author'>
                                            @Administrator
                                        </span>
                                    </div>
                                    <div class='col-auto px-0'>
                                    </div>
                                </div>
                                <hr class='my-1 py-0 col-8' style='opacity: 0.5'>
                                <div class='chat-log_message'>
                                     " . $row['message'] . "
                                </div>
                                <hr class='my-1 py-0 col-8' style='opacity: 0.5'>

                                <div class='row chat-log_time m-0 p-0 justify-content-end'>
                                    " . $row['inquiry_date'] . " </div>
                            </div>";
                            }

                            if ($row['reply'] != NULL) {
                                echo "
                                <div class='chat-log_item chat-log_item z-depth-0'>
                        <div class='row justify-content-end mx-1 d-flex'>
                          <div class='col-auto px-0'>
                            <span class='chat-log_author'>
                              @Complainant
                            </span>
                          </div>
                          <div class='col-auto px-0'>
                          </div>
                        </div>
                        <hr class='my-1 py-0 col-8' style='opacity: 0.5'>
                        <div class='chat-log_message' style='font-weight:bold;border-left:  solid  darkblue;'>&nbsp;&nbsp;
                        " . $row['message'] . "  
                        </div>
                        <hr class='my-1 py-0 col-8' style='opacity: 0.5'>
                        <div class='chat-log_message'>
                        " . $row['reply'] . "

                        
                        </div>
                        <hr class='my-1 py-0 col-8' style='opacity: 0.5'>
                        <div class= 'row chat-log_time m-0 p-0 justify-content-end'>
                        " . $row['reply_date'] . "
                        </div>
                      </div>";
                            }
                        } ?>


                    </div>
            </div>
            <hr>
            <form id="inquire_form">
                <div class="card-footer border-0 bottom-rounded z-depth-0" style="background-color: #fff;">
                    <div class="row">
                        <div class="col col-md-12 col-lg-12 mx-auto">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-md-9 align-self-center my-0">
                                    <div class="row d-flex align-self-center justify-content-center">
                                        <div class="col-12 d-flex">
                                            <div class="form-group col-12 my-0 mx-0">
                                                <textarea rows="2" id="message" name="message" placeholder="Type your message" class="form-control textarea resize-ta"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 ">
                                    <div class="md-form mt-2">
                                        <button type="button" class="btn " id="send" style="border-radius: 50%; width: 40px;height: 40px; background-color: rgb(48, 44, 81);"> <i class="mdi mdi-send" style="font-size: large;color: white;"></i> </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="../assets/Header/vendors/base/vendor.bundle.base.js"></script>

<script src="../assets/Header/js/off-canvas.js"></script>
<script src="../assets/Header/js/template.js"></script>
<!-- End custom js for this page-->





<script>
    $(document).ready(function() {
        $('#messages_container').scrollTop(1000000);
        
        var $complaint_id = <?php echo $complaint_id ?>; // Find the text


        $('#send').on("click", function() {
            // e.preventDefault();
            var action1 = "update";

            $.ajax({
                method: 'POST',
                url: 'inquiry_action.php',

                data: $("#inquire_form").serialize() + '&c_id=' + $complaint_id + '&action1=' + action1,
                success: function(data) {
                    if (data === "success") {

                        $('#message').val('');

                    }
                }
            });
        });

        setInterval(function() {
            var action = "Realtime";

            $.ajax({
                method: 'POST',
                url: 'inquiry_action.php',

                data: {
                    c_id: $complaint_id,
                    action: action,
                },

                success: function(data) {
                    $('#messages_container').html(data);
                    //alert(data);
                }
            });
        }, 700);


    });
</script>


</body>

</html>