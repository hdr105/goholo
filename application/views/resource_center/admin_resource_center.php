
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->


	<?php

	if ($this->session->flashdata("success_msg") != "") {
		?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata("success_msg"); ?>
		</div>

		<?php
	}

	?>

	<div class="row text-right">
		<div class="col-md-12">
					<a href="<?php echo base_url() ?>admin/manage_resource_center" class='btn btn-primary'> Add Resource</a>

		</div>
	</div>
<div class="table-responsive mt20">
	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Title</th>
				<th>Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($resources as $key => $value) {

				echo "<tr>
				<td>".$i."</td>
				<td>".$value->title."</td>
				<td>".get_resouce_type($value->resource_type)."</td>
				<td> <a class='btn btn-primary round-btn' href='".base_url()."admin/manage_resource_center/".$value->resource_id."'>Edit</a> &nbsp; <a href='".base_url()."admin/delete_resource/".$value->resource_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				$i++;
			}

			?>
		</tbody>
	</table>
</div>
	
	<!-- END PAGE BASE CONTENT -->
</div>
