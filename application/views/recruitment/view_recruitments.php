
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

	<table class="table table-bordered table-stripped datatable">
	<thead>
		<tr>
			<th>Sr.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			foreach ($users as $key => $value) {
				echo "<tr>
					<td>".$i."</td>
					<td>".$value->first_name.' '.$value->last_name."</td>
					<td>".$value->email."</td>
					<td>".($value->status == 1 ? 'Active' : 'Block')."</td>
					<td> <a class='btn btn-primary round-btn' href='".base_url()."recruitments/view_recruitment/".$value->user_id."'>View</a> </td>
				</tr>";

				$i++;
			}

		?>
	</tbody>
</table>


 <!-- END PAGE BASE CONTENT -->
</div>

