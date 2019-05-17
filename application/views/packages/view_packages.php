<div class="page-content-col">

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
					<a href="<?php echo base_url() ?>admin/manage_packages" class='btn btn-primary'> Add Package</a>

		</div>
	</div>
<div class="table-responsive mt20">
	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Package Name</th>
				<th>Impressions</th>
				<th>Cost/Impression</th>
				<th>Hologram Price </th>
				<th>Total Cost</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($packages as $key => $value) {

				echo "<tr>
				<td>".$i."</td>
				<td>".$value->package_name."</td>
				<td>".$value->total_impressions."</td>
				<td>".$value->cost_per_impression."</td>
				<td>".$value->hologram_price."</td>
				<td>".$value->total_cost."</td>
				<td> <a class='btn btn-primary round-btn' href='".base_url()."admin/manage_packages/".$value->package_id."'>Edit</a> &nbsp; <a href='".base_url()."admin/delete_package/".$value->package_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				$i++;
			}

			?>
		</tbody>
	</table>
</div>

</div>