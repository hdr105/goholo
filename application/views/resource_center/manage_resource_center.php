
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<?php
	if (isset($resource) && !empty($resource)) {
		?>
		<script type="text/javascript">
			$(document).ready(function(){

				<?php
				foreach ($resource as $key => $value) {
					?>
					var key = "<?php echo $key ?>";

					<?php
					if ($key == "description") {
						?>
						$("."+key+"").html("<?php echo $value ?>");
						<?php
					}else{
						?>
						$("."+key+"").val("<?php echo $value ?>");
						<?php
					}
				}
				?>
			});
		</script>
		<?php
	}
	?>

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
				<span class="caption-subject font-blue-hoki bold uppercase">Add Content</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="<?php  echo base_url() ?>admin/manage_resource_center" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Title</label>
								<input type="text" class="form-control title" name="title">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Type</label>
								<select name="resource_type" class="form-control resource_type">
									<option value="1">Location Contract</option>
									<option value="2">Advertisers Contract </option>
									<option value="3">Marketing/Promo</option>
									<option value="4">Location Criteria</option>
									<option value="5">Advertising Tips</option>
									
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control description" cols="10" rows="5"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">File</label>
								<input type="file" name="resource_file">
							</div>
						</div>
					</div>

				</div>
				<div class="form-actions right">
					<input type="hidden" name="resource_id" class="resource_id">
					<input type="hidden" class="resource_file" name="old_resource_file">
					<button type="submit" class="btn blue">
						<i class="fa fa-check"></i> Save</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
	</div>
