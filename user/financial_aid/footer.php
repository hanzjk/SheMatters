  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"  translate="no" >Copyright © SHE Matters
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
  <script src="../assets/Header/js/vendor.bundle.base.js"></script>

  <script src="../assets/Header/js/off-canvas.js"></script>
  <script src="../assets/Header/js/settings.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {

      var url = window.location.href;
      var page = url.substr(url.lastIndexOf('/') + 1);

      if(page==="my_applications.php"){
        $("#page1 a:contains('Financial Aid Portal')").parent().addClass('active');
      }


      $('.nav-item a[href*="' + page + '"]').parent().addClass('active');

    });
  </script>




</script>
<script src="../assets/complaint/script1.js"></script>


<script>

$(document).on("click", "#getID", function () {
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

  <!-- End custom js for this page -->
  </body>

  </html>