
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">


	<div class="row">
		<?php

		if ($this->session->flashdata("error_msg") != "") {
			?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata("error_msg"); ?>
			</div>

			<?php
		}

		?>
	</div>

	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject font-blue-hoki bold uppercase">Add Advertiser</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Company Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input type="text" id="" class="form-control company_name" name="company_name" placeholder="Enter Company Name" value="<?php echo (set_value('company_name'));   ?>">
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Website</label>
								<input type="text" id="" class="form-control website" placeholder="Enter Website" name="website" value="<?php echo (set_value('website'));   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" id="firstName" class="form-control first_name" name="first_name" placeholder="Enter First Name" value="<?php echo (set_value('first_name'));   ?>">
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" id="lastName" class="form-control last_name" placeholder="Enter Last Name" name="last_name" value="<?php echo (set_value('last_name'));   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
						<!--/row-->
						<div class="row">
						
							<div class="col-md-6">

								<?php
								$email_error = form_error('email');
								?>

								<div class="form-group <?php echo ($email_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Email</label>
									<input id="email_input" type="email" name="email" class="form-control email" value="<?php echo (set_value('email'));   ?>">
									<span class="help-block"> <?php echo $email_error;  ?> </span>

								</div>

							</div>
							<!--/span-->

							<div class="col-md-6">

								<?php
								$pass_error = form_error('password');
								?>

								<div class="form-group <?php echo ($pass_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Password</label>
									<input id="email_input" type="password" name="password" class="form-control password" value="<?php echo (set_value('password'));   ?>">
									<span class="help-block"> <?php echo $pass_error;  ?> </span>

								</div>

							</div>

								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Phone Number</label>
									<input type="text" name="phone_number" class="form-control phone_number" value="<?php echo (set_value('phone_number'));   ?>"> 
								</div>
							</div>

						</div>
			
			
						<h3 class="form-section">Billing Address</h3>
						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label>Street</label>
									<input type="text" name="street" class="form-control street" value="<?php echo (set_value('street'));   ?>"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" name="city" class="form-control city" value="<?php echo (set_value('city'));   ?>"> </div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label>Country</label>
											<input type="text" name="country" class="form-control country" value="<?php echo (set_value('country'));   ?>"> </div>
										</div>
										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Post Code</label>
												<input type="text" name="post_code" class="form-control post_code" value="<?php echo (set_value('post_code'));   ?>"> </div>
											</div>
											<!--/span-->

										</div>
									</div>
									<div class="form-actions right">
										<input type="hidden" class="user_id" name="user_id">
										<input type="hidden" class="user_qb_id" name="user_qb_id">
										<input type="hidden" class="user_role" name="user_role" value="6">
										<!-- <button type="submit" class="btn blue">
											<i class="fa fa-check"></i> Save</button> -->
										<input type="submit" class="btn blue" value="Save">
										</div>
									</form>
									<!-- END FORM-->
								</div>
							</div>

							<!-- END PAGE BASE CONTENT -->
						</div>
<script type="text/javascript">
	$(document).ready(function(){

	<?php
	if (isset($user) && !empty($user)) {

		foreach ($user as $key => $value) {
			?>
			var key = "<?php echo $key ?>";

			$("."+key+"").val("<?php echo $value ?>");

			<?php
		}
	}
	?>

	});
</script>