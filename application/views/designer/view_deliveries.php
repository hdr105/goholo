
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->

	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Advertise Number</th>
				<th>Location Number</th>
				<th>Status</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($proofs as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->advert_number."</td>
				<td>".$value->location_number."</td>";


				$user_role = get_user_role();

				if ($user_role != 4) {
					
				echo "<td>  <input type='checkbox' ". ($value->task_status == 1 ? 'checked' : '') ."  data-record_id='{$value->task_id}' data-table='tasks' data-where='task_id'  class='make-switch change_record_status' data-on-text='Complete' data-off-text='Uncomplete'> </td>";

				}else{

					echo "<td>".get_status($value->task_status)."</td>";
				}

				echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."designer/tasks_assigned/".$value->task_id."'>View Deatils</a> &nbsp; <a href='".base_url().PROOF_UPLOAD_PATH.$value->delivery_file."' download class='btn btn-success round-btn'>View Delivery</a></td>
				</tr>";

				
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

	<!-- END PAGE BASE CONTENT -->
</div>
