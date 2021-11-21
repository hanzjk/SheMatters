<?php

require_once '../config.php';

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['inquiry_id']) ) {
    $inquiry_id= test_input($_POST['inquiry_id']);
    $message= test_input($_POST['message']);

    $sql = "UPDATE  inquiry_police SET reply=? ,reply_date=?  WHERE inquiry_id='".$inquiry_id."'";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param("ss", $param_message, $param_date))

            // Set parameters
        $param_message = $message;
        $param_date = date('Y-m-d H:i:s'); ;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "success";
        } else {
         echo $stmt->error;
        // echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }

}


if (isset($_POST['rowid']) ) {
    $inquiry_id= test_input($_POST['rowid']);

    $sql = "SELECT * FROM inquiry_police   WHERE inquiry_id='".$inquiry_id."'";
    $records = mysqli_query($link, $sql);
   
    // Attempt to execute the prepared statement
    if (   $data = mysqli_fetch_assoc($records)) {
        echo $data['reply'];
    } else {
       echo "Something went wrong when executing. Please try again later.";
    }
    // Close statement

}

?>