<?php
ob_start();
require_once 'header.php';
$application_id = $_GET['application_id'];

$accept =  "UPDATE  applications SET state='Ongoing' WHERE application_id ='" . $application_id . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:pending-applications.php');
}
else{

}

ob_end_clean();
?>