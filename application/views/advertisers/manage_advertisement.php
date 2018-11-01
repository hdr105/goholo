
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
				<span class="caption-subject font-blue-hoki bold uppercase">Manage Advertisment</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Advertiser Info</h3>
					<div class="row">
						<div class="col-md-6">
							<?php  $advertiser_type = set_value('advertiser_type');
							$advertiser_type_error = form_error('advertiser_type');
							?>
							<div class="form-group <?php echo ($advertiser_type_error != '') ? 'has-error' : '' ?> ">
								<label class="control-label">Advertiser Type
								</label>
								<select id="advertiser_type" name="advertiser_type" class="form-control" onchange="advertiser_company_type()">
									<option value="" <?php echo ($advertiser_type == '') ? 'selected' : '' ?> >Select Advertiser Type
									</option>
									<option value="1" <?php echo ($advertiser_type == 1) ? 'selected' : '' ?> >Select Existing Advertiser
									</option>
									<option value="2" <?php echo ($advertiser_type == 2) ? 'selected' : '' ?> >Add New Advertiser
									</option>
								</select>
								<span class="help-block"> <?php echo $advertiser_type_error;  ?> </span>
							</div>

						</div>
						<div class="col-md-6 advertiser_div" style="display: none;">
							<?php  $advertiser_id = set_value('advertiser_id');
							$advertiser_id_error = form_error('advertiser_id');
							?>
							<div class="form-group <?php echo ($advertiser_id_error != '') ? 'has-error' : '' ?> ">
								<label class="control-label">Select Advertiser
								</label>
								<select name="advertiser_id" class="form-control advertiser_id">
									<option value="" <?php echo ($advertiser_id == '') ? 'selected' : '' ?> >Select Advertiser
									</option>
									<?php
									foreach ($advertisers as $key => $value) {
										echo "<option ".($advertiser_id == $value->advertiser_id ? 'selected' : '')." value='".$value->advertiser_id."' >".$value->advertiser_first_name." ".$value->advertiser_last_name."</option>";
									}
									?>
								</select>
								<span class="help-block"> <?php echo $advertiser_id_error;  ?> </span>
							</div>
						</div>
					</div>

					<div class="user_info" style="display: none;">
						<div class="row">
							<div class="col-md-6">
								<?php
								$company_name_error = form_error('advert[advertiser_company_name]');
								?>
								<div class="form-group <?php echo ($company_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Company Name</label>
									<input type="text" id="" class="form-control advertiser_company_name" name="advert[advertiser_company_name]" placeholder="Enter Company Name" value="<?php echo (set_value('advert[advertiser_company_name]'));   ?>">
									<span class="help-block"> <?php echo $company_name_error;  ?> </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<?php
								$website_error = form_error('advert[advertiser_website]');
								?>
								<div class="form-group <?php echo ($website_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Website</label>
									<input type="text" id="" class="form-control advertiser_website" placeholder="Enter Website" name="advert[advertiser_website]" value="<?php echo (set_value('advert[advertiser_website]'));   ?>">
									<span class="help-block"> <?php echo $website_error;  ?> </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
								$first_name_error = form_error('advert[advertiser_first_name]');
								?>
								<div class="form-group <?php echo ($first_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">First Name
									</label>
									<input id="firstName" class="form-control advertiser_first_name" name="advert[advertiser_first_name]" placeholder="Enter First Name" value="<?php echo (set_value('advert[advertiser_first_name]'));   ?>" type="text">
									<span class="help-block"> <?php echo $first_name_error;  ?> </span>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								$last_name_error = form_error('advert[advertiser_last_name]');
								?>
								<div class="form-group <?php echo ($last_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Last Name
									</label>
									<input id="lastName" class="form-control advertiser_last_name" placeholder="Enter Last Name" name="advert[advertiser_last_name]" value="<?php echo (set_value('advert[advertiser_last_name]'));   ?>" type="text">
									<span class="help-block"> <?php echo $last_name_error;  ?> </span>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<?php
								$email_error = form_error('advert[advertiser_email]');
								?>
								<div class="form-group <?php echo ($email_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Email
									</label>
									<input id="email_input" name="advert[advertiser_email]" class="form-control advertiser_email" value="<?php echo (set_value('advert[advertiser_email]'));   ?>" type="email">
									<span class="help-block"> <?php echo $email_error;  ?> </span>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								$phone_error = form_error('advert[advertiser_phone_number]');
								?>
								<div class="form-group <?php echo ($phone_error != '') ? 'has-error' : '' ?>">
									<label for="exampleInputFile1">Phone Number</label>
									<input type="text" name="advert[advertiser_phone_number]" class="form-control advertiser_phone_number" value="<?php echo (set_value('advert[advertiser_phone_number]'));   ?>">
									<span class="help-block"> <?php echo $phone_error;  ?> </span>
								</div>

							</div>
						</div>

					</div>


				<!-- 	<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<?php  $advertiser_id = set_value('advertiser_id'); ?>
								<label class="control-label">Select Advertiser </label>
								<select class="form-control advertiser_id" name="advertiser_id">
									<?php
									foreach ($advertisers as $key => $value) {
										echo "<option ".($advertiser_id == $value->advertiser_id ? 'selected' : '')." value='".$value->advertiser_id."' >".$value->advertiser_first_name." ".$value->advertiser_last_name."</option>";
									}
									?>
								</select>
							</div>
						</div>
					</div> -->
					<!--/row-->
					<h3 class="form-section">Advertisment Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Start Month of Advertisment</label>
								<input type="text" class="form-control start_date MonthPicker" name="start_date" value="<?php echo (set_value('start_date'));   ?>">
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">End Month of Advertisment</label>
								<input type="text" class="form-control end_date MonthPicker" name="end_date" value="<?php echo (set_value('end_date'));   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Hologram Type</label>
								<select name="hologram_type" class="form-control hologram_type">
									<option value="1">Upload File From Computer</option>
									<option value="2">Request a Custom Hologram</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 hologram_file_div">

							<div class="form-group">
								<label class="control-label">Upload Hologram</label>
								<input id="hologram_file" type="file" name="hologram_file">

							</div>

						</div>
						<!--/span-->

					</div>
					<div class="row hologram_description_div" style="display: none;">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputFile1">Hologram Description</label>
								<textarea rows="5" name="hologram_description" class="form-control hologram_description"></textarea>
							</div>
						</div>

					</div>

				</div>
				<div class="form-actions right">
					<input type="hidden" class="hologram_file" name="old_hologram_file">
					<input type="hidden" class="advert_id" name="advert_id">
					<input type="hidden" name="location_id" value="<?=$location_id?>">
					<button type="submit" class="btn blue">
						<i class="fa fa-check"></i> Save</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>

		<!-- END PAGE BASE CONTENT -->
	</div>
<?php
if ($advertiser_type != "") {
	?>
	<script type="text/javascript">
		advertiser_company_type();
	</script>
	<?php
}

	if (isset($advert) && !empty($advert)) {
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#advertiser_type").val("1");
				advertiser_company_type();
				<?php
				foreach ($advert as $key => $value) {
					?>
					var key = "<?php echo $key ?>";

					$("."+key+"").val("<?php echo $value ?>");

					<?php
				}

				?>


				$(".hologram_type").change();
			});
		</script>
		<?php
	}
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.MonthPicker').MonthPicker({ MinMonth: 1,Button: false });
		});

	</script>