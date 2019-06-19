
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
  <!-- BEGIN PAGE BASE CONTENT -->


<p class="well">
  <span class="bold text-info">CRON COMMAND: wget -q -O- <?=base_url()?>cron_job/run</span><br>
    <a href="<?=base_url()?>cron_job/run/1">Run Cron Manually</a><br>
  </p>

  <div class="row">
		<?php

		if ($this->session->flashdata("success_msg") != "") {
			?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata("success_msg"); ?>
			</div>

			<?php
		}

		?>
	</div>

	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject font-blue-hoki bold uppercase">Pay as you go</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Cost per Impression</label>
								<input type="text" class="form-control price_per_impression" name="price_per_impression" value="<?php echo $price_per_impression;   ?>">
							</div>
						</div>

							<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Day to perform automatic operations</label>
								<select class="form-control pay_as_you_go_day" name="pay_as_you_go_day">
									<option value="1" <?php echo ($pay_as_you_go_day == 1 ? "selected": "") ?> >Monday</option>
									<option value="2" <?php echo ($pay_as_you_go_day == 2 ? "selected": "") ?>>Tuesday</option>
									<option value="3" <?php echo ($pay_as_you_go_day == 3 ? "selected": "") ?>>Wednesday</option>
									<option value="4" <?php echo ($pay_as_you_go_day == 4 ? "selected": "") ?>>Thursday</option>
									<option value="5" <?php echo ($pay_as_you_go_day == 5 ? "selected": "") ?>>Friday</option>
									<option value="6" <?php echo ($pay_as_you_go_day == 6 ? "selected": "") ?>>Saturday</option>
									<option value="7" <?php echo ($pay_as_you_go_day == 7 ? "selected": "") ?>>Sunday</option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Hour of day to perform automatic operations</label>
								<input type="number" name='pay_as_you_go_hour' class="form-control pay_as_you_go_hour" data-toggle="tooltip" title="24 hours format eq. 9 for 9am or 15 for 3pm." max="23" value="<?php echo $pay_as_you_go_hour;   ?>" data-original-title="" title="" autocomplete="off">
							</div>
						</div>



						
					</div>
			
						<div class="form-actions right">
									
						<input type="submit" class="btn blue" value="Update Settings">
										</div>
				</div>
			</form>
		</div>
	</div>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

 <!-- END PAGE BASE CONTENT -->
</div>