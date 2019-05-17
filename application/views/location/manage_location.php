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
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject font-purple-soft bold uppercase">Manage Location
				</span>
			</div>
		</div>
		<div class="portlet-body form">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#location_details_tab" data-toggle="tab" aria-expanded="true"> Location Details 
					</a>
				</li>
			<!-- 	<li class="">
					<a href="#location_owner_tab" data-toggle="tab" aria-expanded="false"> Location Owner 
					</a>
				</li> -->
			</ul>
			<form action="" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<div class="tab-content">
						<div class="tab-pane fade active in" id="location_details_tab">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Location Name
										</label>
										<input id="location_name" name="location_name" class="form-control location_name" value="<?=set_value('location_name')?>" type="text"> 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Number of displays in locations 
										</label>
										<input id="displays" name="displays" class="form-control displays" value="<?=set_value('displays')?>" type="number"> 
									</div>
								</div>
								
								
							</div>

						<!-- 	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>How many people will see the ad every month 
										</label>
										<input id="monthly_views" name="monthly_views" class="form-control monthly_views" value="<?=set_value('monthly_views')?>" type="text"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Main demographic
										</label>
										<input id="main_demographic" name="main_demographic" class="form-control main_demographic" value="<?=set_value('main_demographic')?>" type="text"> 
									</div>
								</div>
								
							</div> -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Industry 
										</label>
										<input id="industry " name="industry" class="form-control industry" value="<?=set_value('industry')?>" type="text"> 
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Age Group
										</label>
										<input id="age_group" name="age_group" class="form-control age_group" value="<?=set_value('age_group')?>" type="text"> 
									</div>
								</div> -->
								
						<!-- 	</div>

							<div class="row"> -->
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Cost Per Month 
										</label>
										<input id="monthly_cost " name="monthly_cost" class="form-control monthly_cost" value="<?=set_value('monthly_cost')?>" type="text"> 
									</div>
								</div> -->
								<div class="col-md-6">
									<?php
									$owner_royalty  = 10;

									if (set_value('owner_royalty') != "") {
										$owner_royalty  = set_value('owner_royalty');
									}

									?>
									<div class="form-group">
										<label>Owner Royalty (%)
										</label>
										<input id="owner_royalty" name="owner_royalty" class="form-control owner_royalty" value="<?=$owner_royalty?>" type="number"> 
									</div>
								</div>
								
							<!-- </div>

							<div class="row"> -->
									<div class="col-md-6">
									<?php
									$advert_royalty  = 5;

									if (set_value('advert_royalty') != "") {
										$advert_royalty  = set_value('advert_royalty');
									}

									?>
									<div class="form-group">
										<label>Advertiser Royalty (%)
										</label>
										<input id="advert_royalty" name="advert_royalty" class="form-control advert_royalty" value="<?=$advert_royalty?>" type="number"> 
									</div>
								</div>

							<?php
							if (is_admin()) {
								?>
									<?php  

									$created_by = set_value('created_by');

									if ($created_by == "") {
										
										$created_by = get_user_id();
									}

									?>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Added by
											</label>
											<select class="form-control created_by" name="created_by">
												<?php
												foreach ($users as $key => $value) {
													echo "<option ".($created_by == $value->user_id ? 'selected' : '')." value='".$value->user_id."' >".$value->first_name." ".$value->last_name."</option>";
												}
												?>
											</select>
										</div>
									</div>
								<?php
							}
							?>	

								<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Location Type
											</label>
											<select class="form-control location_type" name="location_type">
												<option value="1">Public</option>
												<option value="0">Private</option>
											</select>
										</div>
									</div>

						</div>


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>What can be advertised in location 
										</label>
										<textarea name="location_description" class="location_description form-control" rows="5"><?=set_value('location_description')?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Other Notes 
										</label>
										<textarea name="other_notes" class="other_notes form-control" rows="5"><?=set_value('other_notes')?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Location Image 
										</label>
										<input id="location_image " name="location_image" type="file"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Location Video
										</label>
										<input id="location_video " name="location_video" type="file"> 
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php
									$location_address_error = form_error('location_address');
									?>
									<div class="form-group <?php echo ($location_address_error != '') ? 'has-error' : '' ?>">
										<label class="control-label">Location Address
										</label>
										<input id="autocomplete" class="form-control location_address" name="location_address" placeholder="Enter Location Address" value="<?php echo (set_value('location_address'));   ?>" type="text">
										<span class="help-block"> <?php echo $location_address_error;  ?> </span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 ">
									<?php
									$location_street = set_value('location_street');	
									?>
									<div class="form-group">
										<label>Street
										</label>
										<input id="street_number" name="location_street" class="form-control location_street" value="<?php echo $location_street;   ?>" type="text" <?php echo ($location_street == "" ? 'disabled' : '') ?> > 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php
									$location_city = set_value('location_city');	
									?>
									<div class="form-group">
										<label>City
										</label>
										<input id="locality" name="location_city" class="form-control location_city" value="<?php echo $location_city;   ?>" type="text" <?php echo  ($location_city == "" ? 'disabled' : '') ?>> 
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<?php
									$location_state = set_value('location_state');	
									?>
									<div class="form-group">
										<label>State
										</label>
										<input id="administrative_area_level_1" name="location_state" class="form-control location_state" value="<?php echo $location_state; ?>" type="text" <?php echo ($location_state == "" ? 'disabled' : '') ?>> 
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php
									$location_post_code = set_value('location_post_code');	
									?>
									<div class="form-group">
										<label>Post Code
										</label>
										<input id="postal_code" name="location_post_code" class="form-control location_post_code" value="<?php echo $location_post_code;   ?>" type="text"  <?php echo ($location_post_code == "" ? 'disabled' : '') ?> > 
									</div>
								</div>
								<div class="col-md-6">
									<?php
									$location_country = set_value('location_country');	
									?>
									<div class="form-group">
										<label>Country
										</label>
										<input id="country" name="location_country" class="form-control location_country" value="<?php echo $location_country;   ?>" type="text" <?php echo ($location_country == "" ? 'disabled' : '') ?>> 
									</div>
								</div>
							</div>
							<h3 class="form-section">Location Owner</h3>
							<div class="row">
								<div class="col-md-6">
									<?php  $owner_type = set_value('owner_type');
									$owner_type_error = form_error('owner_type');
									?>
									<div class="form-group <?php echo ($owner_type_error != '') ? 'has-error' : '' ?> ">
										<label class="control-label">Location Owner Type
										</label>
										<select id="owner_type" name="owner_type" class="form-control" onchange="location_owner_type()">
											<option value="" <?php echo ($owner_type == '') ? 'selected' : '' ?> >Select Owner Type
											</option>
											<option value="1" <?php echo ($owner_type == 1) ? 'selected' : '' ?> >Select Existing Owner
											</option>
											<option value="2" <?php echo ($owner_type == 2) ? 'selected' : '' ?> >Add New Owner
											</option>
										</select>
										<span class="help-block"> <?php echo $owner_type_error;  ?> </span>
									</div>

								</div>
								<div class="col-md-6 location_owner_div" style="display: none;">
									<?php  $location_owner = set_value('location_owner');
									$location_owner_error = form_error('location_owner');
									?>
									<div class="form-group <?php echo ($location_owner_error != '') ? 'has-error' : '' ?> ">
										<label class="control-label">Select Location Owner
										</label>
										<select name="location_owner" class="form-control location_owner">
											<option value="" <?php echo ($location_owner == '') ? 'selected' : '' ?> >Select Location Owner
											</option>
											<?php
											foreach ($owners as $key => $value) {
												echo "<option ".($location_owner == $value->user_id ? 'selected' : '')." value='".$value->user_id."' >".$value->first_name." ".$value->last_name."</option>";
											}
											?>
										</select>
										<span class="help-block"> <?php echo $location_owner_error;  ?> </span>
									</div>
								</div>
							</div>
							<div class="user_info" style="display: none;">
								<div class="row">
									<div class="col-md-6">
										<?php
										$first_name_error = form_error('user[first_name]');
										?>
										<div class="form-group <?php echo ($first_name_error != '') ? 'has-error' : '' ?>">
											<label class="control-label">First Name
											</label>
											<input id="firstName" class="form-control first_name" name="user[first_name]" placeholder="Enter First Name" value="<?php echo (set_value('user[first_name]'));   ?>" type="text">
											<span class="help-block"> <?php echo $first_name_error;  ?> </span>
										</div>
									</div>
									<div class="col-md-6">
										<?php
										$last_name_error = form_error('user[last_name]');
										?>
										<div class="form-group <?php echo ($last_name_error != '') ? 'has-error' : '' ?>">
											<label class="control-label">Last Name
											</label>
											<input id="lastName" class="form-control last_name" placeholder="Enter Last Name" name="user[last_name]" value="<?php echo (set_value('user[last_name]'));   ?>" type="text">
											<span class="help-block"> <?php echo $last_name_error;  ?> </span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Gender
											</label>
											<select class="form-control gender" name="user[gender]">
												<option value="1">Male
												</option>
												<option value="0">Female
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<?php
										$email_error = form_error('user[email]');
										?>
										<div class="form-group <?php echo ($email_error != '') ? 'has-error' : '' ?>">
											<label class="control-label">Email
											</label>
											<input id="email_input" name="user[email]" class="form-control email" value="<?php echo (set_value('user[email]'));   ?>" type="email">
											<span class="help-block"> <?php echo $email_error;  ?> </span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<?php
										$password_error = form_error('user[password]');
										?>
										<div class="form-group <?php echo ($password_error != '') ? 'has-error' : '' ?>">
											<label for="exampleInputFile1">Password</label>
											<input type="password" name="user[password]" class="form-control password" value="<?php echo (set_value('user[password]'));   ?>">
											<span class="help-block"> <?php echo $password_error;  ?> </span>
										</div>

									</div>
									<div class="col-md-6">
										<?php
										$re_password_error = form_error('user[re_password]');
										?>
										<div class="form-group <?php echo ($re_password_error != '') ? 'has-error' : '' ?>">
											<label for="exampleInputFile1">Re-Type Password
											</label>
											<input name="user[re_password]" class="form-control password" value="<?php echo (set_value('user[re_password]'));   ?>" type="password">
											<span class="help-block"> <?php echo $re_password_error;  ?> </span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										
										<div class="form-group ">
											<label for="exampleInputFile1">Phone Number</label>
											<input type="text" name="user[phone_number]" class="form-control phone_number" value="<?php echo (set_value('user[phone_number]'));   ?>">
										</div>

									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="form-actions right">
					<input class="location_lat" value="<?php echo (set_value('location_lat'));   ?>" name="location_lat" type="hidden">
					<input class="location_lng" value="<?php echo (set_value('location_lng'));   ?>" name="location_lng" type="hidden">
					<input type="hidden" name="old_location_image" class="location_image">
					<input type="hidden" name="old_location_video" class="location_video">
					<input type="hidden" name="location_id" class="location_id">
					<input type="hidden" name="location_qb_id" class="location_qb_id">
					<button type="submit" class="btn blue">
						<i class="fa fa-check">
						</i> Save
					</button>
				</div>
			</form>
			<div class="clearfix margin-bottom-20"> 
			</div>
		</div>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>

<?php
if ($owner_type != "") {
	?>
	<script type="text/javascript">
		location_owner_type();
	</script>
	<?php
}

if (isset($location) && !empty($location)) {
	?>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#owner_type").val("1");
			location_owner_type();

			<?php
			foreach ($location as $key => $value) {
				?>
				var key = "<?php echo $key ?>";

				$("."+key+"").val("<?php echo $value ?>");
				$("."+key+"").attr("disabled",false);

				<?php
			}

			?>
		});
	</script>
	<?php
}
?>