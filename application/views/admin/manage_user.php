
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
				<span class="caption-subject font-blue-hoki bold uppercase">Add User</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="<?php  echo base_url() ?>users/manage_user" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Person Info</h3>
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
							<div class="form-group">
								<label class="control-label">Gender</label>
								<select class="form-control gender" name="gender">
									<option value="1">Male</option>
									<option value="0">Female</option>
								</select>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Date of Birth</label>
								<input type="date" value="<?php echo (set_value('date_of_birth'));   ?>" name="date_of_birth" class="form-control date_of_birth" placeholder="dd/mm/yyyy"> </div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">User Role</label>
									<select name="user_role" class="form-control user_role" tabindex="1">
										<option value="1">Super Admin</option>
										<option value="2">Location Owner</option>
										<option value="3">Marketing Team</option>
										<option value="4">Designer</option>
										<option value="5">Location Manager</option>
										<option value="6">Advertisor</option>
									</select>
								</div>
							</div>
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

						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
								$password_error = form_error('password');
								?>
								<div class="form-group <?php echo ($password_error != '') ? 'has-error' : '' ?>">
									<label for="exampleInputFile1">Password</label>
									<input type="password" name="password" class="form-control password" value="<?php echo (set_value('password'));   ?>">
									<span class="help-block"> <?php echo $password_error;  ?> </span>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								$re_password_error = form_error('re_password');
								?>
								<div class="form-group <?php echo ($re_password_error != '') ? 'has-error' : '' ?>">
									<label for="exampleInputFile1">Re-Type Password</label>
									<input type="password" name="re_password" class="form-control password" value="<?php echo (set_value('re_password'));   ?>">
									<span class="help-block"> <?php echo $re_password_error;  ?> </span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Paypal ID</label>
									<input type="text" name="paypal_id" class="form-control paypal_id" value="<?php echo (set_value('paypal_id'));   ?>"> 
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Phone Number</label>
									<input type="text" name="phone_number" class="form-control phone_number" value="<?php echo (set_value('phone_number'));   ?>"> 
								</div>
							</div>

						</div>
						<!--/row-->
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputFile1">Profile Image</label>
									<input type="file" name="profile_image">
								</div>
							</div>

							<div class="col-md-6 user_commission_div">

								<?php $user_commission = (set_value('user_commission')); 

								if ($user_commission == "") {
									
									$user_commission = 15;
								}

								?>
								<div class="form-group">
									<label>Commission (%)
									</label>
									<input id="user_commission" name="user_commission" class="form-control user_commission" value="<?php echo $user_commission;   ?>" type="number"> 
								</div>
							</div>

						</div>

						<h3 class="form-section">Bank Deatils</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Transit number</label>
									<input type="text" name="transit_number" class="form-control transit_number" value="<?php echo (set_value('transit_number'));   ?>"> </div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Institution number</label>
										<input type="text" name="institution_number" class="form-control institution_number" value="<?php echo (set_value('institution_number'));   ?>"> </div>
									</div>
									<!--/span-->
								</div>
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<label>Account number</label>
											<input type="text" name="account_number" class="form-control account_number" value="<?php echo (set_value('account_number'));   ?>"> </div>
										</div>
									</div>


								<h3 class="form-section">Address</h3>
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
													<label>State</label>
													<input type="text" name="state" class="form-control state" value="<?php echo (set_value('state'));   ?>"> </div>
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
												<input type="hidden" class="profile_image" name="old_profile_image">
												<input type="hidden" class="user_id" name="user_id">
												<input type="hidden" class="user_qb_id" name="user_qb_id">
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

								user_role = "<?php echo set_value('user_role') ?>";

								$(".user_role").val(user_role);


								<?php
								if (isset($user) && !empty($user)) {
									?>


									$("#email_input").attr("disabled",true);
									$(".form-actions").prepend("<input type='hidden' name='email' class='email'>");

									user_role = "<?php echo $user->user_role; ?>";

									<?php
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