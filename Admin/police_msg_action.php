<?php
date_default_timezone_set('Asia/Colombo');

require_once 'config.php';


//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['police_id'] )) {
   

    $police_id= test_input($_POST['police_id']);
    $message= test_input($_POST['message']);

    $sql = "INSERT INTO admin_message_police(police_id,msg,msg_date)  VALUES ( ?, ?, ?)";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param("iss",  $param_pid, $param_message, $param_date))

            // Set parameters
        
            $param_pid=$police_id;
        $param_message = $message;
        $param_date =  date('Y-m-d H:i:s');

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "success";
        } else {
           // echo $stmt->error;
        echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }

}



?>