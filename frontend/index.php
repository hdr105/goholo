<?php include 'includes/header.php'; ?>
<body class="vertical-layout 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php include 'includes/navbar.php'; ?>
  <div class="app-content content">
   <div class="">
    <div class="content-body">

     <div class="row pt-5">
     <div class="col-md-3 col-lg-2 col-xl-2 col-sm-12 col-xs-12 bg-white mt_36 hm mb-3" id="sidenav"> 
<div id="mySidenav" class="sidenav">
                              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:#fff">&times;</a>
                              <div class="div1">
                                 <div class="circle rounded-circle margin"></div>
                                 <div class="smallcircle rounded-circle mt-n3"></div>
                                 <p class="para1 mt-2 margin1">J.Jameson<br><small class="small1 ml-1">ADMINISTRATION</small></p>
                              </div>
                              <a href="#"><img src="img/dashborad.png" alt="image" class="pt-1"><span class="navfont">DASHBOARD</span></a>
                              <a href="#"><img src="img/buyer.png" alt="image" class="pt-1"><span class="navfont">BUYER PERFORMA</span></a>
                              <a href="#"><img src="img/location.png" alt="image" class="pt-1"><span class="navfont">LOCATIONS</span></a>
                              <a href="#"><img src="img/setting1.png" alt="image" class="pt-1"><span class="navfont">SETTINGS</span></a>
                           </div>   
               <div class="row pt36">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 col-md-12 center_img">
                     <div class="circle rounded-circle margin"></div>
                     <div class="smallcircle rounded-circle mt-n3"></div>
                     <p class="para1 margin1 text-center">J.Jameson<br><small class="small1 ml-1">ADMINISTRATION</small></p>
                  </div>
               </div>
               <div class="row mt-2">
                
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                      <a href="#">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="img/dashborad.png" alt="image" class="pt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">DASHBOARD</h6>
                        </div>
                     </div>
                     </a>
                  </div>
               
               </div>
               

               <div class="row mt-3">
                
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                     <a href="#">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="img/buyer.png" alt="image" class="pt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">BUYER PERSONA</h6>
                        </div>
                     </div>
                      </a>
                  </div>
              
               </div>
               

               <div class="row mt-3">
           
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                          <a href="#">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="img/location.png" alt="image" class="mt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">LOCATIONS</h6>
                        </div>
                     </div>
                     </a>
                  </div>
               
               </div>
               <div class="row mt-3 mb-3">
                  
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                     <a href="#">
                     <div class="row padding">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="img/setting1.png" alt="image" class="mt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">SETTINGS</h6>
                        </div>
                     </div>
                       </a>
                  </div>

               </div>
            </div>

      <div class=" col-md-9 col-lg-10 col-xl-10 col-sm-12 col-xs-12 pr30 pl30sm "> 
         <?php
         include 'includes/first_div.php';
      
         include 'includes/second_div.php';
       
         include 'includes/third_div.php';
      
         include 'includes/fourth_div.php';
         ?> 
     </div> 
   </div> 
 </div>
</div>
</div>
<?php
include 'includes/footer.php';
?>





<script type="text/javascript">
      $(".menu-toggle").click(function(){


   $("#sidenav").toggleClass("hm");




      })


</script>






