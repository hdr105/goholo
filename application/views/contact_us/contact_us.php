<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo base_url(); ?>">
  <script>
    var base_url =  '<?php echo base_url(); ?>';
</script>
<title>Contact Us</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="assets/contact-us/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
   <!-- END GLOBAL MANDATORY STYLES -->
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/contact-us/css/util.css">
<link href="<?php echo base_url(); ?>assets/layouts/layout5/css/custom.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/contact-us/css/main.css">
<script src="<?php echo base_url(); ?>assets/contact-us/vendor/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/contact-us/vendor/confirm/jquery-confirm.min.css">
<script src="assets/contact-us/vendor/confirm/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--===============================================================================================-->

</head>
<style type="text/css">@media only screen and(max-width: 480){

  .select2-container--default.select2-container--focus , .select2-selection--multiple{width: :200px!important;
    float: left;
  }
}</style>

<body>
<?php  if($this->session->flashdata('success')) { ?>
  <script type="text/javascript">
      toastr.success("<?php echo $this->session->userdata('success'); ?>","Email Send ");
  </script>

<?php } if($this->session->flashdata('error')) { ?>
  <script type="text/javascript">
    toastr.error("<?php echo $this->session->userdata('error'); ?>","Email Not Send ");
  </script>
<?php } ?>

  <div class="container-contact100">

    <div class="row locsearchbar">
      <div class="col-md-4 col-md-4-offset"></div>
      <div class="col-md-6" style="margin-bottom: 10px; margin-right: -25px;">
        <input type="text" placeholder="Search Location" class="form-control" id="search_autocomplete">
      </div>
      <div class="col-md-2"><button class="btn btn-success filter_btn">Add Filter</button></div>
    </div>

      
  <div class="row filter_div" style="margin-top:  20px;">
  <div class="col-md-4 col-md-4-offset"></div>
      <div class="col-md-6 col-sm-4" style="margin-right: -25px;margin-left: 5px;">
        <select class="form-control filter_select" multiple="">
          <?php
          foreach ($filters as $key => $value) {
            echo "<option value='".$value."'>".$value."</option>";
          }
          ?>
        </select>
      </div>
      <div class="col-md-2"><button class="btn btn-success search_filter">Search</button></div>
    </div>

    <div class="contact100-map" id="map" style="width: 100%"></div>


  </div>





<div id="dropDownSelect1"></div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Advertise Here</h4>
      </div>
      <div id="modal-body">
       
      </div>
      

  </div>
</div>


<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="assets/contact-us/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/contact-us/vendor/bootstrap/js/popper.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/contact-us/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/contact-us/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/contact-us/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/contact-us/vendor/countdowntime/countdowntime.js"></script>
  <script src="<?php echo base_url(); ?>assets/html5lightbox/html5lightbox.js"></script>
<!--===============================================================================================-->
   <script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyDVEbx4vJXpCeLPPL2BDqNHIwhSNXcrT70&libraries=places&callback=initialize" async defer></script>
<script src="assets/contact-us/js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="assets/contact-us/js/main.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  $(".filter_select").select2();
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".filter_div").hide();

        $(".filter_btn").click(function(){
            $(".filter_div").slideToggle();
        })

        $(".search_filter").click(function(){
            add_markers();
        })




      
    })


    function advertiseaa(id) 
    {


      $.ajax({
        method:'post',
        url:"<?php echo base_url('contact/form_load');?>",
        data:{id:id},
        success:function(data)
        {
          $('#myModal').modal("show");
          $("#modal-body").html(data);

        }
      });
    }



  $("[name='sendmail']").on('submit',function(e)
  {


    e.preventDefault();
    $.ajax({
        method:'post',
        url:'<?php echo base_url().'Admin/AdminCI/add_agent_data';?>',
        data:new FormData(this),
        dataType:'json',
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
        success:function(data)
        {
            if(data.status)
            {
                
            }
            else
            {
                toastr.error(data.message);
            }

            $('[name="sendmail"]').trigger("reset");
        },

      });
});



</script>



</body>
</html>
