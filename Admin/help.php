<?php
require_once 'header.php';

?>

<link rel="stylesheet" type=text/css href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

<script src="assets/Header/vendors/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  

<div class="row " style="margin-top: -10px;">

    <div class="col-12 card comp " style="outline: none;border: none;">

        <div class="mt-2 mb-2">
            <span style="font-size: 20px;font-weight: bold;"><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Help Center </span>
            <span class="float-right">Home &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Help Center</span><br>

		</div>
    </div>
</div>

<div class="row mt-4 card comp" style="background-color:#fff;  border: 1px solid #e8eef1;">

<div class="mt-4 mx-5" >
<h6 style="font-weight: bold;">Complaint Portal</h6>

<ul>
    <li>Once the complaint is received, first administrator must accept or reject the complaint based on it’s suitability.</li>
    <li>Administrator has the ability to conduct a quick inquiry regarding the complaint with the complainant before accepting/rejecting it. </li>
    <li>Once the complaint is accepted transfer the complaint to one of the relevant police stations.</li>
    <li>Administrator will be informed once the complaint is closed by the relevant police station.</li>
</ul>
</div>

<div class="mt-4 mx-5" >
<h6 style="font-weight: bold;">Financial Aid Portal</h6>
<ul>
    <li>First accept or reject the financial aid application based on the content. Once it is accepted it will be open for donations.</li>
    <li>Administrator can close the application at any time, and it will be removed from the donations page. </li>
    <li>Raised amount for each application is displayed.</li>
</ul>

</div>


<div class="mt-4 mx-5" >
<h6 style="font-weight: bold;">Survivor Stories.</h6>
<ul>
    <li>First accept or reject the story based on the content. Once it is accepted it will be available for readers.</li>
    <li>Administrator can remove the story at any time, and it will be removed from the main page. </li>
  
</ul>

</div>



<div class="mt-4 mx-5" >
<h6 style="font-weight: bold;">Report Generation </h6>
<ul>
    <li>Can generate reports in excel format once the date range is given.</li>
  
</ul>

</div>


<div class="mt-4 mx-5" >
<h6 style="font-weight: bold;">User Management</h6>
<ul>
    <li>Can add/delete administrators and police stations to the system.</li>
    <li>Has the ability to delete user accounts if needed.</li>

</ul>

</div>


</div>






</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE MAtters 2021</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->

  <script src="assets/Header/js/off-canvas.js"></script>
  <script src="assets/Header/js/template.js"></script>
  <!-- End custom js for this page-->




<script>
  $(document).ready(function() {
    $('.input-daterange').datepicker({
      todayBtn: 'linked',
      format: "yyyy-mm-dd",
      autoclose: true,
      orientation: 'auto bottom'

    });
  });
</script>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/Header/vendors/custom.min.js"></script>





</body>

</html>
