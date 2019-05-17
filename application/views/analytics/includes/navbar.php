 <nav class="header-navbar pdng0 navbar-expand-md navbar-with-menu navbar-without-dd-arrow fixed-top bg-white navbar-shadow bg264157">
   <div class="navbar-wrapper ">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><!-- <i class="ft-menu font-large-1"></i> -->
              <img src="<?php echo base_url() ?>frontend/images/line.png">

            </a></li>
            
            <li class="nav-item"><a class="navbar-brand" href="index.html"><img class="" alt="modern admin logo" style="width: 200px" src="<?php echo base_url() ?>frontend/images/logo.png">
               </a></li>
               
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v text-white"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><!-- <i class="ft-menu"></i> -->
               
              </a></li>
           
            
              <li class="nav-item nav-search">
                <div class="row">
    <form class="form" >
      <div class="input-group">
          <input class="form-control width327sm" type="text" placeholder="Search" aria-label="Search" style="padding-left: 20px; border-radius: 40px;" id="mysearch">
          <div class="input-group-addon" style="margin-left: -50px; z-index: 3; border-radius: 40px; background-color: transparent; border:none;">
           <i class="fas fa-search"></i>
          </div>
      </div>
    </form>
  </div>
               



              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user pdng0 nav-item">
                <a class="dropdown-toggle pdng0 nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                 
                       <!--  <span class="avatar header_circle">
                      <img src="images/Settings Icon.png" alt="avatar" width="auto"></span> -->
                   
                  <span class="avatar avatar-online">

                          <?php

                        $user=$this->session->userdata("user_session");

                      if ($user->profile_image != "") {
                        $img_src = base_url().PROFILE_IMAGE_UPLOAD_PATH.$user->profile_image;
                      }else{
                        $img_src = base_url()."assets/layouts/layout4/img/avatar.png";
                      }

                      ?>

                      <img style="height: 35px;" class="img-circle" src="<?=$img_src?>" alt="">


                  </span>
                    <span class="header_username"><?php

                        echo get_user_fullname();

                        ?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
           
              <li class="dropdown dropdown-notification nav-item">
               <a class="nav-link pdng0 nav-link-label" href="#" data-toggle="dropdown">
                  <p class="header_time">11:31PM</p>
               </a>
              
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link pdng0 nav-link-label" href="#" data-toggle="dropdown"><img src="<?php echo base_url() ?>frontend/images/Right Menu.png" ></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url() ?>frontend/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="<?php echo base_url() ?>frontend/app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url() ?>frontend/app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="<?php echo base_url() ?>frontend/app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

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
                                 <p class="para1 mt-2 margin1"><?php

                        echo get_user_fullname();

                        ?><br><small class="small1 ml-1"><?php

                        echo get_user_role();

                        ?></small></p>
                              </div>
                              <a href="#"><img src="<?php echo base_url() ?>frontend/img/dashborad.png" alt="image" class="pt-1"><span class="navfont">DASHBOARD</span></a>
                              <a href="#"><img src="<?php echo base_url() ?>frontend/img/buyer.png" alt="image" class="pt-1"><span class="navfont">BUYER PERFORMA</span></a>
                              <a href="#"><img src="<?php echo base_url() ?>frontend/img/location.png" alt="image" class="pt-1"><span class="navfont">LOCATIONS</span></a>
                              <a href="#"><img src="<?php echo base_url() ?>frontend/img/setting1.png" alt="image" class="pt-1"><span class="navfont">SETTINGS</span></a>
                           </div>   
               <div class="row pt36">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 col-md-12 center_img">
                     <div class="margin">   <?php

                        $user=$this->session->userdata("user_session");

                      if ($user->profile_image != "") {
                        $img_src = base_url().PROFILE_IMAGE_UPLOAD_PATH.$user->profile_image;
                      }else{
                        $img_src = base_url()."assets/layouts/layout4/img/avatar.png";
                      }

                      ?>
                      <img class="img-circle circle rounded-circle" src="<?=$img_src?>" alt=""></div>
                     <div class="smallcircle rounded-circle mt-n3">

                     </div>
                     <p class="para1 margin1 text-center"><?php

                        echo get_user_fullname();

                        ?><br><small class="small1 ml-1"><?php

                        echo get_role_byid(get_user_role());

                        ?></small></p>
                  </div>
               </div>
               <div class="row mt-2">
                
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                      <a href="<?=base_url()?>analytics/dashboard/<?=$this->uri->segment(3)?>">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="<?php echo base_url() ?>frontend/img/dashborad.png" alt="image" class="pt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">DASHBOARD</h6>
                        </div>
                     </div>
                     </a>
                  </div>
               
               </div>

               <?php
if (has_permission("location_videos")) {
  ?>

                   <div class="row mt-3">
                
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                     <a href="<?=base_url('analytics/videos/').$this->uri->segment(3)?>">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="<?php echo base_url() ?>frontend/images/video.png" width="35px" alt="image" class="pt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">Videos</h6>
                        </div>
                     </div>
                      </a>
                  </div>
              
               </div>
                <?php
}
?>

               <div class="row mt-3">
                
                  <div class="col-12 col-sm-12 col-md-12 hide zoomonhover">
                     <a href="#">
                     <div class="row">
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="<?php echo base_url() ?>frontend/img/buyer.png" alt="image" class="pt-1"></div>
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
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="<?php echo base_url() ?>frontend/img/location.png" alt="image" class="mt-1"></div>
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
                        <div class="col-3 col-sm-3 col-md-4 text-right"><img src="<?php echo base_url() ?>frontend/img/setting1.png" alt="image" class="mt-1"></div>
                        <div class="col-9 col-sm-9 col-md-8 menucolor1">
                           <h6 class="mt-2 color3">SETTINGS</h6>
                        </div>
                     </div>
                       </a>
                  </div>

               </div>
            </div>