<?php 
ob_start();
require_once 'config.php';
if(isset($_GET['id'])){
$id = $_GET['id'];

$del =  " DELETE FROM admin  WHERE admin_id ='" . $id . "' ";
$del_i = mysqli_query($link, $del);


if($del_i){
    header('location:admin_users.php');
}
else{
    header('location:dashboard.php');

}

}

ob_end_clean();
?>