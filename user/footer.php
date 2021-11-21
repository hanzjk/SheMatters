  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SHE Matters
          2021</span>
      </div>
    </div>
  </footer>
  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/Header/js/vendor.bundle.base.js"></script>

  <script src="assets/Header/js/off-canvas.js"></script>
  <script src="assets/Header/js/settings.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      
     

      var pcg = Math.floor(<?php echo $sum ?>/<?php echo $data_a['amount']?>)*100;  
      document.getElementsByClassName('progress-bar').item(0).setAttribute('aria-valuenow', pcg);
      document.getElementsByClassName('progress-bar').item(0).setAttribute('style', 'width:' + Number(pcg) + '%');

     
    });
  </script>


<script type="text/javascript">
    $(document).ready(function() {

      var url = window.location.href;
      var page = url.substr(url.lastIndexOf('/') + 1);

      if(page==="dashboard.php"){
        $("#page1 a:contains('Dashboard')").parent().addClass('active');
      }


      $('.nav-item a[href*="' + page + '"]').parent().addClass('active');

    });
  </script>



  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        responsive: true

      });
      $('#myTable1').DataTable();


    });
  </script>
  <script src="assets/complaint/script1.js"></script>


  <script>
    $(document).on("click", "#getID", function() {
      var inquiryId = $(this).data('id');


      $('#reply_submit').click(function(e) {
        e.preventDefault();
        $.ajax({
          method: 'POST',
          url: 'inquiry_action.php',

          data: $("#reply_form").serialize() + '&inquiry_id=' + $inquiryId,
          success: function(data) {
            if (data === "success") {
              alert('sss');
              $("#result_inquiry").html('<div class="alert alert-success"><button type="button" class="close">×</button>Message Sent Successfully!</div>');
              $('.alert .close').on("click", function(e) {
                $(this).parent().fadeTo(500, 0).slideUp(500);
              });

            } else {
              alert(data);
              $("#result_inquiry").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Cannot Send Your Message!</div>');
              $('.alert .close').on("click", function(e) {
                $(this).parent().fadeTo(500, 0).slideUp(500);
              });

            }
          }
        });
      });
    });
  </script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.js"></script>


<script>
  $('#circle').circleProgress({
    value: <?php  echo $sum/$data_a['amount']?> ,
    size: 180,
    fill: {
      gradient: ["#D2122E", "#FF033E"]
    }

  });
  var value = $('#circle').circleProgress('value'); // 0.5
  document.getElementById("val").innerHTML= (value*100).toFixed(2)+'%';


 
</script>



  <!-- End custom js for this page -->
  </body>

  </html>