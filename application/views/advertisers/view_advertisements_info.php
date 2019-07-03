<div class="page-content-col">

	<?php
	$date = $locations->created_at;
	$format = date_create($date);
	$formatted_date = date_format($format,"Y-m-d");
	?>


	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
			locations Details </div>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

			</div>
			<span style="float: right;padding: 10px;font-size: 18px;"> <b>Total Impressions:</b> <?=$locations->impressions?> </span>
		</div>
		<div class="portlet-body form">
			<div class="form-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Location Name:</b>
							<div class="col-md-8">
								<p> <?=$locations->location_name?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Location Number:</b>
							<div class="col-md-8">
								<p> <?=$locations->location_number?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<b class=" col-md-4">Advertise Number:</b>
							<div class="col-md-8">
								<p > <?=$locations->advert_number?> </p>
							</div>
						</div>
					</div>
					<?php
					if ($locations->hologram_type == 2) {


						$locations->hologram_file = "";
						$delivery = $this->crud_model->get_data('tasks',array("advert_id"=>$locations->advert_id,'task_type'=>'designer','status'=>1),true);

						if (!empty($delivery)) {
							$locations->hologram_file = $delivery->delivery_file;
						}

					}
					?>
					<?php
					if (!empty($locations->hologram_file)) {
						?>
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Hologram File:</b>
								<div class="col-md-8">
									<p> <?php
									if ($locations->hologram_file != "") {
										?>
										<a href="<?php echo base_url().HOLOGRAM_FILE_UPLOAD_PATH.$locations->hologram_file ?>" download> Download File</a>
										<?php
									}else{

										echo "Waiting for the designs from the designer";
									}
									?> </p>
								</div>
							</div>
						</div>
						<?php
					}

					?>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">

					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Delivery Date:</b>
							<div class="col-md-8">
								<p> <?=$formatted_date?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Delivery Type:</b>
							<div class="col-md-8">
								<p>Design Hologram</p>
							</div>
						</div>
					</div>
				</div>

					<div class="row">

					<?php
						if ($locations->advertisment_type == 1) {
							
					?>

					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Advertisment Type:</b>
							<div class="col-md-8">
								<p>Package Based</p>
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Total Views:</b>
							<div class="col-md-8">
								<p> <?=$locations->total_impressions?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
				
			
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Views Remaining:</b>
							<div class="col-md-8">
								<p> <?=$locations->total_impressions-$locations->impressions?></p>
							</div>
						</div>
					</div>

					<?php
						}elseif ($locations->advertisment_type == 2) {
							?>	

							<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Advertisment Type:</b>
							<div class="col-md-8">
								<p>Pay As You Go</p>
							</div>
						</div>
					</div>

							<?php
						}

					?>
						<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Current Views:</b>
							<div class="col-md-8">
								<p> <?=$locations->impressions?></p>
							</div>
						</div>
					</div>


				</div>


<hr>
				<?php
				if (!empty($delivery_file)) {
					?>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Delivery File:</b>
								<div class="col-md-8">
									<p> <a href="<?php echo base_url().PROOF_UPLOAD_PATH.$delivery_file->proof_file ?>" download> Download File</a> </p>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				?>
				<?php
				if (!empty($locations->delivery_file)) {
					?>
					<div class="row">

						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Delivery File:</b>
								<div class="col-md-8">
									<p> <a href="<?php echo base_url().PROOF_UPLOAD_PATH.$locations->delivery_file ?>" download> Download File</a> </p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<?php
				}

				?>
				<?php
				if (!empty($locations->hologram_description)) {
					?>
					<div class="row">

						<div class="col-md-12">
							<div class="form-group">
								<b class="col-md-3">Hologram Description:</b>
								<div class="col-md-12">
									<p> <?=$locations->hologram_description?> </p>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				?>

				<h3 class="form-section">Address</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<b class="col-md-2">Address:</b>
									<div class="col-md-10">
										<p> <?=$locations->location_address?> </p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">City:</b>
									<div class="col-md-8">
										<p class=""> <?=$locations->location_city?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">State:</b>
									<div class="col-md-8">
										<p class=""> <?=$locations->location_state?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">Post Code:</b>
									<div class="col-md-8">
										<p class=""> <?=$locations->location_post_code?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">Country:</b>
									<div class="col-md-8">
										<p class=""> <?=$locations->location_country?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="col-md-12">
						<input type="hidden" class="lat" value="<?php echo $locations->location_lat?>">
						<input type="hidden" class="lng" value="<?php echo $locations->location_lng?>">
						<input type="hidden" class="cost" value="<?php echo $locations->total_cost?>">
						<input type="hidden" class="location_id" value="<?php echo $locations->location_id?>">

						<div id="location_map" style="height: 400px"></div>
					</div>
				</div>
			</div>	



		</div>
	</div>







</div>