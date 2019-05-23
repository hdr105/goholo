<div class="page-content-col">



	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
			Task Details </div>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Location Name:</b>
							<div class="col-md-8">
								<p> <?=$task->location_name?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Location Number:</b>
							<div class="col-md-8">
								<p> <?=$task->location_number?> </p>
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
								<p > <?=$task->advert_number?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<?php
					if ($task->hologram_type == 2) {


						$task->hologram_file = "";
						$delivery = $this->crud_model->get_data('tasks',array("advert_id"=>$task->advert_id,'task_type'=>'designer','status'=>1),true);

						if (!empty($delivery)) {
							$task->hologram_file = $delivery->delivery_file;
						}

					}
					?>

					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Hologram File:</b>
							<div class="col-md-8">
								<p> 
								<?php
								if ($task->hologram_file != "") {
									?>
									<a href="<?php echo base_url().HOLOGRAM_FILE_UPLOAD_PATH.$task->hologram_file ?>" download> Download File</a>
									<?php
								}else{

									echo "Waiting for the designs from the designer";
								}
								?>
								 </p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
		
					<div class="row">

						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Delivery Date:</b>
								<div class="col-md-8">
									<p> <?=$task->date?> </p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Delivery Type:</b>
								<div class="col-md-8">
									<p> <?php

									if ($task->task_type == "add_advert") {
											
											echo "Add Advertisement";

									}else if ($task->task_type == "remove_advert"){

										echo "Remove Advertisement";
									}else{

										echo "Design Hologram";
									}

									?> </p>
								</div>
							</div>
						</div>
					</div>
							<?php
				if (!empty($task->delivery_file)) {
					?>
					<div class="row">

						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Delivery File:</b>
								<div class="col-md-8">
									<p> <a href="<?php echo base_url().PROOF_UPLOAD_PATH.$task->delivery_file ?>" download> Download File</a> </p>
								</div>
							</div>
						</div>
						<!--/span-->
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
										<p> <?=$task->location_address?> </p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">City:</b>
									<div class="col-md-8">
										<p class=""> <?=$task->location_city?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">State:</b>
									<div class="col-md-8">
										<p class=""> <?=$task->location_state?> </p>
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
										<p class=""> <?=$task->location_post_code?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<b class="col-md-4">Country:</b>
									<div class="col-md-8">
										<p class=""> <?=$task->location_country?> </p>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="col-md-12">
						<input type="hidden" class="lat" value="<?php echo $task->location_lat?>">
						<input type="hidden" class="lng" value="<?php echo $task->location_lng?>">
						<input type="hidden" class="cost" value="<?php echo $task->monthly_cost?>">
						<input type="hidden" class="location_id" value="<?php echo $task->location_id?>">
						<div id="location_map" style="height: 400px"></div>
					</div>
				</div>

			</div>
		</div>







	</div>