

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018  Developed By: <a class="text-bold-800 grey darken-2" href="https://bitsclan.com" target="_blank">BITSCLAN </a>, All rights reserved. </span></p>
    </footer>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="app-assets/vendors/js/charts/echarts/echarts.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/scripts/pages/appointment.min.js"></script>

        <script src="app-assets/js/scripts/charts/chartjs/line/line.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line-area.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line-logarithmic.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line-multi-axis.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line-skip-points.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/line/line-stacked-area.min.js"></script>
     <script src="app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut.min.js"></script>
    <script src="app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.min.js"></script>


<script type="text/javascript">



  $('input[name="dates"]').daterangepicker({
        "autoApply": true,
    "startDate": "03/26/2019",
    "endDate": "04/01/2019",
    "opens": "center"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
  });
  

  function openNav() {

    $('.add-col12').toggleClass("col-lg-10");
  }



  //line
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
          label: "My First dataset",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });



</script>

    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/hospital-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jan 2019 07:10:12 GMT -->
</html>
