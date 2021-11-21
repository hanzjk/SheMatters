<?php
ob_start();
require_once 'header.php';
$story_id = $_POST['rm_id'];

$accept =  "UPDATE survivor_stories SET remove=1 WHERE story_id ='" . $story_id . "'";
$accept_i = mysqli_query($link, $accept);


if($accept_i){
    header('location:view_stories.php');
}
else{
}

ob_end_clean();
?>