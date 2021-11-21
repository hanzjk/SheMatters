<?php
ob_start();
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];

$accept =  "UPDATE  complaints SET state='Closed' WHERE complaint_id ='" . $complaint_id . "'";
$accept_i = mysqli_query($link, $accept);

$date= date('Y-m-d H:i:s');
$accept1 =  "UPDATE  police_complaints SET closed_date='".$date."' WHERE complaint_id ='" . $complaint_id . "'";
$accept_i1 = mysqli_query($link, $accept1);


if($accept_i){
    if($accept_i1)
        header('location:ongoing_complaints.php');
}
else{
}

ob_end_clean();
?>