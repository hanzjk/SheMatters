<?php
ob_start();

require_once 'header.php';
$complaint_id = $_GET['complaint_id'];
$accept =  "UPDATE  complaints SET state='Ongoing_Currently' WHERE complaint_id ='" . $complaint_id . "'";
$accept_i = mysqli_query($link, $accept);


 // Prepare an insert statement
 $sql = "INSERT INTO police_complaints (complaint_id, police_id,confirmed_date) VALUES (?, ?, ?)";
 if ($stmt = $link->prepare($sql)) {

     // Bind variables to the prepared statement as parameters
     if ($stmt->bind_param("iis", $param_cid, $param_pid, $param_date))

         // Set parameters
    $param_cid = $complaint_id;
     $param_pid = $police_id;
     $param_date =  date('Y-m-d H:i:s');
   


     // Attempt to execute the prepared statement
     if ($stmt->execute()) {


        if($accept_i){
            header('location:new_complaints.php');
        }
        else{
        }     }
      else {

         echo "Something went wrong when executing. Please try again later.";
     }
     // Close statement
     $stmt->close();
 }



ob_end_clean();
?>