<?php

require_once '../config.php';



if (isset($_POST['story_id']) && isset($_POST['action']) && $_POST['action']=='like') {

    $story_id = $_POST['story_id'];
    $sql = "UPDATE survivor_stories SET hearts=hearts+1 WHERE story_id='" . $story_id . "'";
    if (mysqli_query($link, $sql)) {

        $sql1 = "SELECT hearts FROM survivor_stories WHERE  story_id='" . $story_id . "'";
        $result=mysqli_query($link,$sql1);
        $row = mysqli_fetch_assoc($result);
        echo $row['hearts'];

        
    } else {
        echo "ERROR";
    }
    mysqli_close($link);
}




else if (isset($_POST['story_id']) && isset($_POST['action']) && $_POST['action']=='unlike') {

    $story_id = $_POST['story_id'];
    $sql = "UPDATE survivor_stories SET hearts=hearts-1 WHERE story_id='" . $story_id . "' AND hearts>0";
    if (mysqli_query($link, $sql)) {
        
        $sql1 = "SELECT hearts FROM survivor_stories WHERE  story_id='" . $story_id . "'";
        $result=mysqli_query($link,$sql1);
        $row = mysqli_fetch_assoc($result);
        echo $row['hearts'];
   
    } else {
        echo "ERROR";
    }
    mysqli_close($link);
}

else{
    echo 'dd';
}

