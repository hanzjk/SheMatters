<?php

require_once '../config.php';
date_default_timezone_set('Asia/Colombo');

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['action'])  && isset($_POST['c_id']) && $_POST['action']="Realtime") {
    $complaint_id= test_input($_POST['c_id']);

   
    $sql = "SELECT *  FROM inquiry WHERE complaint_id='" . $complaint_id . "' ";
    $result = mysqli_query($link, $sql);
    $output="";

    while ($row = mysqli_fetch_array($result)) { 

    if($row['message']!=NULL){
       $output .= " <div class='chat-log_item chat-log_item-own z-depth-0'>
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
                ".$row['message']."
        </div>
        <hr class='my-1 py-0 col-8' style='opacity: 0.5'>

        <div class='row chat-log_time m-0 p-0 justify-content-end'>
             ".$row['inquiry_date']."  </div>
    </div>";
    }
    

    if ($row['reply'] != NULL) {
        $output .= "
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

  </p>
</div>
<hr class='my-1 py-0 col-8' style='opacity: 0.5'>
<div class= 'row chat-log_time m-0 p-0 justify-content-end'>
" . $row['reply_date'] . "
</div>
</div>";
    }

}

    echo $output;

}

else if (isset($_POST['c_id']) && isset($_POST['action1']) && $_POST['action1']="update") {
    $complaint_id= test_input($_POST['c_id']);
    $message= test_input($_POST['message']);

    $sql = "INSERT INTO inquiry (complaint_id,message,inquiry_date) VALUES (?,?,?)";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param("sss", $param_cid, $param_message, $param_date))

            // Set parameters
        $param_cid = $complaint_id;
        $param_message = $message;
        $param_date =  date('Y/m/d H:i:s');

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "success";
           // echo $action . "#" . $param_message . "#". $param_date;
        } else {
          echo $stmt->error;
          // echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }

}



?>