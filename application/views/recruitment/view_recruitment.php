<div class="page-content-col">

	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject font-green-haze bold uppercase">User Info</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
				
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form class="form-horizontal" role="form">
				<div class="form-body">
					<div style="float: left;">
					<h2 class="margin-bottom-20"> View User Info - <?php echo $user->first_name." ".$user->last_name; ?> </h2>
				</div>
					<?php
					if ($user->profile_image != "") {
                        $img_src = base_url().PROFILE_IMAGE_UPLOAD_PATH.$user->profile_image;
                      }else{
                        $img_src = base_url()."assets/layouts/layout4/img/avatar.png";
                      }
					?>
					<div style="float: right;"> <img style="width: 100px; height: 100px;" src="<?=$img_src?>" alt=""> </div>
					<div class="clearfix"></div>
					<h3 class="form-section">Person Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">First Name:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->first_name; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Last Name:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->last_name; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Gender:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo ($user->gender == 1 ? "Male" : "Female"); ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Date of Birth:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->date_of_birth; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->email; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Paypal ID:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->paypal_id; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<h3 class="form-section">Address</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Street:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->street; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">City:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->city; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">State:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->state; ?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Post Code:</label>
								<div class="col-md-9">
									<p class="form-control-static"> <?php echo $user->post_code; ?> </p>
								</div>
							</div>
						</div>
					
						<!--/span-->
					</div>
				</div>
			
				</form>
				<!-- END FORM-->
			</div>
		</div>

	</div>