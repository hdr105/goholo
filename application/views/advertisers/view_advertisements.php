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


	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Advertiser's Name</th>
				<th>Advertise Number</th>
				<th>Location Name</th>
				<th>Location Number</th>
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
			foreach ($adverts as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->advertiser_first_name.' '.$value->advertiser_last_name."</td>
				<td>".$value->advert_number."</td>
				<td>".$value->location_name."</td>
				<td>".$value->location_number."</td>";

				if ($user_role == 1) {

					echo "<td>  <input type='checkbox' ". ($value->advert_status != 0 ? 'checked' : '') ."  data-record_id='{$value->advert_id}' data-table='advertisements' data-where='advert_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>";
				}else{

					echo "<td>".get_status($value->advert_status)."</td>";
				}

				if ($user_role == 1) {

					echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."advertisers/manage_advertisement/".$value->location_id."/".$value->advert_id."'>Edit</a> &nbsp; <a href='".base_url()."advertisers/delete_advertisement/".$value->advert_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				}
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

</div>

