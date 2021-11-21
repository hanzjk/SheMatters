<?php
date_default_timezone_set('Asia/Colombo');
require_once "config.php";

if (!isset($_SESSION['loggedin_padmin'])) {
    header('Location: login.php');
    exit;
} else {
    $police_id = $_SESSION['police_id'];
    $sql = "SELECT * FROM police_users WHERE police_id='" . $police_id . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);
  //  $result = $link->query("SELECT admin_photo FROM admin WHERE  admin_id='" . $admin_id . "'");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SHE Matters</title>
  <!-- base:css -->

  <link rel="stylesheet" href="assets/Header/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/Header/vendors/feather/feather.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/Header/vendors/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="assets/Header/vendors/font-awesome/css/font-awesome.min.css">


  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <link rel="stylesheet" href="assets/Header/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


 

  <!-- endinject -->

  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class=" navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand " href="../user/home.php"><img src="assets/Header/images/logo.png" style="width: 50px; height: 60px; margin-left: -10%;" alt="logo" /></a>
        <div class="logo-word">
          <p style="margin-left: -18%; font-size: x-large; margin-top: 10%;color: black; font-weight: bold;"> SHE Matters </p>
        </div>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler1 align-self-center" type="button" data-toggle="minimize" style="outline: none;">
          <span><i class="fa fa-bars"></i>

          </span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

        
        <li class="nav-item dropdown d-flex ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fa fa-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item" href="profile.php">
                <i class="fa fa-user-circle-o"></i> Profile
              </a>
              <a class="dropdown-item preview-item" href="logout.php">
                <i class="fa fa-sign-out"></i> Logout
              </a>
            </div>
          </li>


        </ul>
        <button class="navbar-toggler1 navbar-toggler1-right d-lg-none align-self-center" type="button" data-toggle="offcanvas" style="outline: none;">
          <span><i class="fa fa-bars"></i></span>
        </button>
      </div>

    </nav>
    <!-- partial -->
    <div class="container1-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">

           
              <img src="assets/images/user2.jpg" alt="Image" >

          </div>
          <div class="user-name">
            <?php echo $data['police_name']; ?>
         
          </div>

        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-view-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>




          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
              <i class="mdi mdi-folder-edit  menu-icon"></i>
              <span class="menu-title">Complaint Portal</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="new_complaints.php">&nbsp;&nbsp;New Complaints</a></li>
              <li class="nav-item"> <a class="nav-link" href="ongoing_complaints.php">&nbsp;&nbsp;Ongoing Complaints</a></li>
              <li class="nav-item" > <a class="nav-link" href="closed_complaints.php">&nbsp;&nbsp;Closed Complaints</a></li>
            
                
              </ul>
            </div>
          </li>


          

          
    
     
   



          <li class="nav-item">
            <a class="nav-link" href="help.php">
              <i class="fa fa-book menu-icon"></i>
              <span class="menu-title">Help Center</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel1">
        <div class="content-wrapper">

        
        
    