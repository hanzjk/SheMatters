<?php
ob_start();
require_once 'header.php';
$story_id = $_POST['r_id'];

$accept =  "UPDATE survivor_stories SET state='Rejected' WHERE story_id ='" . $story_id . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:stories.php');
}
else{
}

ob_end_clean();
?>