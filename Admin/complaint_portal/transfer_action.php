<?php 
ob_start();
require_once 'header.php';

$cid=$_GET["cid"]; 
$pid=$_GET["pid"]; 


$accept =  "UPDATE  complaints SET police_id='" . $pid . "' WHERE complaint_id ='" . $cid . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:pending-complaints.php');
}
else{
    echo mysqli_error($link);
}

ob_end_clean();

?>