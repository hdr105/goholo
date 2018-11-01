
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
								<input type="text" id="" class="form-control advertiser_company_name" name="advertiser_company_name" placeholder="Enter Company Name" value="<?php echo (set_value('advertiser_company_name'));   ?>">
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Website</label>
								<input type="text" id="" class="form-control advertiser_website" placeholder="Enter Website" name="advertiser_website" value="<?php echo (set_value('advertiser_website'));   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" id="firstName" class="form-control advertiser_first_name" name="advertiser_first_name" placeholder="Enter First Name" value="<?php echo (set_value('advertiser_first_name'));   ?>">
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" id="lastName" class="form-control advertiser_last_name" placeholder="Enter Last Name" name="advertiser_last_name" value="<?php echo (set_value('advertiser_last_name'));   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
						<!--/row-->
						<div class="row">
						
							<div class="col-md-6">

								<?php
								$email_error = form_error('advertiser_email');
								?>

								<div class="form-group <?php echo ($email_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Email</label>
									<input id="email_input" type="email" name="advertiser_email" class="form-control advertiser_email" value="<?php echo (set_value('advertiser_email'));   ?>">
									<span class="help-block"> <?php echo $email_error;  ?> </span>

								</div>

							</div>
							<!--/span-->

								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Phone Number</label>
									<input type="text" name="advertiser_phone_number" class="form-control advertiser_phone_number" value="<?php echo (set_value('advertiser_phone_number'));   ?>"> 
								</div>
							</div>

						</div>
			
			
						<h3 class="form-section">Billing Address</h3>
						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label>Street</label>
									<input type="text" name="advertiser_street" class="form-control advertiser_street" value="<?php echo (set_value('advertiser_street'));   ?>"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" name="advertiser_city" class="form-control advertiser_city" value="<?php echo (set_value('advertiser_city'));   ?>"> </div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label>Country</label>
											<input type="text" name="advertiser_country" class="form-control advertiser_country" value="<?php echo (set_value('advertiser_country'));   ?>"> </div>
										</div>
										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Post Code</label>
												<input type="text" name="advertiser_post_code" class="form-control advertiser_post_code" value="<?php echo (set_value('advertiser_post_code'));   ?>"> </div>
											</div>
											<!--/span-->

										</div>
									</div>
									<div class="form-actions right">
										<input type="hidden" class="advertiser_id" name="advertiser_id">
										<input type="hidden" class="advertiser_qb_id" name="advertiser_qb_id">
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
	if (isset($advertiser) && !empty($advertiser)) {

		foreach ($advertiser as $key => $value) {
			?>
			var key = "<?php echo $key ?>";

			$("."+key+"").val("<?php echo $value ?>");

			<?php
		}
	}
	?>

	});
</script>