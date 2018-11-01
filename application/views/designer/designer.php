
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->

	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Location Name</th>
				<th>Location Number</th>
				<th>Advertise Number</th>
				<th>Type</th>
				<th>Date</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($tasks as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->location_name."</td>
				<td>".$value->location_number."</td>
				<td>".$value->advert_number."</td>
				<td>Design Hologram</td>";

					echo "<td>".$value->date."</td>";

					echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."designer/tasks_assigned/".$value->task_id."'>View Details</a>";
					if ($status == 0) {
						
					 echo "&nbsp; <a href='".base_url()."designer/deliver_task/".$value->task_id."' class='btn btn-success round-btn'>Deliver</a></td>";
					}
				echo "</tr>";

				
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

	<!-- END PAGE BASE CONTENT -->
</div>
