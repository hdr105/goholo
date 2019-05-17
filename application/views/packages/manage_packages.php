
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<?php
	if (isset($package) && !empty($package)) {
		?>
		<script type="text/javascript">
			$(document).ready(function(){

				<?php
				foreach ($package as $key => $value) {
					?>
					var key = "<?php echo $key ?>";
					$("."+key+"").val("<?php echo $value ?>");
						<?php
					
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
				<span class="caption-subject font-blue-hoki bold uppercase">Add Package</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="<?php  echo base_url() ?>admin/manage_packages" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Package Name</label>
								<input type="text" class="form-control package_name" name="package_name">
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Total Impressions</label>
								<input type="text" class="form-control total_impressions" name="total_impressions">
							</div>
						</div>
					</div>

	<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Cost / Impression</label>
								<input type="text" class="form-control cost_per_impression" name="cost_per_impression">
							</div>
						</div>
				
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Hologram Price</label>
								<input type="text" class="form-control hologram_price" name="hologram_price">
							</div>
						</div>
					</div>

	<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Total Cost</label>
								<input type="text" class="form-control total_cost" name="total_cost" readonly="">
							</div>
						</div>
					</div>


			

				</div>
				<div class="form-actions right">
					<input type="hidden" name="package_id" class="package_id">
					<button type="submit" class="btn blue">
						<i class="fa fa-check"></i> Save</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
	</div>
