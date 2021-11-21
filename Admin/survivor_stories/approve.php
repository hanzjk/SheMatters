<?php
ob_start();
require_once 'header.php';
$story_id = $_POST['a_id'];

$accept =  "UPDATE survivor_stories SET state='Approved' WHERE story_id ='" . $story_id . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:stories.php');
}
else{
}

ob_end_clean();
?>