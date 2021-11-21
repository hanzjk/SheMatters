<?php
ob_start();
require_once 'header.php';
$complaint_id = $_GET['complaint_id'];

$accept =  "UPDATE  complaints SET state='Closed' WHERE complaint_id ='" . $complaint_id . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:complaints.php');
}
else{
}

ob_end_clean();
?>