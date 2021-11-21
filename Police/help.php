<?php
require_once 'header.php';
?>

<style>
    .comp {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);
    }
</style>

<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">


<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Help Center </span>
            <span class="float-right">Home &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Help Center</span><br>

		</div>
    </div>
</div>


<div class="row mt-4 mb-4 " style="background-color:#fff;  border: 1px solid #e8eef1;">
    <div class="col-lg-5 mt-5">
        <ul>
            <li class="mb-3">Once the complaint is received, first must confirm the receipt of the complaint.</li>
            <li class="mb-3">Can communicate directly with the complainant through the inquiry page.</li>

            <li class="mb-3">Can keep track of additional records of each complaint by storing them to the system.</li>

            <li class="mb-3">Once the investigations are completed close the complaint</li>

        </ul>
    </div>

<div id="carouselExampleCaptions" class="carousel slide col-lg-7" data-ride="carousel">
  <ol class="carousel-indicators ">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>

  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/s1.jpg" class="d-block img-fluid " alt="...">
  
    </div>
    <div class="carousel-item">
      <img src="images/s2.jpg" class="d-block w-100" alt="...">
     
    </div>
    <div class="carousel-item">
      <img src="images/s3.jpg" class="d-block w-100" alt="...">
     
    </div>

    <div class="carousel-item">
      <img src="images/s4.jpg" class="d-block w-100" alt="...">
     
    </div>

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php
require_once 'footer.php';
?>