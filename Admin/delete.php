<?php 
ob_start();
require_once 'config.php';
if(isset($_GET['id'])){
$id = $_GET['id'];

$del =  " DELETE FROM users  WHERE id ='" . $id . "' ";
$del_i = mysqli_query($link, $del);


if($del_i){
    header('location:users.php');
}
else{
    header('location:dashboard.php');

}

}

ob_end_clean();
?>