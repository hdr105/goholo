<script
      type="text/javascript"
      src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere-1.3.3.js">
 </script>
  <script type="text/javascript">
     var redirectUrl = "<?=$redirect_uri?>"
     intuit.ipp.anywhere.setup({
             grantUrl:  redirectUrl,
             datasources: {
                  quickbooks : true,
                  payments : true
            },
             paymentOptions:{
                   intuitReferred : true
            }
     });
 </script>
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
  <!-- BEGIN PAGE BASE CONTENT -->

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
				<span class="caption-subject font-blue-hoki bold uppercase">Connect QuickBooks</span>
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
						<div class="col-md-offset-3 col-md-6">
							<div class="form-group">
								<label class="control-label">Client ID</label>
								<input type="text" class="form-control qb_client_id" name="qb_client_id" placeholder="Enter Client ID" value="<?php echo $qb_client_id;   ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<!--/span-->
						<div class="col-md-offset-3 col-md-6">
							<div class="form-group">
								<label class="control-label">Client Secret</label>
								<input type="text" id="qb_client_secret" class="form-control qb_client_secret" placeholder="Enter Client Secret" name="qb_client_secret" value="<?php echo $qb_client_secret;   ?>">
							</div>
						</div>
						<!--/span-->
					</div>
						<div class="form-actions right">
									
						<input type="submit" class="btn blue" value="Update Credentials">
										</div>
				</div>
			</form>
		</div>
	</div>


<ipp:connectToIntuit></ipp:connectToIntuit><br />

 <!-- END PAGE BASE CONTENT -->
</div>