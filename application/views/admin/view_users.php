
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
			<th>Commission (%)</th>
			<th>Role</th>
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
					<td>".$value->user_commission."</td>
					<td>".get_role_byid($value->user_role)."</td>
					<td>  <input type='checkbox' ". ($value->status == 1 ? 'checked' : '') ."  data-record_id='{$value->user_id}' data-table='users' data-where='user_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>
					<td> <a class='btn btn-primary round-btn' href='".base_url()."users/manage_user_view/".$value->user_id."'>Edit</a> &nbsp; <a href='".base_url()."users/delete_user/".$value->user_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				$i++;
			}

		?>
	</tbody>
</table>


 <!-- END PAGE BASE CONTENT -->
</div>

