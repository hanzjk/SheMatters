<?php
$con = mysqli_connect("localhost", "root", "", "project");

if (isset($_GET['id'])) {
    
	$id = $_GET['id'];
	$query = "SELECT filename,filetype,size,data FROM complaint_info WHERE fileid = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');


    list($name, $type, $size, $content) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-length: $size");
    header("Content-type: $type");
    echo $content;



  
	exit;
}

?>