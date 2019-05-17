<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap Files -->
     <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/vendors.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/app.min.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/pages/hospital.min.css">
       <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/bootstrap-extended.min.css">
       <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/app-assets/css/components.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/assets/css/style.css">


   

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url()?>frontend/app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?=base_url()?>frontend/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/vendors/js/charts/echarts/echarts.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="<?=base_url()?>frontend/app-assets/js/core/app-menu.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/core/app.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/pages/appointment.min.js"></script>

        <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line-area.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line-logarithmic.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line-multi-axis.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line-skip-points.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/line/line-stacked-area.min.js"></script>
     <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut.min.js"></script>
    <script src="<?=base_url()?>frontend/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.min.js"></script>


<script type="text/javascript">
  $(".menu-toggle").click(function(){
    $("#sidenav").toggleClass("hm");
  })


</script>

<style type="text/css">
  .loading{
 background-image: url('frontend/images/gif3.gif');
height: 100%;
width: 100%;
position: fixed;
z-index: 999999999;
top: 25%;
background-repeat: no-repeat;
left: 40%;
display: none;
}
.loading span{
  background-color: #529BD4;

color: black;

position: absolute;

top: 15%;

left: 5.5%;

padding: 12px;

border-radius: 50px;
}

</style>
</head>

<body class="vertical-layout 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

  <div class="loading">
    <span>Uploading</span>
  </div>

  <div class="main_div">