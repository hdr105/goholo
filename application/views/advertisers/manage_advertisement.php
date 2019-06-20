
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
		<?php //echo validation_errors(); ?>
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
								    $advertisment_type = set_value('advertisment_type');

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
										echo "<option ".($advertiser_id == $value->user_id ? 'selected' : '')." value='".$value->user_id."' >".$value->first_name." ".$value->last_name."</option>";
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
								$company_name_error = form_error('advert[company_name]');
								?>
								<div class="form-group <?php echo ($company_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Company Name</label>
									<input type="text" id="" class="form-control company_name" name="advert[company_name]" placeholder="Enter Company Name" value="<?php echo (set_value('advert[company_name]'));   ?>">
									<span class="help-block"> <?php echo $company_name_error;  ?> </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<?php
								$website_error = form_error('advert[website]');
								?>
								<div class="form-group <?php echo ($website_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Website</label>
									<input type="text" id="" class="form-control website" placeholder="Enter Website" name="advert[website]" value="<?php echo (set_value('advert[website]'));   ?>">
									<span class="help-block"> <?php echo $website_error;  ?> </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
								$first_name_error = form_error('advert[first_name]');
								?>
								<div class="form-group <?php echo ($first_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">First Name
									</label>
									<input id="firstName" class="form-control first_name" name="advert[first_name]" placeholder="Enter First Name" value="<?php echo (set_value('advert[first_name]'));   ?>" type="text">
									<span class="help-block"> <?php echo $first_name_error;  ?> </span>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								$last_name_error = form_error('advert[last_name]');
								?>
								<div class="form-group <?php echo ($last_name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Last Name
									</label>
									<input id="lastName" class="form-control last_name" placeholder="Enter Last Name" name="advert[last_name]" value="<?php echo (set_value('advert[last_name]'));   ?>" type="text">
									<span class="help-block"> <?php echo $last_name_error;  ?> </span>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<?php
								$email_error = form_error('advert[email]');
								?>
								<div class="form-group <?php echo ($email_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Email
									</label>
									<input id="email_input" name="advert[email]" class="form-control email" value="<?php echo (set_value('advert[email]'));   ?>" type="email">
									<span class="help-block"> <?php echo $email_error;  ?> </span>
								</div>
							</div>
								<div class="col-md-6">
								<?php
								$password_error = form_error('advert[password]');
								?>
								<div class="form-group <?php echo ($password_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Password
									</label>
									<input  name="advert[password]" class="form-control password" value="<?php echo (set_value('advert[password]'));   ?>" type="password">
									<span class="help-block"> <?php echo $email_error;  ?> </span>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								$phone_error = form_error('advert[phone_number]');
								?>
								<div class="form-group <?php echo ($phone_error != '') ? 'has-error' : '' ?>">
									<label for="exampleInputFile1">Phone Number</label>
									<input type="text" name="advert[phone_number]" class="form-control phone_number" value="<?php echo (set_value('advert[phone_number]'));   ?>">
									<span class="help-block"> <?php echo $phone_error;  ?> </span>
								</div>

							</div>
						</div>

						<input type="hidden" name="advert[user_role]" value="6">

					</div>


	
					<h3 class="form-section">Advertisment Info</h3>
						
					<div class="row">
						<div class="col-md-6 " >
							<div class="form-group ">
								<label class="control-label">Select Advertisment Type
								</label>
								<select id="advertisment_type" name="advertisment_type" class="form-control advertisment_type" onchange="advertiser_packeg_type()">
									<option value="" selected>Select Advertisment Type</option>
									<option value="1" >Select Package</option>
									<option value="2" >Pay as you go</option>
								</select>
								<span class="help-block" style="color:red;"> <?php echo form_error('advertisment_type'); ?> </span>
							</div>
						</div>		
					</div>

					<div class='packeg_div' style="display:none;">
					<div class="row">
						<div class="col-md-6 package_div hide_selectpack" style="display:none;">
							<?php
								$package_id_error = form_error('package_id');
								?>
							<div class=" form-group <?php echo ($package_id_error != '') ? 'has-error' : '' ?>" >
								<label class="control-label">Select Package
								</label>
								<select name="package_id" class="form-control package_id">
									<option value="" >Select Package</option>
									<?php
										foreach ($packages as $key => $value) {
										echo "<option ".($package_id == $value->package_id ? 'selected' : '')." value='".$value->package_id."' >".$value->package_name."  ($".$value->total_cost.")  </option>";
										}
									?>
								</select>
								<span class="help-block" ><?php echo $package_id_error; ?> </span>
							</div>
						</div>					

						<div class="col-md-6">
							<?php
								$start_date_error = form_error('start_date');
								?>
							<div class="form-group <?php echo ($start_date_error != '') ? 'has-error' : '' ?>">
								<label class="control-label">Start Date of Advertisment</label>
								<input type="text" class="form-control start_date MonthPicker" name="start_date" value="<?php echo (set_value('start_date'));   ?>">
								<span class="help-block"><?php echo $start_date_error; ?> </span>
							</div>
							
						</div>
						<div class="col-md-6 hide_enddate" style="display:none;">
							<?php
								$end_date_error = form_error('end_date');
								?>
							<div class="form-group <?php echo ($end_date_error != '') ? 'has-error' : '' ?>">
								<label class="control-label">End Date of Advertisment</label>
								<input type="text" class="form-control end_date MonthPicker" name="end_date" value="<?php echo (set_value('end_date'));   ?>">
								<span class="help-block"><?php echo $end_date_error; ?> </span>
							</div>
						</div>
						<!--/span-->
					<!-- 	<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">End Month of Advertisment</label>
								<input type="text" class="form-control end_date MonthPicker" name="end_date" value="<?php echo (set_value('end_date'));   ?>">
							</div>
						</div> -->
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Design file</label>
								<select name="hologram_type" class="form-control hologram_type">
									<option value="1">Upload Design From Computer</option>
									<option value="2">Request Advertisement Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 hologram_file_div">

							<div class="form-group">
								<label class="control-label">Upload Advertisement Design</label>
								<input id="hologram_file" type="file" name="hologram_file">

							</div>

						</div>
						<!--/span-->

					</div>
					<div class="row hologram_description_div" style="display: none;">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputFile1">Design Description</label>
								<textarea rows="5" name="hologram_description" class="form-control hologram_description"></textarea>
							</div>
						</div>

					</div>
				  </div>
				  <div class='card_div' style="display:none;">
				
						<h3 class="form-section">Card Info</h3>
							<div class="row">
									<div class="col-md-6">
								<?php
								$name_error = form_error('card[name]');
								?>
								<div class="form-group <?php echo ($name_error != '') ? 'has-error' : '' ?>">
									<label class="control-label">Name</label>
									<input type="text" id="" class="form-control name" name="card[name]" placeholder="Card Holder Name" value="">
									<span class="help-block"> <?php echo $name_error; ?> </span>
								</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Card Number</label>
										<input type="text" id="" class="form-control card_number" name="card[card_number]" placeholder="#####################" value="">
										<span class="help-block"> <?php echo form_error('card[card_number]'); ?> </span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Expiry month</label>
										<select class="form-control card_exp_month" name="card[card_exp_month]">
											<option value=''>--Select Month--</option>
											    <option selected value='1'>01</option>
											    <option value='02'>02</option>
											    <option value='03'>03</option>
											    <option value='04'>04</option>
											    <option value='05'>05</option>
											    <option value='06'>06</option>
											    <option value='07'>07</option>
											    <option value='08'>08</option>
											    <option value='09'>09</option>
											    <option value='10'>10</option>
											    <option value='11'>11</option>
											    <option value='12'>12</option>
										</select>
										<span class="help-block"> <?php echo form_error('card[card_exp_month]'); ?> </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Expiry year</label>
										<select class="form-control card_exp_year" name="card[card_exp_year]">
												<?php 
												 for ($i=date('Y');$i<=2035;$i++){ 
											        echo "<option value=".$i.">".$i."</option>n";     
											        } 
												?>
										</select>
										<span class="help-block"> <?php echo form_error('card[card_exp_year]'); ?> </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">CVV</label>
										<input type="text" name="card[card_cvv]" class=" form-control card_cvv" value=""/>
										<span class="help-block"> <?php echo form_error('card[card_cvv]');   ?> </span>
									</div>
								</div>
							</div>
				  	</div>

				</div>
						<div class="form-actions right">
							<input type="hidden" class="hologram_file" name="old_hologram_file">
							<input type="hidden" class="advert_id" name="advert_id">
							<input type="hidden" class="card_id" name="card_id">
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
if ($advertisment_type != "") {
	?>
	<script type="text/javascript">
		$(".advertisment_type").val("<?=$advertisment_type?>");
		advertiser_packeg_type();
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
				advertiser_packeg_type();
			});
		</script>
		<?php
	}
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.MonthPicker').datepicker({ minDate : 0});
		});

	</script>