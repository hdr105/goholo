<div class="page-content-col">
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


	<table class="table table-bordered table-stripped" id="locations_records">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Location Name</th>
				<th>Location Number</th>
				<th>Owner Royalty (%)</th>
				<th>Advertiser Royalty (%)</th>
				<th>Location Owner</th>
				<th>Added By</th>
				<th>Status</th>
				<?php
				if ($user_role == 1) {
					?>
					<th width="120px">Action</th>
					<?php
				}
				?>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($locations as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->location_name."</td>
				<td>".$value->location_number."</td>
				<td>".$value->owner_royalty."</td>
				<td>".$value->advert_royalty."</td>
				<td>".$value->owner_name."</td>
				<td>".$value->satff_name."</td>";

				
				if ($user_role == 1) {

					echo "<td>  <input type='checkbox' ". ($value->location_status == 1 ? 'checked' : '') ."  data-record_id='{$value->location_id}' data-table='locations' data-where='location_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>";
				}else{

					echo "<td>".get_status($value->location_status)."</td>";
				}

				if ($user_role == 1) {
					echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."locations/manage_location_view/".$value->location_id."'>Edit</a> &nbsp; <a href='".base_url()."locations/delete_location/".$value->location_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				}
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

</div>
<script type="text/javascript">
	$(document).ready(function(){
	$("#locations_records").DataTable({
		 "pageLength": 100
	});
});
</script>
