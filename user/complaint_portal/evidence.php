<?php
$con = mysqli_connect("localhost", "root", "", "project");

if (isset($_GET['id']) && isset($_GET['evidence']) && $_GET['evidence']==1) {
    $name="Evidence 1";
	$id = $_GET['id'];
	$query = "SELECT evidence1,e1_type FROM complaints WHERE complaint_id = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');

    list($content,$type) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-type: $type");
    echo $content;
	exit;
}

else if (isset($_GET['id']) && isset($_GET['evidence']) && $_GET['evidence']==2) {
    $name="Evidence 2";
	$id = $_GET['id'];
	$query = "SELECT evidence2,e2_type FROM complaints WHERE complaint_id = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');

    list($content,$type) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-type: $type");
    echo $content;
	exit;
}


else if (isset($_GET['id']) && isset($_GET['evidence']) && $_GET['evidence']==3) {
    $name="Evidence 3";
	$id = $_GET['id'];
	$query = "SELECT evidence3,e3_type FROM complaints WHERE complaint_id = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');

    list($content,$type) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-type: $type");
    echo $content;
	exit;
}

else if (isset($_GET['id']) && isset($_GET['evidence']) && $_GET['evidence']==4) {
    $name="Evidence 4";
	$id = $_GET['id'];
	$query = "SELECT evidence4,e4_type FROM complaints WHERE complaint_id = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');

    list($content,$type) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-type: $type");
    echo $content;
	exit;
}

else if (isset($_GET['id']) && isset($_GET['evidence']) && $_GET['evidence']==5) {
    $name="Evidence 5";
	$id = $_GET['id'];
	$query = "SELECT evidence5,e5_type FROM complaints WHERE complaint_id = $id";
	$result = mysqli_query($con, $query) or die('Error, query failed');

    list($content,$type) = mysqli_fetch_array($result);
    header("Content-Disposition: inline; filename=$name");
    header("Content-type: $type");
    echo $content;
	exit;
}



?>