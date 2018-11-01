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
					<?php
					if (!empty($task->hologram_file)) {
						?>
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Hologram File:</b>
								<div class="col-md-8">
									<p> <a href="<?php echo base_url().HOLOGRAM_FILE_UPLOAD_PATH.$task->hologram_file ?>" download> Download File</a> </p>
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
								<p> <?=$task->date?> </p>
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
				<?php
				if (!empty($task->hologram_description)) {
					?>
					<div class="row">

						<div class="col-md-12">
							<div class="form-group">
								<b class="col-md-3">Hologram Description:</b>
								<div class="col-md-12">
									<p> <?=$task->hologram_description?> </p>
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

						<div id="location_map" style="height: 400px"></div>
					</div>
				</div>

				<h3 class="form-section">Comments</h3>

				<form method="post" action="<?=base_url()?>designer/add_comment" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea required="" rows="5" cols="10" name="comment" class="form-control"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="file" name="comment_file">
							</div>
						</div>
					</div>
					<div class="form-actions right">
						<input type="hidden" name="task_id" value="<?=$task_id?>">
						<input type="hidden" name="user_id" value="<?=get_user_id()?>">
						<button class="btn blue">Send</button>
					</div>
				</form>
				

				<div class="row">
					<div class="col-md-12">
						<div class="comments-section">

							<?php
							foreach ($comments as $key => $value) {
								?>
								<div class="comment-box <?php echo ($value->user_id!=get_user_id() ? 'bg-grey' : '') ?> " >
									<div class="pb10"><b><?=$value->first_name.' '.$value->last_name?> says:</b></div>
									<div class=""><?=$value->comment?></div>

									<?php
									if ($value->comment_file != "") {
									?>

									<div class=""><a href="<?php echo base_url().PROOF_UPLOAD_PATH.$value->comment_file ?>" download> Comment File</a></div>

									<?php
									}
									?>
								</div>
								<?php
							}
							?>

							
					</div>
				</div>
			</div>	



		</div>
	</div>







</div>