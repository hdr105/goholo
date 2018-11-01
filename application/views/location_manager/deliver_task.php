<div class="page-content-col">


	<div class="row">
		<?php

		if ($this->session->flashdata("error_msg") != "") {
			?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata("error_msg"); ?>
			</div>

			<?php
		}elseif ($this->session->flashdata("success_msg") != "") {
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
				<span class="caption-subject font-blue-hoki bold uppercase">Deliver Task</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="post" enctype="multipart/form-data" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Upload File here</h3>
					<div class="row">

						<div class="col-md-6">
							<?php
							$proof_file_error = form_error('proof_file');
							?>
							<div class="form-group <?php echo ($proof_file_error != '') ? 'has-error' : '' ?>">
								<label for="exampleInputFile1">Proof file</label>
								<input name="proof_file" type="file">
								<span class="help-block"> <?php echo $proof_file_error;  ?> </span>
							</div>
						</div>
					</div>

				</div>
				<div class="form-actions right">
					<input class="advert_id" name="task_id" type="hidden" value="<?=$task_id?>">
					<button type="submit" class="btn blue">
						<i class="fa fa-check"></i>Deliver Task</button>
					</div>
				</form>
			</div>
		</div>



	</div>