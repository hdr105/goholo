<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8 no-js">
<![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9 no-js">
 <![endif]-->
 <!--[if !IE]><!-->
 <html lang="en">
 <!--<![endif]-->
 <!-- BEGIN HEAD -->
 <head>
   <meta charset="utf-8" />
   <title>GOHOLO | <?php echo $title; ?></title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <!-- BEGIN LAYOUT FIRST STYLES -->
   <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
   <!-- END LAYOUT FIRST STYLES -->
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN THEME GLOBAL STYLES -->
   <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
   <!-- END THEME GLOBAL STYLES -->
   <!-- BEGIN THEME LAYOUT STYLES -->
   <link href="<?php echo base_url(); ?>assets/layouts/layout5/css/layout.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/layouts/layout5/css/custom.css" rel="stylesheet" type="text/css" />
   <!-- END THEME LAYOUT STYLES -->
   <link href="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
   <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/css/MonthPicker.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/pages/css/contact.min.css" rel="stylesheet" type="text/css" />

   <link rel="shortcut icon" href="favicon.ico" />

   <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
   
   <!-- END CORE PLUGINS -->
   <!-- BEGIN THEME GLOBAL SCRIPTS -->
   <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
   <!-- END THEME GLOBAL SCRIPTS -->
   <!-- BEGIN THEME LAYOUT SCRIPTS -->
   <script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

   <script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

   <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script> 
   <script src="<?php echo base_url(); ?>assets/pages/scripts/ui-bootbox.min.js" type="text/javascript"></script>



   <script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyDVEbx4vJXpCeLPPL2BDqNHIwhSNXcrT70&libraries=places&callback=initialize" async defer></script>

   <script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/custom.js" type="text/javascript"></script>

   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/MonthPicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/html5lightbox/html5lightbox.js"></script>




   <script type="text/javascript">

     let base_url = "<?php echo base_url() ?>";

     const LOCATION_IMAGE_UPLOAD_PATH = "<?php echo LOCATION_IMAGE_UPLOAD_PATH ?>";

     $(document).ready(function(){
      let page_menu =  $(".<?php echo $menu_class ?>");

      page_menu.addClass("active open selected");

    })


  </script>
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
 <!-- BEGIN CONTAINER -->
 <!-- BEGIN HEADER -->
 <header class="page-header">
  <nav class="navbar mega-menu" role="navigation">
   <div class="container-fluid">
    <div class="clearfix navbar-fixed-top">
     <!-- Brand and toggle get grouped for better mobile display -->
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-responsive-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="toggle-icon">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </span>
   </button>
   <!-- End Toggle Button -->
   <!-- BEGIN LOGO -->
   <a id="index" class="page-logo" href="index.html">
    <img  src="<?php echo base_url(); ?>assets/layouts/layout5/img/logo.png" alt="Logo"> </a>
    <!-- END LOGO -->
    <!-- BEGIN SEARCH -->

    <!-- END SEARCH -->
    <!-- BEGIN TOPBAR ACTIONS -->
    <ul class="nav navbar-nav" id="navbar-responsive-collapse">

      <?php
      if (has_permission("locations")) {
        ?>
        <li class="dropdown dropdown-fw dropdown-fw-disabled location_menu  ">
          <a href="<?php echo base_url()."locations"; ?>" class="">
           Locations 
         </a>
       </li>
       <?php
     }
     if (has_permission("advertisers")) {

        if (get_user_role() == 6) {
          
          $action = "advertisers/view_advertisements";
        }else{
          $action = "advertisers/view_advertisers";
        }
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled advertisers_menu  ">



         <a href="<?php echo base_url().$action; ?>" class="">
         Advertisers </a>
       </li>
       <?php
     }
     if (has_permission("recriutment")) {
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled recruitments_menu  ">
         <a href="<?php echo base_url()."recruitments"; ?>" class="">
         Recriutment </a>
       </li>

       <?php
     }
     if (has_permission("location_manager")) {
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled manager_menu  ">
         <a href="<?php echo base_url()."location_manager"; ?>" class="">
         Location Manager </a>
       </li>
       <?php
     }
     if (has_permission("designer")) {
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled designer_menu  ">
         <a href="<?php echo base_url()."designer"; ?>" class="">
         Designer </a>
       </li>
       <?php
     }
     if (has_permission("payouts")) {
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled payouts_menu ">
         <a href="<?php echo base_url()."payouts/view_commissions"; ?>" class="">
         Payouts </a>
       </li>
       <?php
     }
     if (has_permission("resource_center")) {
       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled  resource_menu">
         <a href="<?php echo base_url()."resource_center"; ?>" class="">
         Resource Center </a>
       </li>
       <?php
     }
     if (has_permission("admin")) {

       ?>
       <li class="dropdown dropdown-fw dropdown-fw-disabled  admin_menu">
         <a href="<?php echo base_url()."users"; ?>" class="">
         Admin </a>
       </li>
       <?php
     }
     ?>
   </ul>
   <!-- END TOPBAR ACTIONS -->
   <?php

   if (get_user_role() != 6) {
  

   $notify = $this->crud_model->get_data("notifications",array("receiver_id"=>get_user_id(),'read'=>0));

   $count = count($notify);
   ?>
   <div class="btn-group-notification btn-group" id="header_notification_bar">
    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
      <i class="icon-bell"></i>
      <span class="badge"><?=$count?></span>
    </button>
    <ul class="dropdown-menu-v2">
      <li class="external">
        <h3>
          <span class="bold"><?=$count?> pending</span> notifications</h3>
        </li>
        <li>
          <div class="slimScrollDiv" style="position: relative; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0px;width: auto;" data-handle-color="#637283" data-initialized="1">

            <?php

            $order_by = "notify_id DESC";

            $notify = $this->crud_model->get_data("notifications",array("receiver_id"=>get_user_id()),'','','','','','',$order_by);

            foreach ($notify as $key => $value) {
              ?>

              <li class="<?php echo ($value->read == 0 ? 'bg-gray' : '' ) ?>">
                <a href="javascript:;">
                  <span class="details">
                    <span class="label label-sm label-icon label-success md-skip">
                    </span> <a href="<?=base_url().$value->link?>?notify_id=<?=$value->notify_id?>&read=<?=$value->read?>"><?=$value->message?></a> </span>
                  </a>
                </li>


                <?php
              }
              ?>
              

            </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
          </li>
        </ul>
      </div>
      <?php
}else{

?>

  <span style="float: right;padding: 10px;font-size: 18px; color: white"> <b>Total Impressions:</b> <?php echo getImpressionForAdvertisor(); ?> </span>

<?php
}
      ?>
    </div>
    <!-- BEGIN HEADER MENU -->

  </div>
</nav>

</header>
<!-- END HEADER -->
<div class="">

