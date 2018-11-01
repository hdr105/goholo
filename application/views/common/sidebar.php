  <div class="page-content">
  	<!-- BEGIN BREADCRUMBS -->
  	<div class="">
  		
  		<!-- Sidebar Toggle Button -->
  		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
  			<span class="sr-only">Toggle navigation</span>
  			<span class="toggle-icon">
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</span>
  		</button>
  		<!-- Sidebar Toggle Button -->
  	</div>
  	<!-- END BREADCRUMBS -->
  	<!-- BEGIN SIDEBAR CONTENT LAYOUT -->
  	<div class="page-content-container">
  		<div class="page-content-row">
  			<!-- BEGIN PAGE SIDEBAR -->
  			<div class="page-sidebar">
  				<nav class="navbar" role="navigation">
  					<!-- Brand and toggle get grouped for better mobile display -->
  					<!-- Collect the nav links, forms, and other content for toggling -->
  					<ul class="nav navbar-nav margin-bottom-35">
  						<li class="nav-item start li-setting">


  							<div class="row">
  								<div class="col-md-12 col-xs-12">
  									<div class="col-md-6 col-xs-6 mt-20">
                      <?php

                        $user=$this->session->userdata("user_session");

                      if ($user->profile_image != "") {
                        $img_src = base_url().PROFILE_IMAGE_UPLOAD_PATH.$user->profile_image;
                      }else{
                        $img_src = base_url()."assets/layouts/layout4/img/avatar.png";
                      }

                      ?>

  										<img style="width: 55px; height: 70px;" class="img-circle" src="<?=$img_src?>" alt="">
  									</div>
  									<div class="col-md-6 col-xs-6 mt-20" style=" color:  white; ">
  										<div class="row" style="margin-top: 18px;margin-bottom: 10px;">
  											<?php

                        echo get_user_fullname();

                        ?>
  										</div>
  										<div class="row">
  											<small><a href="<?php echo base_url() ?>logout">Logout</a></small>
  										</div>
  									</div>
  								</div>
  							</div>
  						</li>
  						<li class="li-setting">
  							<form class="search" action="extra_search.html" method="GET">
  								<input type="name" class="form-control mt-20 mb-20" name="query" placeholder="Search...">
  								<a href="javascript:;" class="btn submit md-skip search-icon">
  									<i class="fa fa-search"></i>
  								</a>
  							</form>
  						</li>
  						<?php $this->load->view($sidebar_file); ?>
  					</ul>
  				</nav>
  			</div>