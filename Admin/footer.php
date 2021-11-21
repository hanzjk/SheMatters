  
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
  <script src="assets/Header/vendors/base/vendor.bundle.base.js"></script>

  <script src="assets/Header/js/off-canvas.js"></script>
  <script src="assets/Header/js/template.js"></script>
  <!-- End custom js for this page-->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true

        });

} );
</script>


<script src="../user/node_modules/jquery-circle-progress/dist/circle-progress.js"></script>


<script>
  $('#circle').circleProgress({
    value: <?php  echo $sum/$data_a['amount']?> ,
    size: 180,
    fill: {
      gradient: ["#D2122E", "#FF033E"]
    }

  });
  var value = $('#circle').circleProgress('value'); // 0.5
  document.getElementById("val").innerHTML= value.toFixed(2)+'%';


 
</script>


<script>
      $(document).on("click", ".myModal_a", function() {

        var reason = $(this).data('reason');
        var use = $(this).data('use');

        document.getElementById("reason").innerHTML = reason;
        document.getElementById("usage").innerHTML = use;


      });
    </script>




</body>

</html>

